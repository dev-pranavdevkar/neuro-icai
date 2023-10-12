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
                            <h2>Edit profile</h2>
                            <p>To change personal information fill the form</p>
                        </div>
                        <form action="#">
                            <div class="input-list">
                                <input type="text" placeholder="Your First name">
                                <input type="text" placeholder="Your Last name">
                            </div>
                            <div class="input-list">
                                <input type="text" placeholder="Your contact number">
                                <input type="text" placeholder="Your email Id">
                            </div>

                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                

                </div>
            </div>
        </section>






  






    </main>
@endsection
