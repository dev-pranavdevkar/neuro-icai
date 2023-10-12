<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\LocationDetails;
use App\Models\EventPresentationVideo;
use App\Models\EventImages;
use App\Models\EventPresentationPdf;
class EventsController extends Controller
{
    public function pastEvents()
    {
        $eventDetails = EventDetails::with([])->paginate(5);
        return view('frontend.events.pastEvents', compact('eventDetails'));
    }
    
    public function upcommingEvents()
    {
        $eventDetails = EventDetails::with([])->paginate(9);
        return view('frontend.events.upcommingEvents', compact('eventDetails'));
    }

    public function eventDetails($id)
    {
        $locationDetails = LocationDetails::with([])->paginate(9);
        $eventPresentationVideo = EventPresentationVideo::with([])->paginate(9);
        $eventImages = EventImages::with([])->paginate(9);
        $eventPresentationPdf = EventPresentationPdf::with([])->paginate(9);
        
        return view('frontend.events.eventDetails', compact('id', 'locationDetails', 'eventPresentationVideo', 'eventImages', 'eventPresentationPdf'));
    }
    


  
}
