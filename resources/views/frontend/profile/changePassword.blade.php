@extends('frontend.layouts.main')
@section('main-container')
    <main class="">
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>My Account</h2>
                            <div class="breadcrumb__links">
                                <a href="./index.html">Profile</a>
                                <span>Change Password</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <section class="container py-5">
            <div class="row  d-flex justify-content-center">
              
                <div class="col-lg-10">

                
                    <div class="contact__form__text">
                        <div class="contact__form__title">
                            <h2>Change Password</h2>
                            <p>To change password fill the following form</p>
                        </div>
                        <form action="#">
                            <div class="input-list">
                                <input type="text" placeholder="Old Password">
                                <input type="text" placeholder="OTP">
                            </div>
                            <div class="input-list">
                                <input type="password" placeholder="Password">
                                <input type="password" placeholder="Confirm Password">
                            </div>

                            <button type="submit" class="site-btn">Change
                                Password</button>
                        </form>
                    </div>
                

                </div>
            </div>
        </section>






  






    </main>
@endsection
