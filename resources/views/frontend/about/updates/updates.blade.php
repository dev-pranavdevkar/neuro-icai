@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Latest Updates</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Latest Updates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Letest Updates Section Begin -->
    <section class="home-about bg-light spad">
        <div class="container">
            <div class="row mt-5">
                
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sub Regional Conference in Shegaon</h5>
                            <div class="">
                                <ul class="events">
                                    <li><a href="{{ url('/') }}"><i class="fa fa-calendar"></i>25-08-2023 To
                                            26-08-2023
                                        </a></li>
                                    <li><a href="{{ url('/') }}"><i class="fa fa-clock-o"></i> 10:00 AM To 06:00 PM
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                                <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sub Regional Conference in Shegaon</h5>
                            <div class="">
                                <ul class="events">
                                    <li><a href="{{ url('/') }}"><i class="fa fa-calendar"></i>25-08-2023 To
                                            26-08-2023
                                        </a></li>
                                    <li><a href="{{ url('/') }}"><i class="fa fa-clock-o"></i> 10:00 AM To 06:00 PM
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                              <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sub Regional Conference in Shegaon</h5>
                            <div class="">
                                <ul class="events">
                                    <li><a href="{{ url('/') }}"><i class="fa fa-calendar"></i>25-08-2023 To
                                            26-08-2023
                                        </a></li>
                                    <li><a href="{{ url('/') }}"><i class="fa fa-clock-o"></i> 10:00 AM To 06:00 PM
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                              <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sub Regional Conference in Shegaon</h5>
                            <div class="">
                                <ul class="events">
                                    <li><a href="{{ url('/') }}"><i class="fa fa-calendar"></i>25-08-2023 To
                                            26-08-2023
                                        </a></li>
                                    <li><a href="{{ url('/') }}"><i class="fa fa-clock-o"></i> 10:00 AM To 06:00 PM
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                              <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
            </div>
         


        </div>

    </section>
    <!-- Letest Updates Section End -->
@endsection
