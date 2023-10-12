@extends('frontend.layouts.main')
@section('main-container')
     <!-- Breadcrumb Section Begin -->
     <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>ICITSS-(Information Technology)</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Students</a>
                            <span>ICITSS</span>
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
                            <h2>ICITSS</h2>
                            {{-- <h4>Of The Students, By The Students & For The Students</h4> --}}
                            <h5>Course on Information Technology</h5>
                            <p class="mt-3">The course develops an understanding for use of Information Technology in the field of accounting and auditing and uniform theoretical and practical knowledge to all the aspiring CA students. The training components of the course focus on use of Application Software relevant for Accounting, Auditing and allied areas related to the CA profession. The training would focus on knowledge of Electronic Spread Sheet, Data Base Management System, Computer Assisted Audit Technique (CAAT) and Accounting Package etc.
                                
                            </p>
                         
                            
                            <a href="https://www.icaionlineregistration.org/" class="primary-btn">Registration of ITT</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="about__item">
                        <h4>The highlights of the ICITSS </h4>
                            
                        <p><b class="text-dark">Course on Information Technology are as follows:</b>
                            <ul>
                                <li>The classes are scheduled for minimum 6 hour per day in 15 working days.</li>
                                <li>The fee shall be Rs. 6500 (Six Thousand Five Hundred only) per student on non residential basis, inclusive of course material and tea/refreshment.</li>
                                <li>The accredited ITT center issues certificate to students who successfully completed the Course on Information Technology (ICITSS)</li>
                            </ul>
                        </p>
                 
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-4">
                    <div class="about__item">
                        {{-- <b>Pune Branch Declare ICITSS (Information Technology) Batches after the result of IPCC Exam-May-2017.</b> --}}
                        <h4>Venue</h4>
                      
                            <div class="contact__address__item">
                            
                                <ul>
                                    <li><i class="fa fa-map-marker"></i><a class="" href="">
                                        3rd Floor, Pune Branch of WIRC of ICAI
                                        ICAI Bhawan,<br/> Plot No.8, Parshwanath Nagar,
                                        CTS No. 333, Sr. No. 573, Munjeri, Opp. Kale hospital,
                                        Near Mahavir Electronics, Bibwewadi,
                                        Pune 411 037</a></li>
                                    <li><i class="fa fa-phone"></i><a href="tel:02024212251">020-2421 2251</a> /<a href="tel:02024212252">020-2421 2252</a> /<a href="tel:918237166003">8237166003</a></li>
                                  
                                </ul>
                            </div>
                      
                    </div>
                </div>
                
            </div> 
        </div>
    </section>
    <!-- About End -->
 @endsection
