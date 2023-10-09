<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventDetails;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function pastEvents()
    {
        $eventDetails = EventDetails::with([])->paginate(3);
        return view('frontend.events.pastEvents', compact('eventDetails'));
    }
    
    public function upcommingEvents()
    {
        $eventDetails = EventDetails::with([])->paginate(3);
        return view('frontend.events.upcommingEvents', compact('eventDetails'));
    }


  
}
