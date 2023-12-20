<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\V1\Website\WebMetaDataController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventDetails;
use App\Models\AssociationDetails;
use App\Models\NewsLetterDetails;
use App\Models\StudentNoticeBoard;
use App\Models\AnnualReports;

class AboutController extends Controller
{
    public function aboutPuneBranch(Request $request)
    {
        // Create an instance of WebMetaDataController
        $webMetaDataController = new WebMetaDataController();

        // Call the getLatestUpdate method to get the JsonResponse
        $jsonResponse = $webMetaDataController->getLatestUpdate($request);

        // Extract the data from the JsonResponse
        $latestUpdate = $jsonResponse->getData();

        // Pass the data to the view
        return view('frontend.about.aboutPuneBranch', compact('latestUpdate'));
    }


    public function annualReports()
    {
        $annualReports = AnnualReports::with([])->paginate(12);
        return view('frontend.about.annualReports', compact('annualReports'));
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
        $eventData = EventDetails::with([])->get();
        $associationData = AssociationDetails::with([])->get();
        $newsletterData = NewsLetterDetails::with([])->get();
        $noticeBoardData = StudentNoticeBoard::with([])->get();
    
        $combinedData = $eventData
            ->concat($associationData)
            ->concat($newsletterData)
            ->concat($noticeBoardData)
            ->sortByDesc('created_at');
    
        // Assuming you want to paginate the combined data as well
        $perPage = 10; // Change this to the desired number of items per page
        $currentPage = request()->get('page', 1); // Get the current page from the request
    
        $pagedData = array_slice($combinedData->all(), ($currentPage - 1) * $perPage, $perPage);
        $combinedData = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($combinedData), $perPage, $currentPage);
    
        return view('frontend.about.updates.updates', compact('combinedData'));
    }
    
    public function updatesDetails()
    {
        return view('frontend.about.updates.updatesDetails');
    }
}
