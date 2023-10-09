<?php

namespace App\Http\Controllers\V1\Website;

use App\Http\Controllers\Controller;
use App\Models\AssociationDetails;
use App\Models\EventDetails;
use App\Models\NewsLetterDetails;
use App\Models\StudentNoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentBatches;
use App\Models\LocationDetails;
use App\Models\EventPresentationVideo;
use App\Models\EventImages;
use App\Models\EventPresentationPdf;

use DB;
use Auth;
use JWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
class WebMetaDataController extends Controller
{

// public function getLatestUpdate(Request $request)
// {
//     try {
//         $validator = Validator::make($request->all(), [
//             'limit' => 'numeric',
//             'pageNo' => 'numeric',
//         ]);
//         if ($validator->fails()) {
//             return $this->sendError('Validation Error.', $validator->errors());
//         }

//         // Create queries for each table and select all columns
//         $eventQuery = EventDetails::select('*')->addSelect(DB::raw("'Event' AS source"));
//         $associationQuery = AssociationDetails::select('*')->addSelect(DB::raw("'Association' AS source"));
//         $newsletterQuery = NewsLetterDetails::select('*')->addSelect(DB::raw("'Newsletter' AS source"));
//         $noticeBoardQuery = StudentNoticeBoard::select('*')->addSelect(DB::raw("'NoticeBoard' AS source"));

//         // Combine the queries using union
//         $combinedQuery = $eventQuery
//             ->union($associationQuery)
//             ->union($newsletterQuery)
//             ->union($noticeBoardQuery);

//         // Apply sorting and pagination
//         $combinedQuery = $combinedQuery->orderBy('created_at', 'desc');

//         if ($request->has('pageNo') && $request->has('limit')) {
//             $limit = $request->limit;
//             $pageNo = $request->pageNo;
//             $skip = $limit * ($pageNo - 1);
//             $combinedQuery = $combinedQuery->skip($skip)->take($limit);
//         }

//         // Execute the combined query
//         $results = $combinedQuery->get();

//         if ($results->count() > 0) {
//             return $this->sendResponse(["member" => $results], 'Data fetch successfully');
//         } else {
//             return $this->sendResponse([], 'No data available', false);
//         }
//     } catch (Exception $e) {
//         return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
//     }
// }

public function getLatestUpdate(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'limit' => 'numeric',
            'pageNo' => 'numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $eventData = EventDetails::orderBy('created_at', 'desc')->get();
        $associationData = AssociationDetails::orderBy('created_at', 'desc')->get();
        $newsletterData = NewsLetterDetails::orderBy('created_at', 'desc')->get();
        $noticeBoardData = StudentNoticeBoard::orderBy('created_at', 'desc')->get();
        $combinedData = $eventData
            ->concat($associationData)
            ->concat($newsletterData)
            ->concat($noticeBoardData);
        $combinedData = $combinedData->sortByDesc('created_at');

        if ($request->has('pageNo') && $request->has('limit')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * ($pageNo - 1);
            $combinedData = $combinedData->slice($skip, $limit);
        }
        $formattedData = $combinedData->values();

        if ($formattedData->count() > 0) {
            return $this->sendResponse(["latest_update" => $formattedData], 'Data fetch successfully');
        } else {
            return $this->sendResponse([], 'No data available', false);
        }
    } catch (Exception $e) {
        return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    }
}


public function getMembersNoticeBoard(Request $request)
{
   try{
       $validator = Validator::make($request->all(), [
           'pageNo'=>'numeric',
           'limit'=>'numeric',
       ]);
       if ($validator->fails()) {
           return $this->sendError('Validation Error.', $validator->errors(),400);
       }
       $query = StudentNoticeBoard::query()->where('type', 'members');
       $count=$query->count();
       if ($request->has('title')) {
                $query = $query->where('title', 'like', '%' . $request->title . '%');
            }
       if($request->has('pageNo') && $request->has('limit')){
           $limit = $request->limit;
           $pageNo = $request->pageNo;
           $skip = $limit*$pageNo;
           $query= $query->skip($skip)->limit($limit);
       }
       $data = $query->get();
       if(count($data)>0){
           $response['notice_board'] =  $data;
           $response['count']=$count;
           return $this->sendResponse($response,'Data Fetched Successfully', true);
       }else{
           return $this->sendResponse('No Data Available', [],false);
       }
   }catch (\Exception $e){
           return $this->sendError($e->getMessage(), $e->getTrace(),500);
       }
}

