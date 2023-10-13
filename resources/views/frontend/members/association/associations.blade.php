@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Association</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Members</a>
                            <span>Association</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Association Section Begin -->
    <section class="latest spad">
        <div class="testimonial spad ">

        </div>
        <div class="testimonial__carousel ">
            <div class="container">
                <div class="row ">

                    @if (isset($associations) && count($associations) > 0)
                        @foreach ($associations as $association)
                            <div class="col-lg-4 my-5">
                                <div class="testimonial__item">

                                    <img class="associationImg" src={{ $association['company_logo'] }} alt="">
                                    <h5>{{ $association['company_name'] }}</h5>
                                    {{-- <span>ICAI Pune</span> --}}
                                    <div class="posted-details">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="{{ url('/') }}"><i
                                                        class="fa fa-calendar"></i>{{ $association['start_date'] }}</a>
                                            </li>
                                            {{-- <li><a href="{{ url('/') }}"><i class="fa fa-clock-o"></i> 10:00 AM</a> --}}
                                            </li>
                                        </ul>
                                    </div>
                                    <p>You need to pay special attention to the type of colors in your business
                                        cards. For
                                        instance, if you’re in the funeral industry, bright-luminous type of colors
                                        may not be
                                        too.</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1>Association Not available.</h1>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Association Section End -->
@endsection
