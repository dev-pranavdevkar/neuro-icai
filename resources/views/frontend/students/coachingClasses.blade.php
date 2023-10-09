@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Coaching Classes</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Students</a>
                            <span>Coaching Classes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="loan-services spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                {{-- 1 --}}
                <div class="col-lg-12 py-3 ">
                    <div class="card member-card p-4">
                        <div class="card-body " style="border: 1px solid #909090">
                            <div class="row">
                                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/icai.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h4>Venue for Coaching Classes</h4>

                                    <ul>
                                        <li class="my-2"><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                            href="https://maps.app.goo.gl/LDaHDH3XSHSPAF3Q6">Kumar Prestige Point, Gate
                                            No. 4, 1st Floor, Office No. 5A, Shukrawar Peth, Pune – 411002</a></li>
                                  
                                        <li class="my-2"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+918237266002">
                                                8237266002</a>/ <a href="tel:+918237166001">
                                                8237166001</a>
                                        </li>

                                        <li class="my-2"><i class="fa fa-file-text" aria-hidden="true"></i>The Coaching Classes Faculties details of Foundation and Intermediate Course.<a
                                                href=""><br/><b> Click Here</b></a></li>
                                    </ul>
                                    <p class="text-danger"><b>If above contact nos. are not responding you may complaint on<a
                                        class="text-primery"   href="tel:+918237166008"> 8237166008</a></b></p>
                                   
                                </div>
                      
                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>
    </section>
@endsection
