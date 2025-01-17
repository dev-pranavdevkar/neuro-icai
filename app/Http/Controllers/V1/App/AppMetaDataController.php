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
use App\Models\LocationDetails;
use App\Models\StudentBatches;
use Illuminate\Validation\Rule;
use Auth;
use Razorpay\Api\Api;
use Carbon\Carbon;

class AppMetaDataController extends Controller
{
    public function open()
    {
        $data = "This data is open and can be accessed without the client being authenticated";
        return response()->json(compact('data'), 200);
    }
    public function closed()
    {
        $data = "Only authorized users can see this";
        return response()->json(compact('data'), 200);
    }
    //OffersToAssociation
    public function getOffersToAssociation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = OffersAssociation::query()->with(['association_details']);;
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->get();
            if (count($data) > 0) {
                $response['data'] =  $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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
                'association_id' => 'required|nullable',
                'offers_association_id'=>'required|'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = Auth::user()->id;
            $existingRegistration = RegisterToAssocitationDetails::where('user_id', $user)
            ->where('association_id',$request->association_id)
            ->where('offers_association_id',$request->offers_association_id)
            ->first();

            if ($existingRegistration) {
                return $this->sendError('User is already registered for an association offer.', [], 422);
            }
        $offer = OffersAssociation::query()->where('association_id', $request->association_id)
        ->where('id',$request->offers_association_id)
        ->first();

        if (!$offer) {
            return $this->sendError('Offer not found for this association.', [], 404);
        }
        $limit = (int) $offer->limits;
        $registeredUsersCount = RegisterToAssocitationDetails::where('association_id', $request->association_id)
        ->where('offers_association_id',$request->offers_association_id)
        ->count();
        if ($registeredUsersCount >= $limit) {
            return $this->sendError('Registration to this association is not possible. The association is full.', [], 422);
        }
            $newDetails = new RegisterToAssocitationDetails;
            $newDetails->user_id = $user;
            $newDetails->association_id = $request->association_id;
            //$newDetails->created_by_user_id = $request->created_by_user_id;
            $newDetails->offers_association_id=$request->offers_association_id;
            $newDetails->save();
            return $this->sendResponse([], 'Offer Claim successfully.', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
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
        $userId = Auth::user()->id;
        $now = Carbon::now();
        $currentDate = Carbon::now('Asia/Kolkata');

        // Calculate the start and end of the current week with time
        $startOfWeek = $now->startOfWeek()->format('Y-m-d H:i:s');
        $endOfWeek = $now->endOfWeek()->format('Y-m-d H:i:s');

        // Calculate the start of next week with time
        $nextWeekStart = $now->copy()->endOfWeek()->addDay()->format('Y-m-d H:i:s');

        // Calculate the start of next month
        $nextMonthStart = $now->copy()->addMonthNoOverflow()->startOfMonth();

        $query = EventDetails::query()->with(['location_details'])->get();

        // Filter events for this week
        $queryThisWeek = EventDetails::query()->whereNull('parent_event_id')
        ->with(['children','location_details','event_images','event_video','event_presntation'])
            ->where('event_start_date', '>=', $startOfWeek)
            ->where('event_start_date', '<=', $endOfWeek);

        $queryNextWeek = EventDetails::query()->whereNull('parent_event_id')
        ->with(['children','location_details','event_images','event_video','event_presntation'])
            ->where('event_start_date', '>=', $nextWeekStart);

        $queryThisMonth = EventDetails::query()->whereNull('parent_event_id')
        ->with(['children','location_details','event_images','event_video','event_presntation'])
            ->whereBetween('event_start_date', [$now->copy()->startOfMonth(), $now->copy()->endOfMonth()]);

        $queryNextMonth = EventDetails::query()->whereNull('parent_event_id')
        ->with(['children','location_details','event_images','event_video','event_presntation'])
            ->where('event_start_date', '>=', $nextMonthStart);

        // Count the total number of events matching the filters
        $countThisWeek = $queryThisWeek->count();
        $countNextWeek = $queryNextWeek->count();
        $countThisMonth = $queryThisMonth->count();
        $countNextMonth = $queryNextMonth->count();

        if ($request->has('pageNo') && $request->has('limit')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * $pageNo;
            $query = $query->skip($skip)->limit($limit);
            $queryThisWeek = $queryThisWeek->skip($skip)->limit($limit);
            $queryNextWeek = $queryNextWeek->skip($skip)->limit($limit);
            $queryThisMonth = $queryThisMonth->skip($skip)->limit($limit);
            $queryNextMonth = $queryNextMonth->skip($skip)->limit($limit);
        }

       // Fetch the data for each time frame
        $dataThisWeek = $queryThisWeek->orderBy('event_start_date', 'ASC')->get();
        $dataNextWeek = $queryNextWeek->orderBy('event_start_date', 'ASC')->get();
        $dataThisMonth = $queryThisMonth->orderBy('event_start_date', 'ASC')->get();
        $dataNextMonth = $queryNextMonth->orderBy('event_start_date', 'ASC')->get();

        // Additional code to update properties of each event
        foreach ($dataThisWeek as $event) {
            $event->is_series_event = count($event->children) > 0;
            $event->registered_users_count = EventRegistration::where('event_id', $event->id)->count();
            $event->is_user_registered = EventRegistration::where('user_id', $userId)
                ->where('event_id', $event->id)
                ->exists();
        }

        foreach ($dataNextWeek as $event) {
            $event->is_series_event = count($event->children) > 0;
            $event->registered_users_count = EventRegistration::where('event_id', $event->id)->count();
            $event->is_user_registered = EventRegistration::where('user_id', $userId)
                ->where('event_id', $event->id)
                ->exists();
        }

        foreach ($dataThisMonth as $event) {
            $event->is_series_event = count($event->children) > 0;
            $event->registered_users_count = EventRegistration::where('event_id', $event->id)->count();
            $event->is_user_registered = EventRegistration::where('user_id', $userId)
                ->where('event_id', $event->id)
                ->exists();
        }

        foreach ($dataNextMonth as $event) {
            $event->is_series_event = count($event->children) > 0;
            $event->registered_users_count = EventRegistration::where('event_id', $event->id)->count();
            $event->is_user_registered = EventRegistration::where('user_id', $userId)
                ->where('event_id', $event->id)
                ->exists();
        }

        $response['this_week'] = $dataThisWeek;
        $response['next_week'] = $dataNextWeek;
        $response['this_month'] = $dataThisMonth;
        $response['next_month'] = $dataNextMonth;
        $response['count_this_week'] = $countThisWeek;
        $response['count_next_week'] = $countNextWeek;
        $response['count_this_month'] = $countThisMonth;
        $response['count_next_month'] = $countNextMonth;

        if (count($dataThisWeek) > 0 || count($dataNextWeek) > 0 || count($dataThisMonth) > 0 || count($dataNextMonth) > 0) {
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
    public function getEventDetailsById(Request $request): \Illuminate\Http\JsonResponse
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

            $getPresentationVideo = EventPresentationVideo::query()->where('event_id', $request->id)->first();
            $product = EventImages::query()->where('event_id', $request->id)->first();

            // $product = LocationDetails::query()->where ('event_id',$request->id)->get();
            // $getEmp['location_details'] = $product;
            return $this->sendResponse(["Event_Details" => $getitems, "event_presentation_vedio" => $getPresentationVideo, "event_images" => $product], 'Data fetch successfully', true);
        } catch (\Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function getEventCount(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
                'user_id' => 'exits:users,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
           $user_id = auth()->user()->id;
            // $user_id=Auth::user()->id;
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $eventQuery = EventRegistration::query()
            ->where('user_id', $user_id)
                ->where(function ($query) {
                    $query->whereNotNull('event_id')
                        ->orWhereNull('student_batche_id');
                });

            if ($startDate && $endDate) {
                $eventQuery->whereBetween('event_details.event_start_date', [$startDate, $endDate]);
            }

            $registerEvent = $eventQuery->count();

            $appliedOffersQuery = RegisterToAssocitationDetails::query()->where('user_id', $user_id);

            if ($startDate && $endDate) {
                $appliedOffersQuery->whereBetween('association_details.start_date', [$startDate, $endDate]);
            }

            $appliedOffers = $appliedOffersQuery->count();

            $attendedEventQuery = EventRegistration::where('attendance_status', '1')->where('user_id', $user_id);
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
            $batchQuery = EventRegistration::query()
                ->where('user_id', $user_id)
                ->where(function ($query) {
                    $query->whereNotNull('student_batche_id')
                        ->orWhereNull('event_id');
                });

            if ($startDate && $endDate) {
                $batchQuery->whereBetween('student_batches.start_date', [$startDate, $endDate]);
            }

            $registerBatches = $batchQuery->count();

            $response = [
                'Event_registered' => $registerEvent,
                'Applied_Offers' => $appliedOffers,
                'Attended_Events' => $attendedEvents,
                'Registered_Event_Percentage' => $registeredEventPercentage,
                'Attended_Event_Percentage' => $attendedEventPercentage,
                'batch_registered' => $registerBatches,
            ];

            return $this->sendResponse($response, 'Data fetched successfully', true);
        } catch (\Exception $e) {
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
    // public function addEventRegistration(Request $request): \Illuminate\Http\JsonResponse
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'event_id' => 'nullable|integer|exists:event_details,id',
    //             'student_batche_id' => 'nullable|integer|exists:student_batches,id',
    //             'user_id'=>'required|integer|exists:users,id',
    //             'gst_no' => 'required',
    //             'legal_name' => 'required',
    //             'event_price' => 'required|nullable',
    //             'total_amount' => 'required|nullable',
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         $newEventRegistration = new EventRegistration();
    //         $newEventRegistration->event_id=$request->event_id;
    //         $newEventRegistration->student_batche_id=$request->student_batche_id;
    //         $newEventRegistration->user_id=$request->user_id;
    //         $newEventRegistration->gst_no=$request->gst_no;
    //         $newEventRegistration->legal_name=$request->legal_name;
    //         $newEventRegistration->attendance_status = $request->attendance_status;
    //         $newEventRegistration->event_price = $request->event_price;
    //         $newEventRegistration->total_amount = $request->total_amount;
    //         $newEventRegistration->save();
    //         if($newEventRegistration->save()){
    //             $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
    //             $orderDetails = $api->order->create(array('receipt' => 'Inv-'.$newEventRegistration->id, 'amount' => intval($newEventRegistration->total_amount), 'currency' => 'INR', 'notes'=> array()));
    //             $newEventRegistration->razorpay_id = $orderDetails->id;
    //             $newEventRegistration->save();
    //             $response = [];
    //             $response['system_order_id']=$newEventRegistration->id;
    //             $response['razorpay_order_id']=$newEventRegistration->razorpay_id;
    //             $response['razorpay_api_key']=env('R_API_KEY');
    //             return $this->sendResponse($response, 'Payment Initiated Successfully',true);
    //         }else{
    //             return $this->sendResponse([], 'Payment Cannot Be Initiated',false);
    //         }

    //     }
    //     catch (Exception $e) {
    //         return $this->sendError('Something went wrong', $e->getTrace(), 413);
    //     }
    // }
    public function addEventRegistration(Request $request)
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
            $eventRegistration = EventRegistration::where('event_id',$request->event_id)->where('user_id',$user->id)
                ->where('payment_status','like',"paid")->first();
            if(!is_null($eventRegistration)){
                return $this->sendResponse([],'You are already registered to this event',false);
            }
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
                    'amount' => intval($newEventRegistration->total_amount)*100, 'currency' => 'INR', 'notes'=> array()));
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
    public function addStudentBatchRegistration(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'student_batche_id' => 'required|integer|exists:student_batches,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $eventDetails = StudentBatches::find($request->student_batche_id);
            $currentDate = now();
        if ($currentDate > $eventDetails->batch_cut_off_date) {
            return $this->sendResponse([], 'Registration is closed for this batch.', false);
        }
            $user = Auth::user();
            $eventRegistration = EventRegistration::where('student_batche_id',$request->student_batche_id)
            ->where('user_id',$user->id)
                ->where('payment_status','like',"paid")->first();
            if(!is_null($eventRegistration)){
                return $this->sendResponse([],'You are already registered to this batch',false);
            }
            $currentDate = now();
        if ($currentDate < $eventDetails->early_bird_date) {
            $totalAmount = $eventDetails->early_bird_fees;
        } else {
            $totalAmount = $eventDetails->fees;
        }
            $newEventRegistration = new EventRegistration();
            $newEventRegistration->student_batche_id=$request->student_batche_id;
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
                    'amount' => intval($newEventRegistration->total_amount)*100, 'currency' => 'INR', 'notes'=> array()));
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
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
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
            if ($razorpay_order->status == 'paid' || true) {
                $payment->payment_status = "paid";
                $payment->save();
            } else {
                $payment->payment_status = "unpaid";
                $payment->save();
                return $this->sendResponse([], 'Payment Pending', false);
            }
            return $this->sendResponse([], 'Event registration successfully', false);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
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
            $query = AssociationDetails::query()->with(['location_details', 'offers_of_association']);
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();

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
            $limit = $request->limit;

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

        if (isset($limit) && $limit > 0) {
            $limit = min($limit, $countRegisteredAssociations);
            $query = $query->take($limit);
        }
        $getitems = $query->first();

            return $this->sendResponse([
                "association_details" => $getitems,
                "offers_Of_association" => $product,
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
            $query = NewsLetterDetails::query()->where('for_newsletter', $request->type);

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
    public function getNewsLetterDetailsById(Request $request): \Illuminate\Http\JsonResponse
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
            $query = NewsLetterDetails::query()->where('for_newsletter', 'members');
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
    // public function getAllVacancyDetails(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'pageNo' => 'numeric',
    //             'limit' => 'numeric',
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors(), 400);
    //         }
    //        $userRoles = Auth::user()->roles;
    //         $userRoleNames = $userRoles->pluck('name');
    //         echo $userRoleNames;
    //         $company=Auth::user()->company_id;
    //         echo $company;
    //         $query = VacancyDetails::query()->where('company_id',$company)
    //         ->with(['location_details','user_details']);

    //         if ($request->has('ca_firm_name')) {
    //             $caFirmName = $request->input('ca_firm_name');
    //             $query->where('ca_firm_name', 'LIKE', "%{$caFirmName}%");
    //         }
    //         if ($request->has('position')) {
    //             $Position = $request->input('position');
    //             $query->where('position', 'LIKE', "%{$Position}%");
    //         }

    //         if ($request->has('pincode')) {
    //             $locationId = $request->input('pincode');
    //             $query = $query->whereHas('location_details', function ($locationQuery) use ($locationId) {
    //                 $locationQuery->where(function ($query) use ($locationId) {
    //                     $query->where('pincode', 'LIKE', "%{$locationId}%");
    //                 });
    //             });
    //         }
    //         if ($request->has('city')) {
    //             $locationId = $request->input('city');
    //             $query = $query->whereHas('location_details', function ($locationQuery) use ($locationId) {
    //                 $locationQuery->where(function ($query) use ($locationId) {
    //                     $query->where('city', 'LIKE', "%{$locationId}%");
    //                 });
    //             });
    //         }
    //         $currentDate = date('Y-m-d');
    //         $query->where(function ($query) use ($currentDate) {
    //         $query->where('expiry_date', '>=', $currentDate)
    //             ->orWhereNull('expiry_date');
    //     });

    //         $count = $query->count();

    //         if ($request->has('pageNo') && $request->has('limit')) {
    //             $limit = $request->limit;
    //             $pageNo = $request->pageNo;
    //             $skip = $limit * $pageNo;
    //             $query = $query->skip($skip)->limit($limit);
    //         }
    //         $data = $query->orderBy('id', 'DESC')->get();
    //         if (count($data) > 0) {
    //             $response['vacancy_details'] = $data;
    //             $response['count'] = $count;
    //             return $this->sendResponse($response, 'Data Fetched Successfully', true);
    //         } else {
    //             return $this->sendResponse('No Data Available', [], false);
    //         }
    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }
    // }
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

        $userRoles = Auth::user()->roles;
        $userRoleNames = $userRoles->pluck('name');

        $company = Auth::user()->company_id;

        $query = VacancyDetails::query()->with(['location_details', 'user_details','companyDetails']);

        if ($userRoleNames->contains('members')) {

            $query->where('company_id', $company);
        }

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
            $query = $query->whereHas('location_details', function ($locationQuery) use ($locationId) {
                $locationQuery->where(function ($query) use ($locationId) {
                    $query->where('pincode', 'LIKE', "%{$locationId}%");
                });
            });
        }

