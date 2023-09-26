@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Past  Events</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Events</a>
                            <span>Past  Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="event-page py-5 spad">


        <div class="container">
            @if (isset($eventDetails) && count($eventDetails) > 0)
            <div class="row">

                @foreach ($eventDetails as $event)
            <div class="col-lg-6 py-3">
                {{-- ------------------------------------------------------------------------------------------- --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event['event_name'] }}</h5>

                        <table class="table ">



                            <tbody>
                                <tr>

                                    <th scope="col">Event Start Date:</th>
                                    <td scope="col">{{ $event['event_start_date'] }}</td>
                                </tr>
                                <tr>

                                    <th scope="col">Event End Date:</th>
                                    <td scope="col"> {{ $event['event_end_date'] }}</td>
                                </tr>
                                <tr>

                                    <th scope="col">Event Time:</th>
                                    <td scope="col">10:00 AM To 06:00 PM</td>
                                </tr>

                                <tr>

                                    <th scope="col">Cut off Date:</th>
                                    <td scope="col">{{ $event['event_cut_off_date'] }} 10:00 AM</td>
                                </tr>
                                <tr>

                                    <th scope="col">Event Fee:</th>
                                    <td scope="col"> ₹ {{ $event['event_fee'] }}</td>
                                </tr>
                                <tr>

                                    <th scope="col">Brochure:</th>
                                    <td scope="col"> <a href="{{ $event['broacher_pdf'] }}">Click Here To Download </a></td>
                                </tr>
   
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div><a href=""><button type="button" class="btn btn-secondary">Details</button></a></div>
                            <div><a href=""><button type="button" class="btn btn-primary">Register</button></a></div>
                        </div>
                     
                    </div>
                </div>
                {{-- ------------------------------------------------------------------------------------------- --}}
            </div>
          
            @endforeach

            </div>
            @else
            <h1>No event details available.</h1>
        @endif


        </div>

    </section>
    <!-- Upcomming Events Section End -->


@endsection
