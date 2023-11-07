@extends('frontend.layouts.main')
@section('main-container')
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 " id="forgetPassword">
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

                            <button type="submit" class="site-btn"  id="sendOTPButton">Send OTP</button>
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
                        <p class="text-center">We Send Code To <b id="emailPlaceholder">yourmailid@domain.com</b></p>
                        <form id="verifyOtp" action="{{ route('verifyOtp') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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

                <div class="col-lg-5 " id="resetPassword" style="display: none;">
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
    <script>
        otpSent() {
            console.console.log("Function Called Successfully");
        }
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

                // Set the placeholder email dynamically
                const emailInput = document.getElementById("email");
                const emailPlaceholder = document.getElementById("emailPlaceholder");
                emailPlaceholder.innerText = emailInput.value;
            });

            // Handle verifying OTP and showing reset password screen
            verifyOTPButton.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent form submission

                otpScreenBlock.style.display = "none";
                resetPasswordBlock.style.display = "block";
            });
        });
    </script>
@endsection
