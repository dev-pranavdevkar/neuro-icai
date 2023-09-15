@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chairman Communique</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Chairman Communique</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="loan-services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="text-center text-lg-left "> {{-- class="home__about__img" --}}
                        <img src="{{ url('frontend/img/ca-rajesh-agarwal.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-2 mt-3 mt-lg-0">
                    <div class="home__about__text">
                        <div class="section-title">
                            {{-- <h2 class="text-center text-lg-left">CA Rajesh Agarwal</h2> --}}
                            <p>Dear Members & Students,</p>
                            <p>I am taking over the charge as a Chairman of the vibrant and prestigious 'Pune Branch of WIRC
                                of ICAI' with great honour and deep sense of gratitude. I am overwhelmed for getting this
                                opportunity to serve our profession.</p>
                            <p>At the same time, I am confident that with your guidance, support and blessings, I will be
                                able to live up to your expectations.</p>
                            <p>If anyone ask me what is integral part of my life, I will sincerely and proudly say, “ICAI is
                                an integral part of my life”</p>
                            <p>I am extremely grateful to my Alma mater i.e. ICAI, as it has given me a lot of respect and
                                power.</p>
                            <p>
                                I owe everything to my alma mater and have been closely working with this branch since 2007
                                where I had contested election of the managing committee member for the first but
                                unfortunately lost it. I must say, though I had lost the election, I was appointed as the
                                Statutory Auditor of the branch and elected managing committee involved me in all the
                                activities conducted throughout the year and I always felt as a part of them.
                            </p>
                            <p>
                                I take this opportunity to thank the central council members, regional council members, all
                                committee members, professional colleagues, family, friends and well-wishers for their
                                unending support and blessings which are always there with me and have made me what I am
                                today.
                            </p>
                            <p>I assure you all that we will work for the professional betterment with a high degree of
                                transparency, integrity and accountability. I am confident that this will be a truly
                                memorable year.</p>
                            <p>Once again, I am thankful for the confidence placed on me and look forward to working with
                                all of you to make our branch at a newer height in 2023-24.</p>
                            <p>My best wishes to members, students and their family members on the occasions of different
                                festivals we celebrate during this month.</p>
                            <p>Thank you for your trust and support.</p>

                            <p>JAI HIND <br />
                                JAI ICAI</p>
                            <div class="d-flex justify-content-end">
                                <h5>
                                    CA. Rajesh Agrawal <br />
                                    <span class="">Chairman</span>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
