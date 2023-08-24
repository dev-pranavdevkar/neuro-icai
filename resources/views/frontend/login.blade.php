
    @extends('frontend.layouts.main')
    @section('main-container')
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
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
                            {{-- <div class="d-flex align-items-center">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"> </div>
                                </div>
                                <div class="px-3">
                                    <h5>OR</h5>
                                </div>
                                <div class="w-100 d-flex align-items-center">
                                    <div class="horizontal-line"></div>
                                </div>
                            </div> --}}
                            {{-- End OR Divider --}}
                            {{-- Google Facebook Logo --}}
                            {{-- <div class="d-flex justify-content-center mt-4">
                                <div><img class="signupwithlogo" src="{{ url('frontend/img/google-logo.png') }}"
                                        alt="Google Logo" /> </div>
                                <div class="ml-5"><img class="signupwithlogo"
                                        src="{{ url('frontend/img/facebook_logo.png') }}" alt="Facebook Logo" /></div>
                            </div> --}}
                        </form>
                  
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">
                    {{-- <div class="hero__form">
                        <h3>How much do you need</h3>
                        <form action="#">
                            <div class="input-list">
                                <div class="input-list-item">
                                    <p>Amount of money ($):</p>
                                    <input type="text">
                                </div>
                                <div class="input-list-item">
                                    <p>How long for (day):</p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="input-full-width">
                                <p>Repayment:</p>
                                <input type="text">
                            </div>
                            <div class="input-list last">
                                <div class="input-list-item">
                                    <p>Name:</p>
                                    <input type="text">
                                </div>
                                <div class="input-list-item">
                                    <p>Phone:</p>
                                    <input type="text">
                                </div>
                            </div>
                            <button type="submit" class="site-btn">Get Your Loan Now!</button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
   
    {{-- <section class="bg-secondary py-5">
        <div class="container ">
            <div class="card login-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center align-items-center my-4">
                        <div class="col-lg-6 ">
                            <img  src="{{ url('frontend/img/loginImg.jpg') }}" alt="" >
                        </div>
        
                        <div class="col-lg-6 ">
                            <div class="hero__form">
                                <h3>Login</h3>
        
                                <form id="loginForm" action="{{ route('userLogin') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf 
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
              </div>
         
        </div>
    </section> --}}

    
    @endsection
