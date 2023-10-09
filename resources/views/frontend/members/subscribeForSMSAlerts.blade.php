@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option contact-breadcrumb set-bg"
        data-setbg="{{ url('frontend/img/breadcrumb/contact-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Subscribe for SMS Alerts</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__text">
                            <div class="contact__form__title">
                                <h2>Get SMS Alerts</h2>
                                <p>Please fill this form for SMS Alerts
                                <form action="#">
                                    <div class="input-list">
                                        <input type="text" placeholder="Your name">
                                        <input type="text" placeholder="Your email">
                                    </div>
                                    <div class="input-list">
                                        <input type="text" placeholder="Membership Number">
                                        <input type="tel" placeholder="Mobile Number">
                                    </div>
                                 
                                    <button type="submit" class="site-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
    </section>
 
    <!-- Contact End -->
@endsection
