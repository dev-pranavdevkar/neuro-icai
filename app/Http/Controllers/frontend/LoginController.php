<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('frontend.login');
    }
    public function logout()
    {
        Auth::logout();

        return view('frontend.login');
    }


}
