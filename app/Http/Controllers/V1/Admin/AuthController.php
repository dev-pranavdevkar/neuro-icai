<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
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
use App\Http\Controllers\V1\Admin\Role;

use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
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
                    $response = ['token' => $token];
                    $response['userData'] = $user;
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
                return $this->sendResponse([], 'Sorry you can\'t be super admin.It\'s our property', true);
            }

            $newUser = new User();
            $newUser->password = Hash::make($request['password']);
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->last_name = $request->last_name;
            $newUser->date_of_birth = $request->date_of_birth;
            $newUser->mobile_no = $request->mobile_no;
            $newUser->otp = $request->otp;
            // $newUser->last_login_at = Carbon::now();

            $role = Role::where('name', $request->role)->first();
            $user = User::find(1);

            $newUser->assignRole($role);
            $newUser->save();
            $token = JWTAuth::fromUser($newUser);
            $response = ['token' => $token];
            $response['userData'] = $newUser;
            return $this->sendResponse($response, 'Registered Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
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
    public function UpdateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'nullable',
                'email' => 'nullable',
                'last_name' => 'nullable',
                'mobile_no' => 'nullable',
                'date_of_birth' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user=Auth::user()->id;
          
            $editUser = User::query()->where('id',$user)->first();
            if ($request->has('name')) {
                $editUser->name=$request->name;
            }
            if ($request->has('last_name')) {
                $editUser->last_name=$request->last_name;
            }
            if ($request->has('email')) {
                $editUser->email=$request->email;
            }
            if ($request->has('mobile_no')) {
                $editUser->mobile_no=$request->mobile_no;
            }
            if ($request->has('date_of_birth')) {
                $editUser->date_of_birth=$request->date_of_birth;
            }
           $editUser->save();
            return $this->sendResponse([], 'Profile updated Successfully', true);
        } catch (Exception $e) {
            return $this->sendError('Something Went Wrong', $e->getTrace(), 413);
        }
    }
}
