<?php

namespace App\Http\Controllers\V1\App;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str; // Import the Str facade
use App\Models\LocationDetails;
use Tymon\JWTAuth\Exceptions\JWTException;

class AppAuthController extends Controller
{

    public function editProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:users,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $editUser = User::query()->where('id', $request->id)->first();

            if ($request->has('name')) {
                $editUser->name = $request->name;
            }
            if ($request->has('last_name')) {
                $editUser->last_name = $request->last_name;
            }
            if ($request->has('date_of_birth')) {
                $editUser->date_of_birth = $request->date_of_birth;
            }
            if ($request->has('mobile_no')) {
                $editUser->mobile_no = $request->mobile_no;
            }
            $editUser->save();
            $editAddress = LocationDetails::query()->where('id', $editUser->location_id)->first();

            if ($request->has('address_line_1')) {
                $editAddress->address_line_1 = $request->address_line_1;
            }
            if ($request->has('pincode')) {
                $editAddress->pincode = $request->pincode;
            }
            $editAddress->save();
            return $this->sendResponse([], 'Profile details updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }
    public function userLogin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'credential' => 'required|string',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = User::where(function ($query) use ($request) {
                $query->where('email', $request->credential)
                    ->orWhere('generated_user_id', $request->credential);
            })->first();

            if (!is_null($user)) {
                if (Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    $getUser = User::query()->where('email', $user->email)->first();
                    $location_id = $getUser->location_id;
                    $getUser->save();
                    $token = JWTAuth::fromUser($user);
                    $response = ['token' => $token];
                    $response['userData'] = $user;
                    $response['permissions'] = $user->getAllPermissions();
                    $response['location_details'] = LocationDetails::query()->where('id', $location_id)->first();
                    //  $response['role'] = $user->roles->first();
                    return $this->sendResponse($response, 'Login Success', true);
                } else {
                    return $this->sendError('Password mismatch', [], 422);
                }
            } else {
                return $this->sendError('User not found', [], 404);
            }
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getMessage(), 413);
        }
    }

    public function registerUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if ($request->role == 'SuperAdmin') {
                return $this->sendResponse([], 'Sorry you can\'t be super admin. It\'s our property', true);
            }
            if ($request->role != 'student' && $request->role != 'members') {
                return $this->sendError('Invalid role.', [], 400);
            }
            $newCompany = new Company();
            $newCompany->firm_name = $request->firm_name;
            $newCompany->contact_person_name = $request->contact_person_name;
            $newCompany->contact_person_number = $request->contact_person_number;
            $newCompany->address = $request->address;
            $newCompany->pincode = $request->pincode;
            $newCompany->save();
            $newUser = new User();
            $newUser->password = Hash::make($request['password']);
            $newUser->company_id = $newCompany->id;
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
            return $this->sendResponse($response, 'Registered Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
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
                return $this->sendError('Email Id does Not Exist', [], true);
            }
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $user->forget_password_timestamp);
            $from = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());

            $time_diff = $to->diffInMinutes($from);
            if ($time_diff > 5) {
                return $this->sendError('Time Limit Expired', [], true);
            }
            if ($user->forget_password_otp != $request->otp) {
                return $this->sendError('Invalid Otp ! ', [], true);
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

        // OTP is valid, you can mark it as verified or proceed with your login/registration logic.
        // For example, you might set a verified flag in the users table or generate a JWT token for authentication.

        return response()->json(['message' => 'OTP verified successfully'], true);
    }
}
