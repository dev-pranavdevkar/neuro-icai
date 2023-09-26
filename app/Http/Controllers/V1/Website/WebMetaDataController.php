<?php

namespace App\Http\Controllers\V1\Website;

use App\Http\Controllers\Controller;
use App\Models\AssociationDetails;
use App\Models\EventDetails;
use App\Models\NewsLetterDetails;
use App\Models\StudentNoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

            // Retrieve data from each table and order it by 'created_at' in descending order
            $eventData = EventDetails::orderBy('created_at', 'desc')->get();
            $associationData = AssociationDetails::orderBy('created_at', 'desc')->get();
            $newsletterData = NewsLetterDetails::orderBy('created_at', 'desc')->get();
            $noticeBoardData = StudentNoticeBoard::orderBy('created_at', 'desc')->get();

            // Combine the ordered data into a single collection
            $combinedData = $eventData
                ->concat($associationData)
                ->concat($newsletterData)
                ->concat($noticeBoardData);

            // Sort the combined collection by 'created_at' in descending order
            $combinedData = $combinedData->sortByDesc('created_at');

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * ($pageNo - 1);
                $combinedData = $combinedData->slice($skip, $limit);
            }

            // Convert the collection to an array without keys (IDs)
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
}
