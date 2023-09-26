<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventDetails;
use App\Models\AssociationDetails;
use App\Models\StudentNoticeBoard;
use App\Models\NewsLetterDetails;
use App\Models\VacancyDetails;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $eventDetails = EventDetails::with([])->paginate(3);
        $associationDetails = AssociationDetails::with([])->paginate(3);
        $studentNoticeBoard = StudentNoticeBoard::with([])->paginate(3);
        $newsLetterDetails = NewsLetterDetails::with([])->paginate(3);
        $vacancyDetails = VacancyDetails::with([])->paginate(3);
        return view('frontend.index', compact('eventDetails', 'associationDetails', 'studentNoticeBoard', 'newsLetterDetails', 'vacancyDetails'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function help()
    {
        return view('frontend.help');
    }
}
