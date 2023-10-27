<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use App\Models\EventDetails;
use App\Models\StudentBatches;
use App\Models\LocationDetails;
use App\Models\EventPresentationVideo;
use App\Models\EventImages;
use App\Models\EventPresentationPdf;
use Razorpay\Api\Api;
use Session;
use Exception;


class RazorpayPaymentController extends Controller
{

    public function index()
    {
        // $eventRegistration = EventRegistration::with('eventDetails')->get(); // Assuming you have a relationship named eventDetails
        // return view('frontend.razorpayView', compact('eventRegistration'));
        $eventDetails = EventDetails::with([])->paginate(3);
        $locationDetails = LocationDetails::with([])->paginate(9);
        $eventPresentationVideo = EventPresentationVideo::with([])->paginate(9);
        $eventImages = EventImages::with([])->paginate(9);
        $eventPresentationPdf = EventPresentationPdf::with([])->paginate(9);
        return view('frontend.razorpayView', compact('id', 'locationDetails', 'eventPresentationVideo', 'eventImages', 'eventPresentationPdf'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api("rzp_test_dgP2NOTC5SZRnq", "RwjuyaUZVQ0I4pNYXbd1kjPg");

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }


    public function batchindex()
    {
        // $eventRegistration = EventRegistration::with('eventDetails')->get(); // Assuming you have a relationship named eventDetails
        // return view('frontend.razorpayView', compact('eventRegistration'));
        $batchDetails = StudentBatches::with([])->paginate(3);
        return view('frontend.students.batchDetails', compact('batchDetails'));
    }

    public function batchstore(Request $request)
    {
        $input = $request->all();

        $api = new Api("rzp_test_dgP2NOTC5SZRnq", "RwjuyaUZVQ0I4pNYXbd1kjPg");

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
