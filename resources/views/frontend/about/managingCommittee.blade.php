@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Managing Committee</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Managing Committee</span>
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
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/ca-rajesh-agarwal.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Rajesh Agrawal</h4>
                                    <p>Chairman</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919823975174">
                                                9823975174</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:chairman@puneicai.org">chairman@puneicai.org</a>/
                                            <a href="mailto:carragrawal@gmail.com"> carragrawal@gmail.com</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#">Office No.
                                                403, 4th Floor, Pinnacle Prestige, Tilak Road, Sadashiv Peth, Next to
                                                Durvankur Dining Hall, Above Cosmos Bank, Pune – 411030</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/amruta_kulkarni.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Amruta Kulkarni</h4>
                                    <p>Vice-Chairperson</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919881434468">
                                                9881434468</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:vicechairman@puneicai.org">vicechairman@puneicai.org </a>/
                                            <a href="mailto:amrutamkulkarni@gmail.com"> amrutamkulkarni@gmail.com</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                href="https://maps.app.goo.gl/SxtLVdH1vsgVGmN7A">6/A Tulsinagar, Near Canara
                                                Bank, Bibwewadi, Pune 411037</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/ajinkya_randive.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Ajinkya Ranadive</h4>
                                    <p>Secretary</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919850718194">
                                                9850718194</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:secretary@puneicai.org"> secretary@puneicai.org</a>/
                                            <a href="mailto:ca.ajinkya@capra.co.in">ca.ajinkya@capra.co.in</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                href="https://maps.app.goo.gl/FNQ7bcoCru13S5Eg6">Office 101 & 102, Gurukrupa
                                                Towers, 1st Floor, Above HDFC Bank, Aranyeshwar Corner, Sahakarnagar, Pune
                                                411009.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/hrishikesh_badve.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Hrishikesh Badve</h4>
                                    <p>Treasurer</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+918087797657">
                                                8087797657</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:treasurer@puneicai.org">treasurer@puneicai.org </a>/
                                            <a href="mailto:h.badve@mbandasso.com">h.badve@mbandasso.com</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#">Flat No. 2,
                                                Sheetal Apartments, Mayur Colony, Kothrud, Pune 411038</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/sachin_miniyar.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Sachin Miniyar</h4>
                                    <p>WICASA Chairman</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919422016303">
                                                9422016303</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:wicasa@puneicai.org">wicasa@puneicai.org</a>/
                                            <a href="mailto:miniyarsachin@gmail.com">miniyarsachin@gmail.com</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                href="https://maps.app.goo.gl/4nSnxnW2xUrdqq2z7">301 Vini Apartment, 2093
                                                Sadashiv Peth, Near Phadke Sabhagrugh, Pune 411030</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 6 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/kashinath_pathare.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Kashinath Pathare</h4>
                                    <p>Immediate Past Chairman</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919890625758">
                                                9890625758</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:kbpathare@gmail.com">kbpathare@gmail.com</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#">Survey
                                                No. 11, Shankar Complex, Kharadi By-Pass Road, Opp. Reliance Mart, Kharadi,
                                                Pune – 411014.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 7 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/pritesh_munot.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Pritesh Munot</h4>
                                    <p>Member</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919860656291">
                                                9860656291</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:pritesh_munot@rediffmail.com">pritesh_munot@rediffmail.com</a>
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">Second
                                                Floor Harismruti Building, Mali Maharaj Raod, Somwar Peth, Pune 411011</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 8 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/pranav_apte.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Pranav Apte</h4>
                                    <p>Member</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919881132594">
                                            9881132594</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:capranav85@gmail.com">capranav85@gmail.com </a>
                                         
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                href="https://maps.app.goo.gl/9zoqtp7o5QKL1yi29">GDA House, Plot No.85, Right Bhusari Colony, Paud Road, Kothrud, Pune – 411 038</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 9 --}}
                <div class="col-lg-6 py-3 ">
                    <div class="card member-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/about/managingCommittee/moushmi_shaha.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <h4>CA Moushmi Shaha</h4>
                                    <p>Member</p>
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919822818188">
                                            9822818188</a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                                href="mailto:moushmimehata@gmail.com">moushmimehata@gmail.com </a>
                                            
                                        </li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                href="https://maps.app.goo.gl/2jQrpBqGMcQQVqLb8">G21, SundarNagari Society; 308, Somwar Peth, Pune: 411011</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
