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
    public function pastEvents($filter = 'past')
    {
        try {
            $eventDetails = EventDetails::query();
    
            if ($filter === 'past') {
                $eventDetails->where('event_start_date', '<', now());
            }
    
            $eventDetails = $eventDetails->orderBy('created_at', 'desc')->paginate(5);
    
            return view('frontend.events.pastEvents', compact('eventDetails'));
        } catch (Exception $e) {
            // Handle exceptions as needed
            return redirect()->back()->with('error', 'Error fetching past events.');
        }
    }
    


    public function upcommingEvents($filter = 'upcoming')
    {
        try {
            $eventDetails = EventDetails::query();

            if ($filter === 'upcoming') {
                $eventDetails->where('event_start_date', '>', now());
            }

            $eventDetails = $eventDetails->with([])->paginate(9);

            return view('frontend.events.upcommingEvents', compact('eventDetails'));
        } catch (Exception $e) {
            // Handle exceptions as needed
            return redirect()->back()->with('error', 'Error fetching upcoming events.');
        }
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
