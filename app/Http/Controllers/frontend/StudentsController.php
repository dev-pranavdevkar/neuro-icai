<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use App\Models\NewsLetterDetails;
use Illuminate\Http\Request;
use App\Models\StudentNoticeBoard;
use App\Models\StudentBatches;
use App\Models\LocationDetails;
use Illuminate\Support\Facades\Validator;
use Auth;
use Razorpay\Api\Api;
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
        return view('frontend.students.puneWICASANewsletter', compact('newsLetterDetails'));
    }

    public function studentsNoticeboard()
    {
        $studentNoticeBoard = StudentNoticeBoard::with([])->paginate(10);
        return view('frontend.students.studentsNoticeboard', compact('studentNoticeBoard'));
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

    public function batch()
    {
        $batchs = StudentBatches::with([])->paginate(3);
        return view('frontend.students.batch', compact('batchs'));
    }

    public function batchDetails(Request $request, $id)
    {
        $batchDetails = StudentBatches::with(['location_details'])->find($id);
        $user = Auth::user();
    
        $alreadyRegistered = EventRegistration::where('student_batche_id', $id)
        ->where('user_id', $user->id)
        ->where(function ($query) {
            $query->where('payment_status', 'like', 'paid')
                ->orWhereNull('payment_status');
        })
        ->orderBy('id', 'DESC')
        ->first();
    
    // dd($alreadyRegistered); // Check if $alreadyRegistered is retrieved
    
    
    
        return view('frontend.students.batchDetails', compact(['batchDetails','alreadyRegistered']));
    }
    
    
    



    public function batchRegister(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'student_batche_id' => 'required|integer|exists:student_batches,id',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $batchDetails = StudentBatches::find($request->student_batche_id);
            $user = Auth::user()->id;
            $batchRegistration = EventRegistration::where('student_batche_id', $request->student_batche_id)->where('user_id', $user)
                ->where('payment_status', 'like', "paid")->first();
            if (!is_null($batchRegistration)) {
                return $this->sendResponse([], 'You are already registered to this batch', false);
            }
            $isStudent = false;
            if (in_array('Student', Auth::user()->roles->pluck('name')->toArray())) {
                $isStudent = true;
            } else if (in_array('students', Auth::user()->roles->pluck('name')->toArray())) {
                $isStudent = false;
            }
            $totalAmount = $isStudent ? $batchDetails->fees : $batchDetails->fees;
            $newBatchRegistration = new EventRegistration();
            $newBatchRegistration->student_batche_id = $request->student_batche_id;
            $newBatchRegistration->user_id = $user;
            $newBatchRegistration->gst_no = null;
            $newBatchRegistration->legal_name = null;
            $newBatchRegistration->attendance_status = null;
            $newBatchRegistration->event_price = $totalAmount;
            // $newBatchRegistration->total_amount = $totalAmount;
            $newBatchRegistration->save();
            if ($newBatchRegistration->save()) {
                $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
                $orderDetails = $api->order->create(array(
                    'receipt' => 'Inv-' . $newBatchRegistration->id,
                    'amount' => intval($newBatchRegistration->event_price) * 100, 'currency' => 'INR', 'notes' => array()
                ));
                $newBatchRegistration->razorpay_id = $orderDetails->id;
                $newBatchRegistration->save();
                $response = [];
                $response['system_order_id'] = $newBatchRegistration->id;
                $response['razorpay_order_id'] = $newBatchRegistration->razorpay_id;
                $response['razorpay_api_key'] = env('R_API_KEY');
                return $this->sendResponse($response, 'Payment Initiated Successfully', true);
            } else {
                return $this->sendResponse([], 'Payment Cannot Be Initiated', false);
            }
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong', $e->getMessage(), 413);
        }
    }
    public function checkOrderRazorpayPaymentStatusforBatch(Request $request)
    {
        try {
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'system_order_id' => 'required|numeric',
                'razorpay_order_id' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $payment = BatchRegistration::where('razorpay_id', $request->razorpay_order_id)->find($request->system_order_id);
            if (is_null($payment)) {
                return $this->sendResponse([], 'Wrong Payment Id', false);
            }
            if ($payment->payment_status == "paid") {
                return $this->sendResponse([], 'Payment Already Done', false);
            }
            $api = new Api(env('R_API_KEY'), env('R_API_SECRET'));
            $razorpay_order = $api->order->fetch($request->razorpay_order_id);
            if ($razorpay_order->status == 'paid' || true) {
                $payment->payment_status = "paid";
                $payment->save();
            } else {
                $payment->payment_status = "unpaid";
                $payment->save();
                return $this->sendResponse([], 'Payment Pending', false);
            }
            return $this->sendResponse([], 'Batch registration successfully', false);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }   
}