        if ($request->has('city')) {
            $locationId = $request->input('city');
            $query = $query->whereHas('location_details', function ($locationQuery) use ($locationId) {
                $locationQuery->where(function ($query) use ($locationId) {
                    $query->where('city', 'LIKE', "%{$locationId}%");
                });
            });
        }

                $currentDate = date('Y-m-d');
        $query->where(function ($query) use ($currentDate) {
                $query->where('expiry_date', '>=', $currentDate)
                ->orWhereNull('expiry_date');
        });

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
            $getitems = VacancyDetails::query()->where('id', $request->id)->with(['location_details', 'user_details'])->first();
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
                //   'user_id' => 'nullable|numeric|exists:users,id',
                'vacancy_id' => 'required|numeric|exists:vacancy_details,id',
                'name' => 'required|string',
                'email' => 'required|email|string',
                'resume_pdf' => 'required',
                'experience' => 'nullable',
                'qualification' => 'nullable',
                'expected_package' => 'nullable',
                'current_package' => 'nullable',
                'notice_period_in_days' => 'nullable'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newDetails = new ApplyForJob;
            //   $newDetails->user_id = $request->user_id;
            $newDetails->vacancy_id = $request->vacancy_id;
            $newDetails->name = $request->name;
            $newDetails->email = $request->email;
            $newDetails->experience = $request->experience;
            $newDetails->qualification = $request->qualification;
            $newDetails->expected_package = $request->expected_package;
            $newDetails->current_package = $request->current_package;
            $newDetails->notice_period_in_days = $request->notice_period_in_days;
            if ($request->resume_pdf != "") {
                if (!str_contains($request->resume_pdf, "http")) {
                    $newDetails->resume_pdf = $this->saveResumePdf($request->resume_pdf, $request->name);
                }
            }
            $newDetails->save();
            return $this->sendResponse([], 'Apply for Job Successfully.', true);
        } catch (Exception $e) {
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
		$query = StudentNoticeBoard::query()->where('type',$request->type);
		$count=$query->count();
		if($request->has('pageNo') && $request->has('limit')){
			$limit = $request->limit;
			$pageNo = $request->pageNo;
			$skip = $limit*$pageNo;
			$query= $query->skip($skip)->limit($limit);
		}
		$data = $query->orderBy('id', 'DESC')->get();
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
  public function getAllEventDetails(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'pageNo' => 'numeric',
            'limit' => 'numeric',
            'filter' => 'in:upcoming,past,ongoing,this_week,next_week',
            'event_start_date' => 'date_format:Y-m-d',
            'event_end_date' => 'date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }
        $userId = Auth::user()->id;
        $currentDate = carbon::now('Asia/Kolkata');
            $now = carbon::now();
            $currentWeekStart = $now->startOfWeek();
            $currentWeekEnd = $now->endOfWeek();
            $nextWeekStart = $currentWeekStart->copy()->addWeek();
        $nextWeekEnd = $currentWeekEnd->copy()->addWeek();
        $query = EventDetails::query()->whereNull('parent_event_id')
        ->with(['children','location_details','event_images','event_video','event_presntation']);
        if ($request->has('filter')) {
            $filter = $request->filter;
            if ($filter === 'upcoming') {
                $query = $query->where('event_start_date', '>', $now);
            }
            if ($filter === 'past') {
                $query = $query->where('event_end_date', '<', $now);
            }
            if ($filter === 'ongoing') {
                    $query->where('event_start_date', '<=', $currentDate)
                        ->where('event_end_date', '>=', $currentDate);
            }
            if ($filter === 'this_week') {
                // Include events that have not yet started and are ongoing this week
                $query->where(function ($query) use ($currentWeekStart, $currentWeekEnd, $currentDate) {
                    $query->where('event_start_date', '>', $currentDate)
                        ->orWhere(function ($query) use ($currentDate) {
                            $query->where('event_start_date', '<=', $currentDate)
                                ->where('event_end_date', '>=', $currentDate);
                        });
                });
            }
            if ($filter === 'next_week') {
                $query->whereBetween('event_start_date', [$nextWeekStart, $nextWeekEnd]);
            }
        }
        $count = $query->count();
        if ($request->has('event_name')) {
            $query = $query->where('event_name', 'like', '%' . $request->event_name . '%');
        }
        if ($request->has('event_fee')) {
            $query = $query->where('event_fee', 'like', '%' . $request->event_fee . '%');
        }
        if ($request->has('event_start_date') && $request->has('event_end_date')) {
            $query = $query->whereBetween('event_start_date', [$request->event_start_date, $request->event_end_date]);
        }
        if ($request->has('pageNo') && $request->has('limit')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * $pageNo;
            $query = $query->skip($skip)->limit($limit);
        }
            $data = $query->orderBy('id', 'DESC')->get();

             if (count($data) > 0) {
            foreach ($data as $event) {
                $event->is_series_event = count($event->children) > 0;
                $event->registered_users_count = EventRegistration::where('event_id', $event->id)->count();
                $event->is_user_registered = EventRegistration::where('user_id', $userId)
                ->where('event_id', $event->id)
                ->exists();
            }
                $response['event_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
    } catch (Exception $e) {
        return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    }
}
    public function addVacancyDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'position' => [ Rule::in(['Semi Qualified','Article Assistant','Industrial Trainee','Qualified'])],
                'comments' => 'nullable',
                'experience' => 'required',
                'expiry_date' => 'nullable|date',
                'job_type' => [ Rule::in(['internship', 'full_time'])],
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = Auth::user()->id;

        // if (!$user->member) {
        //     return $this->sendError('Permission Error', 'User is not a member', 403);
        // }
            $newVacancy = new VacancyDetails();
            $newVacancy->position=$request->position;
            $newVacancy->comments=$request->comments;
            $newVacancy->experience=$request->experience;
            $newVacancy->company_id = auth::user()->company_id;
            $newVacancy->created_by =$user;
		    $newVacancy->expiry_date = $request->expiry_date;
            $newVacancy->job_type = $request->job_type;
            $newVacancy->save();
            return $this->sendResponse([], 'Vacancy details added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
public function getEventRegistrationByUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = EventRegistration::query()->with(['event_details','user_details',
            'paymentmode_details','voluntary_contribution_details','event_details.location_details'])
            ->where('user_id',Auth::user()->id);
             $query->whereNotNull('event_id');
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['event_registration'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendResponse([],'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
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
    public function getEventAttendentByUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = EventRegistration::query()
            ->with(['event_details', 'user_details', 'paymentmode_details', 'voluntary_contribution_details'])
            ->where('user_id', Auth::user()->id)
            ->whereNotNull('event_id')
            ->where('attendance_status', 1);

             $query->whereNotNull('event_id');
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['event_registration'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendResponse([],'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
        public function getOfferRedimByUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = RegisterToAssocitationDetails::query()
            ->where('user_id', Auth::user()->id)
            ->with(['user_details','associatiomn_details','offers_association_details']);
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['offers'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendResponse([],'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
public function updateAttendance(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric|exists:users,id',
            'event_id' => 'required|numeric|exists:offers,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $attendance = EventRegistration::where('user_id', $request->user_id)
            ->where('event_id', $request->event_id)
            ->first();

        if (is_null($attendance)) {
            return $this->sendResponse([], 'Attendance record not found', false);
        }
        if ($attendance->attendance !== 1) {
            $attendance->attendance = 1;
            $attendance->save();
            return $this->sendResponse([], 'Attendance updated successfully', true);
        } else {
            return $this->sendResponse([], 'Attendance was already marked', true);
        }
    } catch (Exception $e) {
        return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
    }
}
        public function getBatchesByUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = EventRegistration::query()
            ->where('user_id', Auth::user()->id)
            ->where(function ($query) {
            $query->whereNotNull('student_batche_id')
            ->orWhereNull('event_id');
            })
            ->with(['batches']);
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['offers'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendResponse([],'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

}
