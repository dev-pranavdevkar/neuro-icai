<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function digitalIdCard(){
        return view('frontend.profile.digitalIdCard');
    }
    public function editProfile(){
        return view('frontend.profile.editProfile');
    }
    public function changePassword(){
        return view('frontend.profile.changePassword');
    }
}
