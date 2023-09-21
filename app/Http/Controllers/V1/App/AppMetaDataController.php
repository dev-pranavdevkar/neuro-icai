<?php
namespace App;
namespace App\Http\Controllers\V1\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\OffersAssociation;
use App\Models\EventDetails;
use App\Models\EventPresentationVideo;
use App\Models\EventImages;
use App\Models\EventRegistration;
use App\Models\RegisterToAssocitationDetails;
use App\Models\AssociationDetails;
use App\Models\NewsLetterDetails;
use App\Models\VacancyDetails;
use App\Models\ApplyForJob;
use App\Models\StudentNoticeBoard;
use Razorpay\Api\Api;
class AppMetaDataController extends Controller
{
    public function open()
    {
        $data = "This data is open and can be accessed without the client being authenticated";
        return response()->json(compact('data'),200);
    }
    public function closed()
    {
        $data = "Only authorized users can see this";
        return response()->json(compact('data'),200);
    }
//OffersToAssociation
    public function getOffersToAssociation(Request $request)
 {
	try{
		$validator = Validator::make($request->all(), [
			'pageNo'=>'numeric',
			'limit'=>'numeric',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
		$query = OffersAssociation::query()->with(['association_details']);;
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
			return $this->sendResponse('No Data Available', [],false);
		}
	}catch (\Exception $e){
            return $this->sendError($e->getMessage(), $e->getTrace(),500);
        }
  }
  public function saveCompanyLogo($image): string
  {
      $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('CompanyLogo/');
      if (env('APP_ENV') == 'prod') {
                  $destinationPath = public_path('CompanyLogo/' . $imageName);
              }
      $image->move($destinationPath, $image_name);
      return '/CompanyLogo/' . $image_name;
  }
  public function saveOffersPdf($image): string
  {
      $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('OffersPdf/');
      if (env('APP_ENV') == 'prod') {
                  $destinationPath = public_path('OffersPdf/' . $imageName);
              }
      $image->move($destinationPath, $image_name);
      return '/OffersPdf/' . $image_name;
  }
  public function saveAssociationImage($image): string
  {
      $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('AssociationImages/');
      if (env('APP_ENV') == 'prod') {
                  $destinationPath = public_path('AssociationImages/' . $imageName);
              }
      $image->move($destinationPath, $image_name);
      return '/AssociationImages/' . $image_name;
  }
  public function addAssociationDetails(Request $request): \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
            //   'company_name' => 'required|string|max:255',
            //   'company_email' => 'required|string|max:255',
            //   'start_date' => 'required|date',
            //   'end_date' => 'required|date',
            //   'mobile_no' => 'required',
            //   'limits' => 'required',

            //   'location_id' => 'required|integer|exists:location_details,id',

            //   'company_logo' => 'required',
            //   'benifits' => 'required|string|nullable',
            //   'offers_pdf'=>'required|nullable',
            //   'images'=>'required|nullable',
              "offers"=>'array',
              "offers.*.offers"=>'string',
              "offers.*.discount"=>'string'
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $newAssociationDetails = new AssociationDetails();
          $newAssociationDetails->company_name=$request->company_name;
          $newAssociationDetails->company_email=$request->company_email;
          $newAssociationDetails->start_date=$request->start_date;
          $newAssociationDetails->end_date=$request->end_date;
          $newAssociationDetails->mobile_no=$request->mobile_no;
          $newAssociationDetails->limits=$request->limits;
          $newAssociationDetails->location_id=$request->location_id;
          $newAssociationDetails->benifits = $request->benifits;
          if ($request->company_logo != "") {
              if (!str_contains($request->company_logo, "http")) {
                  $newAssociationDetails->company_logo = $this->saveCompanyLogo($request->company_logo,$request->company_name);
              }
          }
          if ($request->offers_pdf != "") {
              if (!str_contains($request->offers_pdf, "http")) {
                  $newAssociationDetails->offers_pdf = $this->saveOffersPdf($request->offers_pdf,$request->company_name);
              }
          }
          if ($request->images != "") {
              if (!str_contains($request->images, "http")) {
                  $newAssociationDetails->images = $this->saveAssociationImage($request->images,$request->company_name);
              }
          }
          $newAssociationDetails->save();

        //   foreach($request->offers as $eachoffers){
        //       $newOffer=new OffersAssociation();
        //       $newOffer->association_id=$newAssociationDetails->id;
        //       $newOffer->offers=$eachoffers['offers'];
        //       $newOffer->discount=$eachoffers['discount'];
        //       $newOffer->save();
        //   }
          foreach ($request->offers as $eachoffers) {
            $newOffer = new OffersAssociation();
            $newOffer->association_id = $newAssociationDetails->id;
            $newOffer->offers = $eachoffers['offers'];
            $newOffer->discount = $eachoffers['discount'];
            $newOffer->save();
        }
          return $this->sendResponse([], 'Association Details added successfully', true);
      }
      catch (Exception $e) {
          return $this->sendError('Something went wrong', $e->getTrace(), 413);
      }
  }
