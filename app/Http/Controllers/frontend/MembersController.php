<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetterDetails;

use App\Models\MembersMeeting;
class MembersController extends Controller
{
    public function exposureDrafts()
    {
        return view('frontend.members.exposureDrafts');
    }
    
    public function managingCommitteeMinutes()
    {
        $meetings = MembersMeeting::with([])->paginate(12);
        return view('frontend.members.managingCommitteeMinutes',compact('meetings'));
    }
    public function puneMembersNewsletter()
    {
        $newsLetterDetails = NewsLetterDetails::with([])->paginate(4);
        return view('frontend.members.puneMembersNewsletter', compact( 'newsLetterDetails'));
    }

    public function updatesForMembers()
    {
        return view('frontend.members.updates.updatesForMembers');
    }
    public function subscribeForSMSAlerts()
    {
        return view('frontend.members.subscribeForSMSAlerts');
    }
    public function updatesDetails()
    {
        return view('frontend.members.updates.updatesDetails');
    }

    public function membersFAQ()
    {
        return view('frontend.members.membersFAQ');
    }

    public function CPEStudyCircles()
    {
        return view('frontend.members.CPEStudyCircles');
    }


  
}
