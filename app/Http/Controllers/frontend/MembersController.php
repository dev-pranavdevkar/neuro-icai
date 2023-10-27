<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetterDetails;
use App\models\StudentNoticeBoard;
use App\Models\MembersMeeting;
use App\Models\AssociationDetails;
use App\Models\LocationDetails;
use App\Models\OffersAssociation;
use QrCode;
use Auth;

class MembersController extends Controller
{
    public function exposureDrafts()
    {
        return view('frontend.members.exposureDrafts');
    }

    public function managingCommitteeMinutes()
    {
        $meetings = MembersMeeting::with([])->paginate(12);
        return view('frontend.members.managingCommitteeMinutes', compact('meetings'));
    }
    public function puneMembersNewsletter()
    {
        $newsLetterDetails = NewsLetterDetails::with([])->paginate(12);
        return view('frontend.members.puneMembersNewsletter', compact('newsLetterDetails'));
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
    public function membersNoticeboard()
    {
        $memberNoticeBoard = StudentNoticeBoard::with([])->paginate(10);
        return view('frontend.members.membersNoticeboard', compact('memberNoticeBoard'));
    }

    public function associations()
    {
        $associations = AssociationDetails::with([])->paginate(10);
        return view('frontend.members.association.associations', compact('associations'));
    }
    public function addAssociations()
    {
        return view('frontend.members.association.addAssociations');
    }

    public function associationDetails($id)
    {
        try {
            $locationDetails = LocationDetails::paginate(9);
            $offers_of_association = OffersAssociation::paginate(9);

            $associationDetails = AssociationDetails::with(['location_details'])->findOrFail($id);

            return view('frontend.members.association.associationDetails', compact('id', 'locationDetails', 'offers_of_association', 'associationDetails'));
        } catch (\Exception $e) {
            // Handle the exception, e.g., log or return an error response.
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }


    public function redeemOfferTicket($id)
    {
        try {
            $offers_of_association = OffersAssociation::findOrFail($id);

            $qrOfferData = null; // Initialize $qrOfferData

            if(Auth::user()){
                $user = Auth::user();
                $qrOfferData = QrCode::size(150)->generate("{$user->id}_{$offers_of_association->id}");
            }

            return view('frontend.members.association.redeemOfferTicket', compact('id', 'offers_of_association', 'qrOfferData'));
        } catch (\Exception $e) {
            // Handle the exception, e.g., log or return an error response.
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }




}
