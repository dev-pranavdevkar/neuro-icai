<?php

namespace App\Http\Controllers\V1\Website;

use App\Http\Controllers\Controller;
use App\Models\AssociationDetails;
use App\Models\EventDetails;
use App\Models\NewsLetterDetails;
use App\Models\StudentNoticeBoard;
use App\Models\ApplyForJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EventRegistration;
use App\Models\LocationDetails;
use App\Models\VacancyDetails;
use Illuminate\Validation\Rule;
use Razorpay\Api\Api;
use App\Models\StudentBatches;
use App\Models\EventPresentationVideo;
use App\Models\EventImages;
use App\Models\EventPresentationPdf;
use App\Models\RegisterToAssocitationDetails;
use App\Models\OffersAssociation;

use DB;
use Auth;
use JWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Exception;

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
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = StudentNoticeBoard::query()->where('type', 'members');
            $count = $query->count();
            if ($request->has('title')) {
                $query = $query->where('title', 'like', '%' . $request->title . '%');
            }
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->get();
            if (count($data) > 0) {
                $response['notice_board'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getStudentNoticeBoard(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = StudentNoticeBoard::query()->where('type', 'student');
            $count = $query->count();
            if ($request->has('title')) {
                $query = $query->where('title', 'like', '%' . $request->title . '%');
            }
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->get();
            if (count($data) > 0) {
                $response['notice_board'] =  $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }


    public function addEventRegistration(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'event_id' => 'nullable|integer|exists:event_details,id',
                //  'student_batche_id' => 'nullable|integer|exists:event_details,id',
                'gst_no' => 'required',
                'legal_name' => 'required',
                'event_price' => 'required|nullable',
                'total_amount' => 'required|nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $eventDetails = EventDetails::find($request->event_id);
            $user = Auth::user();
            $eventRegistration = EventRegistration::where('event_id', $request->event_id)->where('user_id', $user->id)
                ->where('payment_status', 'like', "paid")->first();
            if (!is_null($eventRegistration)) {
                return $this->sendResponse([], 'You are already registered to this event', false);
            }
            $isMember = false;
            if (in_array('members', Auth::user()->roles->pluck('name')->toArray())) {
                $isMember = true;
            } else if (in_array('students', Auth::user()->roles->pluck('name')->toArray())) {
                $isMember = false;
            }
            $totalAmount = $isMember ? $eventDetails->price_for_members : $eventDetails->price_for_students;

            $newEventRegistration = new EventRegistration();
            $newEventRegistration->event_id = $request->event_id;
            $newEventRegistration->user_id = $user->id;
            $newEventRegistration->gst_no = null;
            $newEventRegistration->legal_name = null;
            $newEventRegistration->attendance_status = null;
            $newEventRegistration->event_price = $totalAmount;
            $newEventRegistration->total_amount = $totalAmount;
            $newEventRegistration->save();
            if ($newEventRegistration->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create(array(
                    'receipt' => 'Inv-' . $newEventRegistration->id,
                    'amount' => intval($newEventRegistration->total_amount), 'currency' => 'INR', 'notes' => array()
                ));
                $newEventRegistration->razorpay_id = $orderDetails->id;
                $newEventRegistration->save();
                $response = [];
                $response['system_order_id'] = $newEventRegistration->id;
                $response['razorpay_order_id'] = $newEventRegistration->razorpay_id;
                $response['razorpay_api_key'] = env('R_API_KEY');
                return $this->sendResponse($response, 'Payment Initiated Successfully', true);
            } else {
                return $this->sendResponse([], 'Payment Cannot Be Initiated', false);
            }
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function paymentVerification(Request $request)
    {
        try {
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'system_order_id' => 'required|numeric',
                'razorpay_order_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = EventRegistration::where('razorpay_id', $request->razorpay_order_id)->find($request->system_order_id);
            if (is_null($payment)) {
                return $this->sendResponse([], 'Wrong Payment Id', false);
            }
            if ($payment->payment_status == "paid") {
                return $this->sendResponse([], 'Payment Already Done', false);
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
    public function addVacancyDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'position' => [Rule::in(['Semi Qualified', 'Article Assistant', 'Industrial Trainee', 'Qualified'])],
                'comments' => 'nullable',
                'experience' => 'required',
                'expiry_date' => 'nullable|date',
                'job_type' => [Rule::in(['internship', 'full_time'])],
            ]);
    
            if ($validator->fails()) {
                $this->sendErrorsubmitVacancies('Validation Error.', $validator->errors());
                return response()->json(); // Return an empty JSON response
            }
    
            $user = Auth::user()->id;
    
            if (!in_array('members', auth()->user()->roles->pluck('name')->toArray())) {
                $this->sendError('Permission Denied. You must be a member to add a vacancy.', [], 403);
                return response()->json(); // Return an empty JSON response
            }
    
            $newVacancy = new VacancyDetails();
    
            $newVacancy->position = $request->position;
            $newVacancy->comments = $request->comments;
            $newVacancy->experience = $request->experience;
            $newVacancy->company_id = auth::user()->company_id;
            $newVacancy->created_by = $user;
            $newVacancy->expiry_date = $request->expiry_date;
            $newVacancy->job_type = $request->job_type;
            $newVacancy->save();
    
            // Redirect to the 'submitVacancies' route
            return back()->with('success', 'Thanks you for adding!!');
        } catch (Exception $e) {
            $this->sendError('Something went wrong', $e->getTrace(), 413);
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }
    


    public function getVacancyDetailsById(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:vacancy_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = VacancyDetails::query()->where('id', $request->id)->with(['location_details', 'user_details', 'companyDetails'])->first();
            return $this->sendResponse(["vacancy" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }


    public function addApplyJob(Request $request)
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
                    $newDetails->resume_pdf = $this->saveResumePdf($request->resume_pdf, $request->user_id);
                }
            }
            $newDetails->save();
            session()->flash('success', true);

            // Now, you can continue rendering the same page without redirecting
            // You can include this logic in the controller method that renders the page initially

            return back()->with('success', 'Thanks you for Apply!!');
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
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
            $NewLocationDetails->address_line_1 = $request->address_line_1;
            $NewLocationDetails->pincode = $request->pincode;
            $NewLocationDetails->save();
            $newDetails = new StudentBatches;
            $newDetails->location_id = $NewLocationDetails->id;
            $newDetails->batch_name = $request->batch_name;
            $newDetails->fees = $request->fees;
            $newDetails->start_date = $request->start_date;
            $newDetails->end_date = $request->end_date;
            $newDetails->batch_discription = $request->batch_discription;
            $newDetails->batch_cut_off_date = $request->batch_cut_off_date;
            $newDetails->batch_address = $request->batch_address;
            $newDetails->early_bird_date = $request->early_bird_date;
            $newDetails->early_bird_fees = $request->early_bird_fees;
            $newDetails->save();
            return $this->sendResponse([], ' Student batches added successfully.', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }

    public function getStudentBatches(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $currentDate = carbon::now('Asia/Kolkata');
            $now = carbon::now();
            $query = StudentBatches::query()->with('location_details');
            if ($request->has('batch_name')) {
                $query = $query->where('batch_name', 'like', '%' . $request->batch_name . '%');
            }
            if ($request->has('start_date')) {
                $query = $query->where('start_date', 'like', '%' . $request->start_date . '%');
            }
            if ($request->has('end_date')) {
                $query = $query->where('end_date', 'like', '%' . $request->end_date . '%');
            }
            if ($request->has('fees')) {
                $query = $query->where('fees', 'like', '%' . $request->fees . '%');
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
                return $this->sendResponse([], 'No Data Available', false);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

    public function getStudentBatchesById(Request $request): \Illuminate\Http\JsonResponse
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

    public function getEventDetailsById(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $getEvent = EventDetails::query()->where('id', $request->id)->with(['location_details'])->first();
            if ($getEvent['id'] != null) {
                $product = EventPresentationVideo::query()->where('event_id', $getEvent['id'])
                    ->get();
                $getEvent['event_video'] = $product;
            }
            if ($getEvent['id'] != null) {
                $product = EventImages::query()->where('event_id', $getEvent['id'])
                    ->get();
                $getEvent['event_images'] = $product;
            }
            if ($getEvent['id'] != null) {
                $product = EventPresentationPdf::query()->where('event_id', $getEvent['id'])
                    ->get();
                $getEvent['event_prsentation'] = $product;
            }

            return $this->sendResponse([
                "event_details" => $getEvent,
            ], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
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
    public function saveResumePdf($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('Resume/');
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('Resume/' . $imageName);
        }
        $image->move($destinationPath, $image_name);
        return '/Resume/' . $image_name;
    }
    public function addAssociationDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'company_email' => 'required|string|max:255',
                'mobile_no' => 'required',
                'company_logo' => 'required',
                'address_line_1' => 'required|nullable|string|max:255',
                'pincode' => 'required|nullable|string|max:255',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $NewLocationDetails = new LocationDetails();
            $NewLocationDetails->address_line_1 = $request->address_line_1;
            $NewLocationDetails->pincode = $request->pincode;
            $NewLocationDetails->save();
            $newAssociationDetails = new AssociationDetails();
            $newAssociationDetails->location_id = $NewLocationDetails->id;
            $newAssociationDetails->company_name = $request->company_name;
            $newAssociationDetails->company_email = $request->company_email;
            $newAssociationDetails->mobile_no = $request->mobile_no;
            if ($request->company_logo != "") {
                if (!str_contains($request->company_logo, "http")) {
                    $newAssociationDetails->company_logo = $this->saveCompanyLogo($request->company_logo, $request->company_name);
                }
            }
            $newAssociationDetails->save();
            return $this->sendResponse([], 'Association Details added successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
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
    public function addRegisterToAssociation(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                //  'association_id' => 'required|exists:association_details,id',
                'offers_association_id'=>'required|exists:offers_association,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = Auth::user()->id;
            $existingRegistration = RegisterToAssocitationDetails::where('user_id', $request->user_id)
                // ->where('association_id',$request->association_id)
                ->where('offers_association_id',$request->offers_association_id)
                ->first();

            if ($existingRegistration) {
                return $this->sendError('User is already registered for an association offer.', [], 422);
            }
            $offer = OffersAssociation::query()
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
            //$newDetails->association_id = $request->association_id;
            //$newDetails->created_by_user_id = $request->created_by_user_id;
            $newDetails->offers_association_id=$request->offers_association_id;
            $newDetails->save();
            return $this->sendResponse([], 'Offer Claim successfully.', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function getAssociationDetailsById(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:association_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = AssociationDetails::query()->where('id', $request->id)->with(['location_details'])->first();
            //$getOffersOfAssociation = OffersAssociation::query()->where('association_id', $request->id)->get();
            return $this->sendResponse(["association_details" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function getAllVacancyDetailsAsPerRole(Request $request)
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

            $query = VacancyDetails::query()->with(['location_details', 'user_details']);

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
            $query = VacancyDetails::query()->with(['location_details', 'user_details', 'companyDetails']);

            if ($request->has('firm_name')) {
                $firmName = $request->input('firm_name');
                $query->whereHas('companyDetails', function ($companyQuery) use ($firmName) {
                    $companyQuery->where('firm_name', 'LIKE', "%{$firmName}%");
                });
            }
            if ($request->has('pincode')) {
                $pincode = $request->input('pincode');
                $query->whereHas('companyDetails', function ($companyQuery) use ($pincode) {
                    $companyQuery->where('pincode', 'LIKE', "%{$pincode}%");
                });
            }
            if ($request->has('address')) {
                $address = $request->input('address');
                $query->whereHas('companyDetails', function ($companyQuery) use ($address) {
                    $companyQuery->where('address', 'LIKE', "%{$address}%");
                });
            }
            if ($request->has('position')) {
                $Position = $request->input('position');
                $query->where('position', 'LIKE', "%{$Position}%");
            }
            if ($request->has('experience')) {
                $Experience = $request->input('experience');
                $query->where('experience', 'LIKE', "%{$Experience}%");
            }
            if ($request->has('company_email')) {
                $email = $request->input('company_email');
                $query->whereHas('companyDetails', function ($companyQuery) use ($email) {
                    $companyQuery->where('company_email', 'LIKE', "%{$email}%");
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
                return $this->sendResponse([], 'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
}
