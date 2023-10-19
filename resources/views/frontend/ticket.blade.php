@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->


    <!-- Breadcrumb Section End -->

    <section class="event-page py-5 spad">


    <div class="container">


        {{-- ------Tab View --}}
        <section class="py-5  ">
            <div class="row m-0  bg-white">
                <div class="col-lg-12">



                    <div class="row">


                        <div class="col-lg-12 py-3">

                            <div class="card">
                                <div class="card-body">

                                    <div class="row ">
                                        <div class="col-lg-3 ">

                                            <div class=" ">


                                                <img src="{{ url('/frontend/img/icai.png') }}"
                                                    alt="">

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="card-title tex-left">{{ $eventDetails['event_name'] }}</h5>
                                            <table class="table ">



                                                <tbody>
                                                    <tr>

                                                        <th scope="col">Event ID:</th>
                                                        <td scope="col">
                                                            {{ $eventDetails['id'] }}
                                                        </td>


                                                    </tr>
                                                    <tr>

                                                        <th scope="col">User ID:</th>
                                                        <td scope="col">
                                                            {{ Auth::user()->id }}
                                                        </td>


                                                    </tr>
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
                                                <p class="text-center">{{ $alreadyRegistered->payment_status }}</p>
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


                <!-- tab-content -->





            </div>


        </section>
        {{-- Tab View  --}}


    </div>






</section>

@endsection
