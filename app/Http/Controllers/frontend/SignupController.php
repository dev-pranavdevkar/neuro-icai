<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index(Request $request){
        return view('frontend.signup');
        $successMessage = $request->session()->get('success_message');
        return view('frontend.signup', ['successMessage' => $successMessage]);
    }
    
}
