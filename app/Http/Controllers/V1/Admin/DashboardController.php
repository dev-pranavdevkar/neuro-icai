<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EventDetails;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Models\AssociationDetails;
use App\Models\StudentBatches;
class DashboardController extends Controller
{

//     public function getDashboardCount()
//     {
//         try {
//             // Get the current date
//             $currentDate = Carbon::now()->toDateString();

//             // Count total events
//             $totalEvent = EventDetails::query()->count();

//             // Count upcoming events (events that have a start date greater than or equal to the current date)
//             $upcomingEvent = EventDetails::where('event_start_date', '>=', $currentDate)
//                 ->count();

//             // Count past events (events that have an end date less than the current date)
//             $pastEvent = EventDetails::where('event_end_date', '<', $currentDate)
//                 ->count();

//             // Count upcoming events in the next 7 days
//             $upcomingEventsNext7Days = EventDetails::whereBetween('event_start_date', [$currentDate, Carbon::parse($currentDate)->addDays(7)->toDateString()])
//                 ->count();

//             $response = [
//                 'event_details' => $totalEvent,
//                 'upcoming_events_count' => $upcomingEvent,
//                 'past_events_count' => $pastEvent,
//                 'upcoming_events_next_7_days' => $upcomingEventsNext7Days,
//             ];

//             return $this->sendResponse($response, 'Data fetched successfully', true);

//         } catch (Exception $e) {
//             return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
//         }
// }
 public function getDashboardMemberCount(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [

          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }

           $currentDate = Carbon::now()->toDateString();

            // Count total events
            $totalEvent = EventDetails::query()->count();

            // Count upcoming events (events that have a start date greater than or equal to the current date)
            $upcomingEvent = EventDetails::where('event_start_date', '>=', $currentDate)
                ->count();

            // Count past events (events that have an end date less than the current date)
            $pastEvent = EventDetails::where('event_end_date', '<', $currentDate)
                ->count();

            // Count upcoming events in the next 7 days
            $upcomingEventsNext7Days = EventDetails::whereBetween('event_start_date', [$currentDate, Carbon::parse($currentDate)->addDays(7)->toDateString()])
                ->count();

            //total association
            $totalAssociation=AssociationDetails::query()->count();
            $response = [
                'event_details' => $totalEvent,
                'upcoming_events_count' => $upcomingEvent,
                'past_events_count' => $pastEvent,
                'upcoming_events_next_7_days' => $upcomingEventsNext7Days,
                'total_association'=>$totalAssociation,
            ];
            return $this->sendResponse(['member'=>$response], 'Data fetched successfully', true);
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
  public function getDashboardStudentCount(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [

          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }

           $currentDate = Carbon::now()->toDateString();

            // Count total batches
            $totalEvent = StudentBatches::query()->count();

            // Count upcoming events (events that have a start date greater than or equal to the current date)
            $upcomingEvent = StudentBatches::where('start_date', '>=', $currentDate)
                ->count();

            // Count past events (events that have an end date less than the current date)
            $pastEvent = StudentBatches::where('end_date', '<', $currentDate)
                ->count();

            // Count upcoming events in the next 7 days
            $upcomingEventsNext7Days = StudentBatches::whereBetween('start_date', [$currentDate, Carbon::parse($currentDate)->addDays(7)->toDateString()])
                ->count();

            //total association
            $totalAssociation=AssociationDetails::query()->count();
            $response = [
                'total_batches' => $totalEvent,
                'upcoming_batches_count' => $upcomingEvent,
                'past_batches_count' => $pastEvent,
                'upcoming_batches_next_7_days' => $upcomingEventsNext7Days,
                'total_association'=>$totalAssociation,
            ];
            return $this->sendResponse(['student'=>$response], 'Data fetched successfully', true);
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
      }
  }
}