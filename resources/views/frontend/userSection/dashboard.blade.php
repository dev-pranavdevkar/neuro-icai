@extends('frontend.layouts.main')
@section('main-container')

<main class="bg-dashboard">
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
    <section class="px-5 py-5 ">
        <div class="row bg-white">
            <div class="col-lg-2 dashboard-menus">

                <div class="profile-section ">
                    <div class="px-2 d-flex justify-content-between align-items-center">
                    <img class="profile-pic" src="{{ url('/frontend/img/ca-rajesh-agarwal.jpg') }}" alt="">
                    <h5 class="text-white ml-2">{{ Auth::user()->name }} {{ Auth::user()->last_name }} </h5>
                    </div>
                </div>

                <div class=" h-100">
                    <nav class="nav flex-column">
                        <a class="nav-link btn btn-navItem active" aria-current="page" href="#">Dashboard</a>
                        <a class="nav-link btn btn-navItem" href="#">Edit Profile</a>
                        <a class="nav-link btn btn-navItem" href="#">Change Password</a>
                        <a class="nav-link btn btn-navItem" href="#" aria-disabled="true">Logout</a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-7  ">

                <!-- Edit Profile Begin -->
                <section class="container ">
                    <section class="dashboard-content">
                        <div class="container">
                            <div class="contact__form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact__form__text">
                                            <div class="contact__form__title">
                                                <h2>Edit profile</h2>
                                                <p>To change personal information fill the form</p>
                                            </div>
                                            <form action="#">
                                                <div class="input-list">
                                                    <input type="text" placeholder="Your First name">
                                                    <input type="text" placeholder="Your Last name">
                                                </div>
                                                <div class="input-list">
                                                    <input type="text" placeholder="Your contact number">
                                                    <input type="text" placeholder="Your email Id">
                                                </div>

                                                <button type="submit" class="site-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                <img class="scanner-img" src="{{ url('/frontend/img/scanner.jpg') }}" alt="">
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

    {{-- Digital Id Card --}}


    {{-- <div class="{{ isset(request()->idCard) ? 'd-block' : 'd-none' }}" id="IDCard">
        <section class="container dashboard-page">
    </section>
    </div> --}}





    <div class="{{ isset(request()->editProfile) ? 'd-block' : 'd-none' }}" id="editProfile">


        <!-- Edit Profile Begin -->
        <section class="container dashboard-page">
            <section class="">
                <div class="container">
                    <div class="contact__form my-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact__form__text">
                                    <div class="contact__form__title">
                                        <h2>Edit profile</h2>
                                        <p>To change personal information fill the form</p>
                                    </div>
                                    <form action="#">
                                        <div class="input-list">
                                            <input type="text" placeholder="Your First name">
                                            <input type="text" placeholder="Your Last name">
                                        </div>
                                        <div class="input-list">
                                            <input type="text" placeholder="Your contact number">
                                            <input type="text" placeholder="Your email Id">
                                        </div>

                                        <button type="submit" class="site-btn">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


        </section>


    </div>

    {{-- End Edit Profile Form --}}

    {{-- Change Password --}}

    <div class="{{ isset(request()->changePassword) ? 'd-block' : 'd-none' }}" id="changePassword">


        <!-- Edit Profile Begin -->
        <section class="container dashboard-page">
            <div class="">
                <div class="container">
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

                                        <button type="submit" class="site-btn">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>


    </div>

    {{-- End Edit Profile Form --}}




   
</main>
@endsection
