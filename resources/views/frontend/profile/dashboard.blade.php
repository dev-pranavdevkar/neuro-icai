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

        <section class="container">
            {{-- Profile Area Start --}}
            <div class="py-3 d-flex justify-content-between algn-items-center">
                <div class="d-flex algn-items-between algn-items-center">
                    <div><img class="profile-img" src="" alt="Profile Img"></div>
                    <div>
                        <h5>Pranav Devkar</h5>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary">Primary</button>
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
                                            href="#tab-one"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-two"
                                            role="tab"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>
                                    </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-three"
                                            role="tab"><i class="fa fa-calendar" aria-hidden="true"></i>Enrolled
                                            Events</a> </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-four"
                                            role="tab"><i class="fa fa-id-card" aria-hidden="true"></i>Digital ID
                                            Card</a> </li>

                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-five"
                                            role="tab"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Enrolled
                                            Batches</a> </li>
                                    <li class="nav-item w-100"> <a class="nav-link" data-toggle="pill" href="#tab-six"
                                            role="tab"><i class="fa fa-users" aria-hidden="true"></i>Association</a>
                                    </li>

                                    <li class="nav-item w-100">
                                        <a class="nav-link" data-toggle="pill" href="#tab-eight" role="tab"><i
                                                class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out"
                                                aria-hidden="true"></i> Logout </a>
                                    </li>


                                </ul>

                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-one">
                                <h1>
                                    <!-- Counter Begin -->
                                    <h3 class="py-3">Dashboard</h3>
                                    <div class="counter spad">
                                        <div class="container">
                                            @if (Auth::user() &&
                                                    in_array(
                                                        'members',
                                                        Auth::user()->roles->pluck('name')->toArray()))
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-lg-4 col-md-4 col-6">
                                                        <div class="counter__item">
                                                            <img src="{{ url('frontend/img/counter/register.png') }}"
                                                                alt="">
                                                            <div class="counter__number">
                                                                <h2 class="counter-add">{{ $numRegisteredEvents }}</h2>
                                                            </div>
                                                            <p>Registered Events</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-6">
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
                                                    <div class="col-lg-4 col-md-4 col-6">
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
                                                <div class="row d-flex justify-content-center">
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
                                </h1>
                            </div>
                            <div class="tab-pane fade" id="tab-two">
                                <h3 class="py-3">My Profile</h3>
                                {{-- {{ Auth::user()->last_name }}
                                {{ Auth::user()->name }}  --}}


                                <div class="row d-flex justify-content-center">
                                    {{-- 1 --}}
                                    <div class="col-lg-12 py-3 ">
                                        <div class="card member-card p-4">
                                            <div class="card-body " style="border: 1px solid #909090">
                                                <div class="row h-100">

                                                    <div class="col-lg-6 h-100 d-flex justify-content-center">
                                                        <div>
                                                            <h4>Personal Details
                                                            </h4>

                                                            <ul>
                                                                <li class="my-2"><i class="fa fa-user"
                                                                        aria-hidden="true"></i><a href="">
                                                                        {{ Auth::user()->name }}
                                                                        {{ Auth::user()->last_name }}

                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-briefcase"
                                                                        aria-hidden="true"></i><a href="">
                                                                        {{ Auth::user()->roles->first()->name }}

                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-envelope"
                                                                        aria-hidden="true"></i><a href="">
                                                                        {{ Auth::user()->email }}
                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-phone"
                                                                        aria-hidden="true"></i><a href="">
                                                                        {{ Auth::user()->mobile_no }}
                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-birthday-cake"
                                                                        aria-hidden="true"></i><a href="">
                                                                        {{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d/m/Y') }}

                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-at"
                                                                        aria-hidden="true"></i><a href="">
                                                                        {{ Auth::user()->generated_user_id }}
                                                                    </a>
                                                                </li>





                                                            </ul>

                                                        </div>


                                                    </div>
                                                    <div
                                                        class="col-lg-6 h-100 border-left-dashed pl-lg-3 d-flex justify-content-center">
                                                        <div class=" pb-2">
                                                            <h4 class="text-primery">Company Profile</h4>
                                                            <ul>
                                                                <li class="my-2"><i class="fa fa-building"
                                                                        aria-hidden="true"></i><a href="">
                                                                        @if ($companyDetails)
                                                                            {{ $companyDetails->firm_name }}
                                                                        @else
                                                                            No company details available.
                                                                        @endif



                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-user"
                                                                        aria-hidden="true"></i><a href="">
                                                                        @if ($companyDetails)
                                                                            {{ $companyDetails->contact_person_name }}
                                                                        @else
                                                                            No company details available.
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-envelope"
                                                                        aria-hidden="true"></i><a href="mailto">
                                                                        @if ($companyDetails)
                                                                            {{ $companyDetails->company_email }}
                                                                        @else
                                                                            No company details available.
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-phone"
                                                                        aria-hidden="true"></i><a href="">
                                                                        @if ($companyDetails)
                                                                            {{ $companyDetails->contact_person_number }}
                                                                        @else
                                                                            No company details available.
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                                <li class="my-2"><i class="fa fa-map-marker"
                                                                        aria-hidden="true"></i><a href="">
                                                                        @if ($locationDetails)
                                                                            {{ $locationDetails->address_line_1 }},
                                                                            {{ $locationDetails->address_line_2 }},
                                                                            {{ $locationDetails->city }},
                                                                            {{ $locationDetails->state }}-{{ $locationDetails->pincode }},
                                                                        @else
                                                                            No location details available.
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-three">
                                <h3 class="py-3">Enrolled Event</h3>

                                @if (count($alreadyRegistered) > 0)
                                    <div class="row">
                                        @foreach ($alreadyRegistered as $event)
                                            <div class="col-lg-6">
                                                <div class="card member-card p-4">
                                                    <div class="card-body " style="border: 1px solid #909090">
                                                        <div class="row h-100">

                                                            <div class="col-lg-12 h-100">
                                                                <div>
                                                                    <b class=" text-center text-primery">{{ $event->event_details->event_name }}
                                                                    </b>

                                                                    <ul>
                                                                        <li class="my-2"><i class="fa fa-calendar"
                                                                                aria-hidden="true"></i><a href="">
                                                                                {{ \Carbon\Carbon::parse($event->event_details->event_start_date)->format('d/m/Y') }}
                                                                                To
                                                                                {{ \Carbon\Carbon::parse($event->event_details->event_end_date)->format('d/m/Y') }}

                                                                            </a>
                                                                        </li>
                                                                        <li class="my-2"><i class="fa fa-clock-o"
                                                                                aria-hidden="true"></i><a href="">
                                                                                {{ \Carbon\Carbon::parse($event->event_details->event_start_date)->format('h:i A') }}
                                                                                To
                                                                                {{ \Carbon\Carbon::parse($event->event_details->event_end_date)->format('h:i A') }}

                                                                            </a>
                                                                        </li>
                                                                        <li class="my-2"><i class="fa fa-ticket"
                                                                                aria-hidden="true"></i><a
                                                                                href="{{ route('tickets', ['id' => $event->event_id]) }}"
                                                                                class="text-danger">
                                                                                <b> View Ticket </b>

                                                                            </a>
                                                                        </li>






                                                                    </ul>

                                                                </div>


                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No enrolled events found.</p>
                                @endif



                            </div>


                            <div class="tab-pane fade" id="tab-four">
                                <h3 class="py-3">Digital ID Card</h3>
                                <div class="row  d-flex justify-content-center py-5">

                                    <div class="col-lg-5">


                                        <div class="card digitalIDCard">
                                            <div class="card-body">
                                                {{-- Logo Image --}}

                                                <div class="institute-section d-flex justify-content-between">
                                                    <img class="logo-icai" src="{{ url('/frontend/img/icai.png') }}"
                                                        alt="">
                                                    <h5 class="text-white ml-2">The Institute Of Chartered Accountants
                                                        Of
                                                        India </h5>
                                                </div>




                                                {{-- Profile Picture --}}
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
                                                            src="{{ url('/frontend/img/scanner.jpg') }}" alt="">
                                                    </div>
                                                </div>


                                                {{-- Personal Info --}}
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
                            <div class="tab-pane fade" id="tab-five">
                                <h3 class="py-3">Enrolled Batches</h3>

                                @if (count($alreadyBatchRegistered) > 0)
                                    <div class="row">
                                        @foreach ($alreadyBatchRegistered as $batch)
                                            <div class="col-lg-6">
                                                <div class="card member-card p-4">
                                                    <div class="card-body " style="border: 1px solid #909090">
                                                        <div class="row h-100">

                                                            <div class="col-lg-12 h-100">
                                                                <div>
                                                                    <b class=" text-center text-primery">{{ $batch->batches->batch_name }}
                                                                    </b>

                                                                    <ul>
                                                                        <li class="my-2"><i class="fa fa-calendar"
                                                                                aria-hidden="true"></i><a href="">
                                                                                {{ \Carbon\Carbon::parse($batch->batches->start_date)->format('d/m/Y') }}
                                                                                To
                                                                                {{ \Carbon\Carbon::parse($batch->batches->end_date)->format('d/m/Y') }}

                                                                            </a>
                                                                        </li>
                                                                        <li class="my-2"><i class="fa fa-clock-o"
                                                                                aria-hidden="true"></i><a href="">
                                                                                {{ \Carbon\Carbon::parse($batch->batches->start_date)->format('h:i A') }}
                                                                                To
                                                                                {{ \Carbon\Carbon::parse($batch->batches->end_date)->format('h:i A') }}

                                                                            </a>
                                                                        </li>
                                                                        <li class="my-2"><i class="fa fa-ticket"
                                                                                aria-hidden="true"></i><a
                                                                                href="{{ route('tickets', ['id' => $event->event_id]) }}"
                                                                                class="text-danger">
                                                                                <b> View Ticket </b>

                                                                            </a>
                                                                        </li>






                                                                    </ul>

                                                                </div>


                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No enrolled Batches found.</p>
                                @endif

                                @if (count($alreadyBatchRegistered) > 0)
                                    <ul>
                                        @foreach ($alreadyBatchRegistered as $batch)
                                            <li>

                                                Event ID: {{ $batch->student_batche_id }}
                                                <br>
                                                Event ID: {{ $batch->batches->batch_name }}
                                                <!-- Add other event details as needed -->
                                            </li>
                                        @endforeach
                                    </ul>
                                    {{ $alreadyRegistered->links() }} <!-- Add pagination links -->
                                @else
                                    <p>No enrolled events found.</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="tab-six">
                                <h3 class="py-3">Association Content</h3>
                            </div>
                            <div class="tab-pane fade" id="tab-eight">

                                <section class="py-3  dashboardAreaSubTabView">
                                    <div class="row m-0">
                                        <div class="col-lg-12">

                                            <nav class="nav flex-column">
                                                <ul class="d-flex justify-content-start  nav nav-pills w-100"
                                                    id="pills-tab" role="tablist">
                                                    <li class="nav-item"> <a class="nav-link active" data-toggle="pill"
                                                            href="#edit-profile">Edit Profile</a> </li>
                                                    <li class="nav-item"> <a class="nav-link" data-toggle="pill"
                                                            href="#change-password" role="tab">Change Password</a>
                                                    </li>


                                                </ul>

                                            </nav>


                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="edit-profile">
                                                    <div class="tab-pane fade show active" id="editProfile"
                                                        role="tabpanel" aria-labelledby="editProfile-tab">
                                                        <h3 class="py-3">Edit Profile</h3>
                                                        <div class="contact__form__text">
                                                            <form action="#">
                                                                <div class="input-list">
                                                                    <input name="name" type="text"
                                                                        placeholder="Your First name">
                                                                    <input name="last_name" type="text"
                                                                        placeholder="Your Last name">
                                                                </div>
                                                                <div class="input-list">
                                                                    <input type="text" name="mobile_no"
                                                                        placeholder="Your contact number">
                                                                    <input name="date_of_birth"  type="date"
                                                                        placeholder="Date Of Birth">
                                                                </div>

                                                                <button type="submit" class="site-btn">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end tab-pane -->

                                                <div class="tab-pane fade" id="change-password">
                                                    <h3 class="py-3">Change Password</h3>
                                                    <section class="container py-5">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-lg-10">
                                                                <div class="contact__form__text">

                                                                    @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                    <li>{{ $error }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                    <form method="POST"
                                                                        action="{{ route('change.password.submit') }}">
                                                                        @csrf
                                                                        <div class="input-list">
                                                                            <input type="password" name="old_password"
                                                                                placeholder="Old Password">
                                                                            <input type="text" name="otp"
                                                                                placeholder="OTP">
                                                                        </div>
                                                                        <div class="input-list">
                                                                            <input type="password" name="new_password"
                                                                                placeholder="Password">
                                                                            <input type="password" name="confirm_password"
                                                                                placeholder="Confirm Password">
                                                                        </div>
                                                                        <button type="submit" class="site-btn">Change
                                                                            Password</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>

                                                <!-- end tab-pane -->



                                                <!-- end tab-pane -->




                                            </div>

                                        </div>


                                        <!-- tab-content -->





                                    </div>


                                </section>

                            </div>
                            <div class="tab-pane fade" id="tab-nine">
                                <h1>Logout Content</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>













    </main>
@endsection
