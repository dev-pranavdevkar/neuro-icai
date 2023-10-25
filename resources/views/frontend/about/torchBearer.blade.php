@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Our Torch Bearer</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Our Torch Bearer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="loan-services spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                {{-- 1 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/torchBearer/aniket_talati.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h4>CA Aniket Sunil Talati</h4>
                                    <p>President, ICAI</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/torchBearer/ranjeet_kumar_agarwal.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h4>CA Ranjeet Kumar Agarwal</h4>
                                    <p>Vice-President, ICAI</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/torchBearer/cvchitale.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h4>Chandrashekhar V. Chitale</h4>
                                    <p>Central Council Member, ICAI</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/torchBearer/arpit_kabra.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h4>CA Arpit Jagdish Kabra</h4>
                                    <p>Chairman - WIRC of ICAI</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/torchBearer/yashwant_kasar.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h4>CA Yashwant Kasar</h4>
                                    <p>Regional Council Member, WIRC of ICAI</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 6 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/torchBearer/ruta_chitale.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h4>CA Ruta Chitale</h4>
                                    <p>Regional Council Member, WIRC of ICAI</p>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
