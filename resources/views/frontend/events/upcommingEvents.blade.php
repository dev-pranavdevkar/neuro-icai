@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Upcoming Events</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Events</a>
                            <span>Upcoming Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="event-page py-5 spad">


        <div class="container">
            <div class="row">

                <div class="col-lg-6 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Seminar on Trust</h5>

                            <table class="table ">



                                <tbody>
                                    <tr>

                                        <th scope="col">Event Start Date:</th>
                                        <td scope="col">25-08-2023</td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Event End Date:</th>
                                        <td scope="col">26-08-2023</td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Event Time:</th>
                                        <td scope="col">10:00 AM To 06:00 PM</td>
                                    </tr>

                                    <tr>

                                        <th scope="col">Cut off Date:</th>
                                        <td scope="col">25-08-2023 10:00 AM</td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Event Fee:</th>
                                        <td scope="col"> ₹ 500</td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Brochure:</th>
                                        <td scope="col"> <a href="">Click Here To Download </a></td>
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

            </div>



        </div>

    </section>
    <!-- Upcomming Events Section End -->
@endsection
