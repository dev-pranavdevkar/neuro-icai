@extends('frontend.layouts.main')
@section('main-container')
    <section class="">
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Useful Links</h2>
                            <div class="breadcrumb__links">
                                <a href="#">Home</a>
                                <span>Useful Links</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <section class="loan-services study-circle spad">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    {{-- 1 --}}
                    <div class="col-lg-4 py-3 ">
    
                        <div class="card newsletter-card h-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="https://www.puneicai.org/images/pdf/List-of-Live-Webinars-organized-by-Pune-ICAI-Links-2.pdf" target="_blank" download><img
                                                src="{{ url('frontend/img/download-pdf.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="col-10 text-right">
                                        <div class="">
                                            <h4>PDF</h4>
                                        </div>
                                        <div class="">
                                            <b> List of Live Webinars Organized by PuneICAI </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                    {{-- 2 --}}
                    <div class="col-lg-4 py-3 ">
    
                        <div class="card newsletter-card h-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="https://www.icai.org/new_category.html?c_id=227" target="_blank" >
                                            <img
                                                src="{{ url('frontend/img/globe.png') }}"
                                                alt="" ></a>
                                    </div>
                                    <div class="col-10 text-right">
                                        <div class="">
                                            <h4>Website</h4>
                                        </div>
                                        <div class="">
                                            <b> Pune ICAI Executive Summary</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                    {{-- 3 --}}
                    <div class="col-lg-4 py-3 ">
    
                        <div class="card newsletter-card h-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="https://www.taxmann.com/research-pricing/combo-plans" target="_blank" download><img
                                                src="{{ url('frontend/img/globe.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="col-10 text-right">
                                        <div class="">
                                            <h4>Website</h4>
                                        </div>
                                        <div class="">
                                            <b> Taxmann Subscriptions 2019</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                   
    
    
                </div>
            </div>
        </section>
        <section>
        @endsection
