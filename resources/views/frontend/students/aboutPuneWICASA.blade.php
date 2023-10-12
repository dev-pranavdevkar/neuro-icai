@extends('frontend.layouts.main')
@section('main-container')
     <!-- Breadcrumb Section Begin -->
     <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Pune WICASA</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Students</a>
                            <span>About Pune WICASA</span>
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
                            <h2>Welcome To WICASA Pune .</h2>
                            {{-- <h4>Of The Students, By The Students & For The Students</h4> --}}
                            {{-- <h5>OF THE STUDENTS, BY THE STUDENTS & FOR THE STUDENTS</h5> --}}
                            <p class="mt-3">Western India Chartered Accountants Students Association (WICASA) is the student’s wing of Western India Regional Council of Institute of Chartered Accountants Association (WIRC-ICAI). It is this association which provides students a platform to learn, share, participate and perform. It is a platform given by ICAI for the students, by the students and of the students. It’s a family consisting of 1, 50,000 members in western region. The managing committee consists of 12 members who are Chartered Accountancy course students, pursuing their article ship, to be the eminent future torch bearers of the institute. ICAI looks forward to build WICASA as a strong platform for their future growth. It’s a platform for a visionary to build its networking, its social circle and to sharpen its leadership skills by participating in the various activities held in WICASA. </p>
                            
                            <a href="#" class="primary-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="about__item">
                        <h4>What the WICASA Aims to achieve?</h4>
                        <p>
                            <ol>
                                <li>Provides a channel of communication with the Institute for Quick Resolution of student related matters.</li>
                                <li>Assists in providing facilities like Book Bank, Reading Room, and Hostel etc.</li>
                                <li>Organises Lectures, Seminars, Workshop, Conferences and Programmes.</li>
                                <li>Conducts Sports, Youth & Other cultural Activities.</li>
                                <li>Organises Trips, Tours to Factories & Industrial Organizations & to places of Historical & Educational Importance.</li>
                            </ol>
                        </p>
                 
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-4">
                    <div class="about__item">
                        <h4>Various activities held at WICASA</h4>
                        <p>
                            <ul>
                                <li>Quiz and elocution competition for students throughout the region and National Level Competition</li>
                                <li>Special effort for making books available to students staying in Hostel.</li>
                                <li>Large numbers of programs for promoting social/ intellectual/ Cultural activities are organized including topics such as Stress management, Positive Thinking, Yoga Elocution & Quiz competition etc.</li>
                                <li>Various academic students program organized during the year.</li>
                                <li>Students are particularly encouraged to act as co-coordinator at various students’ programmes.</li>
                                <li>Inter-firm Cricket Tournament is organized in which article students participate in large numbers.</li>
                                <li>Separate section for student’s activities referred in WIRC monthly newsletter.</li>
                                <li>Round the clock reading room facilities is made available at various centres.</li>
                            </ul>
                        </p>
                    </div>
                </div>
                
            </div> 
        </div>
    </section>
    <!-- About End -->
 @endsection
