<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index($eventDetails)
    {
        return view('frontend.index', compact('eventDetails'));

    }
    public function contact(){
        return view('frontend.contact');
    }
    public function help(){
        return view('frontend.help');
    }
}
