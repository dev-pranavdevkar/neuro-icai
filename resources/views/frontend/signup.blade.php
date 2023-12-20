@extends('frontend.layouts.main')
@section('main-container')
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__form">
                        <h3>Sign Up</h3>

                        <!-- Registration Form -->
                        @if (session()->has('success'))
                            <h2>Thank You,<br /> you are successfully submitted admission form to us.</h2>
                        @else
                            <form id="registrationForm" action="{{ route('registerUser') }}" method="POST"
                                enctype="multipart/form-data">







                                <!-- Personal Information -->
                                <div class="input-list">
                                    <div class="input-list-item">

                                        <p>First Name</p>
                                        <input type="text" name="name" autocomplete="off">
                                        <div>
                                            <span id="name1" class="text-danger font-weight-bold"></span>
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class="alert-vsa text-danger ">
                                                <ul>
                                                    @foreach ($errors->get('name') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="input-list-item">
                                        <p>Last Name</p>
                                        <input type="text" name="last_name" autocomplete="off">
                                        <div>
                                            <span id="last_name1" class="text-danger font-weight-bold"></span>
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <div class="alert-vsa text-danger ">
                                                <ul>
                                                    @foreach ($errors->get('last_name') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="input-list">
                                    <div class="input-list-item">
                                        <p>Mobile Number</p>
                                        <input type="tel" pattern="[0-9]{10}" name="mobile_no" maxlength="10"
                                            autocomplete="off">
                                        <span id="mobile_no" class="text-danger font-weight-bold span"></span>
                                        @if ($errors->has('mobile_number'))
                                            <div class="alert-vsa text-danger">
                                                <ul>
                                                    @foreach ($errors->get('mobile_number') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="input-list-item">
                                        <p>Date Of Birth</p>
                                        <input type="date" name="date_of_birth" autocomplete="off">

                                    </div>
                                </div>


                                <div class="input-list">
                                    <div class="input-list-item">
                                        <p>Email ID</p>

                                        <input type="email" id="email" name="email" required autocomplete="off">
                                        <span id="email1" class="text-danger font-weight-bold span"></span>
                                        @if ($errors->has('email'))
                                            <div class="alert-vsa text-danger">
                                                <ul>
                                                    @foreach ($errors->get('email') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="input-list-item">
                                        <p>Member ID/ Username</p>
                                        <input type="text" id="generated_user_id" name="generated_user_id" required
                                            autocomplete="off">
                                        <span id="generated_user_id1" class="text-danger font-weight-bold span"></span>
                                        @if ($errors->has('generated_user_id'))
                                            <div class="alert-vsa text-danger">
                                                <ul>
                                                    @foreach ($errors->get('generated_user_id') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    </div>
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
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                required autocomplete="off">
                                            <span class="password-toggle"
                                                onclick="togglePasswordVisibility('password_confirmation')">
                                                <i class="fa fa-eye" id="eye-icon-password_confirmation"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @csrf <!-- CSRF token -->

                                <!-- Role Selection -->
                                <div class="input-list">
                                    <p id="selectedRole">Register As</p>
                                    <div class="input-list-item radio d-flex">
                                        <input class="radio-btn" type="radio" id="role_member" name="role"
                                            value="members" onclick="updateSelectedRole()">
                                        <label for="role_member">Member</label>
                                    </div>
                                    <div class="input-list-item d-flex">
                                        <input class="radio-btn" type="radio" id="role_student" name="role"
                                            value="student" onclick="updateSelectedRole()">
                                        <label for="role_student">Student</label>
                                    </div>
                                </div>
                                <script>
                                    function updateSelectedRole() {
                                        var selectedRole = document.querySelector('input[name="role"]:checked').value;

                                        // Toggle the visibility of firm details based on the selected role
                                        var firmDetailsDiv = document.getElementById('firmDetails');
                                        if (selectedRole === 'members') {
                                            firmDetailsDiv.classList.remove('d-none');
                                            firmDetailsDiv.classList.add('d-block');
                                        } else {
                                            firmDetailsDiv.classList.remove('d-block');
                                            firmDetailsDiv.classList.add('d-none');
                                        }
                                    }
                                </script>

                                <div id="firmDetails" class="d-none">
                                    <!-- Firm Information -->
                                    <div class="input-list">
                                        <div class="input-list-item w-100 pr-3">

                                            <p>Firm Name</p>
                                            <input type="text" name="firm_name" autocomplete="off">
                                            <div>
                                                <span id="firm_name1" class="text-danger font-weight-bold"></span>
                                            </div>
                                            @if ($errors->has('firm_name'))
                                                <div class="alert-vsa text-danger ">
                                                    <ul>
                                                        @foreach ($errors->get('firm_name') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="input-list">
                                        <div class="input-list-item">

                                            <p>Contact Person Name</p>
                                            <input type="text" name="contact_person_name" autocomplete="off">
                                            <div>
                                                <span id="contact_person_name1"
                                                    class="text-danger font-weight-bold"></span>
                                            </div>
                                            @if ($errors->has('contact_person_name'))
                                                <div class="alert-vsa text-danger ">
                                                    <ul>
                                                        @foreach ($errors->get('contact_person_name') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="input-list-item">
                                            <p>Firm Email ID</p>
                                            <input type="email" name="company_email" autocomplete="off">
                                            <span id="company_email" class="text-danger font-weight-bold span"></span>
                                            @if ($errors->has('company_email'))
                                                <div class="alert-vsa text-danger">
                                                    <ul>
                                                        @foreach ($errors->get('company_email') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input-list-item">
                                            <p>Firm Contact Number</p>
                                            <input type="tel" pattern="[0-9]{10}" name="contact_person_number"
                                                maxlength="10" autocomplete="off">
                                            <span id="contact_person_number"
                                                class="text-danger font-weight-bold span"></span>
                                            @if ($errors->has('contact_person_number'))
                                                <div class="alert-vsa text-danger">
                                                    <ul>
                                                        @foreach ($errors->get('contact_person_number') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input-list">
                                        <div class="input-list-item">

                                            <p>Address </p>
                                            <input type="text" name="address_line_1" autocomplete="off">
                                            <div>
                                                <span id="address_line_1" class="text-danger font-weight-bold"></span>
                                            </div>
                                            @if ($errors->has('address_line_1'))
                                                <div class="alert-vsa text-danger ">
                                                    <ul>
                                                        @foreach ($errors->get('address_line_1') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>


                                        <div class="input-list-item">
                                            <p>PIN Code</p>
                                            <input type="tel" pattern="[0-9]{6}" name="pincode" maxlength="6"
                                                autocomplete="off">
                                            <span id="pincode" class="text-danger font-weight-bold span"></span>
                                            @if ($errors->has('pincode'))
                                                <div class="alert-vsa text-danger">
                                                    <ul>
                                                        @foreach ($errors->get('pincode') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <!-- Sign Up Button -->
                                <button type="submit" id="signupButton" class="site-btn">Sign Up</button>
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
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">

                </div>
            </div>
        </div>
    </section>
@endsection

<script type="text/javascript">
    function validation() {

        var name = document.getElementById('name').value;
        var last_name = document.getElementById('last_name').value;
        var mobile_number = document.getElementById('mobile_number').value;
        var email = document.getElementById('email').value;
        // var photo = document.getElementById('photo').value;




        if (name == "") {

            document.getElementById('name1').innerHTML = "*First Name is required";
            return false;
        }



        if (last_name == "") {

            document.getElementById('last_name1').innerHTML = "*Last name Name is required";
            return false;
        }

        if (mobile == "") {
            document.getElementById('mobile_no').innerHTML = " *Please Enter Mobile Number";
            return false;
        }
        if (mobile.length != 10) {
            document.getElementById('mobile_no').innerHTML = " *Length of mobile number is not valid";
            return false;
        }
        if (isNaN(mobile)) {
            document.getElementById('mobile_no').innerHTML = " *Only numbers are accepted";
            return false;
        }




        if (emailId == "") {
            document.getElementById('email1').innerHTML = " *Please Enter Email id";
            return false;
        }
        if (emailId.length < 10) {
            document.getElementById('email1').innerHTML = " *Invalid Mail Id";
            return false;
        }
        if (emailId.indexOf('@') <= 0) {
            document.getElementById('email1').innerHTML = " *Invalid MailId";
            return false;
        }














        // if (photo == "") {
        //     document.getElementById('photo1').innerHTML = " *Please Enter Adress";
        //     return false;
        // }


    }
</script>



