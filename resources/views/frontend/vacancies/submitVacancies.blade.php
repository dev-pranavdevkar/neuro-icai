@extends('frontend.layouts.main')

@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option contact-breadcrumb set-bg"
        data-setbg="{{ url('frontend/img/breadcrumb/contact-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Submit A Vacancy</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__form">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="hero__form">
                            <h3>Job Post Form</h3>

                            @if (Auth::user() &&
                                    in_array(
                                        'members',
                                        Auth::user()->roles->pluck('name')->toArray()))
                                <!-- Registration Form -->
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form id="jobPostForm" action="{{ route('addVacancyDetails') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Job Type Selection -->
                                    <div class="input-list">
                                        <div class="input-list-item radio d-flex">
                                            <input class="radio-btn" type="radio" id="job_type_full_time" name="job_type"
                                                value="full_time">
                                            <label for="job_type_full_time">Full Time</label>
                                        </div>
                                        <div class="input-list-item d-flex">
                                            <input class="radio-btn" type="radio" id="job_type_internship" name="job_type"
                                                value="internship">
                                            <label for="job_type_internship">Internship</label>
                                        </div>
                                    </div>
                                    <!-- Personal Information -->

                                    <div class="input-list">
                                        <div class="input-list-item">

                                            <p>Position</p>
                                            <select name="position" id="position" autocomplete="off">
                                                <option value="" disabled selected>Select Position</option>
                                                @foreach (['Semi Qualified', 'Article Assistant', 'Industrial Trainee', 'Qualified'] as $position)
                                                    <option value="{{ $position }}"
                                                        {{ old('position') == $position ? 'selected' : '' }}>
                                                        {{ $position }}</option>
                                                @endforeach
                                            </select>
                                            <div>
                                                <span id="position1" class="text-danger font-weight-bold"></span>
                                            </div>
                                            @if ($errors->has('position'))
                                                <div class="alert-vsa text-danger ">
                                                    <ul>
                                                        @foreach ($errors->get('position') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="input-list-item">
                                            <p>Expiry Date</p>
                                            <input type="date" name="expiry_date" autocomplete="off">
                                            <div>
                                                <span id="expiry_date1" class="text-danger font-weight-bold"></span>
                                            </div>
                                            @if ($errors->has('expiry_date'))
                                                <div class="alert-vsa text-danger ">
                                                    <ul>
                                                        @foreach ($errors->get('expiry_date') as $error)
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
                                            <p>Experience</p>
                                            <input type="tel" pattern="[0-9]{2}" name="experience" maxlength="2"
                                                required>


                                            <span id="experience" class="text-danger font-weight-bold span"></span>
                                            @if ($errors->has('experience'))
                                                <div class="alert-vsa text-danger">
                                                    <ul>
                                                        @foreach ($errors->get('experience') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="input-list-item">
                                            <p>Job Description</p>
                                            <textarea name="comments" autocomplete="off"></textarea>
                                            <span id="comments" class="text-danger font-weight-bold span"></span>
                                            @if ($errors->has('comments'))
                                                <div class="alert-vsa text-danger">
                                                    <ul>
                                                        @foreach ($errors->get('comments') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Sign Up Button -->
                                    <button type="submit" id="signupButton" class="site-btn">Post Job</button>
                                </form>

                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->
@endsection
