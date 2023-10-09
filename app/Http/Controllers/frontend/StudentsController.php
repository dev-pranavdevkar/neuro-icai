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

    public function ICITSS()
    {
        return view('frontend.students.ICITSS');
    }
    public function AICITSS()
    {
        return view('frontend.students.AICITSS');
    }
    public function ICITSSOrientationCourse()
    {
        return view('frontend.students.ICITSSOrientationCourse');
    }
    public function advancedICITSSMCSCourse()
    {
        return view('frontend.students.advancedICITSSMCSCourse');
    }
    public function libraryReadingRooms()
    {
        return view('frontend.students.libraryReadingRooms');
    }
    public function studentNoticeboard()
    {
        return view('frontend.students.studentNoticeboard');
    }
    public function studentFAQs()
    {
        return view('frontend.students.studentFAQs');
    }
}
