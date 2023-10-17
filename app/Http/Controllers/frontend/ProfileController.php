<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventDetails;
use App\Models\EventRegistration;
use Auth;

class ProfileController extends Controller
{
    public function digitalIdCard()
    {
        return view('frontend.profile.digitalIdCard');
    }
    public function editProfile()
    {
        return view('frontend.profile.editProfile');
    }
    public function changePassword()
    {
        return view('frontend.profile.changePassword');
    }

    public function dashboard(Request $request)
    {
        $idCardData = null;
        $alreadyRegistered = null;
    
        if ($request->has('idCard')) {
            $idCardData = User::find($request->idCard);
        }
    
        $eventDetails = EventDetails::with([])->paginate(3);
    
        if (Auth::user()) {
            $user = Auth::user();
    
            $alreadyRegistered = EventRegistration::where('user_id', $user->id)
                ->where('payment_status', 'like', 'paid')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
    
        return view('frontend.profile.dashboard', compact('idCardData', 'eventDetails', 'alreadyRegistered'));
    }
    
}
