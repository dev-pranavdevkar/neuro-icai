<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPuneBranch()
    {
        return view('frontend.about.aboutPuneBranch');
    }
    
    public function annualReports()
    {
        return view('frontend.about.annualReports');
    }
    public function chairmanCommunique()
    {
        return view('frontend.about.chairmanCommunique');
    }

    public function managingCommittee()
    {
        return view('frontend.about.managingCommittee');
    }

    public function pastChairmen()
    {
        return view('frontend.about.pastChairmen');
    }

    public function studyCirclesPune()
    {
        return view('frontend.about.studyCirclesPune');
    }

    public function subCommittees()
    {
        return view('frontend.about.subCommittees');
    }

    public function successStories()
    {
        return view('frontend.about.successStories');
    }

    public function torchBearer()
    {
        return view('frontend.about.torchBearer');
    }

    public function updates()
    {
        return view('frontend.about.updates.updates');
    }
    public function updatesDetails()
    {
        return view('frontend.about.updates.updatesDetails');
    }
}
