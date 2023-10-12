
@extends('frontend.layouts.main')
@section('main-container')
    {{-- <section class="">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center my-5">

                <div class="col-lg-5 " id="forgetPassword">
                    <div class="hero__form">
                        <h3>Forget Password</h3>

                        <form id="forgetPAssword" action="{{ route('forgetPassword') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-full-width">
                                <p>Email Id</p>
                                <input type="email" id="email" name="email">
                            </div>


                            <button type="submit" class="site-btn" id="sendOTPButton">Send OTP</button>


                        </form>


                        <div class="mt-3 d-flex justify-content-between">
                            <p><a class="text-primery" href="/login">Back To Login</a></p>
                            <p> Don't have an account? <a class="text-primery" href="/signup">Sign Up</a></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 " id="otpscreen" style="display: none;">
                    <div class="hero__form">
                        <h3>Enter 4 Digit Code</h3>
                        <p class="text-center">We Send Code To
                            <b>yourmailid@domain.com</b>
                        </p>
                        <form id="verifyOtp" action="{{ route('verifyOtp') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                            <h5></h5>
                            <p>
                            </p>

                            <div class="mt-3 d-flex justify-content-center">
                                <div class="otp-field mb-4">
                                    <input class="otp-input" type="text" maxlength="1" id="digit1" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit2" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit3" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit4" />

                                </div>
                            </div>
                            <button class="site-btn mb-3">
                                Verify OTP
                            </button>
                            <div class="mt-3 d-flex justify-content-center">
                                <p> Don't received OTP? <a class="text-primery" href="/login">Resend OTP</a></p>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 " id="resetPassword" style="display: none;">
                    <div class="hero__form">
                        <h3>Reset Password</h3>

                        <form id="changeForgetPassword" action="{{ route('changeForgetPassword') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-full-width">
                            <p>Email Id</p>
                            <input type="email" id="email" name="email">
                        </div>

                            <div class="input-full-width">
                                <label for="password">Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" id="password" name="password" required>
                                    <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                                        <i class="fa fa-eye" id="eye-icon-password"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="input-full-width">
                                <label for="password">Confirm Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        required>
                                    <span class="password-toggle"
                                        onclick="togglePasswordVisibility('password_confirmation')">
                                        <i class="fa fa-eye" id="eye-icon-password_confirmation"></i>
                                    </span>
                                </div>
                            </div>


                            <button type="submit" class="site-btn" id="sendOTPButton">Reset Password</button>


                        </form>


                     
                    </div>
                </div>


            </div>
        </div>
    </section> --}}
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 " id="forgetPassword">
                    <div class="hero__form">
                        <h3>Forget Password</h3>

                        <form id="forgetPAssword" action="{{ route('forgetPassword') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-full-width">
                                <p>Email Id</p>
                                <input type="email" id="email" name="email">
                            </div>


                            <button type="submit" class="site-btn" id="sendOTPButton">Send OTP</button>


                        </form>


                        <div class="mt-3 d-flex justify-content-between">
                            <p><a class="text-primery" href="/login">Back To Login</a></p>
                            <p> Don't have an account? <a class="text-primery" href="/signup">Sign Up</a></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 " id="otpscreen" style="display: none;">
                    <div class="hero__form">
                        <h3>Enter 4 Digit Code</h3>
                        <p class="text-center">We Send Code To
                            <b>yourmailid@domain.com</b>
                        </p>
                        <form id="verifyOtp" action="{{ route('verifyOtp') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                            <h5></h5>
                            <p>
                            </p>

                            <div class="mt-3 d-flex justify-content-center">
                                <div class="otp-field mb-4">
                                    <input class="otp-input" type="text" maxlength="1" id="digit1" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit2" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit3" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit4" />

                                </div>
                            </div>
                            <button class="site-btn mb-3">
                                Verify OTP
                            </button>
                            <div class="mt-3 d-flex justify-content-center">
                                <p> Don't received OTP? <a class="text-primery" href="/login">Resend OTP</a></p>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 " id="resetPassword" style="display: none;">
                    <div class="hero__form">
                        <h3>Reset Password</h3>

                        <form id="changeForgetPassword" action="{{ route('changeForgetPassword') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-full-width">
                            <p>Email Id</p>
                            <input type="email" id="email" name="email">
                        </div>

                            <div class="input-full-width">
                                <label for="password">Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" id="password" name="password" required>
                                    <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                                        <i class="fa fa-eye" id="eye-icon-password"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="input-full-width">
                                <label for="password">Confirm Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        required>
                                    <span class="password-toggle"
                                        onclick="togglePasswordVisibility('password_confirmation')">
                                        <i class="fa fa-eye" id="eye-icon-password_confirmation"></i>
                                    </span>
                                </div>
                            </div>


                            <button type="submit" class="site-btn" id="sendOTPButton">Reset Password</button>


                        </form>


                     
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
            
                </div>
            </div>
        </div>
    </section>

        <!-- Js Plugins -->
    {{-- OTP disable fields to enable  --}}


    <script>
        const otpInputs = document.querySelectorAll(".otp-input");

        otpInputs.forEach((input, index) => {
            input.addEventListener("input", function() {
                if (this.value.length > 1) {
                    this.value = this.value.slice(0, 1); // Keep only the first character
                }

                if (this.value) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus(); // Move focus to the next input
                    } else {
                        // All inputs are filled, you can proceed with validation or other actions here
                    }
                }
            });

            input.addEventListener("keydown", function(event) {
                if (event.key === "Backspace" && !this.value && index > 0) {
                    otpInputs[index - 1].focus(); // Move focus to the previous input on backspace
                }
            });
        });
    </script>

    {{-- ------------------------------ --}}

    {{-- Script to hide Forget Passwor Screen --}}
 <!-- ... (your existing HTML code) ... -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sendOTPButton = document.getElementById("sendOTPButton");
        const forgetPasswordBlock = document.getElementById("forgetPassword");
        const otpScreenBlock = document.getElementById("otpscreen");
        const verifyOTPButton = document.querySelector("#otpscreen .site-btn");
        const otpInputs = document.querySelectorAll(".otp-input");
        const resetPasswordBlock = document.getElementById("resetPassword");

        // Handle sending OTP and showing OTP screen
        sendOTPButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent form submission

            forgetPasswordBlock.style.display = "none";
            otpScreenBlock.style.display = "block";
            otpInputs[0].focus(); // Focus on the first OTP input field
        });

        // Handle verifying OTP and showing reset password screen
        verifyOTPButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent form submission

            otpScreenBlock.style.display = "none";
            resetPasswordBlock.style.display = "block";
        });
    });
    document.getElementById("emailPlaceholder").innerText = "pranavdevkar@gmail.com"; // Replace with actual email
</script>

<!-- ... (rest of your HTML code) ... -->
    @endsection
    