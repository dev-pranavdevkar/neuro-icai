<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventDetails;
use App\Models\EventRegistration;
use  App\Models\StudentBatches;
use App\Models\Company;
use App\Models\LocationDetails;
use Auth;


class ProfileController extends Controller
{
    public function digitalIdCard()
    {
        return view('frontend.profile.digitalIdCard');
    }
    public function editProfile()
    {
        if (Auth::user()) {
            $user = Auth::user();

            // Retrieve company details based on the user's company_id
            // $companyDetails = Company::find($user->company_id);
            $locationDetails = null;  // Initialize locationDetails variable
            // Retrieve location details based on the user's location_id
            $locationDetails = LocationDetails::find($user->location_id);
        }
        return view('frontend.profile.editProfile',compact('locationDetails'));
    }
    public function changePassword()
    {
        return view('frontend.profile.changePassword');
    }

    public function dashboard(Request $request)
    {
        $idCardData = null;
        $alreadyRegistered = null;
        $numRegisteredEvents = null;
        $numRegisteredBatches = null;
        $companyDetails = null;
        $locationDetails = null;  // Initialize locationDetails variable
        $batched = null;

        if ($request->has('idCard')) {
            $idCardData = User::find($request->idCard);
        }

        if (Auth::user()) {
            $user = Auth::user();

            // Retrieve company details based on the user's company_id
            $companyDetails = Company::find($user->company_id);

            // Retrieve location details based on the user's location_id
            $locationDetails = LocationDetails::find($user->location_id);

            $alreadyRegistered = EventRegistration::where('user_id', $user->id)
                ->where('payment_status', 'like', 'paid')
                ->whereNotNull('event_id') // Filter by events
                ->with(['event_details', 'batches'])
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], "registredEvents");

            $alreadyBatchRegistered = EventRegistration::where('user_id', $user->id)
                ->where('payment_status', 'like', 'paid')
                ->whereNotNull('student_batche_id') // Filter by events
                ->with(['event_details', 'batches'])
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], "registredEvents");

            // Get the list of event IDs for the user
            $eventIds = $alreadyRegistered->pluck('event_id')->toArray();

            // You can print the event IDs or use them as needed


            $eventDetails = null;
            // echo $eventDetails[0];
            // dd($eventDetails);
            // dd($eventIds);
            $numRegisteredEvents = EventRegistration::where('user_id', $user->id)
                ->where('payment_status', 'like', 'paid')
                ->whereNotNull('event_id') // Filter by events
                ->with(['event_details'])
                ->count();

            $numRegisteredBatches = EventRegistration::where('user_id', $user->id)
                ->where('payment_status', 'like', 'paid')
                ->with(['batches'])
                ->whereNotNull('student_batche_id') // Filter by batches
                ->count();

            $batches = StudentBatches::whereIn('id', function ($query) use ($user) {
                $query->select('student_batche_id')
                    ->from('event_registration')
                    ->where('user_id', $user->id)
                    ->where('payment_status', 'like', 'paid')
                    ->whereNotNull('student_batche_id');
            })
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'registredBatch');
        }

        $studentBatches = StudentBatches::with([])->paginate(3);

        return view('frontend.profile.dashboard', compact('idCardData', 'eventDetails', 'alreadyRegistered', 'numRegisteredEvents', 'numRegisteredBatches', 'companyDetails', 'locationDetails', 'alreadyBatchRegistered'));
    }
}
