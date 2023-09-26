<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsLetterDetails;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function aboutPuneWICASA()
    {
        return view('frontend.students.aboutPuneWICASA');
    }
    
    public function coachingClasses()
    {
        return view('frontend.students.coachingClasses');
    }
    public function puneWICASANewsletter()
    {
        $newsLetterDetails = NewsLetterDetails::with([])->paginate(12);
        return view('frontend.students.puneWICASANewsletter', compact( 'newsLetterDetails'));
    }

    public function studentsNoticeboard()
    {
        return view('frontend.students.studentsNoticeboard');
    }

    public function subscribeForSMSAlerts()
    {
        return view('frontend.students.subscribeForSMSAlerts');
    }

    public function WICASAManagingCommittee()
    {
        return view('frontend.students.WICASAManagingCommittee');
    }
}