public function addEventRegistration(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer|exists:event_details,id',
                'gst_no' => 'required',
                'legal_name' => 'required',
                'event_price' => 'required|nullable',
                'total_amount' => 'required|nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newEventRegistration = new EventRegistration();
            $newEventRegistration->event_id=$request->event_id;
            $newEventRegistration->user_id=Auth::user()->id;
            $newEventRegistration->gst_no=$request->gst_no;
            $newEventRegistration->legal_name=$request->legal_name;
            $newEventRegistration->attendance_status = $request->attendance_status;
            $newEventRegistration->event_price = $request->event_price;
            $newEventRegistration->total_amount = $request->total_amount;
            $newEventRegistration->save();
            if($newEventRegistration->save()){
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create(array('receipt' => 'Inv-'.$newEventRegistration->id,
                'amount' => intval($newEventRegistration->total_amount), 'currency' => 'INR', 'notes'=> array()));
                $newEventRegistration->razorpay_id = $orderDetails->id;
                $newEventRegistration->save();
                $response = [];
                $response['system_order_id']=$newEventRegistration->id;
                $response['razorpay_order_id']=$newEventRegistration->razorpay_id;
                $response['razorpay_api_key']=env('R_API_KEY');
                return $this->sendResponse($response, 'Payment Initiated Successfully',true);
            }else{
                return $this->sendResponse([], 'Payment Cannot Be Initiated',false);
            }

        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
            public function paymentVerification(Request $request)
        {
        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'system_order_id'=>'required|numeric',
                'razorpay_order_id'=>'required|string',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = EventRegistration::where('razorpay_id',$request->razorpay_order_id)->find($request->system_order_id);
            if(is_null($payment)){
                return $this->sendResponse([], 'Wrong Payment Id',false);
            }
            if($payment->payment_status=="paid"){
                return $this->sendResponse([], 'Payment Already Done',false);
            }
            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $razorpay_order = $api->order->fetch($request->razorpay_order_id);
            if($razorpay_order->status == 'paid' || true){
                $payment->payment_status="paid";
                $payment->save();
            }else {
                $payment->payment_status="unpaid";
                $payment->save();
                return $this->sendResponse([], 'Payment Pending',false);
            }
            return $this->sendResponse([], 'Event registration successfully',false);
        }catch (\Exception $e){
            return $this->sendError( $e->getMessage(),$e->getTrace(),413);
        }
    }



    public function addStudentBatches(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
            'batch_name' => 'required|nullable',
            'fees' => 'required|nullable',
          //   'location_id' => 'required|nullable',
            'end_date' => 'required|nullable',
            'address_line_1' => 'required|nullable|string|max:255',
            'pincode' => 'required|nullable|string|max:255',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $NewLocationDetails = new LocationDetails();
            $NewLocationDetails->address_line_1=$request->address_line_1;
            $NewLocationDetails->pincode=$request->pincode;
            $NewLocationDetails->save();
            $newDetails = new StudentBatches;
            $newDetails->location_id=$NewLocationDetails->id;
            $newDetails->batch_name = $request->batch_name;
            $newDetails->fees = $request->fees;
            $newDetails->start_date=$request->start_date;
            $newDetails->end_date=$request->end_date;
            $newDetails->batch_discription = $request->batch_discription;
            $newDetails->batch_cut_off_date = $request->batch_cut_off_date;
            $newDetails->batch_address = $request->batch_address;
            $newDetails->early_bird_date=$request->early_bird_date;
            $newDetails->early_bird_fees = $request->early_bird_fees;
            $newDetails->save();
            return $this->sendResponse([],' Student batches added successfully.', true);
          }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
  public function getStudentBatches(Request $request)
   {
      try{
          $validator = Validator::make($request->all(), [
              'pageNo'=>'numeric',
              'limit'=>'numeric',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors(),400);
          }
          $currentDate = carbon::now('Asia/Kolkata');
              $now = carbon::now();
          $query = StudentBatches::query()->with('location_details');
          if ($request->has('batch_name')) {
                  $query = $query->where('batch_name', 'like', '%' . $request->batch_name. '%');
          }
          if ($request->has('start_date')) {
                  $query = $query->where('start_date', 'like', '%' . $request->start_date. '%');
          }
          if ($request->has('end_date')) {
                  $query = $query->where('end_date', 'like', '%' . $request->end_date. '%');
          }
          if ($request->has('fees')) {
                  $query = $query->where('fees', 'like', '%' . $request->fees. '%');
          }
          if ($request->has('address_line_1')) {
              $searchTerm = $request->input('address_line_1');
              $query = $query->whereHas('location_details', function ($query) use ($searchTerm) {
              $query->where('address_line_1', 'like', '%' . $searchTerm . '%');
              });
          }
              if ($request->has('filter')) {
                  $filter = $request->filter;
                  if ($filter === 'upcoming') {
                      $query = $query->where('end_date', '>', $now);
                  }
                  if ($filter === 'past') {
                      $query = $query->where('end_date', '<', $now);
                  }
                  if ($filter === 'ongoing') {
                      $query->where('start_date', '<=', $currentDate)
                          ->where('end_date', '>=', $currentDate);
                  }
              }
          $count=$query->count();
          if($request->has('pageNo') && $request->has('limit')){
              $limit = $request->limit;
              $pageNo = $request->pageNo;
              $skip = $limit*$pageNo;
              $query= $query->skip($skip)->limit($limit);
          }
          $data = $query->get();
          if(count($data)>0){
              $response['data'] =  $data;
              $response['count']=$count;
              return $this->sendResponse($response,'Data Fetched Successfully', true);
          }else{
              return $this->sendResponse([],'No Data Available',false);
          }
      }catch (\Exception $e){
              return $this->sendError($e->getMessage(), $e->getTrace(),500);
          }
  }
  public function getStudentBatchesById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:student_batches,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = StudentBatches::query()->with('location_details')->where('id', $request->id)->first();
  
            return $this->sendResponse(["student_batch" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
  
    public function getEventDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $getEvent = EventDetails::query()->where('id', $request->id)->with(['location_details'])->first();
            if($getEvent['id']!=null){
                    $product=EventPresentationVideo::query()->where('event_id',$getEvent['id'])
                    ->get();
                    $getEvent['event_video']=$product;
            }
            if($getEvent['id']!=null){
                    $product=EventImages::query()->where('event_id',$getEvent['id'])
                    ->get();
                    $getEvent['event_images']=$product;
            }
            if($getEvent['id']!=null){
                    $product=EventPresentationPdf::query()->where('event_id',$getEvent['id'])
                    ->get();
                    $getEvent['event_prsentation']=$product;
                }

            return $this->sendResponse([
                 "event_details" => $getEvent,
                ], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
}




