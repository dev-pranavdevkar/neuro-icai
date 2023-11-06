@extends('frontend.layouts.main')
@section('main-container')
    <main class="">
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>My Account</h2>
                            <div class="breadcrumb__links">
                                <a href="./index.html">Profile</a>
                                <span>Change Password</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <section class="container py-5">
            <div class="row  d-flex justify-content-center">

                <div class="col-lg-10">


                    <div class="contact__form__text">
                        <div class="contact__form__title">
                            <h2>Edit profile</h2>
                            <p>To change personal information fill the form</p>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @elseif ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ Auth::user() }}
                        <a href="">
                          
                                {{ $locationDetails->address_line_1 }},
                                {{ $locationDetails->address_line_2 }},
                                {{ $locationDetails->city }},
                                {{ $locationDetails->state }}-{{ $locationDetails->pincode }},

                        </a>
                        <form id="editProfile" action="{{ route('editProfile') }}" method="POST" onsubmit="return">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="input-list">
                                <input name="name" type="text" value="{{ Auth::user()->name }}">
                                <input name="last_name" type="text" value="{{ Auth::user()->last_name }}">
                            </div>
                            <div class="input-list">
                                <input type="tel" pattern="[0-9]{10}" name="mobile_no" maxlength="10"
                                value="{{ Auth::user()->mobile_no }}">
                                <input name="date_of_birth" type="date" value="{{ Auth::user()->date_of_birth }}">
                            </div>

                            @if (Auth::user() &&
                                    in_array(
                                        'members',
                                        Auth::user()->roles->pluck('name')->toArray()))
                                <div class="input-list">
                                    <input type="text" name="address_line_1"  value="{{ $locationDetails->address_line_1  }}">
                                    <input type="tel" pattern="[0-9]{6}" name="pincode" maxlength="6"
                                    value="{{ $locationDetails->pincode  }}">
                                </div>
                            @endif


                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </section>













    </main>
@endsection
