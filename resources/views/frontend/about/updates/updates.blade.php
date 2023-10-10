@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Latest Updates</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Latest Updates</span>
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
            <div class="row mt-5">
                
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
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
                            </div>
                            <div class="text-center">
                                <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
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
                            </div>
                            <div class="text-center">
                              <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
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
                            </div>
                            <div class="text-center">
                              <a class="readMore" href="/updates/updatesDetails">Read More</a>
                            </div>
                        </div>
                    </div>
                    {{-- ------------------------------------------------------------------------------------------- --}}
                </div>
                <div class="col-lg-3 py-3 py-lg-0">
                    {{-- ------------------------------------------------------------------------------------------- --}}
                    <div class="card events-card">
                        <img class="card-img-top" src="{{ url('frontend/img/loan-services/ls-3.jpg') }}"
                            alt="Card image cap">
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
                            </div>
                            <div class="text-center">
                              <a class="readMore" href="/updates/updatesDetails">Read More</a>
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



<div class="container">

    {{-- Event Data --}}
    @if (isset($eventData) && count($eventData) > 0)
        <div class="">
            <h2>Event Details:</h2>
            <ul>
                @foreach ($eventData as $event)
                    <li>
                        Event Name: {{ $event['event_name'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Association Data --}}
    @if (isset($associationData) && count($associationData) > 0)
        <div class="">
            <h2>Association Details:</h2>
            <ul>
                @foreach ($associationData as $association)
                    <li>
                        Association Name: {{ $association['company_name'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- NewsletterData Data --}}
    @if (isset($newsletterData) && count($newsletterData) > 0)
        <div class="">
            <h2>NewsletterData Details:</h2>
            <ul>
                @foreach ($newsletterData as $newsletter)
                    <li>
                        Newsletter Title: {{ $newsletter['title'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- NoticeBoardData Data --}}
    @if (isset($noticeBoardData) && count($noticeBoardData) > 0)
        <div class="">
            <h2>NoticeBoardData Details:</h2>
            <ul>
                @foreach ($noticeBoardData as $noticeBoard)
                    <li>
                        NoticeBoard Title: {{ $noticeBoard['title'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- If No Data Available --}}
    @if (!isset($eventData) && !isset($associationData) && !isset($newsletterData) && !isset($noticeBoardData))
        <h1>No data available.</h1>
    @endif
</div>
