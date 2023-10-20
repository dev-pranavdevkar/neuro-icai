@extends('frontend.layouts.main')
@section('main-container')
    <main class="bg-light">

        {{-- <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
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
                                        role="tab">My Events</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-five"
                                        role="tab">My Batches</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab-six" role="tab">
                                        Logout</a> </li>
                            </ul>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-7  ">


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






                                    <div class="tab-pane fade" id="tab-two">
                                        <div class="contact__form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h1>Edit Profile</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




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

                                    <div class="tab-pane fade" id="tab-four">
                                        <h1>My Events</h1>
                                        <div class="container">

                                            @if ($alreadyRegistered->count() > 0)
                                                <div class="row">
                                                    @foreach ($alreadyRegistered as $registration)
                                                        <div class="col-lg-6">
                                                            <div class="card event-card-dashboard">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-3 ticket-img-area">
                                                                            <a href="https://www.google.com"> <img
                                                                                    src="{{ url('/frontend/img/ticket.png') }}"
                                                                                    alt=""></a>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            {{ $registration->event_details->event_name }}
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>
                                                {{ $alreadyRegistered->links() }}
                                            @else
                                                <p>No registered events.</p>
                                            @endif


                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="tab-five">
                                        <h1>My Batches</h1>

                                    </div>

                                    <div class="tab-pane fade" id="tab-six">
                                        <h1>Logout Successfully</h1>
                                    </div>


                                </div>



                            </div>
                        </section>


                    </section>
                </div>
                <div class="col-lg-3">

                    <div class="card digitalIDCard">
                        <div class="card-body">


                            <div class="institute-section d-flex justify-content-between">
                                <img class="logo-icai" src="{{ url('/frontend/img/icai.png') }}" alt="">
                                <h5 class="text-white ml-2">The Institute Of Chartered Accountants Of India </h5>
                            </div>





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
        </section> --}}

        <section class="">
            <div class="container">
            {{-- Profile Area Start --}}
            <div class="py-3 d-flex justify-content-between algn-items-center">
                <div class="d-flex justify-content-between algn-items-center">
                    <div class="d-flex align-items-center profile-area">
                        <img class="dashboard-profile-img"
                            src="{{ Auth::user()->profile_photo ? asset(Auth::user()->profile_photo) : url('/frontend/img/profile-user.png') }}"
                            alt="Profile Img">
                        <h5> {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h5>
                        
                    </div>
                    <div>

                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary">Download Digital ID Card</button>
                </div>
            </div>
            {{-- Profile Area End --}}

            {{-- Dashboard Menus And Content Area --}}
            <div class="dashboardArea">
                <div class="row top-border">
                    <div class="col-lg-3 right-border">
                        <div class=" h-100 py-3">
                            <nav class="nav flex-column">
                                <ul class="d-flex justify-content-start  nav nav-pills w-100" id="pills-tab" role="tablist">
                                    <li class="nav-item w-100"> <a class="nav-link active" data-toggle="pill"
                                            href="#tab-one">
                                            <span> <i class="fa fa-tachometer" aria-hidden="true"></i> </span>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-two"
                                            role="tab">
                                            <span><i class="fa fa-user" aria-hidden="true"></i>
                                            </span>My Profile</a>
                                    </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-three"
                                            role="tab">
                                            <span><i class="fa fa-id-card" aria-hidden="true"></i></span> ID
                                            Card</a> </li>


                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-four"
                                            role="tab"><span><i class="fa fa-calendar"
                                                    aria-hidden="true"></i></span>Enrolled
                                            Events</a> </li>


                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-five"
                                            role="tab"><span><i class="fa fa-graduation-cap"
                                                    aria-hidden="true"></i></span>Enrolled
                                            Batches</a> </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-six"
                                            role="tab">
                                            <span><i class="fa fa-users" aria-hidden="true"></i></span>Association</a>
                                    </li>

                                    <li class="nav-item w-100"><a class="nav-link" data-toggle="pill" href="#tab-seven"
                                            role="tab"><span><i class="fa fa-cog"
                                                    aria-hidden="true"></i></span>Settings</a>
                                    </li>
                                    <li class="nav-item w-100"><a class="nav-link" data-toggle="pill" href="#tab-eight"
                                            role="tab"><span><i class="fa fa-sign-out"
                                                    aria-hidden="true"></i></span>Logout</a>
                                    </li>
                                </ul>

                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <section class="dashboard-content">
                            <div class="container">
                                <div class="tab-content">



                                    <div class="tab-pane fade show active" id="tab-one">

                                        <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                            aria-labelledby="dashboard-tab">
                                            <h3 class="py-3">Dashboard</h3>
                                            <!-- Counter Begin -->
                                            <div class="counter spad">
                                                <div class="container">
                                                    @if (Auth::user() &&
                                                            in_array(
                                                                'members',
                                                                Auth::user()->roles->pluck('name')->toArray()))
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-12">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/register.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">{{ $numRegisteredEvents }}</h2>
                                                                    </div>
                                                                    <p>Registered Events</p>
                                                                </div>
                                                            </div>
                                                            <div class="ccol-lg-4 col-md-4 col-12">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/attended.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">99</h2>
                                                                        {{-- <span>%</span> --}}
                                                                    </div>
                                                                    <p>Attended Events</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-12">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/offers.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">90</h2>
                                                                        {{-- <span>+</span> --}}
                                                                    </div>
                                                                    <p>Applied Offers</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif


                                                    @if (Auth::user() &&
                                                            in_array(
                                                                'student',
                                                                Auth::user()->roles->pluck('name')->toArray()))
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/register.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">{{ $numRegisteredEvents }}</h2>
                                                                    </div>
                                                                    <p>Registered Events</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/attended.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">99</h2>
                                                                        {{-- <span>%</span> --}}
                                                                    </div>
                                                                    <p>Attended Events</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/batch.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">{{ $numRegisteredBatches }}</h2>
                                                                        {{-- <span>+</span> --}}
                                                                    </div>
                                                                    <p>Registered Batches</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-6">
                                                                <div class="counter__item">
                                                                    <img src="{{ url('frontend/img/counter/attend.png') }}"
                                                                        alt="">
                                                                    <div class="counter__number">
                                                                        <h2 class="counter-add">70</h2>
                                                                        {{-- <span>+</span> --}}
                                                                    </div>
                                                                    <p>Attended Batches</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Counter End -->
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-two">
                                        <div class="d-flex  justify-content-between align-items-center ">
                                            <h3 class="py-3">My Profile</h3>
                                            <div>
                                                <button type="button" class="btn btn-primary">Edit Profile</button>
                                                
                                            </div>
                                        </div>
                                        <div>


                                            <div class="row pb-5 d-flex justify-content-center align-items-center">
                                                <div class="col-lg-6">

                                                    <table class="w-100">
                                                        <tr>
                                                            <th>Role:</th>
                                                           {{ (auth()->user()->role )}}
                                                            <td>{{ Auth::user()->roles->first()->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Membership ID:</th>
                                                            <td>{{ Auth::user()->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Username: </th>
                                                            <td>{{ Auth::user()->generated_user_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name: </th>
                                                            <td>{{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Of Birth: </th>
                                                            <td>{{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d/m/Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email ID:</th>
                                                            <td>{{ Auth::user()->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Mobile Number:</th>
                                                            <td>{{ Auth::user()->mobile_no }}</td>
                                                        </tr>


                                                    </table>








                                                </div>
                                                <div class="col-lg-6">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center profile-area">
                                                        <img class="dashboard-my-profile-img"
                                                            src="{{ Auth::user()->profile_photo ? asset(Auth::user()->profile_photo) : url('/frontend/img/profile-user.png') }}"
                                                            alt="Profile Img">


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-three">
                                        <h3 class="py-3">Digital ID Card</h3>
                                        <div class="row pb-5 d-flex justify-content-center">
                                            <div class="col-lg-5">
                                                <div class="card digitalIDCard">
                                                    <div class="card-body">


                                                        <div class="institute-section d-flex justify-content-between">
                                                            <img class="logo-icai"
                                                                src="{{ url('/frontend/img/icai.png') }}" alt="">
                                                            <h5 class="text-white ml-2">The Institute Of Chartered
                                                                Accountants Of India </h5>
                                                        </div>





                                                        <div class="scanner-section py-4">
                                                            <div>
                                                                <div class="d-flex justify-content-center">
                                                                    <img class="profile-img"
                                                                        src="{{ url('/frontend/img/ca-rajesh-agarwal.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <h4 class="text-white text-center py-3 ">
                                                                    {{ Auth::user()->name }}
                                                                    {{ Auth::user()->last_name }}</h4>
                                                            </div>

                                                            <div class="d-flex justify-content-center ">
                                                                <img class="scanner-img"
                                                                    src="{{ url('/frontend/img/scanner.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>



                                                        <div class="info-section d-flex justify-content-center py-2">
                                                            <ul>
                                                                <li class="text-nowrap"><i class="fa fa-user"
                                                                        aria-hidden="true"></i>
                                                                    {{ Auth::user()->name }}
                                                                    {{ Auth::user()->last_name }}</li>
                                                                <li class="text-nowrap"><i class="fa fa-envelope"
                                                                        aria-hidden="true"></i>
                                                                    {{ Auth::user()->email }}</li>
                                                                <li><i class="fa fa-phone" aria-hidden="true"></i> +91
                                                                    {{ Auth::user()->mobile_no }}
                                                                </li>
                                                                <li><i class="fa fa-id-card" aria-hidden="true"></i>
                                                                    {{ Auth::user()->id }}</li>
                                                            </ul>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="tab-four">
                                        <h3 class="py-3">Enrolled Events</h3>

                                        {{-- ===================================================== --}}


                                        {{-- ========================================================= --}}
                                        <div class="">

                                            @if ($alreadyRegistered->count() > 0)
                                                <div class="row">
                                                    @foreach ($alreadyRegistered as $registration)
                                                        <div class="col-lg-6 py-3">

                                                            <div class="card dashboard-event-card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title tex-left">
                                                                        {{ $registration->event_details->event_name }}
                                                                    </h5>
                                                                    <table class="table without-border-table">



                                                                        <tbody>
                                                                            <tr>

                                                                                <th scope="col">Event Date:</th>
                                                                                <td class="text-nowrap" scope="col">
                                                                                    {{ \Carbon\Carbon::parse($registration->event_details->event_start_date)->format('d-M-Y') }}
                                                                                    TO
                                                                                    {{ \Carbon\Carbon::parse($registration->event_details->event_end_date)->format('d-M-Y') }}
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <th scope="col">Event Time:</th>
                                                                                <td scope="col">
                                                                                    {{ \Carbon\Carbon::parse($registration->event_details->event_end_date)->format('h:i A') }}
                                                                                    To
                                                                                    {{ \Carbon\Carbon::parse($registration->event_details->event_start_date)->format('h:i A') }}
                                                                                </td>


                                                                            </tr>

                                                                            <tr>

                                                                                <th scope="col">Event Fee:</th>
                                                                                <td scope="col">
                                                                                    {{ $registration->event_details->price_for_members }}
                                                                                </td>



                                                                            </tr>


                                                                            <tr>
                                                                                <th scope="col">Location:</th>
                                                                                <td scope="col">
                                                                                    {{ $registration->event_details->location_details->address_line_1 }}
                                                                                    {{ $registration->event_details->location_details->address_line_2 }}
                                                                                    {{ $registration->event_details->location_details->city }}
                                                                                    {{ $registration->event_details->location_details->state }}
                                                                                    {{ $registration->event_details->location_details->country }}-
                                                                                    {{ $registration->event_details->location_details->pincode }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <th class="text-nowrap" scope="col">
                                                                                    Download Ticket:</th>
                                                                                <td scope="col">
                                                                                    <a class="ml-2 clickHere"
                                                                                        href="{{ route('tickets', ['id' => $registration->event_details->id]) }}">Click
                                                                                        Here</a>

                                                                                </td>



                                                                            </tr>

                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>
                                                {{ $alreadyRegistered->links() }}
                                            @else
                                                <p>No registered events.</p>
                                            @endif


                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-five">
                                        <h3 class="py-3">Enrolled Batches</h3>
                                    </div>



                                    <div class="tab-pane fade" id="tab-six">
                                        <h3 class="py-3">Association</h3>

                                    </div>

                                    <div class="tab-pane fade" id="tab-seven">
                                        <h3 class="py-3">Settings</h3>
                                    </div>
                                    <div class="tab-pane fade" id="tab-eight">
                                        <h3 class="py-3">Logout</h3>
                                    </div>


                                </div>



                            </div>
                        </section>
                    </div>
                </div>
            </div>
            </div>
        </section>













    </main>

@endsection
