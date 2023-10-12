@extends('frontend.layouts.main')
@section('main-container')
    <main class="">
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>My Account</h2>
                            <div class="breadcrumb__links">
                                <a href="./index.html">Profile</a>
                                <span>Digital ID Card</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <section class="container py-5">
            <div class="row  d-flex justify-content-center">
              
                <div class="col-lg-4">

                
                    <div class="card digitalIDCard">
                        <div class="card-body">
                            {{-- Logo Image --}}

                            <div class="institute-section d-flex justify-content-between">
                                <img class="logo-icai" src="{{ url('/frontend/img/icai.png') }}" alt="">
                                <h5 class="text-white ml-2">The Institute Of Chartered Accountants Of India </h5>
                            </div>




                            {{-- Profile Picture --}}
                            <div class="scanner-section py-4">
                                <div>
                                    <div class="d-flex justify-content-center">
                                        <img class="profile-img" src="{{ url('/frontend/img/ca-rajesh-agarwal.jpg') }}"
                                            alt="">
                                    </div>
                                    <h4 class="text-white text-center py-3 "> {{ Auth::user()->name }}
                                        {{ Auth::user()->last_name }}</h4>
                                </div>

                                <div class="d-flex justify-content-center ">
                                    <img class="scanner-img" src="{{ url('/frontend/img/scanner.jpg') }}"
                                        alt="">
                                </div>
                            </div>


                            {{-- Personal Info --}}
                            <div class="info-section d-flex justify-content-center py-2">
                                <ul>
                                    <li class="text-nowrap"><i class="fa fa-user" aria-hidden="true"></i>
                                        {{ Auth::user()->name }}
                                        {{ Auth::user()->last_name }}</li>
                                    <li class="text-nowrap"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        {{ Auth::user()->email }}</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> +91 {{ Auth::user()->mobile_no }}
                                    </li>
                                    <li><i class="fa fa-id-card" aria-hidden="true"></i> {{ Auth::user()->id }}</li>
                                </ul>
                            </div>


                        </div>
                    </div>
                

                </div>
            </div>
        </section>






  






    </main>
@endsection
