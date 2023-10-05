<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use App\Models\EventDetails;
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
        return view('frontend.razorpayView', compact('eventDetails'));
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api("rzp_test_dgP2NOTC5SZRnq", "RwjuyaUZVQ0I4pNYXbd1kjPg");
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }



}
