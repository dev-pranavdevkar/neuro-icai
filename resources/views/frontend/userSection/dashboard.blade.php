@extends('frontend.layouts.main')
@section('main-container')
    <main class="bg-light">
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
        <section class="py-5 bg-dashboard">
            <div class="row m-0  bg-white">
                <div class="col-lg-2 dashboard-menus">

                    <div class="profile-section ">
                        <div class="px-2 d-flex justify-content-between align-items-center">
                            <img class="profile-pic" src="{{ url('/frontend/img/ca-rajesh-agarwal.jpg') }}" alt="">
                            <h5 class="text-white ml-2">{{ Auth::user()->name }} {{ Auth::user()->last_name }} </h5>
                        </div>
                    </div>

                    <div class=" h-100">
                        <nav class="nav flex-column">
                            <ul class="d-flex justify-content-start  nav nav-pills w-100" id="pills-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="pill"
                                        href="#tab-one">Dashboard</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-two"
                                        role="tab">Edit Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-three"
                                        role="tab">Change Password</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-four"
                                        role="tab">
                                        Logout</a> </li>
                            </ul>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-7  ">

                    <!-- Edit Profile Begin -->
                    <section class="container ">
                        <section class="dashboard-content">
                            <div class="container">
                                <div class="tab-content">



                                    <div class="tab-pane fade show active" id="tab-one">

                                        <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                            aria-labelledby="dashboard-tab">
                                            <h3 class="py-3">Welcome Pranav</h3>
                                        </div>

                                        <div class="row py-3">
                                   
                                            <div class="col-lg-4 col-6">
                                                <div class="card dashboard-card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <a href="{{ url('/') }}"><img
                                                                        src="{{ url('frontend/img/dashboard/total.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="col-9 text-right">
                                                                <div class="">
                                                                    <h4>08</h4>
                                                                </div>
                                                                <div>
                                                                    <b> Total Events </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-6">
                                                <div class="card dashboard-card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <a href="{{ url('/') }}"><img
                                                                        src="{{ url('frontend/img/dashboard/registered.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="col-9 text-right">
                                                                <div class="">
                                                                    <h4> 03</h4>
                                                                </div>
                                                                <div>
                                                                    <b>Registered Event</b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-6">
                                                <div class="card dashboard-card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <a href="{{ url('/') }}"><img
                                                                        src="{{ url('frontend/img/dashboard/attended.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="col-9 text-right">
                                                                <div class="">
                                                                    <h4> 01</h4>
                                                                </div>
                                                                <div>
                                                                    <b> Attended Events </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-6">
                                                <div class="card dashboard-card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <a href="{{ url('/') }}"><img
                                                                        src="{{ url('frontend/img/dashboard/past.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="col-9 text-right">
                                                                <div class="">
                                                                    <h4> 01</h4>
                                                                </div>
                                                                <div>
                                                                    <b> Missed Events </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                     

                                    </div>





                                    <!-- end tab-pane -->
                                    <div class="tab-pane fade" id="tab-two">
                                        <div class="contact__form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                              
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab-pane -->



                                    <div class="tab-pane fade" id="tab-three">
                                        <div class="contact__form my-5">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="contact__form__text">
                                                        <div class="contact__form__title">
                                                            <h2>Change Password</h2>
                                                            <p>To change password fill the following form</p>
                                                        </div>
                                                        <form action="#">
                                                            <div class="input-list">
                                                                <input type="text" placeholder="Old Password">
                                                                <input type="text" placeholder="OTP">
                                                            </div>
                                                            <div class="input-list">
                                                                <input type="password" placeholder="Password">
                                                                <input type="password" placeholder="Confirm Password">
                                                            </div>

                                                            <button type="submit" class="site-btn">Change
                                                                Password</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end tab-pane -->





                                    <div class="tab-pane fade" id="tab-four">
                                        <h1>Logout Successfully</h1>
                                    </div>
                                    <!-- end tab-pane -->



                                </div>



                            </div>
                        </section>


                    </section>
                </div>
                <div class="col-lg-3">

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






        {{-- <div class="{{ isset(request()->idCard) ? 'd-block' : 'd-none' }}" id="IDCard">
 
    </div> --}}







    </main>
@endsection
