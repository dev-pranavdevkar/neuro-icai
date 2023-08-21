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
use Intervention\Image\ImageManagerStatic as Image;

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


            $query = Banner::query(); // Replace "ModelName" with your actual model name
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
                'id' => 'required|integer|exists:table_banner,id',
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
                'address_line_1' => 'required|nullable|string|max:255',
                'address_line_2' => 'required|nullable|string|max:255',
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


            $query = LocationDetails::query(); // Replace "ModelName" with your actual model name
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

    public function addEventDetails(Request $request): \Illuminate\Http\JsonResponse
    {

        try {
            $validator = Validator::make($request->all(), [
                'event_name' => 'required|string|max:255',
                'event_description' => 'nullable|string|max:255',
                'event_start_date' => 'required|date',
                'event_end_date' => 'required|date',
                'event_cut_off_date' => 'required|date',
                'event_fee' => 'required',
                'price_for_students' => 'required',
                'price_for_members' => 'required',
                // 'location_id' => 'required|integer|exists:location_details,id',
                // 'broacher_pdf' => 'required',
                'images.*'=>'array',
                'images.*.event_images'=>'string',
                'presentationvedio.*'=>'array',
                'presentationvedio.*.video_link'=>'string',
                'presentationpdf.*'=>'array',
                'presentationpdf.*.presentation_pdf'=>'string',
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
            $newEventDetails = new EventDetails();
            $newEventDetails->location_id=$NewLocationDetails->id;
            $newEventDetails->event_name=$request->event_name;
            $newEventDetails->event_description=$request->event_description;
            $newEventDetails->event_start_date=$request->event_start_date;
            $newEventDetails->event_end_date=$request->event_end_date;
            $newEventDetails->event_cut_off_date=$request->event_cut_off_date;
            $newEventDetails->event_fee=$request->event_fee;
            $newEventDetails->price_for_members=$request->price_for_members;
            $newEventDetails->price_for_students=$request->price_for_students;
            // $newEventDetails->event_name=$request->event_name;
            // $newEventDetails->event_name=$request->event_name;



            // if ($request->broacher_pdf != "") {
            //     if (!str_contains($request->broacher_pdf, "http")) {
            //         $newEventDetails->broacher_pdf = $this->saveBroacherPdf($request->broacher_pdf,$request->event_name);
            //     }
            // }

            $newEventDetails->save();

            // $eachPresentation=$request->video_link;
            foreach($request->video_link as $eachPresentation){
                $newPresentationVideo = new EventPresentationVideo();
                $newPresentationVideo->event_id=$newEventDetails->id;
                if ($request->video_link != "") {
                    if (!str_contains($eachPresentation, "http")) {
                        $newPresentationVideo->video_link = $this->saveEventPresentationVideo($eachPresentation);
                    }
                }
                $newPresentationVideo->save();

            }



                // dd($request->all());
            // $eachimages=$request->event_images;
        foreach($request->event_images as $eachimages){
            $newEventImages = new EventImages();
            $newEventImages->event_id=$newEventDetails->id;
            if ($request->event_images != "") {
                if (!str_contains($eachimages, "http")) {
                    $newEventImages->event_images = $this->saveEventImage($eachimages);
                }
            }
            $newEventImages->save();

        }

        foreach($request->presentation_pdf as $eachPdf){
            $newEventPdf=new EventPresentationPdf();
            $newEventPdf->event_id=$newEventDetails->id;
            if($request->presentation_pdf!=""){
                if(!str_contains($eachPdf,"http"))
                {
                    $newEventPdf->presentation_pdf=$this->saveEventPresentationPdf($eachPdf);
                }
            }
            $newEventPdf->save();
        }





            return $this->sendResponse([], 'Event Details added successfully', true);
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
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors(), 400);
            }

            // $query = LocationDetails::query();
            $query = EventDetails::query()->with(['location_details']); // Replace "ModelName" with your actual model name
            if ($request->has('filter')) {
                $filter = $request->filter;

                if ($filter === 'upcoming') {
                    $query = $query->where('event_end_date', '>', date('Y-m-d'));
                } elseif ($filter === 'past') {
                    $query = $query->where('event_end_date', '<', date('Y-m-d'));
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
                    $user['event_presentation_video'] = $product;
                }
            }
            foreach ($data as $user) {
                if ($user['id'] != null) {
                    $product = EventImages::query()->where('event_id', $user['id'])->get();
                    $user['event_images'] = $product;
                }
            }
            foreach ($data as $user) {
                if ($user['id'] != null) {
                    $product = EventPresentationPdf::query()->where('event_id', $user['id'])->get();
                    $user['event_presentation_pdf'] = $product;
                }
            }
            if (count($data) > 0) {
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


    // public function getAllEventDetails(Request $request)
    // {

    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'pageNo' => 'numeric',
    //             'limit' => 'numeric',
    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors(), 400);
    //         }


    //         $query = EventDetails::query()->with(['location_details']); // Replace "ModelName" with your actual model name
    //         $count = $query->count();

    //         if ($request->has('pageNo') && $request->has('limit')) {
    //             $limit = $request->limit;
    //             $pageNo = $request->pageNo;
    //             $skip = $limit * $pageNo;
    //             $query = $query->skip($skip)->limit($limit);
    //         }
    //         $data = $query->orderBy('id', 'DESC')->get();
    //         if (count($data) > 0) {
    //             $response['EventDetails'] = $data;
    //             $response['count'] = $count;
    //             return $this->sendResponse($response, 'Data Fetched Successfully', true);
    //         } else {
    //             return $this->sendResponse('No Data Available', [], false);
    //         }
    //     } catch (Exception $e) {
    //         return $this->sendError($e->getMessage(), $e->getTrace(), 500);
    //     }

    // }

    public function getEventDetailsById(Request $request):  \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:event_details,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }


            $getitems = EventDetails::query()->where('id', $request->id)->with(['location_details'])->first();

            $getPresentationVideo = EventPresentationVideo::query()->where ('event_id',$request->id)->get();
            $eventImages = EventImages::query()->where('event_id', $request->id)->get();
            $getPresentationPdf = EventPresentationPdf::query()->where('event_id', $request->id)->get();

            // $product = EventImages::query()->where ('event_id',$request->id)->first();

            // $product = LocationDetails::query()->where ('event_id',$request->id)->get();
            // $getEmp['location_details'] = $product;
            return $this->sendResponse([
                 "event_details" => $getitems,
                 "event_presentation_video"=>$getPresentationVideo,
                 "event_images"=>$eventImages,
                 "event_presentation_pdf"=>$getPresentationPdf,
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
                // 'address_line_1' => 'required|nullable|string|max:255',
                // 'address_line_2' => 'required|nullable|string|max:255',
                // 'city' => 'required|nullable|string|max:255',
                // 'state' => 'required|nullable|string|max:255',
                // 'country' => 'required|nullable|string|max:255',
                // 'pincode' => 'required|nullable|string|max:255',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }


            $editEventDetails = EventDetails::query()->where('id', $request->id)->first();

            if ($request->has('event_name')) {
                $editEventDetails->event_name=$request->event_name;
            }   if ($request->has('event_description')) {
                $editEventDetails->event_description=$request->event_description;
            }   if ($request->has('event_start_date')) {
                $editEventDetails->event_start_date=$request->event_start_date;
            }   if ($request->has('event_end_date')) {
                $editEventDetails->event_end_date=$request->event_end_date;
            }   if ($request->has('event_cut_off_date')) {
                $editEventDetails->event_cut_off_date=$request->event_cut_off_date;
            }   if ($request->has('event_fee')) {
                $editEventDetails->event_fee=$request->event_fee;
            }   if ($request->has('price_for_students')) {
                $editEventDetails->price_for_students=$request->price_for_students;
            }   if ($request->has('price_for_members')) {
                $editEventDetails->price_for_members=$request->price_for_members;
            }

            if ($request->broacher_pdf != "") {
                if (!str_contains($request->broacher_pdf, "http")) {
                    $editEventDetails->broacher_pdf = $this->saveSignImage($request->broacher_pdf, $request->joining_date);
                }
            }
            $editEventDetails->save();
             $editLocation = LocationDetails::query()->where('id', $editEventDetails->location_id)->first();

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

                    // $eachPresentation=$request->video_link;
            foreach($request->video_link as $eachPresentation){
                $editPresentationVideo = new EventPresentationVideo();
                $editPresentationVideo->event_id=$editEventDetails->id;
                if ($request->video_link != "") {
                    if (!str_contains($eachPresentation, "http")) {
                        $editPresentationVideo->video_link = $this->saveEventPresentationVideo($eachPresentation);
                    }
                }
                $editPresentationVideo->save();

            }



                // dd($request->all());
            // $eachimages=$request->event_images;
        foreach($request->event_images as $eachimages){
            $editEventImages = new EventImages();
            $editEventImages->event_id=$editEventDetails->id;
            if ($request->event_images != "") {
                if (!str_contains($eachimages, "http")) {
                    $editEventImages->event_images = $this->saveEventImage($eachimages);
                }
            }
            $editEventImages->save();

        }

        foreach($request->presentation_pdf as $eachPdf){
            $editEventPdf=new EventPresentationPdf();
            $editEventPdf->event_id=$editEventDetails->id;
            if($request->presentation_pdf!=""){
                if(!str_contains($eachPdf,"http"))
                {
                    $editEventPdf->presentation_pdf=$this->saveEventPresentationPdf($eachPdf);
                }
            }
            $editEventPdf->save();
        }

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
                $newOffer->offers = $eachoffers['offers']; // No need for ['offers']
                $newOffer->discount = $eachoffers['discount']; // No need for ['discount']
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


            $query = AssociationDetails::query()->with(['location_details']); // Replace "ModelName" with your actual model name
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
                    $user['offers_of_association'] = $product;
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
            }   if ($request->has('company_email')) {
                $editAssociationDetails->company_email=$request->company_email;
            }   if ($request->has('start_date')) {
                $editAssociationDetails->start_date=$request->start_date;
            }   if ($request->has('end_date')) {
                $editAssociationDetails->end_date=$request->end_date;
            }   if ($request->has('mobile_no')) {
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
                ->where('association_id', $editAssociationDetails->id)
                // ->where('association_id', $eachoffers->id)
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

            // $query = RegisterToAssocitationDetails::query()->where('association_id', $request->association_id)->get();
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
                // 'for_newsletter' => 'required',
                'upload_newsletter_pdf'=>'required',
                'uploaded_date' => 'required|date',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newNewsLetterDetails = new NewsLetterDetails();
            $newNewsLetterDetails->for_newsletter='Student';
            $newNewsLetterDetails->uploaded_date=$request->uploaded_date;

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
                // 'for_newsletter' => 'required',
                'upload_newsletter_pdf'=>'required',
                'uploaded_date' => 'required|date',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newNewsLetterDetails = new NewsLetterDetails();
            $newNewsLetterDetails->for_newsletter='Members';
            $newNewsLetterDetails->uploaded_date=$request->uploaded_date;

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


            $query = NewsLetterDetails::query()->where('for_newsletter', 'student'); // Replace "ModelName" with your actual model name
            // if ($request->has('userType')) {
            //     $userType = $request->userType;

            //     if ($userType == 'student') {
            //         $query->where('for_newsletter', 'student');
            //     }
            //     // elseif ($userType === 'member') {
            //     //     $query->where('for_newsletter', 'member');
            //     // }
            // }
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
            }   if ($request->has('uploaded_date')) {
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
            }   if ($request->has('uploaded_date')) {
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
            return $this->sendResponse([], 'NewsLetter Details deleted successfully', true);
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


            $query = VoluntaryContribution::query(); // Replace "ModelName" with your actual model name
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
            }   if ($request->has('available_place')) {
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


            $query = PaymentMode::query(); // Replace "ModelName" with your actual model name
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
                'ca_firm_name' => 'required',
                'position'=>'required',
                'position' => [ Rule::in(['Semi Qualified','Article Assistant','Industrial Trainee','Qualified'])],
                'comments' => 'required',
                'company_email' => 'required',
                'company_contact_no' => 'required',
                'experience' => 'required',
                // 'location_id' => 'required',
                // 'created_by_vacancy_user_id' => 'required',
                // 'created_by' => 'required',
                'expiry_date' => 'required|date',
                'address_line_1' => 'required|nullable|string|max:255',
                'address_line_2' => 'required|nullable|string|max:255',
                'city' => 'required|nullable|string|max:255',
                'state' => 'required|nullable|string|max:255',
                'country' => 'required|nullable|string|max:255',
                'pincode' => 'required|nullable|string|max:255',


            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            // $user=Auth::User->id();
             $NewLocationDetails = new LocationDetails();
                $NewLocationDetails->address_line_1=$request->address_line_1;
                $NewLocationDetails->address_line_2=$request->address_line_2;
                $NewLocationDetails->city=$request->city;
                $NewLocationDetails->state=$request->state;
                $NewLocationDetails->country=$request->country;
                $NewLocationDetails->pincode=$request->pincode;
                $NewLocationDetails->save();
            $newVacancy = new VacancyDetails();
            $newVacancy->location_id=$NewLocationDetails->id;
            $newVacancy->ca_firm_name=$request->ca_firm_name;
            $newVacancy->position=$request->position;
            $newVacancy->comments=$request->comments;
            $newVacancy->company_email=$request->company_email;
            $newVacancy->company_contact_no=$request->company_contact_no;
            $newVacancy->experience=$request->experience;
            // $newVacancy->location_id=$request->location_id;
            // $newVacancy->created_by_vacancy_user_id=$user;
            $newVacancy->created_by = $request->created_by;
		$newVacancy->expiry_date = $request->expiry_date;
            $newVacancy->save();
            return $this->sendResponse([], 'Vacancy Details added successfully', true);
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

            if ($request->has('ca_firm_name')) {
                $editVacancy->ca_firm_name=$request->ca_firm_name;
            }  if ($request->has('position')) {
                $editVacancy->position=$request->position;
            }if ($request->has('comments')) {
                $editVacancy->comments=$request->comments;
            }if ($request->has('company_email')) {
                $editVacancy->company_email=$request->company_email;
            }if ($request->has('company_contact_no')) {
                $editVacancy->company_contact_no=$request->company_contact_no;
            }if ($request->has('experience')) {
                $editVacancy->experience=$request->experience;
            }
            // if ($request->has('location_id')) {
            //     $editVacancy->location_id=$request->location_id;
            // }
            // if ($request->has('created_by_vacancy_user_id')) {
            //     $editVacancy->created_by_vacancy_user_id=$request->created_by_vacancy_user_id;
            // }
            // if($request->has('created_by')){
			// 	$editVacancy->created_by = $request->created_by;
			// }
			if($request->has('expiry_date')){
				$editVacancy->expiry_date = $request->expiry_date;
			}
            // echo $editVacancy;

            $editVacancy->save();
            // echo $editVacancy;
            $editLocation = LocationDetails::query()->where('id', $editVacancy->location_id)->first();
            // echo $editLocation;
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

    public function addEventRegistration(Request $request): \Illuminate\Http\JsonResponse
    {

        try {
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer|exists:event_details,id',
                'user_id'=>'required|integer|exists:users,id',
                // 'payment_mode_id' => 'required|integer|exists:payment_mode,id',
                'voluntary_contribution_id' => 'required|integer|exists:voluntary_contribution,id',
                'payment_status' => 'required',
                'gst_no' => 'required',
                'legal_name' => 'required',
                'voluntary_donation_amount' => 'required|nullable',
                'event_price' => 'required|nullable',
                'total_amount' => 'required|nullable',


            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $newVacancy = new EventRegistration();
            $newVacancy->event_id=$request->event_id;
            $newVacancy->user_id=$request->user_id;
            // $newVacancy->payment_mode_id=$request->payment_mode_id;
            $newVacancy->voluntary_contribution_id=$request->voluntary_contribution_id;
            $newVacancy->payment_status=$request->payment_status;
            $newVacancy->gst_no=$request->gst_no;
            $newVacancy->legal_name=$request->legal_name;
            $newVacancy->attendance_status = $request->attendance_status;
            $newVacancy->voluntary_donation_amount = $request->voluntary_donation_amount;
            $newVacancy->event_price = $request->event_price;
            $newVacancy->total_amount = $request->total_amount;
            $newVacancy->save();
            return $this->sendResponse([], 'event registration successfully', true);
        }
        catch (Exception $e) {
            return $this->sendError('Something went wrong', $e->getTrace(), 413);
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


            $query = EventRegistration::query()->with(['event_details','user_details','paymentmode_details','voluntary_contribution_details']); // Replace "ModelName" with your actual model name
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
            }  if ($request->has('position')) {
                $editVacancy->position=$request->position;
            }if ($request->has('user_id')) {
                $editVacancy->user_id=$request->user_id;
            }if ($request->has('voluntary_contribution_id')) {
                $editVacancy->voluntary_contribution_id=$request->voluntary_contribution_id;
            }if ($request->has('payment_status')) {
                $editVacancy->payment_status=$request->payment_status;
            }if ($request->has('gst_no')) {
                $editVacancy->gst_no=$request->gst_no;
            }if ($request->has('legal_name')) {
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
            return $this->sendResponse([], 'event registration updated successfully');
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
            return $this->sendResponse([], 'Event Registration deleted successfully', true);
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

            return $this->sendResponse([], 'RegisterToAssocitationDetails Created Successfully.', true);
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
		$query = RegisterToAssocitationDetails::query()->with(['user_details','association_details','created_by_user_details','offers_association_details']);;
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
			return $this->sendResponse($response,'Data Fetched Successfully', true);
		}else{
			return $this->sendResponse('No Data Available', [],false);
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
			return $this->sendResponse([],'RegisterToAssocitationDetails updated');
		}else{
			return $this->sendResponse([],'No RegisterToAssocitationDetails found', false);
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

                  return $this->sendResponse([],'Apply for Job Successfully.', true);

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
			return $this->sendResponse($response,'Data Fetched Successfully', true);
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

          // $query = RegisterToAssocitationDetails::query()->where('vacancy_id', $request->vacancy_id)->get();
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
          $newDetails = new OffersAssociation;
      $newDetails->offers = $request->offers;
      $newDetails->discount = $request->discount;
      $newDetails->association_id=$request->association_id;
      $newDetails->is_active=$request->is_active;

      $newDetails->save();

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
				return $this->sendResponse([],'Offers To Association  Deleted Successfully', true);
			}else{
				return $this->sendResponse([],'Offers To Association  Deletion Failed', false);
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

          'title' => 'required|nullable',
          'type' => 'required|nullable',
            'notice_board_pdf'=>'required|nullable',
            'notice_board_logo'=>'required|nullable'

          ]);
          if ($validator->fails()) {
              return $this->sendError('Validation Error.', $validator->errors());
          }
          $newDetails = new StudentNoticeBoard;

          $newDetails->title=$request->title;
          $newDetails->type=$request->type;
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
            $editItems->type = $request->type;
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

}

