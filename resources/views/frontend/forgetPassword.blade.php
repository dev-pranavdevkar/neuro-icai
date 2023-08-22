<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Loanday Template">
    <meta name="keywords" content="Loanday, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICAI | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css">
</head>

<body class="bg-primary ">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="bg-white d-flex justify-content-center ">
        <a href="{{ url('/') }}"> <img src="{{ url('frontend/img/logo.jpg') }}" alt=""></a>
    </header>

    <section class="">
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
                            <b>pranavdevkar@gmail.com</b>
                        </p>
                        <form action="#">

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

                        <form action="#">

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
                                <label for="password">Password</label>
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


                        {{-- <div class="mt-3 d-flex justify-content-between">
                            <p><a class="text-primery" href="/login">Back To Login</a></p>
                            <p> Don't have an account? <a class="text-primery" href="/signup">Sign Up</a></p>
                            
                        </div> --}}
                    </div>
                </div>


            </div>
        </div>
    </section>

    <footer class="login-footer p-2 w-100">
        <div class="d-flex justify-content-between align-items-center justify-content-between px-5 w-100">
            <div>
                <p>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved |<a class="text-primery" href="{{ url('/') }}">
                        The Institute
                        Of Chartered Accountants Of India</a>
                </p>
            </div>
            <div>
                <p> Developed By | <a class="text-neuromonk" href="https://neuromonk.com/" target="_blank">
                        {{-- <img src="{{ url('frontend/img/neuromonk.png') }}"alt=""> --}}
                        Neuromonk Infotech Pvt Ltd</a>
                </p>
            </div>
        </div>
    </footer>



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


    {{-- --------------------------------------- --}}

    <script src="{{ url('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/main.js') }}"></script>
    <script src="{{ url('frontend/js/eyeicon.js') }}"></script>
</body>

</html>




