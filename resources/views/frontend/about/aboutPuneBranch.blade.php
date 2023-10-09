@extends('frontend.layouts.main')
@section('main-container')
     <!-- Breadcrumb Section Begin -->
     <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Pune Branch</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>About Pune Branch</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about__img">
                            <img src="{{url('frontend/img/about/i-love-icai.jpg') }}" alt="">
                            {{-- <a href="https://www.youtube.com/watch?v=RpvAmG1NNN0"
                                class="play-btn video-popup"><img src="{{url('frontend/img/about/video-play.png') }}" alt="">
                            </a> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="about__text">
                            <h2>Welcome To ICAI Pune Branch.</h2>
                            <h4>However, there is much more to branding than</h4>
                            <h5>BRANCH AT GLANCE</h5>
                            <p class="first_para">Where a powerful web presence has become a vital ingredient of your
                                branding </p>
                            <p class="last_para">Unfortunately, many graphic design firms who position themselves as
                                advertising agencies believe that branding your corporate identity is all about
                                developing great looking visual solutions.</p>
                            <a href="#" class="primary-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="about__item">
                        <h4>Our Vision</h4>
                        <p>The modern world is in a continuous movement and people everywhere are looking for quick,
                            safe means of accessing accurate information. Prompt information is vital for people who
                            want to keep the</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="about__item">
                        <h4>Our Mission</h4>
                        <p>The modern world is in a continuous movement and people everywhere are looking for quick,
                            safe means of accessing accurate information. Prompt information is vital for people who
                            want to keep the</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="about__item">
                        <h4>Our Value</h4>
                        <p>The modern world is in a continuous movement and people everywhere are looking for quick,
                            safe means of accessing accurate information. Prompt information is vital for people who
                            want to keep the</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- About End -->
 @endsection
