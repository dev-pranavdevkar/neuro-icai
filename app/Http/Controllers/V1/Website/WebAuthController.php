<?php

namespace App\Http\Controllers\V1\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use JWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\V1\Website\Role;
use App\Models\User;
use Spatie\Permission\Models\Role;

use App\Models\EventDetails;
use App\Models\EventImages;
use App\Models\EventPresentationPdf;
use App\Models\EventPresentationVideo;
use App\Models\NewsLetterDetails;
use App\Models\StudentNoticeBoard;
use App\Models\VacancyDetails;
use App\Models\AssociationDetails;
use App\Models\OffersAssociation;
class WebAuthController extends Controller
{



    public function registerUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                // Add other validation rules as needed
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if ($request->role == 'SuperAdmin') {
                return $this->sendResponse([], 'Sorry you can\'t be super admin. It\'s our property', true);
            }

            $newUser = new User();
            $newUser->password = Hash::make($request['password']);
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->last_name = $request->last_name;
            $newUser->date_of_birth = $request->date_of_birth;
            $newUser->mobile_no = $request->mobile_no;
            $newUser->otp = $request->otp;

            // Assign roles based on user's role value
            $assignedRoles = [];


            $role = Role::query()->where('name', $request->role)->first();
            $newUser->assignRole($role);
            $newUser->save();

            $userRoles = $newUser->roles->pluck('name');
            $token = JWTAuth::fromUser($newUser);
            $response = ['token' => $token];
            $response['userData'] = $newUser;
            // $response['userRoles'] = $userRoles;
            $response['assignedRoles'] = $assignedRoles;
            // To keep on signUp Page
            return redirect()->route('login.index');
            // return $this->sendResponse($response, 'Registered Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
        }
    }





    public function userLogin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',

            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $user = User::where('email', $request->email)->first();
            if (!is_null($user)) {
                if (Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    $getUser = User::query()->where('email', $request->email)->first();
                    $getUser->save();
                    $token = JWTAuth::fromUser($user);
                    $response = ['token' => $token, 'userData' => $user];
                    // return $this->sendResponse($response, 'Login Success', true);
                    return redirect()->route('dashboard');
                } else {
                    return $this->sendError('Password mismatch', [], 422);
                }
            } else {
                return $this->sendError('User does not exist or user doesn\'t have access', [], true);
            }
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function forgetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('Email Id does Not Exist', [], 403);
            }
            $otp = rand(1000, 9999);
            $user->forget_password_otp = $otp;
            $user->forget_password_timestamp = Carbon::now();
            $user->save();

            $to_name = $user->name;
            $to_email = $user->email;
            // dd($to_email);

            $data = array('otp' => $otp, 'to_name' => $to_name);

            Mail::send('emails.forgetPassword', $data, function ($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)
                    ->subject('Otp For New Password');
                $message->from(env('MAIL_FROM_ADDRESS'), 'MaarsLMS System Mail');
            });
            return $this->sendResponse([], 'Otp Send Successfully', true);
        } catch (Exception $e) {
            return $this->sendError("Something went wrong", [$e->getMessage(), $e->getTrace()], 500);
        }
    }

    public function changeForgetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'otp' => 'required|numeric',
                'new_password' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendError('Email Id does Not Exist', [], 200);
            }


            $to = Carbon::createFromFormat('Y-m-d H:i:s', $user->forget_password_timestamp);
            $from = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());

            $time_diff = $to->diffInMinutes($from);
            if ($time_diff > 5) {
                return $this->sendError('Time Limit Expired', [], 200);
            }

            if ($user->forget_password_otp != $request->otp) {
                return $this->sendError('Invalid Otp ! ', [], 200);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            return $this->sendResponse([], 'Password Changed Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('something Went Wrong', [$e->getMessage()], 413);
        }
    }
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $userOtp = User::where('id', $user->id)->first();

        if (!$userOtp || $userOtp->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 422);
        }

        //         // OTP is valid, you can mark it as verified or proceed with your login/registration logic.
        //         // For example, you might set a verified flag in the users table or generate a JWT token for authentication.

        return response()->json(['message' => 'OTP verified successfully'], true);
    }

    public function dashboard()
    {
        return view('frontend.userSection.dashboard');
    }










    
    // Get ALl Home Page API
    
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
        if ($request->has('event_name')) {
            $query = $query->where('event_name', 'like', '%' . $request->event_name . '%');
        }
        if ($request->has('event_start_date')) {
            $query = $query->where('event_start_date', 'like', '%' . $request->event_start_date . '%');
        }
        if ($request->has('event_fee')) {
            $query = $query->where('event_fee', 'like', '%' . $request->event_fee . '%');
        }
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
            // dd($response);
            $response['count'] = $count;
            
            // return redirect()->route('login.index');
        } else {
            return $this->sendResponse('No Data Available', [], false);
        }
    } catch (Exception $e) {
        return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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
}

