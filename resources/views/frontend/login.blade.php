
    @extends('frontend.layouts.main')
    @section('main-container')
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="hero__form">
                        <h3>Login</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="loginForm" action="{{ route('userLogin') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf <!-- CSRF token -->

                            <div class="input-full-width">
                                <p>Username/Email Id</p>
                                <input name="credential" type="text">
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

                        </form>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2">

                </div>
            </div>
        </div>
    </section>




    @endsection
