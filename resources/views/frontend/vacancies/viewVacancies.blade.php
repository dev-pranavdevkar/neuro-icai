@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Avilable Vacancies</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Vacancies</a>
                            <span>Avilable Vacancies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="home-about spad bg-light pt-5">
        <div class="container">
            @if (isset($vacancyDetails) && count($vacancyDetails) > 0)
                <div class="">
                   
                    <div class="row d-flex justify-content-center">
                        @foreach ($vacancyDetails as $vacancy)
                            <div class="col-lg-6 py-3 ">

                                <div class="card jobcard h-100">

                                    <div class="card-body ">
                                        <h5 class="card-title">{{ $vacancy['position'] }}</h5>
                                        <h6 class="card-subtitle mb-2 ">{{ $vacancy['ca_firm_name'] }}</h6>
                                        <div class=" posted-details">
                                            <ul class="d-flex justify-content-start">
                                                <li class="mr-5"><i class="fa fa-briefcase" aria-hidden="true"></i>{{ $vacancy['experience'] }}
                                                    Yrs</li>
                                                <li class="mr-5"><i class="fa fa-inr" aria-hidden="true"></i>30K-50K</li>
                                                <li class="mr-5"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $vacancy['location_details']['city'] }}</li>
                                            </ul>
                                            <div class="mt-2">
                                                <ul class="d-flex justify-content-between">
                                                    <li class="d-flex"><i class="fa fa-location-arrow mt-1"
                                                            aria-hidden="true"></i>
                                                            {{ $vacancy['location_details']['address_line_1'] }}
                                                            {{ $vacancy['location_details']['address_line_2'] }}
                                                            {{ $vacancy['location_details']['city'] }}
                                                            {{ $vacancy['location_details']['state'] }}-{{ $vacancy['location_details']['pincode'] }}
                                                        
                                                        </li>
                                                </ul>
                                            </div>
                                            <p class="mt-2">We are looking for {{ $vacancy['position'] }}. The candidates will get
                                                exposure in the field of Accounting, Statutory Audits, Internal Audits,
                                                Income Tax,
                                                GST, TDS, etc.</p>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                        
                                            <a href="#" class="btn btn-primary">Apply</a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    
                </div>
            
            @else
                <h1>No Vacancies Available.</h1>
            @endif

        </div>




    </section>
@endsection
