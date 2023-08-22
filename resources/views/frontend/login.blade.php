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

<body class="bg-primary h-100">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="bg-white d-flex justify-content-center ">
        <a href="{{ url('/') }}"> <img src="{{ url('frontend/img/logo.jpg') }}" alt=""></a>
    </header>

    <section class="">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center my-4">

                <div class="col-lg-5 ">
                    <div class="hero__form">
                        <h3>Login</h3>

                        <form id="loginForm" action="{{ route('userLogin') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf <!-- CSRF token -->
                            <div class="input-full-width">
                                <p>Username/Email Id</p>
                                <input name="email" type="text">
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

                            <button type="submit" class="site-btn" id="loginButton"
                                onclick="window.location.href = '{{ url('/') }}'">Login</button>


                            <div class="mt-3 d-flex justify-content-between">
                                <p> Don't have an account? <a class="text-primery" href="/signup">Sign Up</a></p>
                                <p><a class="text-primery" href="/forgetPassword">Forgot Password</a></p>
                            </div>
                            {{-- Start OR Divider --}}
                            <div class="d-flex align-items-center">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"> </div>
                                </div>
                                <div class="px-3">
                                    <h5>OR</h5>
                                </div>
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"></div>
                                </div>
                            </div>
                            {{-- End OR Divider --}}
                            {{-- Google Facebook Logo --}}
                            <div class="d-flex justify-content-center mt-4">
                                <div><img class="signupwithlogo" src="{{ url('frontend/img/google-logo.png') }}"
                                        alt="Google Logo" /> </div>
                                <div class="ml-5"><img class="signupwithlogo"
                                        src="{{ url('frontend/img/facebook_logo.png') }}" alt="Facebook Logo" /></div>
                            </div>
                        </form>
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
                        The Institute Of Chartered Accountants Of India</a>
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

    {{-- API call --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault();

                var email = $("input[type='text']").val();
                var password = $("input[type='password']").val();

                var requestData = {
                    email: email,
                    password: password
                };

                $.ajax({
                    type: "POST",
                    url: "http://192.168.0.113:8000/api/v1/website/userLogin",
                    data: JSON.stringify(requestData),
                    contentType: "application/json",
                    success: function(response) {
                        console.log("API response:", response);
                        // You can redirect the user or show a success message here
                    },
                    error: function(error) {
                        console.error("API error:", error);
                        // You can display an error message to the user here
                    }
                });
            });
        });
    </script> --}}

    {{-- Js Plugins --}}
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
