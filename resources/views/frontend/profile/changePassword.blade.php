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
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="contact__form__text">
                        <div class="contact__form__title text-center">
                            <h2>Change Password</h2>
                            <p>To change password fill the following form</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="changePassword" action="{{ route('changePassword') }}" method="POST" onsubmit="return">
                            @csrf
                            <div class="input-list">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input class="w-100" type="password" name="old_password" placeholder="Old Password">
                            </div>
                            <div class="input-list">
                                <input class="w-100" type="password" name="new_password" placeholder="New Password">
                            </div>
                            <div class="input-list">
                                <input class="w-100" type="password" name="confirm_password" placeholder="Confirm New Password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="site-btn">Change Password</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>






  






    </main>
@endsection
