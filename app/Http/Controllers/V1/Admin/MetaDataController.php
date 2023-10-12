<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use App\Models\LocationDetails;
use App\Models\EventDetails;
use App\Models\AssociationDetails;
use App\Models\NewsLetterDetails;
use App\Models\VoluntaryContribution;
use App\Models\PaymentMode;
use App\Models\VacancyDetails;
use App\Models\EventRegistration;
use App\Models\EventPresentationVideo;
use App\Models\EventImages;
use App\Models\RegisterToAssocitationDetails;
use App\Models\ApplyForJob;
use App\Models\OffersAssociation;
use App\Models\EventPresentationPdf;
use App\Models\StudentNoticeBoard;
use App\Models\StudentBatches;
use App\Models\AnnualReports;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\User;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
class MetaDataController extends Controller
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
        public function annualPdf($file){
        $pdfContent = base64_decode($file);
        $fileName = Str::uuid().'.pdf';
        $basePath = public_path('\\annual-report\\');
        if(env('APP_ENV')=='prod'){
            $basePath =  public_path('/annual-report/');
        }
        if(!is_dir($basePath)){
            mkdir($basePath, 0755, true);
        }
        if(env('APP_ENV')=='prod'){
            $destinationPath =  public_path('/annual-report/'.$fileName);
        }else{
            $destinationPath = public_path('\\annual-report\\'.$fileName);
        }
        file_put_contents($destinationPath,$pdfContent);
        return '/'.'/quot-doc/'.$fileName;

    }
        public function saveFile($image )
    {
        $imageName = rand(100, 9999) . '.webp';

        $destinationPath = public_path('bannerimage/' . $imageName);
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('bannerimage/' . $imageName);
        }
        $img = Image::make(file_get_contents($image))
            ->resize(300, null)
            ->save($destinationPath, 80, 'webp');

        return '/bannerimage/' . $imageName;
    }

    public function savePresentationVedio($image )
    {
        $imageName = rand(100, 9999) . '.webp';

        $destinationPath = public_path('presentationVideo/' . $imageName);
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('presentationVideo/' . $imageName);
        }
        $img = Image::make(file_get_contents($image))
            ->resize(300, null)
            ->save($destinationPath, 80, 'webp');

        return '/presentationVideo/' . $imageName;
    }

 public function saveEventImage($image)
    {
        $imageName = rand(100, 9999) . '.webp';

        $destinationPath = public_path('EventImage\\' . $imageName);
        if (env('APP_ENV') == 'prod') {
            $destinationPath = public_path('EventImage/' . $imageName);
        }
        $img = Image::make(file_get_contents($image))
            ->resize(300, null)
            ->save($destinationPath, 80, 'webp');

        return '/EventImage/' . $imageName;
    }


    public function saveStudentNoticeBoardpdf($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('studentnoticeboard/');
        if (env('APP_ENV') == 'prod') {
                    $destinationPath = public_path('studentnoticeboard/' . $imageName);
                }
        $image->move($destinationPath, $image_name);
        return '/studentnoticeboard/' . $image_name;
    }
    public function saveStudentNoticeBoardLogo($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('studentnoticeboardlogo/');
        if (env('APP_ENV') == 'prod') {
                    $destinationPath = public_path('studentnoticeboardlogo/' . $imageName);
                }
        $image->move($destinationPath, $image_name);
        return '/studentnoticeboardlogo/' . $image_name;
    }
//     public function saveBroacherPdf($image, $productName)
//    {
//          $imageName = $productName . '-' . rand(100, 9999) . '.webp';

//         $destinationPath = public_path('BroacherPdf\\' . $imageName);
//         if (env('APP_ENV') == 'prod') {
//             $destinationPath = public_path('BroacherPdf/' . $imageName);
//         }
//         $img = Image::make(file_get_contents($image))
//             ->resize(300, null)
//             ->save($destinationPath, 80, 'webp');

