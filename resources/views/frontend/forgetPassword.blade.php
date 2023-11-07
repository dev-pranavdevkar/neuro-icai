@extends('frontend.layouts.main')
@section('main-container')
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 " id="forgetPassword" style="display: {{ session('showOtpScreen') ? 'none' : 'block' }};">
                    <div class="hero__form">
                        <h3>Forget Password</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form id="forgetPasswordForm" action="{{ route('forgetPassword') }}" method="POST"
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

                <div class="col-lg-5 " id="otpscreen" style="display: {{ session('showOtpScreen') ? 'block' : 'none' }};">

                    <div class="hero__form">
                        <h3>Enter 4 Digit Code</h3>
                        <p class="text-center">We Send Code To <b id="emailPlaceholder">yourmailid@domain.com</b></p>

                        <form id="verifyOtp" action="{{ route('verifyOtp') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-full-width">
                                <p>Email Id</p>
                                <input type="email" id="email" name="email">
                            </div>
                            <!-- Your OTP input fields -->
                            <div class="mt-3 d-flex justify-content-center">
                                <div class="otp-field mb-4">
                                    <input class="otp-input" type="text" maxlength="1" id="digit1" name="otp[]" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit2" name="otp[]" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit3" name="otp[]" />
                                    <input class="otp-input" type="text" maxlength="1" id="digit4" name="otp[]" />
                                </div>
                            </div>
                            <button class="site-btn mb-3" type="submit">Verify OTP</button>
                            <div class="mt-3 d-flex justify-content-center">
                                <p> Don't received OTP? <a class="text-primery" href="/login">Resend OTP</a></p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 " id="resetPassword" style="display: {{ session('resetPassword') ? 'block' : 'none' }};">
                    <div class="hero__form">
                        <h3>Reset Password</h3>

                        <form id="changeForgetPassword" action="{{ route('changeForgetPassword') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Your password reset fields -->
                            <button type="submit" class="site-btn" id="resetPasswordButton">Reset Password</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
                </div>
            </div>
        </div>
    </section>




    <!-- Js Plugins -->
<!-- Js Plugins -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const otpInputs = document.querySelectorAll(".otp-input");
        const emailInput = document.getElementById("email");
        const emailPlaceholder = document.getElementById("emailPlaceholder");
        const sendOTPButton = document.getElementById("sendOTPButton");

        sendOTPButton.addEventListener("click", function (event) {
            emailPlaceholder.innerText = emailInput.value;
            showOtpScreen();
        });

        function showOtpScreen() {
            const forgetPasswordSection = document.getElementById("forgetPassword");
            const otpScreenSection = document.getElementById("otpscreen");

            forgetPasswordSection.style.display = "none";
            otpScreenSection.style.display = "block";
        }

        // Add the following code if you want to handle OTP input and focus switching
        // otpInputs.forEach((input, index) => {
        //     input.addEventListener("input", function () {
        //         // Your OTP input handling logic here
        //     });

        //     input.addEventListener("keydown", function (event) {
        //         // Your OTP input handling logic here
        //     });
        // });
    });
</script>

@endsection
