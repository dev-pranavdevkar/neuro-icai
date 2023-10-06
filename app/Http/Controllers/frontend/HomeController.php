<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventDetails;
use App\Models\AssociationDetails;
use App\Models\EventRegistration;
use App\Models\StudentNoticeBoard;
use App\Models\NewsLetterDetails;
use App\Models\VacancyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Razorpay\Api\Api;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $eventDetails = EventDetails::with([])->paginate(3);
        $associationDetails = AssociationDetails::with([])->paginate(3);
        $studentNoticeBoard = StudentNoticeBoard::with([])->paginate(3);
        $newsLetterDetails = NewsLetterDetails::with([])->paginate(3);
        $vacancyDetails = VacancyDetails::with([])->paginate(3);

        return view('frontend.index', compact('eventDetails', 'associationDetails', 'studentNoticeBoard', 'newsLetterDetails', 'vacancyDetails'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function help()
    {
        return view('frontend.help');
    }
    public function termsAndConditions()
    {
        return view('frontend.termsAndConditions');
    }
    public function privacyPolicy()
    {
        return view('frontend.privacyPolicy');
    }
    public function termsOfUse()
    {
        return view('frontend.termsOfUse');
    }
    public function atSalesCounter()
    {
        return view('frontend.atSalesCounter');
    }
    public function usefulLinks()
    {
        return view('frontend.usefulLinks');
    }
    public function tenders()
    {
         $studentNoticeBoard = StudentNoticeBoard::with([])->paginate(3);

        return view('frontend.tenders', compact('studentNoticeBoard'));
    }

    public function eventDetails(Request $request,$id){
        $eventDetails = EventDetails::with(['location_details','event_images','event_video','event_presntation'])->find($id);
        return view('frontend.razorpayView',compact('eventDetails'));
    }

    public function eventRegister(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer|exists:event_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $eventDetails = EventDetails::find($request->event_id);
            $user = Auth::user();
            $isMember = false;
            if(in_array('members',Auth::user()->roles->pluck('name')->toArray())){
                $isMember = true;
            }else if(in_array('students',Auth::user()->roles->pluck('name')->toArray())){
                $isMember = false;
            }
            $totalAmount = $isMember?$eventDetails->price_for_members:$eventDetails->price_for_students;

            $newEventRegistration = new EventRegistration();
            $newEventRegistration->event_id=$request->event_id;
            $newEventRegistration->user_id=$user->id;
            $newEventRegistration->gst_no=null;
            $newEventRegistration->legal_name=null;
            $newEventRegistration->attendance_status =null;
            $newEventRegistration->event_price = $totalAmount;
            $newEventRegistration->total_amount = $totalAmount;
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
        catch (\Exception $e) {
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

}