//         return '/BroacherPdf/' . $imageName;
//     }
    public function saveEventPresentationPdf($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('PresentationPdf/');
        if (env('APP_ENV') == 'prod') {
                    $destinationPath = public_path('PresentationPdf/' . $imageName);
                }
        $image->move($destinationPath, $image_name);
        return '/PresentationPdf/' . $image_name;
    }

    // public function saveEventPresentationVideo($image, $productName)
    // {
    //       $imageName = $productName . '-' . rand(100, 9999) . '.webp';

    //      $destinationPath = public_path('EventPresentationVideo\\' . $imageName);
    //      if (env('APP_ENV') == 'prod') {
    //          $destinationPath = public_path('EventPresentationVideo/' . $imageName);
    //      }
    //      $img = Image::make(file_get_contents($image))
    //          ->resize(300, null)
    //          ->save($destinationPath, 80, 'webp');

    //      return '/EventPresentationVideo/' . $imageName;
    //  }


    public function saveEventPresentationVideo($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('EventPresentationVideo/');
        if (env('APP_ENV') == 'prod') {
                    $destinationPath = public_path('EventPresentationVideo/' . $imageName);
                }
        $image->move($destinationPath, $image_name);
        return '/EventPresentationVideo/' . $image_name;
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
    public function saveNewsLetterPdf($image): string
    {
        $image_name = 'image' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('NewsLetterPdf/');
        if (env('APP_ENV') == 'prod') {
                    $destinationPath = public_path('NewsLetterPdf/' . $imageName);
                }
        $image->move($destinationPath, $image_name);
        return '/NewsLetterPdf/' . $image_name;
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
// public function saveNewsLetterPdf($image, $productName)
//     {
//           $imageName = $productName . '-' . rand(100, 9999) . '.webp';

//          $destinationPath = public_path('NewsLetterPdf\\' . $imageName);
//          if (env('APP_ENV') == 'prod') {
//              $destinationPath = public_path('NewsLetterPdf/' . $imageName);
//          }
//          $img = Image::make(file_get_contents($image))
//              ->resize(300, null)
//              ->save($destinationPath, 80, 'webp');

//          return '/NewsLetterPdf/' . $imageName;
//      }

    public function addBanner(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $items = new Banner();
            if ($request->banner_image != "") {
                if (!str_contains($request->banner_image, "http")) {
                    $items->banner_image = $this->saveFile($request->banner_image);
                }
            }
            $items->save();
            return $this->sendResponse([], 'Banner status added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }

    public function addEventPresentationPdf(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $items = new EventPresentationPdf();

            if ($request->hasFile('presentation_pdf')) {
                $uploadedFile = $request->file('presentation_pdf');

                if ($uploadedFile->getClientOriginalExtension() === 'pdf') {
                    // Handle PDF file separately
                    $pdfPath = $this->saveFile($uploadedFile);
                    $items->presentation_pdf = $pdfPath;
                } else {
                    // Handle image file
                    $items->presentation_pdf = $this->saveFile($uploadedFile);
                }
            }
            $items->event_id = $request->event_id;
            $items->save();
            return $this->sendResponse([], 'Event presentation added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function addEventImage(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            foreach($request->event_images as $eachimages){
            $addEventImages = new EventImages();
            $addEventImages->event_id=$request->event_id;
            if ($request->event_images != "") {
                if (!str_contains($eachimages, "http")) {
                    $addEventImages->event_images = $this->saveFile($eachimages);
                }
            }
            $addEventImages->save();
        }
            return $this->sendResponse([], 'Event image added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function addEventVideoLink(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'event_id'=>'required|numeric|exists:event_details,id'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $items = new EventPresentationVideo();
            $items->video_link = $request->video_link;
             $items->event_id = $request->event_id;
            $items->save();
            return $this->sendResponse([], 'Event video added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function getAllBanner(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = Banner::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['banner'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getBannerById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:table_banner,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = Banner::query()->where('id', $request->id)->first();
            return $this->sendResponse(["banner_details" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editBanner(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:table_banner,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editBannerDetails = Banner::query()->where('id', $request->id)->first();
            if ($request->banner_image != "") {
                if (!str_contains($request->banner_image, "http")) {
                    $editBannerDetails->banner_image = $this->saveFile($request->banner_image, $request->banner_image);
                }
            }
            $editBannerDetails->save();
            return $this->sendResponse([], 'banner details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteBannerDetailsbyId(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:table_banner,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = Banner::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'banner details deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function addLocationDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'address_line_1' => 'required|string|max:255',
                'pincode' => 'required|string|max:255',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $NewLocationDetails = new LocationDetails();
            $NewLocationDetails->address_line_1=$request->address_line_1;
            $NewLocationDetails->pincode=$request->pincode;
            $NewLocationDetails->save();
            return $this->sendResponse([], 'Location Details added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function getAllLocationDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = LocationDetails::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['location'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getLocationById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:location_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = LocationDetails::query()->where('id', $request->id)->first();
            return $this->sendResponse(["Location_Details" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editLocationDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:location_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editLocation = LocationDetails::query()->where('id', $request->id)->first();
            if ($request->has('address_line_1')) {
                $editLocation->address_line_1=$request->address_line_1;
            }
            if ($request->has('pincode')) {
                $editLocation->pincode=$request->pincode;
            }
            $editLocation->save();
            return $this->sendResponse([], 'location details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteLocationDetailsById(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:location_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = Banner::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'banner details deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    // public function addEventDetails(Request $request): \Illuminate\Http\JsonResponse
    // {
    //     try {
    //           $request->merge(['eventsData' => json_decode($request->eventsData, true)]);
    //         $validator = Validator::make($request->all(), [
    //             'eventsData' => 'nullable|array',
    //             'eventsData.*.event_name' => 'required|string|max:255',
    //             'eventsData.*.event_description' => 'nullable|string|max:255',
    //             'eventsData.*.event_start_date' => 'required|date',
    //             'eventsData.*.event_end_date' => 'required|date',
    //             'eventsData.*.event_cut_off_date' => 'required|date',
    //             'eventsData.*.event_fee' => 'required',
    //             //'price_for_students' => 'required',
    //             'eventsData.*.price_for_members' => 'required',
    //             'eventsData.*.early_bird_date' => 'nullable|date',
    //             'eventsData.*.early_bird_non_member_fees' => 'nullable|numeric',
    //             'eventsData.*.early_bird_member_fees' => 'nullable|numeric',
    //             'eventsData.*.address_line_1' => 'required|nullable|string|max:255',
    //             'eventsData.*.pincode' => 'required|nullable|string|max:255',
    //             'images.*' => 'array',
    //             'images.*.event_images' => 'nullable|string',
    //             'presentationvedio.*' => 'array',
    //             'presentationvedio.*.video_link' => 'string',
    //             'presentationpdf.*' => 'array',
    //             'presentationpdf.*.presentation_pdf' => 'string',

    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         $isFirstEvent = true;

    //         $parentEventId = null;
    //         if (is_array($request->eventsData) || is_object($request->eventsData)) {
    //             foreach ($request->eventsData as $eventData) {
    //                 $NewLocationDetails = new LocationDetails();
    //                 $NewLocationDetails->address_line_1 = $eventData['address_line_1'];
    //                 $NewLocationDetails->pincode = $eventData['pincode'];
    //                 $NewLocationDetails->save();
    //                 $newEventDetails = new EventDetails();
    //                 $newEventDetails->location_id = $NewLocationDetails->id;
    //                 $newEventDetails->event_name = $eventData['event_name'];
    //                 $newEventDetails->event_description = $eventData['event_description'];
    //                 $newEventDetails->event_start_date = $eventData['event_start_date'];
    //                 $newEventDetails->event_end_date = $eventData['event_end_date'];
    //                 $newEventDetails->event_cut_off_date = $eventData['event_cut_off_date'];
    //                 $newEventDetails->event_fee = $eventData['event_fee'];
    //                 $newEventDetails->price_for_members = $eventData['price_for_members'];
    //                 $newEventDetails->early_bird_date = $eventData['early_bird_date'];
    //                 $newEventDetails->early_bird_non_member_fees = $eventData['early_bird_non_member_fees'];
    //                 $newEventDetails->early_bird_member_fees = $eventData['early_bird_member_fees'];
    //                 if ($parentEventId === null) {
    //                     $newEventDetails->parent_event_id = null;
    //                     $newEventDetails->save();
    //                     $parentEventId = $newEventDetails->id;
    //                 } else {
    //                     $newEventDetails->parent_event_id = $parentEventId;
    //                     $newEventDetails->save();
    //                 }
    //                 if (isset($eventData['parent_event_id'])) {
    //                     $parentEvent = EventDetails::find($eventData['parent_event_id']);
    //                     if ($parentEvent) {
    //                         $newEventDetails->parent_event()->associate($parentEvent);
    //                     }
    //                 }
    //                 $newEventDetails->save();

    //                 if (is_array($request->video_link) || is_object($request->video_link)) {
    //                     foreach ($request->video_link as $eachVideo) {
    //                         $newPresentationVideo = new EventPresentationVideo();
    //                         $newPresentationVideo->event_id = $newEventDetails->id;
    //                         $newPresentationVideo->video_link = $eachVideo['video_link'];
    //                         $newPresentationVideo->save();
    //                     }
    //                 }
    //                 if (is_array($request->event_images) || is_object($request->event_images)) {
    //                     foreach ($request->event_images as $eachimages) {
    //                         $newEventImages = new EventImages();
    //                         $newEventImages->event_id = $newEventDetails->id;
    //                         if ($eachimages != "") {
    //                             if (!str_contains($eachimages, "http")) {
    //                                 $newEventImages->event_images = $this->saveEventImage($eachimages);
    //                             }
    //                         }
    //                         $newEventImages->save();
    //                     }
    //                 }
    //                 if (is_array($request->presentation_pdf) || is_object($request->presentation_pdf)) {
    //                     foreach ($request->presentation_pdf as $eachPdf) {
    //                         $newEventPdf = new EventPresentationPdf();
    //                         $newEventPdf->event_id = $newEventDetails->id;
    //                         if ($request->presentation_pdf != "") {
    //                             if (!str_contains($eachPdf, "http")) {
    //                                 $newEventPdf->presentation_pdf = $this->saveEventPresentationPdf($eachPdf);
    //                             }
    //                         }
    //                         $newEventPdf->save();
    //                     }
    //                 }
    //             }
    //         }
    //         return $this->sendResponse([], 'Event Details added successfully', true);
    //     }
    //     catch (Exception $e) {
    //         return $this->sendError('Something went wrong', $e->getTrace(), 413);
    //     }
    // }
    public function addEventDetails(Request $request)
    {
        try {
             $request->merge(['eventsData' => json_decode($request->eventsData, true)]);

            // return $this->sendError('Validation Error.', $request->all());
            $validator = Validator::make($request->all(), [
                'eventsData' => 'nullable|array',
                'eventsData.*.event_name' => 'required|string|max:255',
                'eventsData.*.event_description' => 'nullable|string|max:255',
                'eventsData.*.event_start_date' => 'required|date',
                'eventsData.*.event_end_date' => 'required|date',
                'eventsData.*.event_cut_off_date' => 'required|date',
                'eventsData.*.event_fee' => 'required',
                //'price_for_students' => 'required',
                'eventsData.*.price_for_members' => 'required',
                'eventsData.*.early_bird_date' => 'nullable|date',
                'eventsData.*.early_bird_non_member_fees' => 'nullable|numeric',
                'eventsData.*.early_bird_member_fees' => 'nullable|numeric',
                'eventsData.*.address_line_1' => 'required|nullable|string|max:255',
                'eventsData.*.pincode' => 'required|nullable|string|max:255',
                'images.*' => 'array',
                'images.*.event_images' => 'nullable|string',
                'presentationvedio.*' => 'array',
                'presentationvedio.*.video_link' => 'string',
                'presentationpdf.*' => 'array',
                'presentationpdf.*.presentation_pdf' => 'string',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $isFirstEvent = true;

            $parentEventId = null;
            $eventCounter=0;
            if (is_array($request->eventsData) || is_object($request->eventsData)) {
                foreach ($request->eventsData as $key=>$eventData) {
                    $NewLocationDetails = new LocationDetails();
                    $NewLocationDetails->address_line_1 = $eventData['address_line_1'];
                    $NewLocationDetails->pincode = $eventData['pincode'];
                    $NewLocationDetails->save();
                    $newEventDetails = new EventDetails();
                    $newEventDetails->location_id = $NewLocationDetails->id;
                    $newEventDetails->event_name = $eventData['event_name'];
                    $newEventDetails->event_description = $eventData['event_description'];
                    $newEventDetails->event_start_date = $eventData['event_start_date'];
                    $newEventDetails->event_end_date = $eventData['event_end_date'];
                    $newEventDetails->event_cut_off_date = $eventData['event_cut_off_date'];
                    $newEventDetails->event_fee = $eventData['event_fee'];
                    $newEventDetails->price_for_members = $eventData['price_for_members'];
                    $newEventDetails->early_bird_date = $eventData['early_bird_date'];
                    $newEventDetails->early_bird_non_member_fees = $eventData['early_bird_non_member_fees'];
                    $newEventDetails->early_bird_member_fees = $eventData['early_bird_member_fees'];
                    if ($parentEventId === null) {
                        $newEventDetails->parent_event_id = null;
                        $newEventDetails->save();
                        $parentEventId = $newEventDetails->id;
                    } else {
                        $newEventDetails->parent_event_id = $parentEventId;
                        $newEventDetails->save();
                    }
                    if (isset($eventData['parent_event_id'])) {
                        $parentEvent = EventDetails::find($eventData['parent_event_id']);
                        if ($parentEvent) {
                            $newEventDetails->parent_event()->associate($parentEvent);
                        }
                    }
                    $newEventDetails->save();
                    $eventCounter+=1;
                    if($request->has("eventImages".$key."Data")){
                        foreach ($request->all()["eventImages".$key."Data"] as $eachimages) {
                            $newEventImages = new EventImages();
                            $newEventImages->event_id = $newEventDetails->id;
                            if ($eachimages != "") {
                                if (!str_contains($eachimages, "http")) {
                                    $newEventImages->event_images = $this->saveEventImage($eachimages);
                                }
                            }
                            $newEventImages->save();
                        }
                    }
                    if($request->has("eventPDF".$key."Data")){

                        foreach ($request->all()["eventPDF".$key."Data"] as $eachPdf) {

                            $newEventPdf = new EventPresentationPdf();
                            $newEventPdf->event_id = $newEventDetails->id;
                            $newEventPdf->presentation_pdf = $this->saveEventPresentationPdf($eachPdf);
                            // return $this->saveEventPresentationPdf($eachPdf);
                            // if ($eachPdf != "") {
                            //     if (!str_contains($eachPdf, "http")) {

                            //     }
                            // }
                            $newEventPdf->save();
                        }
                    }
                    if(array_key_exists('video_link',$eventData)){
                         if (is_array($eventData['video_link']) || is_object($eventData['video_link'])) {
                        foreach ($eventData['video_link'] as $eachVideo) {
                            $newPresentationVideo = new EventPresentationVideo();
                            $newPresentationVideo->event_id = $newEventDetails->id;
                            $newPresentationVideo->video_link = $eachVideo;
                            $newPresentationVideo->save();
                        }
                    }
                    }

                    if (is_array($request->event_images) || is_object($request->event_images)) {
                        foreach ($request->event_images as $eachimages) {
                            $newEventImages = new EventImages();
                            $newEventImages->event_id = $newEventDetails->id;
                            if ($eachimages != "") {
                                if (!str_contains($eachimages, "http")) {
                                    $newEventImages->event_images = $this->saveEventImage($eachimages);
                                }
                            }
                            $newEventImages->save();
                        }
                    }
                    if (is_array($request->presentation_pdf) || is_object($request->presentation_pdf)) {
                        foreach ($request->presentation_pdf as $eachPdf) {
                            $newEventPdf = new EventPresentationPdf();
                            $newEventPdf->event_id = $newEventDetails->id;
                            if ($request->presentation_pdf != "") {
                                if (!str_contains($eachPdf, "http")) {
                                    $newEventPdf->presentation_pdf = $this->saveEventPresentationPdf($eachPdf);
                                }
                            }
                            $newEventPdf->save();
                        }
                    }
                }
            }
            if($eventCounter>0){
                return $this->sendResponse([$eventCounter], 'Event details added successfully', true);
            }else{
                return $this->sendResponse([], 'Event Not Added.', false);
            }

        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
  public function getAllEventDetails(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'pageNo' => 'numeric',
            'limit' => 'numeric',
            'filter' => 'in:upcoming,past',
            'event_start_date' => 'date_format:Y-m-d',
            'event_end_date' => 'date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }
        $currentDate = carbon::now('Asia/Kolkata');
            $now = carbon::now();
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
    public function editEventDetailById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_details,id',
                'pincode' => 'nullable|nullable|string|max:255',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editEventDetails = EventDetails::query()->where('id', $request->id)->first();

            if ($request->has('event_name')) {
                $editEventDetails->event_name=$request->event_name;
            }
             if ($request->has('event_description')) {
                $editEventDetails->event_description=$request->event_description;
            }
              if ($request->has('event_start_date')) {
                $editEventDetails->event_start_date=$request->event_start_date;
            }
             if ($request->has('event_end_date')) {
                $editEventDetails->event_end_date=$request->event_end_date;
            }
             if ($request->has('event_cut_off_date')) {
                $editEventDetails->event_cut_off_date=$request->event_cut_off_date;
            }
             if ($request->has('event_fee')) {
                $editEventDetails->event_fee=$request->event_fee;
            }
               if ($request->has('price_for_students')) {
                $editEventDetails->price_for_students=$request->price_for_students;
            }
            if ($request->has('price_for_members')) {
                $editEventDetails->price_for_members=$request->price_for_members;
            }
            if ($request->broacher_pdf != "") {
                if (!str_contains($request->broacher_pdf, "http")) {
                    $editEventDetails->broacher_pdf = $this->saveSignImage($request->broacher_pdf, $request->joining_date);
                }
            }
            if ($request->has('early_bird_date')) {
                $editEventDetails->early_bird_date=$request->early_bird_date;
            }
            if ($request->has('early_bird_non_member_fees')) {
                $editEventDetails->early_bird_non_member_fees=$request->early_bird_non_member_fees;
            }
            if ($request->has('early_bird_member_fees')) {
                $editEventDetails->early_bird_member_fees=$request->early_bird_member_fees;
            }
            $editEventDetails->save();
             $editLocation = LocationDetails::query()->where('id', $editEventDetails->location_id)->first();
            if ($request->has('address_line_1')) {
                $editLocation->address_line_1=$request->address_line_1;
            }
            if ($request->has('pincode')) {
                $editLocation->pincode=$request->pincode;
            }
            $editLocation->save();
        //     foreach($request->video_link as $eachPresentation){
        //         $editPresentationVideo = new EventPresentationVideo();
        //         $editPresentationVideo->event_id=$editEventDetails->id;
        //         if ($request->video_link != "") {
        //             if (!str_contains($eachPresentation, "http")) {
        //                 $editPresentationVideo->video_link = $this->saveEventPresentationVideo($eachPresentation);
        //             }
        //         }
        //         $editPresentationVideo->save();
        //     }

        // foreach($request->event_images as $eachimages){
        //     $editEventImages = new EventImages();
        //     $editEventImages->event_id=$editEventDetails->id;
        //     if ($request->event_images != "") {
        //         if (!str_contains($eachimages, "http")) {
        //             $editEventImages->event_images = $this->saveEventImage($eachimages);
        //         }
        //     }
        //     $editEventImages->save();
        // }
        // foreach($request->presentation_pdf as $eachPdf){
        //     $editEventPdf=new EventPresentationPdf();
        //     $editEventPdf->event_id=$editEventDetails->id;
        //     if($request->presentation_pdf!=""){
        //         if(!str_contains($eachPdf,"http"))
        //         {
        //             $editEventPdf->presentation_pdf=$this->saveEventPresentationPdf($eachPdf);
        //         }
        //     }
        //     $editEventPdf->save();
        // }
            return $this->sendResponse([], 'event details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteEventDetailsById(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            EventPresentationVideo::where('event_id', $request->id)->delete();
            EventImages::where('event_id', $request->id)->delete();
            EventPresentationPdf::where('event_id', $request->id)->delete();

            $user = EventDetails::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'event details deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function addAssociationDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'company_email' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'mobile_no' => 'required',
                'limits' => 'required',
                // 'location_id' => 'required|integer|exists:location_details,id',
                'company_logo' => 'required',
                'benifits' => 'required|string|nullable',
                // 'offers_pdf'=>'required|nullable',
                // 'images'=>'required|nullable',
                "offers"=>'array',
                "offers.*.offers"=>'string',
                "offers.*.discount"=>'string',
                'address_line_1' => 'required|nullable|string|max:255',
                'address_line_2' => 'nullable|string|max:255',
                'city' => 'required|nullable|string|max:255',
                'state' => 'required|nullable|string|max:255',
                'country' => 'required|nullable|string|max:255',
                'pincode' => 'required|nullable|string|max:255',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $NewLocationDetails = new LocationDetails();
            $NewLocationDetails->address_line_1=$request->address_line_1;
            $NewLocationDetails->address_line_2=$request->address_line_2;
            $NewLocationDetails->city=$request->city;
            $NewLocationDetails->state=$request->state;
            $NewLocationDetails->country=$request->country;
            $NewLocationDetails->pincode=$request->pincode;
            $NewLocationDetails->save();
            $newAssociationDetails = new AssociationDetails();
            $newAssociationDetails->location_id=$NewLocationDetails->id;
            $newAssociationDetails->company_name=$request->company_name;
            $newAssociationDetails->company_email=$request->company_email;
            $newAssociationDetails->start_date=$request->start_date;
            $newAssociationDetails->end_date=$request->end_date;
            $newAssociationDetails->mobile_no=$request->mobile_no;
            $newAssociationDetails->limits=$request->limits;
            // $newAssociationDetails->location_id=$request->location_id;
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

            // foreach($request->offers as $eachoffers){
            //     $newOffer=new OffersAssociation();
            //     $newOffer->association_id=$newAssociationDetails->id;
            //     $newOffer->offers=$eachoffers['offers'];
            //     $newOffer->discount=$eachoffers['discount'];
            //     $newOffer->save();

            // }

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
            $query = AssociationDetails::query()->with(['location_details','offers_of_association']);
            $count = $query->count();

            if ($request->has('company_email')) {
                $query = $query->where('company_email', 'like', '%' . $request->company_email . '%');
            }
            if ($request->has('company_name')){
                $query = $query->where('company_name', 'like', '%' . $request->company_name . '%');
            }
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();

            // foreach ($data as $user) {
            //     if ($user['id'] != null) {
            //         $product = OffersAssociation::query()->where('association_id', $user['id'])->get();
            //         $user['offers_of_association'] = $product;
            //     }
            // }
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
    public function getAssociationDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:association_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = AssociationDetails::query()->where('id', $request->id)->with(['location_details'])->first();
            $getOffersOfAssociation = OffersAssociation::query()->where('association_id', $request->id)->get();
            return $this->sendResponse(["association_details" => $getitems,"offers_of_association"=>$getOffersOfAssociation], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editAssociationDetails(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:association_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editAssociationDetails = AssociationDetails::query()->where('id', $request->id)->first();
            if ($request->has('company_name')) {
                $editAssociationDetails->company_name=$request->company_name;
            }
            if ($request->has('company_email')) {
                $editAssociationDetails->company_email=$request->company_email;
            }
            if ($request->has('start_date')) {
                $editAssociationDetails->start_date=$request->start_date;
            }
            if ($request->has('end_date')) {
                $editAssociationDetails->end_date=$request->end_date;
            }
            if ($request->has('mobile_no')) {
                $editAssociationDetails->mobile_no=$request->mobile_no;
            }   if ($request->has('limits')) {
                $editAssociationDetails->limits=$request->limits;
            }
            //  if ($request->has('location_id')) {
            //     $editAssociationDetails->location_id=$request->location_id;
            // }
            if ($request->company_logo != "") {
                if (!str_contains($request->company_logo, "http")) {
                    $editAssociationDetails->company_logo = $this->saveFile($request->company_logo, $request->company_name);
                }
            }
            if($request->has('benifits')){
				$editAssociationDetails->benifits = $request->benifits;
			}
            if ($request->offers_pdf != "") {
                if (!str_contains($request->offers_pdf, "http")) {
                    $editAssociationDetails->offers_pdf = $this->saveOffersPdf($request->offers_pdf,$request->company_name);
                }
            }
            if ($request->images != "") {
                if (!str_contains($request->images, "http")) {
                    $editAssociationDetails->images = $this->saveAssociationImage($request->images,$request->company_name);
                }
            }
            $editAssociationDetails->save();
            $editLocation = LocationDetails::query()->where('id', $editAssociationDetails->location_id)->first();
            if ($request->has('address_line_1')) {
                $editLocation->address_line_1=$request->address_line_1;
            }
            if ($request->has('address_line_2')) {
                $editLocation->address_line_2=$request->address_line_2;
            }
            if ($request->has('city')) {
                $editLocation->city=$request->city;
            }
            if ($request->has('state')) {
                $editLocation->state=$request->state;
            }
            if ($request->has('country')) {
                $editLocation->country=$request->country;
            }
            if ($request->has('pincode')) {
                $editLocation->pincode=$request->pincode;
            }
            $editLocation->save();
            $arraYOfNewAssociationId = [];
            foreach ($request->offers as $eachoffers) {
                // $editOffer = OffersAssociation::query()->where('association_id', $editAssociationDetails->id) ->where('id', $eachoffers['association_id'])->firstOrNew();
                $editOffer = OffersAssociation::query()
                // ->where('association_id', $editAssociationDetails->id)
                ->where('id', $editAssociationDetails->association_id)
                ->firstOrNew();
                // $editOffer = OffersAssociation::query()->where('association_id');
                if(is_null($editOffer)){
                    $editOffer = new OffersAssociation();
                }
                $editOffer->association_id = $editAssociationDetails->id;
                $editOffer->offers = $eachoffers['offers']; // No need for ['offers']
                $editOffer->discount = $eachoffers['discount']; // No need for ['discount']
                $editOffer->save();
                array_push($arraYOfNewAssociationId,$editOffer->id);
            }
            $OfferDelete = OffersAssociation::whereNotIn('id',$arraYOfNewAssociationId)->where('association_id',$editAssociationDetails->id)->delete();


            return $this->sendResponse([], 'Association Details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteAssociationDetails(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:association_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            OffersAssociation::where('association_id', $request->id)->delete();

            $user = AssociationDetails::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'Association details deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function getRegisterToAssociation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
                'association_id' => 'required|integer|exists:register_to_association,association_id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = RegisterToAssocitationDetails::query()->where('association_id', $request->association_id)->with(['user_details']);

            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['register_to_association'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    // public function getRegisterToAssociation(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'association_id' => 'required|integer|exists:register_to_association,id',
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }

    //         $getitems = RegisterToAssocitationDetails::query()->where('association_id', $request->association_id)->get();
    //         return $this->sendResponse(["Register_to_association" => $getitems], 'Data fetch successfully', true);
    //     } catch (Exception $e) {
    //         return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    //     }
    // }
    public function addNewsLetterForStudent(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'upload_newsletter_pdf'=>'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newNewsLetterDetails = new NewsLetterDetails();
            $newNewsLetterDetails->for_newsletter='Student';
            $newNewsLetterDetails->title =$request->title;
            $newNewsLetterDetails->uploaded_date = carbon::now();
            if ($request->upload_newsletter_pdf != "") {
                if (!str_contains($request->upload_newsletter_pdf, "http")) {
                    $newNewsLetterDetails->upload_newsletter_pdf = $this->saveNewsLetterPdf($request->upload_newsletter_pdf,$request->for_newsletter);
                }
            }
            $newNewsLetterDetails->save();
            return $this->sendResponse([], 'News letter added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function addNewsLetterForMembers(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'upload_newsletter_pdf'=>'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newNewsLetterDetails = new NewsLetterDetails();
            $newNewsLetterDetails->for_newsletter='Members';
            $newNewsLetterDetails->title = $request->title;
            $newNewsLetterDetails->uploaded_date=carbon::now();
            if ($request->upload_newsletter_pdf != "") {
                if (!str_contains($request->upload_newsletter_pdf, "http")) {
                    $newNewsLetterDetails->upload_newsletter_pdf = $this->saveNewsLetterPdf($request->upload_newsletter_pdf,$request->for_newsletter);
                }
            }
            $newNewsLetterDetails->save();
            return $this->sendResponse([], 'News letter added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
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
            if ($request->has('uploaded_date')) {
                $query = $query->where('uploaded_date', 'like', '%' . $request->uploaded_date. '%');
            }
            if ($request->has('title')) {
                $query = $query->where('title', 'like', '%' . $request->title. '%');
            }
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
                return $this->sendResponse([],'No Data Available', false);
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
            if ($request->has('uploaded_date')) {
                $query = $query->where('uploaded_date', 'like', '%' . $request->uploaded_date. '%');
            }
             if ($request->has('title')) {
                $query = $query->where('title', 'like', '%' . $request->title. '%');
            }
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
                return $this->sendResponse([],'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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
            $query = NewsLetterDetails::query();
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
    public function editNewsLetterForStudent(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:newsletter_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editNewsLetterDetails = NewsLetterDetails::query()->where('id', $request->id)->first();
            if ($request->has('for_newsletter')) {
                $editNewsLetterDetails->for_newsletter='Student';
            }
            if ($request->has('title')) {
                $editNewsLetterDetails->title=$request->title;
            }
             if ($request->has('uploaded_date')) {
                $editNewsLetterDetails->uploaded_date=$request->uploaded_date;
            }
            if ($request->upload_newsletter_pdf != "") {
                if (!str_contains($request->upload_newsletter_pdf, "http")) {
                    $editNewsLetterDetails->upload_newsletter_pdf = $this->saveNewsLetterPdf($request->upload_newsletter_pdf, $request->upload_newsletter_pdf);
                }
            }
            $editNewsLetterDetails->save();
            return $this->sendResponse([], 'NewsLetter details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editNewsLetterForMembers(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:newsletter_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editNewsLetterDetails = NewsLetterDetails::query()->where('id', $request->id)->first();
            if ($request->has('for_newsletter')) {
                $editNewsLetterDetails->for_newsletter='Members';
            }
             if ($request->has('title')) {
                $editNewsLetterDetails->title=$request->title;
            }
             if ($request->has('uploaded_date')) {
                $editNewsLetterDetails->uploaded_date=$request->uploaded_date;
            }
            if ($request->upload_newsletter_pdf != "") {
                if (!str_contains($request->upload_newsletter_pdf, "http")) {
                    $editNewsLetterDetails->upload_newsletter_pdf = $this->saveNewsLetterPdf($request->upload_newsletter_pdf, $request->upload_newsletter_pdf);
                }
            }
            $editNewsLetterDetails->save();
            return $this->sendResponse([], 'Newsletter details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteNewsLetterDetails(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:newsletter_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = NewsLetterDetails::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'Newsletter Details deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function addVoluntaryContribution(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_type' => 'required|string',
                'price'=>'required',
                'available_place' => 'required',
                'quantity'=>'required|integer'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newVoluntaryContribution = new VoluntaryContribution();
            $newVoluntaryContribution->user_type=$request->user_type;
            $newVoluntaryContribution->available_place=$request->available_place;
            $newVoluntaryContribution->price=$request->price;
            $newVoluntaryContribution->quantity=$request->quantity;
             $newVoluntaryContribution->save();
            return $this->sendResponse([], 'Association Details added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function getVoluntaryContribution(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = VoluntaryContribution::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['voluntary_contribution_details'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getVoluntaryContributionById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:voluntary_contribution,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = VoluntaryContribution::query()->where('id', $request->id)->first();
            return $this->sendResponse(["voluntary_contribution" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editVoluntaryContribution(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:voluntary_contribution,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editVoluntaryContribution = VoluntaryContribution::query()->where('id', $request->id)->first();
            if ($request->has('user_type')) {
                $editVoluntaryContribution->user_type=$request->user_type;
            }
            if ($request->has('available_place')) {
                $editVoluntaryContribution->available_place=$request->available_place;
            }
            if ($request->has('price')) {
                $editVoluntaryContribution->price=$request->price;
            }
            if ($request->has('quantity')) {
                $editVoluntaryContribution->quantity=$request->quantity;
            }
            $editVoluntaryContribution->save();
            return $this->sendResponse([], 'VoluntaryContribution Details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteVoluntaryContribution(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:voluntary_contribution,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = VoluntaryContribution::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'VoluntaryContribution deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function addPaymentMode(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newPaymentMode = new PaymentMode();
            $newPaymentMode->name=$request->name;
            $newPaymentMode->save();
            return $this->sendResponse([], 'Payment Mode Details added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
    public function getAllPaymentMode(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = PaymentMode::query();
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['payment_mode'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
    public function getPaymentModeById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:payment_mode,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = PaymentMode::query()->where('id', $request->id)->first();
            return $this->sendResponse(["payment_mode" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editPaymentMode(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:payment_mode,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editPaymentMode = PaymentMode::query()->where('id', $request->id)->first();

            if ($request->has('name')) {
                $editPaymentMode->name=$request->name;
            }
            $editPaymentMode->save();
            return $this->sendResponse([], 'Payment Mode Details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deletePaymentMode(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:payment_mode,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = PaymentMode::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'Payment Mode deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function addVacancyDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [

                'position' => [ Rule::in(['Semi Qualified','Article Assistant','Industrial Trainee','Qualified'])],
                'comments' => 'nullable',
                'company_id' => 'required|integer|exists:company,id',
                'experience' => 'required',
                'expiry_date' => 'nullable|date',
                'address_line_1' => 'required|string|max:255',
                'pincode' => 'required|nullable|string|max:255',
                 'job_type' => [ Rule::in(['internship', 'full_time'])],

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            // $user=Auth::User->id();
            $NewLocationDetails = new LocationDetails();
            $NewLocationDetails->address_line_1=$request->address_line_1;
            $NewLocationDetails->pincode=$request->pincode;
            $NewLocationDetails->save();
            $newVacancy = new VacancyDetails();
            $newVacancy->location_id=$NewLocationDetails->id;
            $newVacancy->position=$request->position;
            $newVacancy->comments=$request->comments;
            $newVacancy->experience=$request->experience;
            $newVacancy->location_id=$request->location_id;
            $newVacancy->company_id = $request->company_id;
            $newVacancy->created_by = $request->created_by;
		    $newVacancy->expiry_date = $request->expiry_date;
            $newVacancy->job_type = $request->job_type;
            $newVacancy->save();
            return $this->sendResponse([], 'Vacancy details added successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
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
            $query = VacancyDetails::query()->with(['location_details','user_details','companyDetails']);

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
                return $this->sendResponse([],'No Data Available',false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }    public function getVacancyDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:vacancy_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $getitems = VacancyDetails::query()->where('id', $request->id)->with(['location_details','user_details','companyDetails'])->first();
            return $this->sendResponse(["vacancy_details" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editVacancyDetails(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:vacancy_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editVacancy = VacancyDetails::query()->where('id', $request->id)->first();
            if ($request->has('position')) {
            $editVacancy->position = $request->position;
            }
            if ($request->has('comments')) {
                $editVacancy->comments=$request->comments;
            }
            if ($request->has('experience')) {
                $editVacancy->experience=$request->experience;
            }
            if ($request->has('job_type')) {
                $editVacancy->job_type=$request->job_type;
            }
			if($request->has('expiry_date')){
				$editVacancy->expiry_date = $request->expiry_date;
			}
            $editVacancy->save();
            return $this->sendResponse([], 'Vacancy Details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteVacancyDetails(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:vacancy_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = VacancyDetails::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'Vacancy Details deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function getAllEventRegistration(Request $request)
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
            'paymentmode_details','voluntary_contribution_details']);
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
    public function getAllStudentBatchRegistration(Request $request)
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
            'paymentmode_details','voluntary_contribution_details']);
             $query->whereNotNull('student_batche_id');
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            if (count($data) > 0) {
                $response['student_registration'] = $data;
                $response['count'] = $count;
                return $this->sendResponse($response, 'Data fetched successfully', true);
            } else {
                return $this->sendResponse([],'No Data Available', false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }

     public function getAllUserRegisterToEvent(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $query = EventRegistration::query()->where('event_id',$request->event_id)
            ->with(['event_details','user_details',
            'voluntary_contribution_details']);
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
public function getAllUserAttendTheEvent(Request $request)
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
            ->where('event_id', $request->event_id)
            ->where('attendance_status', 1)
            ->with(['event_details', 'user_details', 'voluntary_contribution_details']);

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
            return $this->sendResponse([], 'No Data Available', false);
        }
    } catch (Exception $e) {
        return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    }
}
    public function getEventRegistrationById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_registration,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getitems = EventRegistration::query()->where('id', $request->id)->with(['event_details','user_details','paymentmode_details','voluntary_contribution_details'])->first();
            return $this->sendResponse(["event_registration" => $getitems], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function editEventRegistration(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_registration,id',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editVacancy = EventRegistration::query()->where('id', $request->id)->first();

            if ($request->has('event_id')) {
                $editVacancy->event_id=$request->event_id;
            }
            if ($request->has('position')) {
                $editVacancy->position=$request->position;
            }
            if ($request->has('user_id')) {
                $editVacancy->user_id=$request->user_id;
            }
            if ($request->has('voluntary_contribution_id')) {
                $editVacancy->voluntary_contribution_id=$request->voluntary_contribution_id;
            }
            if ($request->has('payment_status')) {
                $editVacancy->payment_status=$request->payment_status;
            }
            if ($request->has('gst_no')) {
                $editVacancy->gst_no=$request->gst_no;
            }
            if ($request->has('legal_name')) {
                $editVacancy->legal_name=$request->legal_name;
            }
            if($request->has('attendance_status')){
				$editVacancy->attendance_status = $request->attendance_status;
			}
			if($request->has('voluntary_donation_amount')){
				$editVacancy->voluntary_donation_amount = $request->voluntary_donation_amount;
			}
			if($request->has('event_price')){
				$editVacancy->event_price = $request->event_price;
			}
			if($request->has('total_amount')){
				$editVacancy->total_amount = $request->total_amount;
			}
            $editVacancy->save();
            return $this->sendResponse([], 'Event registration updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteEventRegistration(Request $request):\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_registration,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = EventRegistration::query()->where('id', $request->id)->first();
            $user->delete();
            return $this->sendResponse([], 'Event registration deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }

    // public function addRegisterToAssociation(Request $request): \Illuminate\Http\JsonResponse
    // {

    //     try {
    //         $validator = Validator::make($request->all(), [

    // 		'user_id' => 'required|nullable',
	// 		'association_id' => 'required|nullable',
	// 		'created_by_user_id' => 'required|nullable',


    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }

    //         $association = AssociationDetails::find($request->association_id);

    //     if (!$association) {
    //         return $this->sendError('Association not found.', [], 404);
    //     }

    //     $registeredUsersCount = RegisterToAssocitationDetails::where('association_id', $request->association_id)->count();

    //     $limit = (int) $association->limit;


    //    if ($limit >= 0 && $registeredUsersCount >= $limit) {
    //       return $this->sendError('Registration to this association is not possible. The association is full.', [], 422);
    //        }


    //         $newDetails = new RegisterToAssocitationDetails;
	// 	$newDetails->user_id = $request->user_id;
	// 	$newDetails->association_id = $request->association_id;
	// 	$newDetails->created_by_user_id = $request->created_by_user_id;
    //     $newDetails->save();
	// 	if($newDetails->save())
    //     {
    //         		return $this->sendResponse([],'RegisterToAssocitationDetails Created Successfully.', true);
    //     	}else{
    //         		return $this->sendResponse([],'RegisterToAssocitationDetails Creation Failed', false);
    //     	}
    //     }
    //     catch (Exception $e) {
    //         return $this->sendError('Something went wrong', $e->getTrace(), 413);
    //     }
    // }
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
            return $this->sendResponse([], 'Register to associtation details created successfully.', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
        }
    }
  public function getRegisterToAssocitationDetails(Request $request){
	try{
		$validator = Validator::make($request->all(), [
			'pageNo'=>'numeric',
			'limit'=>'numeric',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
		$query = RegisterToAssocitationDetails::query()->with(['user_details','association_details',
        'created_by_user_details','offers_association_details']);;
		$count=$query->count();
		if($request->has('pageNo') && $request->has('limit')){
			$limit = $request->limit;
			$pageNo = $request->pageNo;
			$skip = $limit*$pageNo;
			$query= $query->skip($skip)->limit($limit);
		}
		$data = $query->orderBy('id','DESC')->get();
		if(count($data)>0){
			$response['data'] =  $data;
			$response['count']=$count;
			return $this->sendResponse($response,'Data fetched successfully', true);
		}else{
			return $this->sendResponse('No data available', [],false);
		}
	}catch (\Exception $e){
            return $this->sendError($e->getMessage(), $e->getTrace(),500);
        }
  }
  public function editRegisterToAssociation(Request $request){
	try{
        $editItems = RegisterToAssocitationDetails::query()->where('id', $request->id)->first();

		// $RegisterToAssocitationDetails = RegisterToAssocitationDetails::find($id);
		if(!is_null($editItems)){
			if($request->has('user_id')){
				$editItems->user_id = $request->user_id;
			}
			if($request->has('association_id')){
				$editItems->association_id = $request->association_id;
			}
			if($request->has('created_by_user_id')){
				$editItems->created_by_user_id = $request->created_by_user_id;
			}
            if($request->has('offers_association_id')){
				$editItems->offers_association_id = $request->offers_association_id;
			}
			$editItems->update();
			return $this->sendResponse([],'Register to associtation details updated');
		}else{
			return $this->sendResponse([],'No register to associtation details found', false);
		}
	}catch (\Exception $e){
            return $this->sendError($e->getMessage(), $e->getTrace(),500);
        }
  }
  public function deleteRegisterToAssociation(Request $request){
	try{
		$validator = Validator::make($request->all(), [
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
        $user = RegisterToAssocitationDetails::query()->where('id', $request->id)->first();
		// $RegisterToAssocitationDetails = RegisterToAssocitationDetails::find($id);
		if(!is_null($user)){
			if($user->delete()){
				return $this->sendResponse([],'Register To AssocitationDetails Deleted Successfully', true);
			}else{
				return $this->sendResponse([],'Register To AssocitationDetails Deletion Failed', false);
			}
		}else{
			return $this->sendResponse([],'No Register To AssocitationDetails Found', false);
		}
	}catch (Exception $e){
		return $this->sendError('$e->getMessage()', $e->getTrace(),500);
	}
  }
  public function getRegisterToAssocitationById(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:register_to_association,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $getitems = RegisterToAssocitationDetails::query()->where('id', $request->id)->with(['user_details','association_details','created_by_user_details','offers_association_details'])->first();

          return $this->sendResponse(["event_registration_to_association" => $getitems], 'Data fetch successfully', true);
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
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
                  return $this->sendResponse([],'Apply for job successfully.', true);
        }
      catch (Exception $e) {
          return $this->sendError('Something went wrong', $e->getTrace(), 413);
      }
  }
  public function getApplyJOb(Request $request){
	try{
		$validator = Validator::make($request->all(), [
			'pageNo'=>'numeric',
			'limit'=>'numeric',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
		$query = ApplyForJob::query()->with(['user_details','vacancy_details']);;
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
			return $this->sendResponse($response,'Data fetched successfully', true);
		}else{
			return $this->sendResponse('No Data Available', [],false);
		}
	}catch (\Exception $e){
            return $this->sendError($e->getMessage(), $e->getTrace(),500);
        }
  }
  public function editApplyJob(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:apply_for_job,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $editItems = ApplyForJob::query()->where('id', $request->id)->first();

          if($request->has('user_id')){
            $editItems->user_id = $request->user_id;
        }
        if($request->has('vacancy_id')){
            $editItems->vacancy_id = $request->vacancy_id;
        }
        if ($request->resume_pdf != "") {
            if (!str_contains($request->resume_pdf, "http")) {
                $editItems->resume_pdf = $this->saveResumePdf($request->resume_pdf, $request->user_id);
            }
        }
        $editItems->update();
          return $this->sendResponse([], 'Apply Job updated successfully');
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
  public function deleteApplyJob(Request $request){
	try{
		$validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:apply_for_job,id',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
        $user = ApplyForJob::query()->where('id', $request->id)->first();
		if(!is_null($user)){
			if($user->delete()){
				return $this->sendResponse([],'Apply Job  Deleted Successfully', true);
			}else{
				return $this->sendResponse([],'Apply Job  Deletion Failed', false);
			}
		}else{
			return $this->sendResponse([],'No Apply Job  Found', false);
		}
	}catch (Exception $e){
		return $this->sendError('$e->getMessage()', $e->getTrace(),500);
	}
  }
  public function getApplyJobById(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:apply_for_job,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $getitems = ApplyForJob::query()->where('id', $request->id)->with(['user_details','vacancy_details'])->first();

          return $this->sendResponse(["apply_job_details" => $getitems], 'Data fetch successfully', true);
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
  public function getRegisterUserToVacancy(Request $request)
  {
      try {
          $validator = Validator::make($request->all(), [
              'pageNo' => 'numeric',
              'limit' => 'numeric',
              'vacancy_id' => 'required|integer|exists:apply_for_job,vacancy_id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors(), 400);
          }
          $query = ApplyForJob::query()->where('vacancy_id', $request->vacancy_id)->with(['user_details']);
          $count = $query->count();
          if ($request->has('pageNo') && $request->has('limit')) {
              $limit = $request->limit;
              $pageNo = $request->pageNo;
              $skip = $limit * $pageNo;
              $query = $query->skip($skip)->limit($limit);
          }
          $data = $query->orderBy('id', 'DESC')->get();
          if (count($data) > 0) {
              $response['user_register_to_vacancy'] = $data;
              $response['count'] = $count;
              return $this->sendResponse($response, 'Data Fetched Successfully', true);
          } else {
              return $this->sendResponse('No Data Available', [], false);
          }
      } catch (Exception $e) {
          return $this->sendError($e->getMessage(), $e->getTrace(), 500);
      }
  }
  public function addOffersToAssociation(Request $request): \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
          'offers' => 'required|nullable',
          'discount' => 'required|nullable',
          'association_id' => 'required|nullable',
          'is_active' => 'required|nullable',
          ]);

          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
            $newOffers = new OffersAssociation;
            $newOffers->offers = $request->offers;
            $newOffers->association_id=$request->association_id;
            $newOffers->is_active=$request->is_active;
            $newOffers->discount = $request->discount;
            $newOffers->benifits=$request->benifits;
            $newOffers->start_date = $request->start_date;
            $newOffers->end_date=$request->end_date;
            $newOffers->limits=$request->limits;
            $newOffers->save();
            return $this->sendResponse([],' Offers To Association Successfully.', true);
        }
      catch (Exception $e) {
          return $this->sendError('Something went wrong', $e->getTrace(), 413);
      }
  }
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
  public function editOffersAssociation(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:offers_association,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $editItems = OffersAssociation::query()->where('id', $request->id)->first();
        if($request->has('offers')){
            $editItems->offers = $request->offers;
        }
        if($request->has('discount')){
            $editItems->discount = $request->discount;
        }
        if($request->has('association_id')){
            $editItems->association_id = $request->association_id;
        }
        if($request->has('is_active')){
            $editItems->is_active = $request->is_active;
        }
        $editItems->update();
          return $this->sendResponse([], 'Offers To Association updated successfully');
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
  public function deleteOffersToAssociation(Request $request){
	try{
		$validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:offers_association,id',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
        $user = OffersAssociation::query()->where('id', $request->id)->first();

		if(!is_null($user)){
			if($user->delete()){
				return $this->sendResponse([],'Offers to association  deleted successfully', true);
			}else{
				return $this->sendResponse([],'Offers to association  deletion failed', false);
			}
		}else{
			return $this->sendResponse([],'No Apply Job  Found', false);
		}
	}catch (Exception $e){
		return $this->sendError('$e->getMessage()', $e->getTrace(),500);
	}
  }
  public function getOffersToAssociationById(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:offers_association,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $getitems = OffersAssociation::query()->where('id', $request->id)->with(['association_details'])->first();

          return $this->sendResponse(["apply_job_details" => $getitems], 'Data fetch successfully', true);
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
  public function addStudentNoticeBoard(Request $request): \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [

          'title' => 'required',
        //   'type' => 'required|nullable',
            'notice_board_pdf'=>'nullable',
            'notice_board_logo'=>'nullable'

          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $newDetails = new StudentNoticeBoard;

          $newDetails->title=$request->title;
          $newDetails->type='student';
        if ($request->notice_board_pdf != "") {
            if (!str_contains($request->notice_board_pdf, "http")) {
                $newDetails->notice_board_pdf = $this->saveStudentNoticeBoardpdf($request->notice_board_pdf,$request->title);
            }
        }
        if ($request->notice_board_logo != "") {
            if (!str_contains($request->notice_board_logo, "http")) {
                $newDetails->notice_board_logo = $this->saveStudentNoticeBoardLogo($request->notice_board_logo,$request->title);
            }
        }
        $newDetails->save();

        return $this->sendResponse([],'Student notice board added successfully.', true);
        }
      catch (Exception $e) {
          return $this->sendError('Something went wrong', $e->getTrace(), 413);
      }
  }

  public function addMembersNoticeBoard(Request $request): \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [

            'title' => 'required',
            'notice_board_pdf'=>'nullable',
            'notice_board_logo'=>'nullable'

          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $newDetails = new StudentNoticeBoard;
          $newDetails->title=$request->title;
          $newDetails->type='members';
        if ($request->notice_board_pdf != "") {
            if (!str_contains($request->notice_board_pdf, "http")) {
                $newDetails->notice_board_pdf = $this->saveStudentNoticeBoardpdf($request->notice_board_pdf,$request->title);
            }
        }
        if ($request->notice_board_logo != "") {
            if (!str_contains($request->notice_board_logo, "http")) {
                $newDetails->notice_board_logo = $this->saveStudentNoticeBoardLogo($request->notice_board_logo,$request->title);
            }
        }
        $newDetails->save();
        return $this->sendResponse([],'Member notice board added successfully.', true);
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
		$query = StudentNoticeBoard::query()->where('type', 'student');
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
public function getStudentNoticeBoardById(Request $request):  \Illuminate\Http\JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:table_student_notice_board,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $getitems = StudentNoticeBoard::query()->where('id',$request->id)->first();
        return $this->sendResponse(["student_notice_board" => $getitems], 'Data fetch successfully', true);
    } catch (Exception $e) {
        return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    }
}
public function editStudentNoticeBoard(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:table_student_notice_board,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $editItems = StudentNoticeBoard::query()->where('id', $request->id)->first();
        if($request->has('title')){
            $editItems->title = $request->title;
        }
        if($request->has('type')){
            $editItems->type ='student';
        }
        if ($request->notice_board_pdf != "") {
            if (!str_contains($request->notice_board_pdf, "http")) {
                $editItems->notice_board_pdf = $this->saveStudentNoticeBoardpdf($request->notice_board_pdf,$request->title);
            }
        }
        if ($request->notice_board_logo != "") {
            if (!str_contains($request->notice_board_logo, "http")) {
                $editItems->notice_board_logo = $this->saveStudentNoticeBoardLogo($request->notice_board_logo,$request->title);
            }
        }
        $editItems->update();
          return $this->sendResponse([], 'Student notice board updated successfully');
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
public function editMembersNoticeBoard(Request $request):  \Illuminate\Http\JsonResponse
{
    try {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:table_student_notice_board,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $editItems = StudentNoticeBoard::query()->where('id', $request->id)->first();

        if($request->has('title')){
          $editItems->title = $request->title;
      }
      if($request->has('type')){
          $editItems->type = 'members';
      }
      if ($request->notice_board_pdf != "") {
          if (!str_contains($request->notice_board_pdf, "http")) {
              $editItems->notice_board_pdf = $this->saveStudentNoticeBoardpdf($request->notice_board_pdf,$request->title);
          }
      }
      if ($request->notice_board_logo != "") {
          if (!str_contains($request->notice_board_logo, "http")) {
              $editItems->notice_board_logo = $this->saveStudentNoticeBoardLogo($request->notice_board_logo,$request->title);
          }
      }
      $editItems->update();
        return $this->sendResponse([], 'Student notice board updated successfully');
    } catch (Exception $e) {
        return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
    }
}
  public function deleteStudentNoticeBoard(Request $request){
	try{
		$validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:table_student_notice_board,id',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
        $user = StudentNoticeBoard::query()->where('id', $request->id)->first();
        $user->delete();
        return $this->sendResponse([],'student notice board deleted successfully', true);
	}catch (Exception $e){
		return $this->sendError('$e->getMessage()', $e->getTrace(),500);
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
  public function editStudentBatches(Request $request):  \Illuminate\Http\JsonResponse
  {
      try {
          $validator = Validator::make($request->all(), [
              'id' => 'required|integer|exists:student_batches,id',
          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $editItems = StudentBatches::query()->where('id', $request->id)->first();

          if($request->has('batch_name')){
            $editItems->batch_name = $request->batch_name;
        }
        if($request->has('fee')){
            $editItems->fee = $request->fee;
        }
        if($request->has('start_date')){
            $editItems->start_date = $request->start_date;
        }
        if($request->has('end_date')){
            $editItems->end_date=$request->end_date;
        }
        if($request->has('batch_discription')){
            $editItems->batch_discription=$request->batch_discription;
        }
        if($request->has('batch_cut_off_date')){
            $editItems->batch_cut_off_date=$request->batch_cut_off_date;
        }
        if($request->has('batch_address')){
            $editItems->batch_address=$request->batch_address;
        }
        if($request->has('early_bird_date')){
            $editItems->early_bird_date=$request->early_bird_date;
        }
        if($request->has('early_bird_fees')){
            $editItems->early_bird_fees=$request->early_bird_fees;
        }
        $editItems->save();

            $editLocation = LocationDetails::query()->where('id', $editItems->location_id)->first();
            if($request->has('address_line_1')){
                $editLocation->address_line_1 = $request->address_line_1;
            }
            if($request->has('pincode')){
                $editLocation->pincode = $request->pincode;
            }

            $editLocation->save();

            return $this->sendResponse([], 'Offers To Association updated successfully');
      } catch (Exception $e) {
          return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
      }
  }
  public function deleteStudentBatches(Request $request){
	try{
		$validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:student_batches,id',
		]);
		if ($validator->fails()) {
			return $this->sendError('Validation Error.', $validator->errors(),400);
		}
        $user = StudentBatches::query()->where('id', $request->id)->first();

		if(!is_null($user)){
			if($user->delete()){
				return $this->sendResponse([],'Student batch deleted successfully', true);
			}else{
				return $this->sendResponse([],'Student batch deletion failed', false);
			}
		}else{
			return $this->sendResponse([],'No apply job found', false);
		}
	}catch (Exception $e){
		return $this->sendError('$e->getMessage()', $e->getTrace(),500);
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
    public function getAllBatches(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $now = carbon::now();
            $query = StudentBatches::query()->with(['event_details','user_details',
            'paymentmode_details','voluntary_contribution_details']);
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
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
      public function getAllUpcomingBatches(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pageNo' => 'numeric',
                'limit' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }
            $now = carbon::now();
            $query = StudentBatches::query()->where('start_date', '>', $now);
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
                return $this->sendResponse($response, 'Data Fetched Successfully', true);
            } else {
                return $this->sendResponse('No Data Available', [], false);
            }
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
        }
    }
     public function getAllOngoingBatches(Request $request)
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
        $query = StudentBatches::query()
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->with(['location_details']);
            //  dd($query);
        $count = $query->count();

        if ($request->has('pageNo') && $request->has('limit')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * $pageNo;
            $query = $query->skip($skip)->limit($limit);
        }
        $data = $query->get();
        if (count($data) > 0) {
            $response['ongoing_events'] = $data;
            $response['count'] = $count;
            return $this->sendResponse($response, 'Data fetched successfully', true);
        } else {
            return $this->sendResponse([],'No ongoing events available',false);
        }
    } catch (\Exception $e) {
        return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    }
}
    public function getAllUpcomingEvent(Request $request)
{
   try{
       $validator = Validator::make($request->all(), [
           'pageNo'=>'numeric',
           'limit'=>'numeric',
       ]);
       if ($validator->fails()) {
           return $this->sendError('Validation Error.', $validator->errors(),400);
       }
      $query = EventDetails::query()->where('event_end_date', '>', date('Y-m-d'))->with(['location_details']);
       $count=$query->count();
       if($request->has('pageNo') && $request->has('limit')){
           $limit = $request->limit;
           $pageNo = $request->pageNo;
           $skip = $limit*$pageNo;
           $query= $query->skip($skip)->limit($limit);
       }
       $data = $query->get();
       if(count($data)>0){
           $response['upcoming_event'] =  $data;
           $response['count']=$count;
           return $this->sendResponse($response,'Data Fetched Successfully', true);
       }else{
           return $this->sendResponse('No Data Available', [],false);
       }
   }catch (\Exception $e){
           return $this->sendError($e->getMessage(), $e->getTrace(),500);
       }
}
 public function getAllOngoingEvent(Request $request)
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

        $query = EventDetails::query()
            ->where('event_start_date', '<=', $currentDate)
            ->where('event_end_date', '>=', $currentDate)
            ->with(['location_details']);

        $count = $query->count();

        if ($request->has('pageNo') && $request->has('limit')) {
            $limit = $request->limit;
            $pageNo = $request->pageNo;
            $skip = $limit * $pageNo;
            $query = $query->skip($skip)->limit($limit);
        }
        $data = $query->get();
        if (count($data) > 0) {
            $response['ongoing_events'] = $data;
            $response['count'] = $count;
            return $this->sendResponse($response, 'Data fetched successfully', true);
        } else {
            return $this->sendResponse([],'No ongoing events available',false);
        }
    } catch (\Exception $e) {
        return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    }
}
  public function addComapny(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'firm_name' => 'required',
                'contact_person_name' => 'nullable',
                'contact_person_number'=>'required',
                'address' => 'required',
                'pincode' => 'nullable',
                'company_email'=>'required|string|email'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $newOffers = new Company();
            $newOffers->firm_name = $request->firm_name;
            $newOffers->contact_person_name = $request->contact_person_name;
            $newOffers->contact_person_number = $request->contact_person_number;
            $newOffers->address = $request->address;
            $newOffers->pincode = $request->pincode;
            $newOffers->company_email = $request->company_email;
            $newOffers->save();
            return $this->sendResponse([], 'Company added Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
        }
    }
      public function editCompany(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:company,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editCompany = Company::query()->where('id', $request->id)->first();
            if ($request->has('firm_name')) {
                $editCompany->firm_name = $request->firm_name;
            }
             if ($request->has('contact_person_name')) {
                $editCompany->contact_person_name = $request->contact_person_name;
            }
             if ($request->has('contact_person_number')) {
                $editCompany->contact_person_number = $request->contact_person_number;
            }
             if ($request->has('address')) {
                $editCompany->address = $request->address;
            }
             if ($request->has('pincode')) {
                $editCompany->pincode = $request->pincode;
            }
             if ($request->has('company_email')) {
                $editCompany->company_email = $request->company_email;
            }
            $editCompany->save();
            return $this->sendResponse([], 'Company updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
        public function getAllCompany(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'limit' => 'numeric',
                'pageNo' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $query = Company::query();
            $count = $query->count();
            if ($request->has('firm_name')) {
                $firmName = $request->input('firm_name');
                $query->where('firm_name', 'LIKE', "%{$firmName}%");
            }
            if ($request->has('contact_person_name')) {
                $contactPersonName = $request->input('contact_person_name');
                $query->where('contact_person_name', 'LIKE', "%{$contactPersonName}%");
            }
            if ($request->has('contact_person_number')) {
                $contactPersonNumber = $request->input('contact_person_number');
                $query->where('contact_person_number', 'LIKE', "%{$contactPersonNumber}%");
            }
            if ($request->has('address')) {
                $Address = $request->input('address');
                $query->where('address', 'LIKE', "%{$Address}%");
            }
            if ($request->has('pincode')) {
                $Pincode = $request->input('pincode');
                $query->where('pincode', 'LIKE', "%{$Pincode}%");
            }
            if ($request->has('company_email')) {
                $companyEmail = $request->input('company_email');
                $query->where('company_email', 'LIKE', "%{$companyEmail}%");
            }
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $getCompany = $query->orderBy('id', 'DESC')->get();
            if (count($getCompany) > 0) {
                return $this->sendResponse(["company" => $getCompany, 'count' => $count], 'Data fetch successfully');
            } else {
                return $this->sendResponse([], 'No client are available', false);
            }
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteCompanyById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:company,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $deleteCompany = Company::query()
            ->where('id', $request->id)->first();
            $deleteCompany->delete();
            return $this->sendResponse([],'Company deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function getCompanyById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:company,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getCompany = Company::query()->where('id', $request->id)->first();
            return $this->sendResponse(['company'=>$getCompany], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
     public function getAllStudent(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'limit' => 'numeric',
                'pageNo' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $query = User::role('student');
            if ($request->has('name')) {
                $FirstName = $request->input('name');
                $query->where('name', 'LIKE', "%{$FirstName}%");
            }
            if ($request->has('email')) {
                $Firstemail = $request->input('email');
                $query->where('email', 'LIKE', "%{$Firstemail}%");
            }
            if ($request->has('last_name')) {
                $lastName = $request->input('last_name');
                $query->where('last_name', 'LIKE', "%{$lastName}%");
            }
            if ($request->has('mobile_no')) {
                $FirstName = $request->input('mobile_no');
                $query->where('mobile_no', 'LIKE', "%{$FirstName}%");
            }
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $getUser = $query->orderBy('id', 'DESC')->get();
            if (count($getUser) > 0) {
                return $this->sendResponse(["student" => $getUser, 'count' => $count], 'Data fetch successfully');
            } else {
                return $this->sendResponse([], 'No client are available', false);
            }
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function getAllMember(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'limit' => 'numeric',
                'pageNo' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $query = User::role('members');
            if ($request->has('name')) {
                $FirstName = $request->input('name');
                $query->where('name', 'LIKE', "%{$FirstName}%");
            }
            if ($request->has('email')) {
                $Firstemail = $request->input('email');
                $query->where('email', 'LIKE', "%{$Firstemail}%");
            }
            if ($request->has('last_name')) {
                $lastName = $request->input('last_name');
                $query->where('last_name', 'LIKE', "%{$lastName}%");
            }
            if ($request->has('mobile_no')) {
                $FirstName = $request->input('mobile_no');
                $query->where('mobile_no', 'LIKE', "%{$FirstName}%");
            }
            $count = $query->count();
            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $getUser = $query->orderBy('id', 'DESC')->get();
            if (count($getUser) > 0) {
                return $this->sendResponse(["member" => $getUser, 'count' => $count], 'Data fetch successfully');
            } else {
                return $this->sendResponse([], 'No client are available', false);
            }
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

      public function addAnnualReport(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
                'annual_reports_pdf' => 'required',
                'report_start_date'=>'required|date',
                'report_end_date' => 'required|date',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newAnnualReports = new AnnualReports();
            $newAnnualReports->title = $request->title;
            $newAnnualReports->annual_reports_pdf = $request->annual_reports_pdf;
            if ($request->annual_reports_pdf != "") {
                if (!str_contains($request->annual_reports_pdf, "http")) {
                    $newAnnualReports->annual_reports_pdf = $this->annualPdf($request->annual_reports_pdf, $request->transporter_doc_no);
                }
            }
            $newAnnualReports->report_start_date = $request->report_start_date;
            $newAnnualReports->report_end_date = $request->report_end_date;
            $newAnnualReports->save();
            return $this->sendResponse([], 'Annual reports added Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
        }
    }
      public function editAnnualReports(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:annual_reports,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editAnnualReports = AnnualReports::query()->where('id', $request->id)->first();
            if ($request->has('title')) {
                $editAnnualReports->title = $request->title;
            }
            if ($request->annual_reports_pdf != "") {
                if (!str_contains($request->annual_reports_pdf, "http")) {
                    $editAnnualReports->annual_reports_pdf = $this->annualPdf($request->annual_reports_pdf, $request->transporter_doc_no);
                }
            }
             if ($request->has('report_start_date')) {
                $editAnnualReports->report_start_date = $request->report_start_date;
            }
             if ($request->has('report_end_date')) {
                $editAnnualReports->report_end_date = $request->report_end_date;
            }
            $editAnnualReports->save();
            return $this->sendResponse([], 'Annual reports updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
        public function getAllAnnualReports(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'limit' => 'numeric',
                'pageNo' => 'numeric',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $query = AnnualReports::query();
            $count = $query->count();

            if ($request->has('pageNo') && $request->has('limit')) {
                $limit = $request->limit;
                $pageNo = $request->pageNo;
                $skip = $limit * $pageNo;
                $query = $query->skip($skip)->limit($limit);
            }
            $getCompany = $query->orderBy('id', 'DESC')->get();
            if (count($getCompany) > 0) {
                return $this->sendResponse(["annual_reports" => $getCompany, 'count' => $count], 'Data fetch successfully');
            } else {
                return $this->sendResponse([], 'No client are available', false);
            }
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function deleteAnnualReportsById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:annual_reports,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $deleteAnnualReports = AnnualReports::query()
            ->where('id', $request->id)->first();
            $deleteAnnualReports->delete();
            return $this->sendResponse([],'AnnualReports deleted successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function getAnnualReportsById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:annual_reports,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $getAnnualReports = AnnualReports::query()->where('id', $request->id)->first();
            return $this->sendResponse(['annual_reports'=>$getAnnualReports], 'Data fetch successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

}