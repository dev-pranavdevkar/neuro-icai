@extends('frontend.layouts.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $vacancyDetails['position'] ?? 'Position Not Available' }}</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Vacancies</a>
                            <span>{{ $vacancyDetails['position'] ?? 'Position Not Available' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Actual section start -->
    <section class="loan-services spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                {{-- 1 --}}
                <div class="col-lg-12 py-3 ">
                    <div class="card member-card p-4">
                        <div class="card-body " style="border: 1px solid #909090">
                            <div class="row h-100">

                                <div class="col-lg-8 h-100">
                                    <h4>{{ $vacancyDetails['position'] ?? 'Position Not Available' }}
                                        @if ($vacancyDetails['job_type'])
                                            ({{ $vacancyDetails['job_type'] ?? '' }})
                                        @endif
                                    </h4>

                                    <ul>
                                        @if ($vacancyDetails['job_type'])
                                            <li class="my-2"><i class="fa fa-briefcase" aria-hidden="true"></i><a
                                                    href="">
                                                    ({{ $vacancyDetails['job_type'] ?? '' }})
                                                </a></li>
                                        @endif

                                        <li class="my-2">
                                            <div class=" posted-details">
                                                <ul class="d-flex justify-content-start">
                                                    <li class="mr-5"><i class="fa fa-briefcase"
                                                            aria-hidden="true"></i>{{ $vacancyDetails['experience'] ?? '' }}
                                                        Yrs</li>
                                                    <li class="mr-5"><i class="fa fa-inr" aria-hidden="true"></i>
                                                        {{ $vacancyDetails['min_salary'] ?? '' }}
                                                        - {{ $vacancyDetails['max_salary'] ?? '' }}
                                                    </li>
                                                    <li class="mr-5"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        {{ optional($vacancyDetails->location_details)->city ?? 'Location Not Available' }}
                                                    </li>

                                                </ul>
                                                <div class="mt-2">
                                                    <ul class="d-flex justify-content-between">
                                                        {{-- Add your location details here --}}
                                                    </ul>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="my-2 d-flex">

                                            <i class="fa fa-file-text" aria-hidden="true"></i>

                                            <p class="">
                                                We are looking for {{ $vacancyDetails['position'] ?? '' }}.
                                                The candidates will get exposure in the field of Accounting,
                                                Statutory Audits, Internal Audits, Income Tax,
                                                GST, TDS, etc.<br />
                                                {{ $vacancyDetails['comments'] ?? '' }}
                                            </p>
                                        </li>
                                    </ul>
                                    <p class="text-danger">
                                        <b>Last Day to Apply for position
                                            {{ $vacancyDetails['position'] ?? '' }} at
                                            {{ optional($vacancyDetails->companyDetails)->firm_name ?? 'Company Name Not Available' }}:
                                            <a class="text-primery" href="">
                                                {{ optional(\Carbon\Carbon::parse($vacancyDetails['expiry_date']))->format('d/m/Y') ?? '' }}
                                            </a>
                                        </b>
                                    </p>

                                    <div class="d-flex justify-content-start align-items-center">
                                        <a href="{{ route('applyJob', ['id' => $vacancyDetails->id]) }}"
                                            class="btn btn-primary">Apply</a>
                                    </div>

                                </div>
                                <div class="col-lg-4 h-100 border-left-dashed pl-lg-3">
                                    <div class="border-bottom-dashed pb-2">
                                        <h5 class="text-primery">Company Profile</h5>
                                        <ul>
                                            <li class="my-2"><i class="fa fa-building" aria-hidden="true"></i><a
                                                    href="">
                                                    {{ optional($vacancyDetails->companyDetails)->firm_name ?? 'Company Name Not Available' }}
                                                </a>
                                            </li>
                                            <li class="my-2"><i class="fa fa-envelope" aria-hidden="true"></i><a
                                                    href="mailto:{{ $vacancyDetails->companyDetails->company_email ?? '' }}">
                                                    {{ $vacancyDetails->companyDetails->company_email ?? '' }}</a>
                                            </li>
                                            <li class="my-2"><i class="fa fa-phone" aria-hidden="true"></i><a
                                                    href="tel:+91{{ $vacancyDetails['company_contact_no'] ?? '' }}">
                                                    {{ $vacancyDetails['company_contact_no'] ?? '' }}</a>
                                            </li>
                                            <li class="my-2"><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                    href="">
                                                    {{ optional($vacancyDetails->companyDetails)->address ?? 'Address Not Available' }}
                                                    - {{ optional($vacancyDetails->companyDetails)->pincode ?? 'Pincode Not Available' }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="text-primery">Contact Details</h5>
                                        <ul>
                                            <li class="my-2"><i class="fa fa-user" aria-hidden="true"></i><a
                                                    href="">
                                                    {{ $vacancyDetails->companyDetails->contact_person_name ?? 'Contact Person Name Not Available' }}
                                                </a>
                                            </li>
                                            <li class="my-2"><i class="fa fa-phone" aria-hidden="true"></i><a
                                                    href="tel:91{{ $vacancyDetails->companyDetails->contact_person_number ?? '' }}">
                                                    {{ $vacancyDetails->companyDetails->contact_person_number ?? '' }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
