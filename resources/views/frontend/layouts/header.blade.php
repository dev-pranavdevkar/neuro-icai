<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Loanday Template">
    <meta name="keywords" content="Loanday, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICAI | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__search d-none">
            <i class="fa fa-search search-switch"></i>
        </div>
        <div class="offcanvas__logo ">
            <a href="{{ url('/') }}"><img src="{{ url('frontend/img/logo.jpg')}}" alt=""></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/') }}">About Us</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}"> About Pune Branch </a></li>
                        <li><a href="{{ url('/') }}"> Chairman Communique </a></li>
                        <li><a href="{{ url('/') }}"> Managing Committee </a></li>
                        <li><a href="{{ url('/') }}"> Our Torch Bearer </a></li>
                        <li><a href="{{ url('/') }}"> Sub Committees </a></li>
                        <li><a href="{{ url('/') }}"> Study Circles in Pune </a></li>
                        <li><a href="{{ url('/') }}"> Annual Reports </a></li>
                        <li><a href="{{ url('/') }}"> Past Chairmen </a></li>
                        <li><a href="{{ url('/') }}"> Our Success Stories </a></li>
                        <li><a href="{{ url('/') }}"> Updates </a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/') }}">Members</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}"> Pune Member's Newsletter </a></li>
                        <li><a href="{{ url('/') }}"> Managing Committee Minutes </a></li>
                        <li><a href="{{ url('/') }}"> Exposure Drafts </a></li>
                        <li><a href="{{ url('/') }}"> Subscribe For SMS Alerts </a></li>
                        <li><a href="{{ url('/') }}"> Updates for Members </a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/') }}">Students</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}"> About Pune WICASA </a></li>
                        <li><a href="{{ url('/') }}"> WICASA Managing Committee </a></li>
                        <li><a href="{{ url('/') }}"> Student's Noticeboard </a></li>
                        <li><a href="{{ url('/') }}"> Pune WICASA Newsletter </a></li>
                        <li><a href="{{ url('/') }}"> Coaching Classes </a></li>
                        <li><a href="{{ url('/') }}"> Subscribe for SMS Alerts </a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/') }}">Events</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}"> Upcomming Events </a></li>
                        <li><a href="{{ url('/') }}"> Past Events </a></li>
                       
                    </ul>
                </li>
                <li><a href="{{ url('/') }}">Vacancies</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}"> View Vacancies </a></li>
                        <li><a href="{{ url('/') }}"> Submit a Vacancy </a></li>
                       
                    </ul>
                </li>
                <li><a href="{{ url('/') }}">Downloads</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}"> Presentations </a></li>
                       
                       
                    </ul>
                </li>
                {{-- <li><a href="{{ url('#') }}">Pages</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/') }}">Features</a></li>
                        <li><a href="{{ url('/') }}">Services Details</a></li>
                        <li><a href="{{ url('/') }}">Blog Details</a></li>
                    </ul>
                </li> --}}
                <li><a href="{{ url('/') }}">Contact Us</a></li>
                <li><a href="{{ url('/') }}">Help</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <ul class="offcanvas__widget">
            <li><i class="fa fa-map-marker"></i> <a class="text-dark" href="https://goo.gl/maps/asVSnzzd8GKHVHhe8"> ICAI Bhawan, Bibwewadi, <br/>Pune-411037</a></li>
            <li><i class="fa fa-phone"></i> <a class="text-dark" href="tel:+02024212251">(020) 242-12-251 </a>/<br/><a class="text-dark" href="tel:+02024212252"> (020) 242-12-252</a></li>
            <li><i class="fa fa-envelope"></i> <a class="text-dark" href="mailto: pune@icai.org">pune@icai.org</a></li>
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
                            <li><i class="fa fa-map-marker"></i>  <a class="text-white" href="https://goo.gl/maps/asVSnzzd8GKHVHhe8"> ICAI Bhawan, Bibwewadi, Pune-411037</a></li>
                            <li><i class="fa fa-phone"></i> <a class="text-white" href="tel:+02024212251">(020) 242-12-251 </a>/<a class="text-white" href="tel:+02024212252"> (020) 242-12-252</a></li>
                            <li><i class="fa fa-envelope"></i><a class="text-white" href="mailto: pune@icai.org">pune@icai.org</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                     
                        <div class=" ">
                            <ul class="header__top__widget text-right">
                              
                                <li>
                                    @if(isset($response['userData']))
                                        <i class="fa fa-user"></i>{{ $response['userData']->name }}
                                    @else
                                        <i class="fa fa-user"></i><a class="text-white" href="{{ url('/login') }}">Login</a> / <a class="text-white" href="{{ url('/signup') }}">Register</a>
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
                        <a href="{{ url('/')}}"><img src="{{ url('frontend/img/logo.jpg')}}" width="100%" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav ">
                        <nav class="header__menu ml-auto">
                            <ul>
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/') }}">About Us</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/') }}"> About Pune Branch </a></li>
                                        <li><a href="{{ url('/') }}"> Chairman Communique </a></li>
                                        <li><a href="{{ url('/') }}"> Managing Committee </a></li>
                                        <li><a href="{{ url('/') }}"> Our Torch Bearer </a></li>
                                        <li><a href="{{ url('/') }}"> Sub Committees </a></li>
                                        <li><a href="{{ url('/') }}"> Study Circles in Pune </a></li>
                                        <li><a href="{{ url('/') }}"> Annual Reports </a></li>
                                        <li><a href="{{ url('/') }}"> Past Chairmen </a></li>
                                        <li><a href="{{ url('/') }}"> Our Success Stories </a></li>
                                        <li><a href="{{ url('/') }}"> Updates </a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/') }}">Members</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/') }}"> Pune Member's Newsletter </a></li>
                                        <li><a href="{{ url('/') }}"> Managing Committee Minutes </a></li>
                                        <li><a href="{{ url('/') }}"> Exposure Drafts </a></li>
                                        <li><a href="{{ url('/') }}"> Subscribe For SMS Alerts </a></li>
                                        <li><a href="{{ url('/') }}"> Updates for Members </a></li>
                                    </ul>

                                </li>
                                <li><a href="{{ url('/') }}">Students</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/') }}"> About Pune WICASA </a></li>
                                        <li><a href="{{ url('/') }}"> WICASA Managing Committee </a></li>
                                        <li><a href="{{ url('/') }}"> Student's Noticeboard </a></li>
                                        <li><a href="{{ url('/') }}"> Pune WICASA Newsletter </a></li>
                                        <li><a href="{{ url('/') }}"> Coaching Classes </a></li>
                                        <li><a href="{{ url('/') }}"> Subscribe for SMS Alerts </a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/') }}">Events</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/') }}"> Upcomming Events </a></li>
                                        <li><a href="{{ url('/') }}"> Past Events </a></li>
                                       
                                    </ul>
                                </li>
                                <li><a href="{{ url('/') }}">Vacancies</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/') }}"> View Vacancies </a></li>
                                        <li><a href="{{ url('/') }}"> Submit a Vacancy </a></li>
                                       
                                    </ul>
                                </li>
                                <li><a href="{{ url('/') }}">Downloads</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/') }}"> Presentations </a></li>
                                       
                                       
                                    </ul>
                                </li>
                            
                                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                <li><a href="{{ url('/') }}">Help</a></li>
                            </ul>
                        </nav>
                        <div class="header__search">
                            <i class="fa fa-search search-switch"></i>
                        </div>
                     
                        
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


    