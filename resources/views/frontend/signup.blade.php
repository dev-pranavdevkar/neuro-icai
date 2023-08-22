<!DOCTYPE html>
<html lang="en"> <!-- Use 'en' instead of 'zxx' for English -->

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ICAI Template"> <!-- Update description -->
    <meta name="keywords" content="ICAI, Institute, Chartered Accountants"> <!-- Update keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ICAI | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
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
                            <button type="submit" id="signupButton" class="site-btn">Sign Up</button>
                            <!-- Success Message -->
                            @php
                                $role = request('role');
                            @endphp

                            @if ($role)
                                <div class="alert alert-success mt-3">
                                    You have successfully registered as {{ $role }}!
                                </div>
                            @endif
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
    </section>

    <!-- Footer -->
    <footer class="signup-footer p-2 w-100">
        <div class="d-flex justify-content-between align-items-center justify-content-between px-5 w-100">
            <div>
                <p>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | <a class="text-primery"
                        href="{{ url('/') }}">The Institute Of Chartered Accountants Of India</a>
                </p>
            </div>
            <div>
                <p> Developed By | <a class="text-neuromonk" href="https://neuromonk.com/" target="_blank">Neuromonk
                        Infotech Pvt Ltd</a></p>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
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

    <!-- API Integration Script -->
    {{-- <script>
        $(document).ready(function() {
            $("#signupButton").click(function() {
                // Get the form input values
                var role = $("input[name='role']:checked").val();
                var name = $("input[name='name']").val();
                var last_name = $("input[name='last_name']").val();
                var mobile_no = $("input[name='mobile_no']").val();
                var date_of_birth = $("input[name='date_of_birth']").val();
                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();
                var password_confirmation = $("input[name='password_confirmation']").val();

                // Create the data object for the API request
                var requestData = {
                    role: role,
                    name: name,
                    last_name: last_name,
                    mobile_no: mobile_no,
                    date_of_birth: date_of_birth,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation
                };

                // Make the API request
                $.ajax({
                    type: "POST",
                    url: "http://192.168.0.113:8000/api/v1/website/registerUser",
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
</body>

</html>
