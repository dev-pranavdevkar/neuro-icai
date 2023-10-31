@extends('frontend.layouts.main')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $batchDetails['batch_name'] }}</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Batchs</a>
                            <span>{{ $batchDetails['batch_name'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->



    <section class="event-page py-5 spad">

    @section('js')
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            $(document).ready(function() {
                console.log("ready!");
            });

            $('#payNow').click(function() {
                console.log('clicked', $(this).data('batch'));
                let body = {
                    student_batche_id: $(this).data('batch')
                }

                // Include CSRF token in AJAX setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `${window.location.protocol}//${window.location.host}/batchRegister`,
                    type: 'post',
                    contentType: 'application/json',
                    data: JSON.stringify(body),
                    success: function(data) {
                        console.log(data);
                        if (!data['success']) {
                            toastr.error(data.message)
                            return
                        }
                        let options = {
                            "key": data.data.razorpay_api_key,
                            "name": "ICAI Pune",
                            "prefill": {
                                "name": "{!! Auth::user()->name !!}",
                                "contact": "{!! Auth::user()->mobile_no !!}",
                                "email": "{!! Auth::user()->email == null ? 'no-reply@icai.in' : Auth::user()->email !!}"
                            },
                            "handler": function(response) {
                                verifyRazorpayPayment(data.data['razorpay_order_id'], data.data
                                    .system_order_id)
                            },
                            "notes": {
                                "merchant_order_id": data.data.system_order_id,

                            },
                            "theme": {
                                "color": "#99cc33"
                            },
                            "order_id": data.data['razorpay_order_id'],
                        }
                        options.theme.image_padding = false;
                        var rzp = new Razorpay(options)
                        console.log("shubham", rzp)
                        rzp.open();
                        rzp.on('payment.failed', function(response) {
                            // alert(response.error.code);
                            // alert(response.error.description);
                            // alert(response.error.source);
                            // alert(response.error.step);
                            // alert(response.error.reason);
                            // alert(response.error.metadata.order_id);
                            // alert(response.error.metadata.payment_id);
                        });
                        // ... (unchanged code) ...
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle errors here
                    }
                });
            })

            function verifyRazorpayPayment(payment_gateway_order_id, system_id) {
                let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
                $.ajaxSetup({
                    headers: {
                        'csrftoken': csrf_token
                    }
                });

                let dataToSend = {};
                dataToSend.url = "{!! route('checkOrderRazorpayPaymentStatusforBatch') !!}";
                dataToSend.requestType = 'POST';
                dataToSend.data = {
                    razorpay_order_id: payment_gateway_order_id,
                    system_order_id: system_id,
                    "_token": csrf_token
                };
                $.ajax({
                    url: dataToSend.url,
                    type: 'post', // or 'POST', 'PUT', etc. depending on your API
                    contentType: 'application/json',
                    data: JSON.stringify(dataToSend.data),
                    success: function(data) {
                        console.log(data);
                        if (data['success']) {
                            toastr.success('You have registered successfully. Please go to my Batches section.');
                        }
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error(data.message)
                        // Handle errors here
                    }


                })
            }
        </script>
    @endsection
    <div class="container">

        <div class="row">


            <div class="col-lg-12 py-3">
                {{-- ------------------------------------------------------------------------------------------- --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $batchDetails['batch_name'] }}</h5>

                        <table class="table ">



                            <tbody>
                                <tr>

                                    <th scope="col">Batch Start Date:</th>
                                    <td scope="col">
                                        {{ \Carbon\Carbon::parse($batchDetails['start_date'])->format('d-M-Y') }}
                                    </td>


                                </tr>
                                <tr>
                                    <th scope="col">Batch End Date:</th>
                                    <td scope="col">
                                        {{ \Carbon\Carbon::parse($batchDetails['end_date'])->format('d-M-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Cut off Date:</th>
                                    <td scope="col">
                                        {{ \Carbon\Carbon::parse($batchDetails['batch_cut_off_date'])->format('d-M-Y h:i A') }}
                                    </td>
                                </tr>
                                <tr>

                                    <th scope="col">Batch Time:</th>
                                    <td scope="col">
                                        {{ \Carbon\Carbon::parse($batchDetails['start_date'])->format('h:i A') }} To
                                        {{ \Carbon\Carbon::parse($batchDetails['end_date'])->format('h:i A') }}
                                    </td>


                                </tr>

                                <tr>

                                    <th scope="col">Batch Fee:</th>
                                    <td scope="col">

                                        <span> ₹ {{ $batchDetails['fees'] }}</span><br>
                                        {{-- <span>For Students: ₹ {{ $batchDetails['price_for_students'] }} </span><br>
                                            <span>For Others: ₹ {{ $batchDetails['event_fee'] }} </span><br> --}}

                                    </td>



                                </tr>


                                <tr>
                                    <th scope="col">Location:</th>
                                    <td scope="col">
                                        {{ $batchDetails['location_details']['address_line_1'] }}
                                        {{ $batchDetails['location_details']['address_line_2'] }}
                                        {{ $batchDetails['location_details']['city'] }}
                                        {{ $batchDetails['location_details']['state'] }}
                                        {{ $batchDetails['location_details']['country'] }}-{{ $batchDetails['location_details']['pincode'] }}

                                    </td>
                                </tr>
                                <th scope="col">Offer:</th>
                                <td scope="col">

                                    <b class="blink">If you Paid Before
                                        {{ \Carbon\Carbon::parse($batchDetails['end_date'])->format('d-M-Y') }}: ₹
                                        {{ $batchDetails['early_bird_fees'] }} </b><br>

                                </td>
                                </tr>
                                <tr>
                                    <th scope="col">Batch Description:</th>
                                    <td scope="col">

                                        <p> {{ $batchDetails['batch_discription'] }}</p><br>
                                        {{-- <span>For Students: ₹ {{ $batchDetails['price_for_students'] }} </span><br>
                                        <span>For Others: ₹ {{ $batchDetails['event_fee'] }} </span><br> --}}

                                    </td>












                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <div>
                                @if (Auth::user())
                                    @if ($batchDetails->start_date > now())
                                        @if ($alreadyRegistered)
                                         
                                            <a href="#" id="viewTicket">
                                                <button class="btn btn-primary">View Ticket</button>
                                            </a>
                                        @else
                                            
                                            <button id="payNow" class="btn btn-primary" data-batch="{{ $batchDetails->id }}">Pay Now</button>
                                        @endif
                                    @else
                                        <p class="text-danger">Event has ended. Registration is closed.</p>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">Login To Register</a>
                                @endif
                            </div>
                        </div>
                        
                        


                    </div>
                </div>
                {{-- ------------------------------------------------------------------------------------------- --}}
            </div>


        </div>



    </div>

</section>
@endsection
