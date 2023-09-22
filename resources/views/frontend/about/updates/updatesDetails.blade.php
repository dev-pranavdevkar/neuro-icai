@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Updates Title</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <a href="./index.html">Latest Updates</a>
                            <span>Updates Title</span>
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
            <div class="row mt-5  d-flex justify-content-center">

                <div class="col-lg-10 w-100 py-3">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card  events-details">
                        {{-- <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap"> --}}
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
                                <p>Convocation Ceremony held on 27th May 2023 at Pune <b>Click below link to view Photos of
                                        Convocation Ceremony. <br/>Link :</b><a href="#"> Click here To View Photos</a></p>
                            </div>
                            <div>
                                <h6 class="card-subtitle">Sub Regional Conference in Shegaon</h6>
                                <div class="pdfList">
                                    <ul class="">
                                        <li>
                                            <div class="row">
                                                <div class="col-1 d-flex justify-content-center align-items-center">
                                                    <img src="{{ url('frontend/img/download-pdf.png') }}" alt="">
                                                </div>
                                                <div class="col-11">
                                                    <a href="#">Schedule and Registration form of the Mock Test Papers
                                                        (Series–II) to be held from 03rd Oct to 11th Oct, 2023 for the
                                                        students of Intermediate and Final level appearing in the Nov,
                                                        2023</a>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1 d-flex justify-content-center align-items-center">
                                                    <img src="{{ url('frontend/img/download-pdf.png') }}" alt="">
                                                </div>
                                                <div class="col-11">
                                                    <a href="#">Schedule and Registration form of the Mock Test Papers (Series–I) to be held from 05th Sep to 14th Sep, 2023 for the students of Intermediate and Final level appearing in the Nov, 2023

                                                    </a>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1 d-flex justify-content-center align-items-center">
                                                    <img src="{{ url('frontend/img/download-pdf.png') }}" alt="">
                                                </div>
                                                <div class="col-11">
                                                    <a href="#">Schedule of the Coaching classes batch for Foundation Revision Batch for Nov -2023
                                                        
                                                    </a>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1 d-flex justify-content-center align-items-center">
                                                    <img src="{{ url('frontend/img/download-pdf.png') }}" alt="">
                                                </div>
                                                <div class="col-11">
                                                    <a href="#">Schedule of the Coaching classes batch for Intermediate for May -2024  
                                                    </a>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1 d-flex justify-content-center align-items-center">
                                                    <img src="{{ url('frontend/img/download-pdf.png') }}" alt="">
                                                </div>
                                                <div class="col-11">
                                                    <a href="#">Now Hiring for Various Post at Pune Branch  
                                                    </a>
                                        </li>

                                </div>
                            </div>
                            </ul>
                        </div>
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
