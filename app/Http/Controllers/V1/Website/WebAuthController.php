<?php

namespace App\Http\Controllers\V1\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use JWTAuth;
use App\Models\Company;
use App\Models\LocationDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\V1\Website\Role;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\EventRegistration;
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
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|regex:/^[0-9]{0,255}$/|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'generated_user_id' => 'required|string|max:255|unique:users',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if ($request->role == 'SuperAdmin') {
                return $this->sendResponse([], 'Sorry, you can\'t be a super admin. It\'s our property', true);
            }
            if ($request->role != 'student' && $request->role != 'members') {
                return $this->sendError('Invalid role.', [], 400);
            }
            if ($request->role === 'members') {
                $newCompany = new Company();
                $newCompany->firm_name = $request->firm_name;
                $newCompany->contact_person_name = $request->contact_person_name;
                $newCompany->contact_person_number = $request->contact_person_number;
                $newCompany->address = $request->address;
                $newCompany->pincode = $request->pincode;
                $newCompany->company_email = $request->company_email;
                $newCompany->save();
            }
            $newUser = new User();
            $newUser->password = Hash::make($request['password']);
            $newUser->company_id = isset($newCompany) ? $newCompany->id : null;
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->last_name = $request->last_name;
            $newUser->date_of_birth = $request->date_of_birth;
            $newUser->mobile_no = $request->mobile_no;
            $newUser->otp = $request->otp;
            $newUser->generated_user_id = $request->generated_user_id;
            $role = Role::where('name', $request->role)->first();
            $newUser->assignRole($role);
            $newAddress = new LocationDetails;
            $newAddress->address_line_1 = $request->address_line_1;
            $newAddress->pincode = $request->pincode;
            $newAddress->save();
            $newUser->location_id = $newAddress->id;
            $newUser->save();
            $token = JWTAuth::fromUser($newUser);
            $response = ['token' => $token];
            $response['userData'] = $newUser;
            $response['location_details'] = LocationDetails::query()->where('id', $newUser->location_id)->first();
            return redirect()->route('login');
            return $this->sendResponse($response, 'Registered Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
        }
    }
    // public function userLogin(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'credential' => 'required|string',
    //             'password' => 'required|string|min:6',
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }

    //         $user = User::where(function ($query) use ($request) {
    //             $query->where('email', $request->credential)
    //                 ->orWhere('generated_user_id', $request->credential);
    //         })->first();

    //         if (!is_null($user)) {
    //             if (Hash::check($request->password, $user->password)) {
    //                 $getUser = User::query()->where('email', $user->email)->first();
    //             $location_id = $getUser->location_id;
    //                 $companyId = $getUser->company_id;
    //             $componyDetails=Company::query()->where('id', $companyId)->first();
    //             echo $componyDetails;
    //             $locationDetails = LocationDetails::query()->where('id', $location_id)->first();

    //             $userRoles = $user->getRoleNames();

    //             $token = JWTAuth::fromUser($user);
    //             $response = ['token' => $token];
    //             $userData = $user->toArray();
    //             $userData['location_details'] = $locationDetails;
    //             $userData['company_details'] = $componyDetails;
    //             $response['permissions'] = $user->getAllPermissions();
    //             $response['location_details'] = LocationDetails::query()->where('id', $location_id)->first();
    //             $response['role'] = $user->roles->first();
    //             return $this->sendResponse($response, 'Login Success', true);
    //             }
    //         //         return redirect('/');
    //         //     } else {
    //         //         return redirect()->route('login')
    //         //             ->withErrors(['error' => 'Password mismatch. Please try again.']);
    //         //     }
    //         // } else {
    //         //     return redirect()->route('login')
    //         //         ->withErrors(['error' => 'User does not exist or user doesn\'t have access']);
    //         // }
    //     } 
    // }catch (\Exception $e) {
    //         return redirect()->route('login')
    //             ->withErrors(['error' => 'Something Went Wrong' . $e->getMessage()]);
    //     }
    // }


    public function userLogin(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'credential' => 'required|string',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                // If validation fails, return error response
                return $this->sendError('Validation Error.', $validator->errors());
            }

            // Find user by email or generated_user_id
            $user = User::where(function ($query) use ($request) {
                $query->where('email', $request->credential)
                    ->orWhere('generated_user_id', $request->credential);
            })->first();

            if (!is_null($user)) {
                // Check if the provided password matches the hashed password
                if (Hash::check($request->password, $user->password)) {
                    // Login the user using Laravel Auth
                    Auth::login($user);

                    // Retrieve additional user details
                    $locationDetails = LocationDetails::find($user->location_id);
                    $companyDetails = Company::find($user->company_id);

                    // Generate JWT token
                    $token = JWTAuth::fromUser($user);

                    // Build the response
                    $response = [
                        'token' => $token,
                        'userData' => $user->toArray(),
                        'location_details' => $locationDetails,
                        'company_details' => $companyDetails,
                        'permissions' => $user->getAllPermissions(),
                    ];
                    return redirect('/');
                    // Send a success response
                    // return $this->sendResponse($response, 'Login Success', true);
                } else {
                    // Password mismatch
                    return redirect()->route('login')
                        ->withErrors(['error' => 'Password mismatch. Please try again.']);
                }
            } else {
                // User does not exist or doesn't have access
                return redirect()->route('login')
                    ->withErrors(['error' => 'User does not exist or user doesn\'t have access']);
            }
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->route('login')
                ->withErrors(['error' => 'Something Went Wrong' . $e->getMessage()]);
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
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 500);
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
                ->with(['children', 'location_details', 'event_images', 'event_video', 'event_presntation']);
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
                print_r($data);
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
    public function dashboard(Request $request)
    {
        $idCardData = null;
        if ($request->has('idCard')) {
            $idCardData = User::find($request->idCard);
        }
        return view('frontend.userSection.dashboard', compact('idCardData'));
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
}
