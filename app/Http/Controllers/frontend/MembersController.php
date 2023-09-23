<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function exposureDrafts()
    {
        return view('frontend.members.exposureDrafts');
    }
    
    public function managingCommitteeMinutes()
    {
        return view('frontend.members.managingCommitteeMinutes');
    }
    public function puneMembersNewsletter()
    {
        return view('frontend.members.puneMembersNewsletter');
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

  
}
