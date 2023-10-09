
@extends('frontend.layouts.main')
@section('main-container')
    {{-- <section class="">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center my-3">
                <div class="col-lg-5 ">
                    <div class="hero__form">
                        <h3>Sign Up</h3>

                        <!-- Registration Form -->
                        <form id="registrationForm" action="{{ route('registerUser') }}" method="POST"
                            enctype="multipart/form-data">


                            @csrf <!-- CSRF token -->

                            <!-- Role Selection -->
                            <div class="input-list ">
                                <p>Register As</p>
                                <div class="input-list-item radio d-flex">
                                    <input class="radio-btn" type="radio" id="member" name="role"
                                        value="member">
                                    <p>Member</p>
                                </div>
                                <div class="input-list-item d-flex">
                                    <input class="radio-btn" type="radio" id="student" name="role"
                                        value="student">
                                    <p>Student</p>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="input-list">
                                <div class="input-list-item">
                                    <p>First Name</p>
                                    <input type="text" name="name" autocomplete="off">
                                </div>
                                <div class="input-list-item">
                                    <p>Last Name</p>
                                    <input type="text" name="last_name" autocomplete="off">
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="input-list">
                                <div class="input-list-item">
                                    <p>Mobile Number</p>
                                    <input type="tel" pattern="[0-9]{10}" name="mobile_no" maxlength="10"
                                        autocomplete="off">
                                </div>
                                <div class="input-list-item">
                                    <p>Date Of Birth</p>
                                    <input type="date" name="date_of_birth" autocomplete="off">
                                </div>
                            </div>

                            <!-- Email and Password -->
                            <div class="input-full-width">
                                <p>Email ID</p>
                                <input type="text" name="email" autocomplete="off">
                            </div>
                            <div class="input-list">
                                <div class="input-list-item">
                                    <label for="password">Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" id="password" name="password" required
                                            autocomplete="off">
                                        <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                                            <i class="fa fa-eye" id="eye-icon-password"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="input-list-item">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" id="password_confirmation"
                                            name="password_confirmation" required autocomplete="off">
                                        <span class="password-toggle"
                                            onclick="togglePasswordVisibility('password_confirmation')">
                                            <i class="fa fa-eye" id="eye-icon-password_confirmation"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sign Up Button -->
                            <button type="submit" id="signupButton" class="site-btn" >Sign Up</button>
                            <!-- Success Message -->
                            @php
                                $role = request('role');
                            @endphp

                       
                            <!-- Login Link -->
                            <div class="mt-3 d-flex justify-content-center">
                                <p> Already have an account? <a class="text-primery" href="/login">Login</a></p>
                            </div>

                            <!-- OR Divider -->
                            <div class="d-flex align-items-center">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"></div>
                                </div>
                                <div class="px-3">
                                    <h5>OR</h5>
                                </div>
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"></div>
                                </div>
                            </div>

                            <!-- Google and Facebook Logos -->
                            <div class="d-flex justify-content-center mt-4">
                                <div><img class="signupwithlogo" src="{{ url('frontend/img/google-logo.png') }}"
                                        alt="Google Logo" /> </div>
                                <div class="ml-5"><img class="signupwithlogo"
                                        src="{{ url('frontend/img/facebook_logo.png') }}" alt="Facebook Logo" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__form">
                        <h3>Sign Up</h3>

                        <!-- Registration Form -->
                        <form id="registrationForm" action="{{ route('registerUser') }}" method="POST"
                            enctype="multipart/form-data">


                            @csrf <!-- CSRF token -->

                            <!-- Role Selection -->
                            <div class="input-list ">
                                <p>Register As</p>
                                <div class="input-list-item radio d-flex">
                                    <input class="radio-btn" type="radio" id="member" name="role"
                                        value="member">
                                    <p>Member</p>
                                </div>
                                <div class="input-list-item d-flex">
                                    <input class="radio-btn" type="radio" id="student" name="role"
                                        value="student">
                                    <p>Student</p>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="input-list">
                                <div class="input-list-item">
                                    <p>First Name</p>
                                    <input type="text" name="name" autocomplete="off">
                                </div>
                                <div class="input-list-item">
                                    <p>Last Name</p>
                                    <input type="text" name="last_name" autocomplete="off">
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="input-list">
                                <div class="input-list-item">
                                    <p>Mobile Number</p>
                                    <input type="tel" pattern="[0-9]{10}" name="mobile_no" maxlength="10"
                                        autocomplete="off">
                                </div>
                                <div class="input-list-item">
                                    <p>Date Of Birth</p>
                                    <input type="date" name="date_of_birth" autocomplete="off">
                                </div>
                            </div>

                            <!-- Email and Password -->
                            <div class="input-full-width">
                                <p>Email ID</p>
                                <input type="text" name="email" autocomplete="off">
                            </div>
                            <div class="input-list">
                                <div class="input-list-item">
                                    <label for="password">Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" id="password" name="password" required
                                            autocomplete="off">
                                        <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                                            <i class="fa fa-eye" id="eye-icon-password"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="input-list-item">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" id="password_confirmation"
                                            name="password_confirmation" required autocomplete="off">
                                        <span class="password-toggle"
                                            onclick="togglePasswordVisibility('password_confirmation')">
                                            <i class="fa fa-eye" id="eye-icon-password_confirmation"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sign Up Button -->
                            <button type="submit" id="signupButton" class="site-btn" >Sign Up</button>
                            <!-- Success Message -->
                            @php
                                $role = request('role');
                            @endphp

                       
                            <!-- Login Link -->
                            <div class="mt-3 d-flex justify-content-center">
                                <p> Already have an account? <a class="text-primery" href="/login">Login</a></p>
                            </div>

                            <!-- OR Divider -->
                            <div class="d-flex align-items-center">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"></div>
                                </div>
                                <div class="px-3">
                                    <h5>OR</h5>
                                </div>
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"></div>
                                </div>
                            </div>

                            <!-- Google and Facebook Logos -->
                            <div class="d-flex justify-content-center mt-4">
                                <div><img class="signupwithlogo" src="{{ url('frontend/img/google-logo.png') }}"
                                        alt="Google Logo" /> </div>
                                <div class="ml-5"><img class="signupwithlogo"
                                        src="{{ url('frontend/img/facebook_logo.png') }}" alt="Facebook Logo" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                
                </div>
            </div>
        </div>
    </section>

    @endsection