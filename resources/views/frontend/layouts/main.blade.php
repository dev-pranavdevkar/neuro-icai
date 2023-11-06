<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Loanday Template">
    <meta name="keywords" content="Loanday, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>ICAI | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        {{-- <div class="offcanvas__search d-none">
            <i class="fa fa-search search-switch"></i>
        </div> --}}
        <div class="offcanvas__logo ">
            <a href="{{ url('/') }}"><img src="{{ url('frontend/img/logo.jpg') }}" alt=""></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">

            <ul>
                {{-- <li class="active"><a href="{{ url('/razorpay-payment') }}">Payment</a></li> --}}
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                <li class="{{ request()->is('about*') ? 'active' : '' }}">About Us 
                    <ul class="dropdown">
                        <li><a href="{{ url('/about/aboutPuneBranch') }}"> About Pune Branch </a></li>
                        <li><a href="{{ url('/about/chairmanCommunique') }}"> Chairman Communique </a>
                        </li>
                        <li><a href="{{ url('/about/managingCommittee') }}"> Managing Committee </a>
                        </li>
                        <li><a href="{{ url('/about/torchBearer') }}"> Our Torch Bearer </a></li>
                        <li><a href="{{ url('/about/subCommittees') }}"> Sub Committees </a></li>
                        <li><a href="{{ url('/about/studyCirclesPune') }}"> Study Circles in Pune </a>
                        </li>
                        <li><a href="{{ url('/about/annualReports') }}"> Annual Reports </a></li>
                        <li><a href="{{ url('/about/pastChairmen') }}"> Past Chairmen </a></li>
                        <li><a href="{{ url('/about/successStories') }}"> Our Success Stories </a>
                        </li>
                        <li><a href="{{ url('/about/updates') }}"> Updates </a></li>
                    </ul>
                </li>


                @if (
                    !Auth::user() ||
                        (Auth::user() &&
                            in_array(
                                'members',
                                Auth::user()->roles->pluck('name')->toArray())))
                    <li class="{{ request()->is('members*') ? 'active' : '' }}"><a href="">Members</a>
                        <ul class="dropdown">
                            <li><a href="{{ url('members/puneMembersNewsletter') }}"> Pune Member's
                                    Newsletter </a></li>
                            <li><a href="{{ url('members/managingCommitteeMinutes') }}"> Managing
                                    Committee Minutes </a></li>
                            <li><a href="{{ url('members/exposureDrafts') }}"> Exposure Drafts </a>
                            </li>
                            {{-- <li><a href="{{ url('members/subscribeForSMSAlerts') }}"> Subscribe For
                                    SMS Alerts </a></li> --}}
                            <li><a href="{{ url('members/updatesForMembers') }}"> Updates for Members
                                </a></li>
                            <li><a href="{{ url('/members/membersNoticeboard') }}"> Members Noticeboard
                                </a></li>
                            <li><a href="{{ url('/members/association/associations') }}"> Associations
                                </a></li>

                        </ul>

                    </li>
                @endif

                @if (
                    !Auth::user() ||
                        (Auth::user() &&
                            in_array(
                                'student',
                                Auth::user()->roles->pluck('name')->toArray())))
                    <li class="{{ request()->is('students*') ? 'active' : '' }}"><a href="">Students</a>
                        <ul class="dropdown">
                            <li><a href="{{ url('/students/aboutPuneWICASA') }}"> About Pune WICASA
                                </a></li>
                            <li><a href="{{ url('/students/WICASAManagingCommittee') }}"> WICASA
                                    Managing Committee </a></li>
                            <li><a href="{{ url('/students/studentsNoticeboard') }}"> Student's
                                    Noticeboard </a></li>
                            <li><a href="{{ url('/students/puneWICASANewsletter') }}"> Pune WICASA
                                    Newsletter </a></li>
                            <li><a href="{{ url('/students/coachingClasses') }}"> Coaching Classes
                                </a></li>
                            {{-- <li><a href="{{ url('/students/subscribeForSMSAlerts') }}"> Subscribe for
                                    SMS Alerts </a></li> --}}
                            <li><a href="{{ url('/students/batch') }}"> Batches </a></li>
                        </ul>
                    </li>
                @endif





                <li  class="{{ request()->is('events*') ? 'active' : '' }}"><a href="">Events</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/events/upcommingEvents') }}"> Upcomming Events </a></li>
                        <li><a href="{{ url('/events/pastEvents') }}"> Past Events </a></li>

                    </ul>
                </li>
                <li class="{{ request()->is('vacancies*') ? 'active' : '' }}"><a href="{{ url('/vacancies/viewVacancies') }}">Vacancies</a>
                    @if (
                          
                    (Auth::user() &&
                        in_array(
                            'members',
                            Auth::user()->roles->pluck('name')->toArray())))
                    <ul class="dropdown">
                        <li><a href="{{ url('/vacancies/viewVacancies') }}"> View Vacancies </a>
                        </li>
                     
                            <li><a href="{{ url('/vacancies/submitVacancies') }}"> Submit a Vacancy
                                </a></li>
                       
                    </ul>
                    @endif
                </li>

                {{-- <li><a href="">Downloads</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/downloads/presentations') }}"> Presentations </a></li>


                    </ul>
                </li> --}}

                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact Us</a></li>
                <li class="">
                    @if (Auth::user())
                    <a href="{{ url('/dashboard') }}">  {{ Auth::user()->name }} {{ Auth::user()->last_name }}</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </li>


                {{-- <li><a href="{{ url('/help') }}">Help</a></li> --}}
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <ul class="offcanvas__widget">
            <li><i class="fa fa-map-marker"></i> <a class="text-dark" href="https://goo.gl/maps/asVSnzzd8GKHVHhe8">
                    ICAI
                    Bhawan, Bibwewadi, <br />Pune-411037</a></li>
            <li><i class="fa fa-phone"></i> <a class="text-dark" href="tel:+02024212251">(020) 242-12-251
                </a>/<br /><a class="text-dark" href="tel:+02024212252"> (020) 242-12-252</a></li>
            <li><i class="fa fa-envelope"></i> <a class="text-dark" href="mailto: pune@icai.org">pune@icai.org</a>
            </li>
        </ul>

    </div>
    <!-- Offcanvas Menu End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="px-5">
                <div class="row">
                    <div class="col-lg-9">
                        <ul class="header__top__widget">
                            <li><i class="fa fa-map-marker"></i> <a class="text-white"
                                    href="https://goo.gl/maps/asVSnzzd8GKHVHhe8"> ICAI Bhawan, Bibwewadi,
                                    Pune-411037</a></li>
                            <li><i class="fa fa-phone"></i> <a class="text-white" href="tel:+02024212251">(020)
                                    242-12-251 </a>/<a class="text-white" href="tel:+02024212252"> (020)
                                    242-12-252</a></li>
                            <li><i class="fa fa-envelope"></i><a class="text-white"
                                    href="mailto: pune@icai.org">pune@icai.org</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">

                        <div class=" ">
                            <ul class="header__top__widget text-right">

                                <li id="user-dropdown" class="dropdown">
                                    @if (Auth::user())
                                        {{-- ------------------- --}}
                                        <div class=" ">
                                            <div class="header__menu profile-dropdown">
                                                <ul>

                                                    <li class="p-0"> <i class="fa fa-user"></i>
                                                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                                        <ul class="dropdown">

                                                            <li><a href="{{ url('/dashboard') }}"> Dashboard </a></li>
                                                            <li><a href="{{ url('/profile/digitalIdCard') }}"> Digital
                                                                    ID
                                                                    Card </a></li>
                                                                    
                                                            <li><a href="{{ url('/profile/editProfile') }}">
                                                                    Personal Details </a>
                                                            </li>
                                                            {{-- <li><a href="{{ url('/profile/changePassword') }}">
                                                                    Change Password </a>
                                                            </li> --}}
                                                            <li><a href="{{ route('logout') }}"> Logout </a></li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <i class="fa fa-user"></i>
                                        <a class="text-white" href="{{ url('/login') }}">Login</a> / <a
                                            class="text-white" href="{{ url('/signup') }}">Register</a>
                                    @endif


                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-lg-5 px-3 ">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ url('frontend/img/logo.jpg') }}" width="100%"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav ">
                        <nav class="header__menu ml-auto">
                            <ul>
                                {{-- <li class="active"><a href="{{ url('/razorpay-payment') }}">Payment</a></li> --}}
                                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                                <li class="{{ request()->is('about*') ? 'active' : '' }}"><a href="">About Us </a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/about/aboutPuneBranch') }}"> About Pune Branch </a></li>
                                        <li><a href="{{ url('/about/chairmanCommunique') }}"> Chairman Communique </a>
                                        </li>
                                        <li><a href="{{ url('/about/managingCommittee') }}"> Managing Committee </a>
                                        </li>
                                        <li><a href="{{ url('/about/torchBearer') }}"> Our Torch Bearer </a></li>
                                        <li><a href="{{ url('/about/subCommittees') }}"> Sub Committees </a></li>
                                        <li><a href="{{ url('/about/studyCirclesPune') }}"> Study Circles in Pune </a>
                                        </li>
                                        <li><a href="{{ url('/about/annualReports') }}"> Annual Reports </a></li>
                                        <li><a href="{{ url('/about/pastChairmen') }}"> Past Chairmen </a></li>
                                        <li><a href="{{ url('/about/successStories') }}"> Our Success Stories </a>
                                        </li>
                                        <li><a href="{{ url('/about/updates') }}"> Updates </a></li>
                                    </ul>
                                </li>


                                @if (
                                    !Auth::user() ||
                                        (Auth::user() &&
                                            in_array(
                                                'members',
                                                Auth::user()->roles->pluck('name')->toArray())))
                                    <li class="{{ request()->is('members*') ? 'active' : '' }}"><a href="">Members</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('members/puneMembersNewsletter') }}"> Pune Member's
                                                    Newsletter </a></li>
                                            <li><a href="{{ url('members/managingCommitteeMinutes') }}"> Managing
                                                    Committee Minutes </a></li>
                                            <li><a href="{{ url('members/exposureDrafts') }}"> Exposure Drafts </a>
                                            </li>
                                            {{-- <li><a href="{{ url('members/subscribeForSMSAlerts') }}"> Subscribe For
                                                    SMS Alerts </a></li> --}}
                                            <li><a href="{{ url('members/updatesForMembers') }}"> Updates for Members
                                                </a></li>
                                            <li><a href="{{ url('/members/membersNoticeboard') }}"> Members
                                                    Noticeboard
                                                </a></li>
                                            <li><a href="{{ url('/members/association/associations') }}"> Associations
                                                </a></li>
                                        </ul>

                                    </li>
                                @endif

                                @if (
                                    !Auth::user() ||
                                        (Auth::user() &&
                                            in_array(
                                                'student',
                                                Auth::user()->roles->pluck('name')->toArray())))
                                    <li class="{{ request()->is('students*') ? 'active' : '' }}"><a href="">Students</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('/students/aboutPuneWICASA') }}"> About Pune WICASA
                                                </a></li>
                                            <li><a href="{{ url('/students/WICASAManagingCommittee') }}"> WICASA
                                                    Managing Committee </a></li>
                                            <li><a href="{{ url('/students/studentsNoticeboard') }}"> Student's
                                                    Noticeboard </a></li>
                                            <li><a href="{{ url('/students/puneWICASANewsletter') }}"> Pune WICASA
                                                    Newsletter </a></li>
                                            <li><a href="{{ url('/students/coachingClasses') }}"> Coaching Classes
                                                </a></li>
                                            {{-- <li><a href="{{ url('/students/subscribeForSMSAlerts') }}"> Subscribe for
                                                    SMS Alerts </a></li> --}}
                                            <li><a href="{{ url('/students/batch') }}"> Batches </a></li>
                                        </ul>
                                    </li>
                                @endif





                                <li class="{{ request()->is('events*') ? 'active' : '' }}"><a href="">Events</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/events/upcommingEvents') }}"> Upcomming Events </a></li>
                                        <li><a href="{{ url('/events/pastEvents') }}"> Past Events </a></li>

                                    </ul>
                                </li>
                                <li  class="{{ request()->is('vacancies*') ? 'active' : '' }}"><a href="{{ url('/vacancies/viewVacancies') }}">Vacancies</a>
                                    @if (
                                         
                                    (Auth::user() &&
                                        in_array(
                                            'members',
                                            Auth::user()->roles->pluck('name')->toArray())))
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/vacancies/viewVacancies') }}"> View Vacancies </a>
                                        </li>
                                     
                                            <li><a href="{{ url('/vacancies/submitVacancies') }}"> Submit a Vacancy
                                                </a></li>
                                      
                                    </ul>
                                    @endif
                                </li>
                                {{-- <li><a href="">Downloads</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/downloads/presentations') }}"> Presentations </a></li>


                                    </ul>
                                </li> --}}

                                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact Us</a></li>
                                {{-- <li><a href="{{ url('/help') }}">Help</a></li> --}}
                            </ul>
                        </nav>
                        {{-- <div class="header__search">
                            <i class="fa fa-search search-switch"></i>
                        </div> --}}


                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>

    @yield('main-container')
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="px-lg-5 px-3">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__widget">
                            {{-- <a href="{{ url('/') }}"><img src="{{ url('frontend/img/footer-logo.png') }}"
                                    alt="">
                            </a> --}}
                            <a href="https://goo.gl/maps/asVSnzzd8GKHVHhe8">
                                <h5>The Institute Of Chartered Accountants Of India </h5>
                            </a>
                        </div>
                        <a href="https://goo.gl/maps/asVSnzzd8GKHVHhe8">
                            <p>Pune Branch of WIRC of ICAI<br />
                                ICAI Bhawan, Plot No. 8,
                                Near Mahavir Electronics,
                                Parshwanath Nagar, Bibwewadi,
                                Pune - 411 037, Maharashtra, India.</p>
                        </a>
                    </div>

                    <div class="footer__widget footer__widget--address">
                        <h5>Open Hours</h5>
                        <p>Monday to Saturday (Except Public Holidays) 10.00 am to 6.00 pm</p>
                        <ul>
                            <li>Lunch Break: 01:30 am - 01:30 pm</li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2  col-md-3 col-6">
                    <div class="footer__widget">
                        <h5>Members</h5>
                        <div class="footer__widget">
                            <ul>
                                <li><a href="https://www.cpeicai.org/">Check CPE Hours</a></li>
                                <li><a href="{{ url('/members/CPEStudyCircles') }}">CPE Study Circles</a></li>
                                <li><a href="{{ url('/members/exposureDrafts') }}">Exposure DRAFTS</a></li>
                                {{-- <li><a href="{{ url('/members/subscribeForSMSAlerts') }}">Members SMS Alerts</a></li> --}}
                                <li><a href="https://pqc.icai.org/">Post Qualification Courses</a></li>
                                <li><a href="{{ url('/members/updatesForMembers') }}">Notice Board</a></li>
                                <li><a href="{{ url('/members/membersFAQ') }}">FAQ's</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="footer__widget">
                        <h5>Students</h5>
                        {{-- <div class="footer__widget footer__widget--social">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                                <li><a href=""><i class="fa fa-instagram"></i> Instagram</a></li>
                                <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href=""><i class="fa fa-skype"></i> Skype</a></li>
                            </ul>
                        </div> --}}
                        <div class="footer__widget">
                            <ul>

                                <li><a href="{{ url('/students/aboutPuneWICASA') }}">WICASA</a></li>
                                <li><a class="text-nowrap"
                                        href="{{ url('/students/WICASAManagingCommittee') }}">WICASA Managing
                                        Committee</a></li>
                                <li><a href="{{ url('/students/ICITSS') }}">ICITSS</a></li>
                                <li><a href="{{ url('/students/AICITSS') }}">AICITSS</a></li>
                                <li><a href="{{ url('/students/ICITSSOrientationCourse') }}">ICITSS - Orientation
                                        Course</a></li>
                                <li><a href="{{ url('/students/advancedICITSSMCSCourse') }}">Advanced (ICITSS) MCS
                                        Course</a></li>
                                <li><a href="{{ url('/students/libraryReadingRooms') }}">Library /Reading Rooms</a>
                                </li>
                                <li><a href="{{ url('/students/studentNoticeboard') }}">Student Noticeboard</a></li>
                                <li><a href="{{ url('/students/studentFAQs') }}">Student FAQs</a></li>
                                {{-- <li><a href="{{ url('/students/subscribeForSMSAlerts') }}">Student's SMS Alerts</a>
                                </li> --}}

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="footer__widget">
                        <h5>Useful Links</h5>
                        <div class="footer__widget">
                            <ul>
                                <li><a href="{{ url('/termsAndConditions') }}">Terms & Conditions</a></li>
                                <li><a href="{{ url('/privacyPolicy') }}">Privacy Policy</a></li>
                                <li><a href="{{ url('/termsOfUse') }}">Terms Of Use</a></li>
                                <li><a href="{{ url('/atSalesCounter') }}">At Sales Counter</a></li>
                                <li><a href="{{ url('/members/exposureDrafts') }}">Exposure DRAFTS</a></li>
                                <li><a href="{{ url('/members/managingCommitteeMinutes') }}">MC MINUTES</a></li>
                                <li><a href="{{ url('/usefulLinks') }}">Useful Links</a></li>
                                <li><a href="{{ url('/vacancies/viewVacancies') }}">Article Vacancy</a></li>
                                <li><a href="{{ url('/tenders') }}">Tenders</a></li>
                                {{-- <li><a href="{{ url('/help') }}">Help</a></li> --}}

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-6">
                    <div class="footer__widget footer__widget--address">
                        <h5>Social Media</h5>
                        <div class="footer__widget footer__widget--social">
                            <ul class="d-flex justify-content-between">
                                <li><a href="https://www.facebook.com/punewirc/"><i class="fa fa-facebook"></i> </a>
                                </li>
                                <li><a href="https://twitter.com/PuneICAI"><i class="fa fa-twitter"></i> </a></li>
                                <li><a href="https://www.linkedin.com/in/puneicai/"><i class="fa fa-linkedin"></i>
                                    </a></li>
                                <li><a href="https://www.youtube.com/PuneICAIOfficial"><i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li><a href="https://t.me/PuneICAI"><i class="fa fa-telegram"></i> </a></li>
                                <li><a href="https://wa.me/918237266114"><i class="fa fa-whatsapp"></i> </a></li>
                                <li><a href="https://instagram.com/puneicai"><i class="fa fa-instagram"></i> </a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget footer__widget--address">
                        <h5>Contact Us</h5>
                        <div class="footer__widget footer__widget--social">
                            <ul>
                                <li><a href="tel:+918237166002"><i class="fa fa-phone"></i> +91 8237 16 6002</a></li>
                                <li><a href="mailto: pune@icai.org"><i class="fa fa-envelope"></i> pune@icai.org</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="footer__widget footer__widget--address d-none d-lg-block">
                        <h5>Subscribe Newsletter</h5>
                        <div class="footer__widget footer__widget--social">
                            <ul>
                                <li>For Member's Newsletter
                                    <form class="d-flex" action="#" class="subscribe__form">
                                        <input class="subscribe__form__input " type="text" placeholder="Email Id">
                                        <button type="submit" class="subscribe__btn">Subscribe</button>
                                    </form>

                                </li>

                                <li class="mt-5">For Student's Newsletter
                                    <form class="d-flex" action="#" class="subscribe__form">
                                        <input class="subscribe__form__input " type="text" placeholder="Email Id">
                                        <button type="submit" class="subscribe__btn">Subscribe</button>
                                    </form>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer__widget footer__widget--address d-block d-lg-none">
                        <h5>Subscribe Newsletter</h5>
                        <div class="footer__widget footer__widget--social">
                            <ul>
                                <li>For Member's Newsletter
                                    <form class="d-flex" action="#" class="subscribe__form">
                                        <input class="subscribe__form__input " type="text" placeholder="Email Id">
                                        <button type="submit" class="subscribe__btn">Subscribe</button>
                                    </form>

                                </li>

                                <li class="mt-5">For Student's Newsletter
                                    <form class="d-flex" action="#" class="subscribe__form">
                                        <input class="subscribe__form__input " type="text" placeholder="Email Id">
                                        <button type="submit" class="subscribe__btn">Subscribe</button>
                                    </form>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer__copyright">
                <div class="row">
                    <div class="col-lg-6 col-md-6 ">
                        <div class="footer__copyright__text">
                            <p>Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved |<a class="text-white"
                                    href="{{ url('/') }}"> The Institute
                                    Of Chartered Accountants Of India</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="footer__developed__by__text">
                            <p> Developed By | <a href="https://neuromonk.com/" target="_blank">
                                    {{-- <img src="{{ url('frontend/img/neuromonk.png') }}"alt=""> --}}
                                    Neuromonk Infotech Pvt Ltd</a>
                            </p>
                        </div>

                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>


        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->
    {{-- Fixed Side Social Media Apps --}}


    <div class="side-social-media-apps {{ request()->is('dashboard') ? 'd-none' : '' }}">
        <ul class="">

            <li id="side-facebook">
                <a class="social-btn" href="https://www.facebook.com/punewirc/">

                    <i class="fa fa-facebook"></i>
                </a>
            </li>

            <li id="side-twitter"><a class="social-btn" href="https://twitter.com/PuneICAI">

                    <i class="fa fa-twitter"></i></a>
            </li>

            <li id="side-linkedin"><a class="social-btn" href="https://www.linkedin.com/in/puneicai/">

                    <i class="fa fa-linkedin"></i></a>
            </li>

            <li id="side-telegram"><a class="social-btn" href="https://t.me/PuneICAI">

                    <i class="fa fa-telegram"></i></a>
            </li>

            <li id="side-whatsapp"><a class="social-btn" href="https://wa.me/918237266114">

                    <i class="fa fa-whatsapp"></i></a>
            </li>

            <li id="side-instagram"><a class="social-btn" href="https://instagram.com/puneicai">

                    <i class="fa fa-instagram"></i></a>
            </li>
        </ul>
    </div>

    {{-- End Fixed Side Social Media Apps --}}
    <!-- Js Plugins -->
    <script src="{{ url('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/main.js') }}"></script>
    <script src="{{ url('frontend/js/eyeicon.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show/hide the dropdown menu when clicking on the user name
            $('#profile-dropdown').click(function(e) {
                e.stopPropagation(); // Prevent the document click event from closing the menu
                $('#profile-dropdown-menu').toggle();
            });

            // Close the dropdown menu when clicking anywhere outside of it
            $(document).click(function() {
                $('#profile-dropdown-menu').hide();
            });
        });
    </script>
    @yield('js')

</body>

</html>
