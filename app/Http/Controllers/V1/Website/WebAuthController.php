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
class WebAuthController extends Controller
{

    // public function registerUser(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255|unique:users',
    //             'password' => 'required|string|min:6|confirmed',

    //         ]);
    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }
    //         if ($request->role == 'SuperAdmin') {
    //             return $this->sendResponse([], 'Sorry you can\'t be super admin.It\'s our property', true);
    //         }

    //         $newUser = new User();
    //         $newUser->password = Hash::make($request['password']);
    //         $newUser->name = $request->name;
    //         $newUser->email = $request->email;
    //         $newUser->last_name = $request->last_name;
    //         $newUser->date_of_birth = $request->date_of_birth;
    //         $newUser->mobile_no = $request->mobile_no;
    //         $newUser->otp = $request->otp;
    //         // $newUser->last_login_at = Carbon::now();

    //         $role = Role::where('name', $request->role)->first();
    //         $user = User::find(1);
    //          $studentRole = Role::where('name', 'student')->first();
    //         $adminRole = Role::where('name', 'admin')->first();
    //         $memberRole=Role::where('name','members')->first();
    //         // Assign roles to the user
    //          $newUser->assignRole($studentRole); // Assign student role
    //         $newUser->assignRole($adminRole);
    //          $newUser->assignRole($memberRole);
    //         $newUser->assignRole($Role);
    //         $newUser->save();
    //         $token = JWTAuth::fromUser($newUser);
    //         $response = ['token' => $token];
    //         $response['userData'] = $newUser;
    //         return $this->sendResponse($response, 'Registered Successfully', true);
    //     } catch (Exception $e) {
    //         return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
    //     }
    // }

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
            // if ($request->role == 'members') {
            //     $membersRole = Role::where('name', 'members')->first();
            //     if ($membersRole) {
            //         $newUser->assignRole($membersRole);
            //         $assignedRoles[] = 'members';
            //     }
            // }
            // if ($request->role == 'student') {
            //     $studentRole = Role::where('name', 'student')->first();
            //     if ($studentRole) {
            //         $newUser->assignRole($studentRole);
            //         $assignedRoles[] = 'student';
            //     }
            // }
            // if ($request->role == 'admin') {
            //     $adminRole = Role::where('name', 'admin')->first();
            //     if ($adminRole) {
            //         $newUser->assignRole($adminRole);
            //         $assignedRoles[] = 'admin';
            //     }
            // }

                $role=Role::query()->where('name',$request->role)->first();
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
                    return $this->sendResponse($response, 'Login Success', true);
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
        try{
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

            $data = array('otp' => $otp,'to_name' => $to_name);

            Mail::send('emails.forgetPassword', $data, function ($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)
                    ->subject('Otp For New Password');
                $message->from(env('MAIL_FROM_ADDRESS'), 'MaarsLMS System Mail');

            });
             return $this->sendResponse([], 'Otp Send Successfully', true);

        }catch(Exception $e){
            return $this->sendError("Something went wrong",[$e->getMessage(),$e->getTrace()],500);
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





}
