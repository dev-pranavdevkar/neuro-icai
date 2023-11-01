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
                                            <h5 class="card-title tex-left">{{ $batchDetails['batch_name'] }}</h5>
                                            <table class="table ">



                                                <tbody>
                                                    <tr>

                                                        <th scope="col">Batch ID:</th>
                                                        <td scope="col">
                                                            {{ $batchDetails['id'] }}
                                                        </td>


                                                    </tr>
                                                    <tr>

                                                        <th scope="col">User ID:</th>
                                                        <td scope="col">
                                                            {{ Auth::user()->id }}
                                                        </td>


                                                    </tr>
                                                    <tr>

                                                        <th scope="col">Batch Date:</th>
                                                        <td scope="col">
                                                            {{ \Carbon\Carbon::parse($batchDetails['start_date'])->format('d-M-Y') }}
                                                            TO
                                                            {{ \Carbon\Carbon::parse($batchDetails['end_date'])->format('d-M-Y') }}
                                                        </td>


                                                    </tr>

                                                    <tr>

                                                        <th scope="col">Batch Time:</th>
                                                        <td scope="col">
                                                            {{ \Carbon\Carbon::parse($batchDetails['end_date'])->format('h:i A') }}
                                                            To
                                                            {{ \Carbon\Carbon::parse($batchDetails['start_date'])->format('h:i A') }}
                                                        </td>


                                                    </tr>

                                                    <tr>

                                                        <th scope="col">Batch Fee:</th>
                                                        <td scope="col">
                                                            {{ $batchDetails['fees'] }}
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


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-3 border-left-dashed">

                                            <div>
                                                
                                                <p class="text-center">{{ $batchDetails['batch_name'] }}</p>
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
                                        data-event="{{ $batchDetails->id }}">Download Ticket</button>

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
