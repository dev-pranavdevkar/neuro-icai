<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function pastEvents()
    {
        return view('frontend.events.pastEvents');
    }
    
    public function upcommingEvents()
    {
        return view('frontend.events.upcommingEvents');
    }
}