public function addRegisterToAssociation(Request $request): \Illuminate\Http\JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|nullable',
            'association_id' => 'required|nullable',
            'created_by_user_id' => 'required|nullable',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $existingRegistration = RegisterToAssocitationDetails::where('user_id', $request->user_id)->first();

        if ($existingRegistration) {
            return $this->sendError('User is already registered for an association.', [], 422);
        }
        $association = AssociationDetails::find($request->association_id);

        if (!$association) {
            return $this->sendError('Association not found.', [], 404);
        }

        $limit = (int) $association->limit;
        $registeredUsersCount = RegisterToAssocitationDetails::where('association_id', $request->association_id)->count();

        // Check if the association's limit is set and has reached its capacity
        if ($registeredUsersCount >= $limit && $limit==$limit &&$limit!=$registeredUsersCount) {
            return $this->sendError('Registration to this association is not possible. The association is full.', [], 422);
        }
        // Proceed with registering the user to the association
        $newDetails = new RegisterToAssocitationDetails;
        $newDetails->user_id = $request->user_id;
        $newDetails->association_id = $request->association_id;
        $newDetails->created_by_user_id = $request->created_by_user_id;
        $newDetails->offers_association_id=$request->offers_association_id;
        $newDetails->save();
        return $this->sendResponse([], 'RegisterToAssocitationDetails Created Successfully.', true);
    } catch (Exception $e) {
        return $this->sendError('Something went wrong', $e->getTrace(), 413);
    }
}

  public function getUpcomingEvent(Request $request)
  {
      try {
          $validator = Validator::make($request->all(), [
              'pageNo' => 'numeric',
              'limit' => 'numeric',
              'filter' => 'in:upcoming,past',
          ]);

          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors(), 400);
          }
          // $query = LocationDetails::query();
          $query = EventDetails::query()->with(['location_details']); // Replace "ModelName" with your actual model name
          // Filter upcoming events based on the 'filter' parameter
          if ($request->has('filter')) {
              $filter = $request->filter;
              if ($filter === 'upcoming') {
                  // For upcoming events, filter those with the event_end_date greater than today's date
                  $query = $query->where('event_end_date', '>', date('Y-m-d'));
              }
          }
          // Get the start and end dates for the current week
          $startOfWeek = date('Y-m-d', strtotime('this week'));
          $endOfWeek = date('Y-m-d', strtotime('this week +6 days'));
          // Filter events for this week
          $queryThisWeek = clone $query; // Create a clone of the query to use for this week
          $queryThisWeek = $queryThisWeek->where('event_start_date', '>=', $startOfWeek); // Events that start on or after the start of the week
          $queryThisWeek = $queryThisWeek->where('event_start_date', '<=', $endOfWeek); // Events that start on or before the end of the week
          // Filter events for next week
          $nextWeek = date('Y-m-d', strtotime('+1 week')); // Get the date one week from today
          $queryNextWeek = clone $query; // Create a clone of the query to use for the next week
          $queryNextWeek = $queryNextWeek->where('event_start_date', '>=', date('Y-m-d')); // Only consider events that haven't ended yet
          $queryNextWeek = $queryNextWeek->where('event_start_date', '<', $nextWeek);
                $currentDate = now();

        // Calculate the first day of the next month
        $firstDayNextMonth = $currentDate->copy()->addMonthNoOverflow()->startOfMonth();

        // Calculate the last day of the next month
        $lastDayNextMonth = $firstDayNextMonth->copy()->endOfMonth();

        // Query for events in the next month
        $queryNextMonth = EventDetails::query()
            ->where('event_start_date', '>=', $firstDayNextMonth)
            ->where('event_start_date', '<', $lastDayNextMonth)
            ->with(['location_details']);
          // Count the total number of events matching the filters
          $countThisWeek = $queryThisWeek->count();
          $countNextWeek = $queryNextWeek->count();
          $countNextMonth = $queryNextMonth->count();
          if ($request->has('pageNo') && $request->has('limit')) {
              $limit = $request->limit;
              $pageNo = $request->pageNo;
              $skip = $limit * $pageNo;
              $query = $query->skip($skip)->limit($limit);
              $queryThisWeek = $queryThisWeek->skip($skip)->limit($limit);
              $queryNextWeek = $queryNextWeek->skip($skip)->limit($limit);
              $queryNextMonth = $queryNextMonth->skip($skip)->limit($limit);
          }
          $data = $query->orderBy('event_start_date', 'ASC')->get();
          $dataThisWeek = $queryThisWeek->orderBy('event_start_date', 'ASC')->get();
          $dataNextWeek = $queryNextWeek->orderBy('event_start_date', 'ASC')->get();
          $dataNextMonth = $queryNextMonth->orderBy('event_start_date', 'ASC')->get();
          $response['this_week'] = $dataThisWeek;
          $response['next_week'] = $dataNextWeek;
          $response['next_month'] = $dataNextMonth;
          $response['count_this_week'] = $countThisWeek;
          $response['count_next_week'] = $countNextWeek;
          $response['count_next_month'] = $countNextMonth;
          if (count($dataThisWeek) > 0 || count($dataNextWeek) > 0 || count($dataNextMonth) > 0) {
              return $this->sendResponse($response, 'Data Fetched Successfully', true);
          } else {
              return $this->sendResponse('No Data Available', [], false);
          }
      } catch (Exception $e) {
          return $this->sendError($e->getMessage(), $e->getTrace(), 500);
      }
  }

    public function getPastEvents(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'pageNo' => 'numeric',
            'limit' => 'numeric',
            'filter' => 'in:upcoming,past',
            'startDate' => 'date_format:Y-m-d', // Add a validation rule for the start date in the format YYYY-MM-DD
            'endDate' => 'date_format:Y-m-d', // Add a validation rule for the end date in the format YYYY-MM-DD
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        // $query = LocationDetails::query();
        $query = EventDetails::query()->with(['location_details']); // Replace "ModelName" with your actual model name
        if ($request->has('filter')) {
            $filter = $request->filter;

            if ($filter === 'past') {
                if ($request->has('startDate') && $request->has('endDate')) {
                    $startDate = $request->startDate;
                    $endDate = $request->endDate;

                    // For past events, filter those with the event_end_date between the specified start and end dates
                    $query = $query->where('event_end_date', '>=', $startDate)->where('event_end_date', '<=', $endDate);
                } else {
                    // If no start and end dates are provided, consider all past events
                    $query = $query->where('event_end_date', '<', date('Y-m-d'));
                }
            }
        }
        $count = $query->count();

        if ($request->has('pageNo') && $request->has('limit')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * $pageNo;
            $query = $query->skip($skip)->limit($limit);
        }
        $data = $query->orderBy('id', 'DESC')->get();
        foreach ($data as $user) {
            if ($user['id'] != null) {
                $product = EventPresentationVideo::query()->where('event_id', $user['id'])->get();
                $user['event_presentation_vedio'] = $product;
            }
        }
        foreach ($data as $user) {
            if ($user['id'] != null) {
                $product = EventImages::query()->where('event_id', $user['id'])->get();
                $user['event_images'] = $product;
            }
        }
        // foreach ($data as $user) {
        //     if ($user['id'] != null) {
        //         $product = LocationDetails::query()->where('location_id', $user['id'])->get();
        //         $user['location_details'] = $product;
        //     }
        // }
        if (count($data) > 0) {
            $response['StartDate'] = $request->startDate; // Include the start date in the response
            $response['EndDate'] = $request->endDate; // Include the end date in the response
            $response['event_details'] = $data;
            // $response['LocationDetails']=$data;
            $response['count'] = $count;
            return $this->sendResponse($response, 'Data Fetched Successfully', true);
        } else {
            return $this->sendResponse('No Data Available', [], false);
        }
    } catch (Exception $e) {
        return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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
            // $getLocation = LocationDetails::query()->where('id', $request->id)->first();

            $getitems = EventDetails::query()->where('id', $request->id)->with(['location_details'])->first();

            $getPresentationVideo = EventPresentationVideo::query()->where ('event_id',$request->id)->first();
            $product = EventImages::query()->where ('event_id',$request->id)->first();

            // $product = LocationDetails::query()->where ('event_id',$request->id)->get();
            // $getEmp['location_details'] = $product;
            return $this->sendResponse([ "Event_Details" => $getitems,"event_presentation_vedio"=>$getPresentationVideo,"event_images"=>$product], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getEventCount(Request $request)
    {
         try {
        $validator = Validator::make($request->all(), [
            'pageNo' => 'numeric',
            'limit' => 'numeric',
            'user_id'=>'exits:users,id'
        ]);
             if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
           $user_id = auth()->user()->id;

            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $eventQuery = EventRegistration::query()->where('user_id',$user_id);

            if ($startDate && $endDate) {
                $eventQuery->whereBetween('event_details.event_start_date', [$startDate, $endDate]);
            }

            $registerEvent = $eventQuery->count();

            $appliedOffersQuery = RegisterToAssocitationDetails::query()->where('user_id',$user_id);

            if ($startDate && $endDate) {
                $appliedOffersQuery->whereBetween('association_details.start_date', [$startDate, $endDate]);
            }

            $appliedOffers = $appliedOffersQuery->count();

            $attendedEventQuery = EventRegistration::where('attendance_status', '1')->where('user_id',$user_id);
            if ($startDate && $endDate) {
                $attendedEventQuery->whereBetween('event_details.event_start_date', [$startDate, $endDate]);
            }

            $attendedEvents = $attendedEventQuery->count();

            $registeredEventPercentage = 0;
            $attendedEventPercentage = 0;

            if ($registerEvent > 0) {
                $registeredEventPercentage = ($attendedEvents / $registerEvent) * 100;
            }

            if ($attendedEvents > 0) {
                $attendedEventPercentage = ($attendedEvents / $registerEvent) * 100;
            }

            $response = [
                'Event_registered' => $registerEvent,
                'Applied_Offers' => $appliedOffers,
                'Attended_Events' => $attendedEvents,
                'Registered_Event_Percentage' => $registeredEventPercentage,
                'Attended_Event_Percentage' => $attendedEventPercentage,
            ];

            return $this->sendResponse($response, 'Data fetched successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    // public function getEventAndAssociation(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'pageNo' => 'numeric',
    //             'limit' => 'numeric',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors(), 400);
    //         }

    //         $queryEvent = EventDetails::query()->with(['location_details']);
    //         $query = AssociationDetails::query()->with(['location_details']);
    //         $count = $query->count();
    //         $eventCount = $queryEvent->count();

    //         // Get the data from both tables separately
    //         $associationData = $query->orderBy('start_date', 'DESC')->get();
    //         $eventData = $queryEvent->orderBy('event_start_date', 'DESC')->get();

    //         // Add a "type" field to indicate the record type
    //         $associationData = $associationData->map(function ($item) {
    //             $item['type'] = 'association';
    //             return $item;
    //         });

    //         $eventData = $eventData->map(function ($item) {
    //             $item['type'] = 'event';
    //             return $item;
    //         });

    //         // Merge the data into a single collection
    //         $mergedData = $associationData->merge($eventData);

    //         // Convert the collection to an array and then sort it based on "start_date" and "event_start_date" fields in descending order
    //         $sortedData = $mergedData->toArray();
    //         usort($sortedData, function ($a, $b) {
    //             return strtotime($b['start_date'] ?? $b['event_start_date']) - strtotime($a['start_date'] ?? $a['event_start_date']);
    //         });

    //         // Create the final response data with "association" and "event" keys
    //         $response = [
    //             'data' => [
    //                 'association' => [],
    //                 'event' => [],
    //             ],
    //             'count' => $count + $eventCount,
    //         ];

    //         // Loop through the sorted data and assign it to the corresponding key based on the "type" field
    //         foreach ($sortedData as $item) {
    //             if ($item['type'] === 'association') {
    //                 $response['data']['association'][] = $item;
    //             } elseif ($item['type'] === 'event') {
    //                 $response['data']['event'][] = $item;
    //             }
    //         }

    //         return $this->sendResponse($response, 'Data Fetched Successfully', true);

    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
    public function getEventAndAssociation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }

            // Get the associations data
            $associations = AssociationDetails::query()->with(['location_details'])
                ->orderBy('created_at', 'DESC')
                ->limit($request->limit)
                ->get();


            // Add a "type" field to indicate the record type for associations
            $associations = $associations->map(function ($item) {
                $item['type'] = 'association';
                return $item;
            });

            // Get the events data
            $events = EventDetails::query()->with(['location_details'])
                ->orderBy('created_at', 'DESC')
                ->limit($request->limit)
                ->get();

            // Add a "type" field to indicate the record type for events
            $events = $events->map(function ($item) {
                $item['type'] = 'event';
                return $item;
            });

            // Combine the data from both tables into a single array
            $data = $associations->merge($events)->toArray();

            return $this->sendResponse(["data" => $data], 'Data Fetched Successfully', true);

        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function addEventRegistration(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer|exists:event_details,id',
                'user_id'=>'required|integer|exists:users,id',
                // 'payment_mode_id' => 'required|integer|exists:payment_mode,id',
              //  'voluntary_contribution_id' => 'nullable|integer|exists:voluntary_contribution,id',
              //  'payment_status' => 'required',
                'gst_no' => 'required',
                'legal_name' => 'required',
               // 'voluntary_donation_amount' => 'required|nullable',
                'event_price' => 'required|nullable',
                'total_amount' => 'required|nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newEventRegistration = new EventRegistration();
            $newEventRegistration->event_id=$request->event_id;
            $newEventRegistration->user_id=$request->user_id;
            // $newEventRegistration->payment_mode_id=$request->payment_mode_id;
           // $newEventRegistration->voluntary_contribution_id=$request->voluntary_contribution_id;
            //$newEventRegistration->payment_status=$request->payment_status;
            $newEventRegistration->gst_no=$request->gst_no;
            $newEventRegistration->legal_name=$request->legal_name;
            $newEventRegistration->attendance_status = $request->attendance_status;
           // $newEventRegistration->voluntary_donation_amount = $request->voluntary_donation_amount;
            $newEventRegistration->event_price = $request->event_price;
            $newEventRegistration->total_amount = $request->total_amount;
            $newEventRegistration->save();
            if($newEventRegistration->save()){
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create(array('receipt' => 'Inv-'.$newEventRegistration->id, 'amount' => intval($newEventRegistration->total_amount), 'currency' => 'INR', 'notes'=> array()));
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
    public function getAllAssociationDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = AssociationDetails::query()->with(['location_details']);
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            foreach ($data as $user) {
                if ($user['id'] != null) {
                    $product = OffersAssociation::query()->where('association_id', $user['id'])->get();
                    $user['offers_association'] = $product;
                }
            }
            if (count($data) > 0) {
                $response['association_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }

    }

    // public function getAssociationDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'id' => 'required|integer|exists:association_details,id',
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         $getitems = AssociationDetails::query()->where('id', $request->id)->with(['location_details'])->first();
    //         return $this->sendResponse(["Association_Details" => $getitems], 'Data fetch successfully', true);
    //     } catch (Exception $e) {
    //         return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    //     }
    // }
    public function getAssociationDetailsById(Request $request): \Illuminate\Http\JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:association_details,id',
            'limit' => 'integer', // Optional limit parameter for the number of associated details
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = $request->id;
        $limit = $request->limit; // Get the limit value from the request, if provided

        // Calculate the count of registered associations
        $countRegisteredAssociations = RegisterToAssocitationDetails::where('association_id', $id)->count();

        // Prepare the query to retrieve the specific association details
        $query = AssociationDetails::query()->where('id', $id)->with(['location_details',]);
        $data = $query->orderBy('id', 'DESC')->get();
        foreach ($data as $user) {
            if ($user['id'] != null) {
                $product = OffersAssociation::query()->where('association_id', $user['id'])->get();
                $user['offers_association'] = $product;
            }
        }
        // If the limit is provided and greater than zero, apply the limit to the query
        if (isset($limit) && $limit > 0) {
            // If the limit exceeds the count of registered associations, use the count as the limit
            $limit = min($limit, $countRegisteredAssociations);
            $query = $query->take($limit);
        }
        $getitems = $query->first();

        return $this->sendResponse([
            "association_details" => $getitems,

            "offers_Of_association"=>$product,
            "total_registered_associations" => $countRegisteredAssociations,
        ], 'Data fetch successfully', true);
    } catch (Exception $e) {
        return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    }
}
    public function getAllNewsLetters(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = NewsLetterDetails::query(); // Replace "ModelName" with your actual model name

            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();

            if (count($data) > 0) {
                $response['news_letter_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getNewsLetterDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:newsletter_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = NewsLetterDetails::query()->where('id', $request->id)->first();
            return $this->sendResponse(["newsletter_details" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function getAllNewLetterDetailsForStudent(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = NewsLetterDetails::query()->where('for_newsletter', 'student');
            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['news_letter_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }

    }
    public function getAllNewLetterDetailsForMembers(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = NewsLetterDetails::query()->where('for_newsletter', 'members'); // Replace "ModelName" with your actual model name
            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['news_letter_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getAllVacancyDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = VacancyDetails::query()->with(['location_details','user_details']); // Replace "ModelName" with your actual model name
            // Apply the filter for the CA firm name if it is provided in the request
            if ($request->has('ca_firm_name')) {
                $caFirmName = $request->input('ca_firm_name');
                $query->where('ca_firm_name', 'LIKE', "%{$caFirmName}%");
            }
            if ($request->has('position')) {
                $Position = $request->input('position');
                $query->where('position', 'LIKE', "%{$Position}%");
            }

            if ($request->has('pincode')) {
                $locationId = $request->input('pincode');

                // Assuming there is a relationship between VacancyDetails and LocationDetails model
                $query = $query->whereHas('location_details', function ($locationQuery) use ($locationId) {
                    $locationQuery->where(function ($query) use ($locationId) {
                        $query->where('pincode', 'LIKE', "%{$locationId}%");
                            // ->orWhere('city', 'LIKE', "%{$locationId}%");
                    });
                });
            }
            if ($request->has('city')) {
                $locationId = $request->input('city');
                // Assuming there is a relationship between VacancyDetails and LocationDetails model
                $query = $query->whereHas('location_details', function ($locationQuery) use ($locationId) {
                    $locationQuery->where(function ($query) use ($locationId) {
                        $query->where('city', 'LIKE', "%{$locationId}%");
                            // ->orWhere('city', 'LIKE', "%{$locationId}%");
                    });
                });
            }
            $currentDate = date('Y-m-d');
            $query->where('expiry_date', '>=', $currentDate);

            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['vacancy_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }

    }
    public function getVacancyDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:vacancy_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = VacancyDetails::query()->where('id', $request->id)->with(['location_details','user_details'])->first();
            return $this->sendResponse(["vacancy_details" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }



    public function saveResumePdf($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('ResumePdf/');
        if (env('APP_ENV') == 'prod') {
                    $destinationPath = public_path('ResumePdf/' . $imageName);
                }
        $image->move($destinationPath, $image_name);
        return '/ResumePdf/' . $image_name;
    }


    public function addApplyJob(Request $request): \Illuminate\Http\JsonResponse
  {

      try {
          $validator = Validator::make($request->all(), [

          'user_id' => 'required|nullable',
          'vacancy_id' => 'required|nullable',
            'resume_pdf'=>'required|nullable',


          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $newDetails = new ApplyForJob;
      $newDetails->user_id = $request->user_id;
      $newDetails->vacancy_id = $request->vacancy_id;

      if ($request->resume_pdf != "") {
        if (!str_contains($request->resume_pdf, "http")) {
            $newDetails->resume_pdf = $this->saveResumePdf($request->resume_pdf,$request->user_id);
        }
    }
      $newDetails->save();

                  return $this->sendResponse([],'Apply for Job Successfully.', true);

        }
      catch (Exception $e) {
          return $this->sendError('Something went wrong', $e->getTrace(), 413);
      }
  }

 public function getStudentNoticeBoard(Request $request)
 {
	try{
		$validator = Validator::make($request->all(), [
			'pageNo'=>'numeric',
			'limit'=>'numeric',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
		$query = StudentNoticeBoard::query();
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
			return $this->sendResponse('No Data Available', [],false);
		}
	}catch (\Exception $e){
            return $this->sendError($e->getMessage(), $e->getTrace(),500);
        }
}


public function getStudentNoticeBoardById(Request $request):  \Illuminate\Http\JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:table_student_notice_board,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $getitems = StudentNoticeBoard::query()->first();

        return $this->sendResponse(["student_notice_board" => $getitems], 'Data fetch successfully', true);
    } catch (Exception $e) {
        return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    }
}
}
