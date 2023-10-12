@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Exposure Drafts</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Members</a>
                            <span>Exposure Drafts</span>
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
            <div class="row my-5 d-flex justify-content-center">

                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card h-100">

                        <div class="card-body">

                            <div class="pb-5">
                                <p>Exposure Draft of Appendix C, Uncertainty over Income Tax Treatments to Ind AS 12 Income
                                    Taxes </p>
                            </div>
                            <div class="text-center w-100">
                                <a href="#" class=" download-btn btn btn-primary">Download </a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card h-100">

                        <div class="card-body">

                            <div class="pb-5">
                                <p>Exposure Draft of the Accounting Standard (AS) 16, Property, Plant and Equipment</p>
                            </div>
                            <div class="text-center">
                                <a href="#" class=" download-btn btn btn-primary">Download </a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card h-100">

                        <div class="card-body">

                            <div class="pb-5">
                                <p>Exposure Draft of Indian Accounting Standard (Ind AS) 117 Insurance Contracts    </p>
                            </div>
                            <div class="text-center">
                                <a href="#" class=" download-btn btn btn-primary">Download </a>
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
