@extends('frontend.layouts.main')
@section('main-container')
    <section class="hero set-bg login-section" data-setbg="{{ url('frontend/img/loginImg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__form">
                        <h4 class="text-center pb-3">Application For
                            {{ $vacancyDetails['position'] ?? 'Position Not Available' }}</h4>

                        <!-- Registration Form -->
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form id="addApplyJob"
                            action="{{ route('addApplyJob', ['id' => $id, 'vacancy_id' => $vacancyDetails['id']]) }}"
                            method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf
                            <!-- Personal Information -->
                            <div class="input-list">
                                <div class="input-list-item w-100 pr-3">
                                    <p>Full Name</p>
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
                            </div>

                            <!-- Contact Information -->
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
                                    <p>Highest Qualification</p>
                                    <input type="text" name="qualification" autocomplete="off">
                                </div>
                            </div>

                            <div class="input-list">
                                <div class="input-list-item w-100 pr-3">
                                    <p>Resume/CV</p>
                                    <input type="file"  accept=".pdf, .jpg, .jpeg" name="resume_pdf" autocomplete="off">
                                </div>
                            </div>
                            {{-- <p class="text-danger text-center mt-3"><b>If You are fresher or have no experience fill below
                                    fields as 0 or
                                    NA</b></p> --}}
                            <div class="input-list pb-5">
                                <div class="input-list-item">
                                    <p>Experience</p>
                                    <select name="experience" class=""
                                        onchange="updateExperienceDetailsVisibility(this.value)">
                                        <option value="0">0 Years</option>
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="4">4 Years</option>
                                        <option value="5">5 Years</option>
                                        <option value="6">6 Years</option>
                                        <option value="7">7 Years</option>
                                        <option value="8">8 Years</option>
                                        <option value="9">9 Years</option>
                                        <option value="10">10 Years</option>
                                    </select>
                                </div>
                   
                            </div>
                            <!-- CSRF token -->
                            @csrf

                            <!-- Your existing HTML code -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Run this when the document is fully loaded
                                    updateExperienceDetailsVisibility(document.getElementById('experience').value);
                                });
    
                                function updateExperienceDetailsVisibility(selectedExperience) {
                                    var experienceDetailsDiv = document.getElementById('experienceDetails');
                                    var experienceDetailsVisibleInput = document.getElementById('experienceDetailsVisible');
    
                                    if (parseInt(selectedExperience) > 0) {
                                        experienceDetailsDiv.style.display = 'block';
                                        experienceDetailsVisibleInput.value = '1';
                                    } else {
                                        experienceDetailsDiv.style.display = 'none';
                                        experienceDetailsVisibleInput.value = '0';
                                    }
                                }
                            </script>
                            <div id="experienceDetails" class="mt-5" style="display: none;">
                                <!-- Firm Information -->
                               
                                <div class="input-list">
                                    <div class="input-list-item ">
                                        <p>Notice Period</p>
                                        <input type="text" name="notice_period_in_days" autocomplete="off">
                                    </div>
                                    <div class="input-list-item">
                                        <p>Current Annual Package</p>
                                        <input type="text" name="current_package" autocomplete="off">
                                    </div>
                                    <div class="input-list-item">
                                        <p>Expected Annual Package</p>
                                        <input type="text" name="expected_package" autocomplete="off">
                                    </div>
                                </div>
                                
                            </div>

                            <!-- Sign Up Button -->
                            <button type="submit" id="signupButton" class="site-btn">Apply</button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                </div>
            </div>
        </div>
    </section>
@endsection
