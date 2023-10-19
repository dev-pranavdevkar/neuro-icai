@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->

    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $eventDetails['event_name'] }}</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Events</a>
                            <span>{{ $eventDetails['event_name'] }}</span>
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
                console.log('clicked', $(this).data('event'));
                let body = {
                    event_id: $(this).data('event')
                }
                $.ajax({
                    url: `${window.location.protocol}//${window.location.host}/eventRegister`, // Replace with your API endpoint URL
                    type: 'post', // or 'POST', 'PUT', etc. depending on your API
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
                dataToSend.url = "{!! route('checkOrderRazorpayPaymentStatus') !!}";
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
                            toastr.success('You have registered successfully. Please go to my events section.');
                        }
                        toastr.error(data.message)
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


        {{-- ------Tab View --}}
        <section class="py-5  ">
            <div class="row m-0  bg-white">
                <div class="col-lg-12">

                    <nav class="nav flex-column">
                        <ul class="d-flex justify-content-start  nav nav-pills w-100" id="pills-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#tab-one">Event
                                    Details</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-two"
                                    role="tab">Event Documents</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-three"
                                    role="tab">Event Images</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-four"
                                    role="tab">Event Videos</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-five"
                                    role="tab">Event Ticket</a> </li>
                        </ul>

                    </nav>


                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-one">
                            <div class="tab-pane fade show active" id="eventDetails" role="tabpanel"
                                aria-labelledby="eventDetails-tab">
                                <div class="row">


                                    <div class="col-lg-12 py-3">
                                        {{-- ------------------------------------------------------------------------------------------- --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $eventDetails['event_name'] }}</h5>

                                                <table class="table ">



                                                    <tbody>
                                                        <tr>

                                                            <th scope="col">Event Start Date:</th>
                                                            <td scope="col">
                                                                {{ \Carbon\Carbon::parse($eventDetails['event_start_date'])->format('d-M-Y') }}
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Event End Date:</th>
                                                            <td scope="col">
                                                                {{ \Carbon\Carbon::parse($eventDetails['event_end_date'])->format('d-M-Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Cut off Date:</th>
                                                            <td scope="col">
                                                                {{ \Carbon\Carbon::parse($eventDetails['event_cut_off_date'])->format('d-M-Y h:i A') }}
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <th scope="col">Event Time:</th>
                                                            <td scope="col">
                                                                {{ \Carbon\Carbon::parse($eventDetails['event_end_date'])->format('h:i A') }}
                                                                To
                                                                {{ \Carbon\Carbon::parse($eventDetails['event_start_date'])->format('h:i A') }}
                                                            </td>


                                                        </tr>

                                                        <tr>

                                                            <th scope="col">Event Fee:</th>
                                                            <td scope="col">

                                                                <span>For Members: ₹
                                                                    {{ $eventDetails['price_for_members'] }}</span><br>
                                                                <span>For Students: ₹
                                                                    {{ $eventDetails['price_for_students'] }}
                                                                </span><br>
                                                                <span>For Others: ₹ {{ $eventDetails['event_fee'] }}
                                                                </span><br>

                                                            </td>



                                                        </tr>


                                                        <tr>
                                                            <th scope="col">Location:</th>
                                                            <td scope="col">
                                                                {{ $eventDetails['location_details']['address_line_1'] }}
                                                                {{ $eventDetails['location_details']['address_line_2'] }}
                                                                {{ $eventDetails['location_details']['city'] }}
                                                                {{ $eventDetails['location_details']['state'] }}
                                                                {{ $eventDetails['location_details']['country'] }}-{{ $eventDetails['location_details']['pincode'] }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="col">Event Videos</th>
                                                            <td>
                                                                <div class="row">

                                                                    @foreach ($eventDetails['event_video'] as $video)
                                                                        <div class="col-lg-3">
                                                                            <a href="{{ $video['video_link'] }}"
                                                                                alt="">{{ $video['video_link'] }}</a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                        </tr>







                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center">

                                                    <div>

                                                        @if (Auth::user())
                                                            @if ($eventDetails->event_start_date > now())
                                                                @if (is_null($alreadyRegistered))
                                                                    <button id="payNow" class="btn btn-primary"
                                                                        data-event="{{ $eventDetails->id }}">Pay
                                                                        Now</button>
                                                                @else
                                                                    <button id="viewTicket" class="btn btn-primary"
                                                                        data-event="{{ $eventDetails->id }}">View
                                                                        Ticket</button>
                                                                @endif
                                                            @else
                                                                <p class="text-danger">Event has ended. Registration is
                                                                    closed.</p>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn-primary">Login To Register</a>
                                                        @endif
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        {{-- ------------------------------------------------------------------------------------------- --}}
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- end tab-pane -->

                        <div class="tab-pane fade" id="tab-two">
                            <div class="row">
                                <div class="col-lg-12 py-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $eventDetails['event_name'] }}</h5>
                                            <div class="row">
                                                @if (is_array($eventDetails['event_prsentation']) && count($eventDetails['event_prsentation']) > 0)
                                                    @foreach ($eventDetails['event_prsentation'] as $presentation)
                                                        <div class="col-lg-4 py-3">
                                                            <div class="card newsletter-card w-100">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <a href="{{ asset($presentation['presentation_pdf']) }}"
                                                                                target="_blank" download>
                                                                                <img src="{{ asset('frontend/img/download-pdf.png') }}"
                                                                                    alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-10 text-right">
                                                                            <div>
                                                                                <b> Presentation </b>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>No Presentation available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end tab-pane -->

                        <div class="tab-pane fade" id="tab-three">
                            <div class="row">
                                <div class="col-lg-12 py-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $eventDetails['event_name'] }}</h5>

                                            @if (count($eventDetails['event_images']) > 0)
                                                <div class="row">
                                                    @foreach ($eventDetails['event_images'] as $img)
                                                        <div class="col-lg-3">
                                                            <img src="{{ asset($img['event_images']) }}"
                                                                alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p>No images available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end tab-pane -->

                        <div class="tab-pane fade" id="tab-four">
                            <div class="row">


                                <div class="col-lg-12 py-3">
                                    {{-- ------------------------------------------------------------------------------------------- --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $eventDetails['event_name'] }}</h5>

                                            @if (count($eventDetails['event_video']) > 0)
                                                @foreach ($eventDetails['event_video'] as $video)
                                                    <div class="col-lg-3">
                                                        <iframe width="100%" height="200"
                                                            src="{{ $video['video_link'] }}" frameborder="0"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No data available</p>
                                            @endif


                                        </div>
                                    </div>
                                    {{-- ------------------------------------------------------------------------------------------- --}}
                                </div>


                            </div>
                        </div>
                        <!-- end tab-pane -->

                        <div class="tab-pane fade" id="tab-five">
                            <div class="row">


                                <div class="col-lg-12 py-3">

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row ">
                                                <div class="col-lg-2 ">

                                                    <div class=" ">


                                                        <img src="{{ url('/frontend/img/icai.png') }}"
                                                            alt="">

                                                    </div>

                                                </div>
                                                <div class="col-lg-7">
                                                    <h5 class="card-title tex-left">{{ $eventDetails['event_name'] }}</h5>
                                                    <table class="table ">



                                                        <tbody>
                                                            <tr>

                                                                <th scope="col">Event Date:</th>
                                                                <td scope="col">
                                                                    {{ \Carbon\Carbon::parse($eventDetails['event_start_date'])->format('d-M-Y') }}
                                                                    TO
                                                                    {{ \Carbon\Carbon::parse($eventDetails['event_end_date'])->format('d-M-Y') }}
                                                                </td>


                                                            </tr>

                                                            <tr>

                                                                <th scope="col">Event Time:</th>
                                                                <td scope="col">
                                                                    {{ \Carbon\Carbon::parse($eventDetails['event_end_date'])->format('h:i A') }}
                                                                    To
                                                                    {{ \Carbon\Carbon::parse($eventDetails['event_start_date'])->format('h:i A') }}
                                                                </td>


                                                            </tr>

                                                            <tr>

                                                                <th scope="col">Event Fee:</th>
                                                                <td scope="col">
                                                                    {{ $eventDetails['price_for_members'] }}
                                                                </td>



                                                            </tr>


                                                            <tr>
                                                                <th scope="col">Location:</th>
                                                                <td scope="col">
                                                                    {{ $eventDetails['location_details']['address_line_1'] }}
                                                                    {{ $eventDetails['location_details']['address_line_2'] }}
                                                                    {{ $eventDetails['location_details']['city'] }}
                                                                    {{ $eventDetails['location_details']['state'] }}
                                                                    {{ $eventDetails['location_details']['country'] }}-{{ $eventDetails['location_details']['pincode'] }}
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-3 border-left-dashed">

                                                    <div>
                                                        
                                                        <p class="text-center">{{ $eventDetails['event_name'] }}</p>
                                                        <div class="d-flex justify-content-center">
                                                        {{ $qrData }}
                                                    </div>
                                                        <p class="text-center">{{ $eventDetails['event_name'] }}</p>
                                                    </div>

                                                </div>
                                            </div>


                                     

                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-5">

                                        <div>


                                            <button id="viewTicket" class="btn btn-primary"
                                                data-event="{{ $eventDetails->id }}">Download Ticket</button>

                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                        <!-- end tab-pane -->



                    </div>

                </div>


                <!-- tab-content -->





            </div>


        </section>
        {{-- Tab View  --}}


    </div>




<button id="generateQrCodeBtn">Generate QR Code</button>

   
<script>
    document.getElementById('generateQrCodeBtn').addEventListener('click', function() {
        // Retrieve the event_id and event_name
        var eventId = @json($eventDetails['id']);
        var eventName = @json($eventDetails['event_name']);
        var userLastName = @json(Auth::user()->last_name);
        // Create an object with event_id and event_name
        var qrData = {
            event: {
                event_id: eventId,
                event_name: eventName
            },
            user: {
               
                last_name: userLastName
            }
        };
        
        // Convert the object to a JSON string
        var qrDataString = JSON.stringify(qrData);

        // Redirect to the 'qrcode' route with the event data as a parameter
        window.location.href = '{{ url("qrcode") }}/' + encodeURIComponent(qrDataString);
    });
</script>


</section>

@endsection
