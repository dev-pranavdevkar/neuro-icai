@extends('frontend.layouts.main')
<style>

</style>
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Available Vacancies</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Vacancies</a>
                            <span>Available Vacancies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="home-about spad bg-light pt-5">
        <div class="container">
            @if (isset($vacancyDetails) && count($vacancyDetails) > 0)
                <div class="">

                    <div class="row d-flex justify-content-center">
                        @foreach ($vacancyDetails as $vacancy)
                            @if (\Carbon\Carbon::parse($vacancy['expiry_date'])->isFuture())
                                <div class="col-lg-5 py-3 ">

                                    <div class="card jobcard h-100">

                                        <div class="card-body ">
                                            <h5 class="card-title">{{ $vacancy['position'] }}</h5>
                                            <h6 class="card-subtitle mb-2 ">{{ $vacancy['ca_firm_name'] }}</h6>
                                            <div class=" posted-details">
                                                <ul class="d-flex justify-content-start">
                                                    <li class="mr-5"><i class="fa fa-briefcase"
                                                            aria-hidden="true"></i>{{ $vacancy['experience'] }}
                                                        Yrs</li>
                                                    <li class="mr-5"><i class="fa fa-inr" aria-hidden="true"></i>30K-50K
                                                    </li>
                                                    <li class="mr-5">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>

                                                        @if (isset($vacancy['location_details']['city']))
                                                            {{ $vacancy['location_details']['city'] }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </li>

                                                </ul>
                                                <div class="mt-2">
                                                    <ul class="d-flex justify-content-between">
                                                        <li class="d-flex">
                                                            <i class="fa fa-location-arrow mt-1" aria-hidden="true"></i>

                                                            @if (isset($vacancy['location_details']))
                                                                {{ $vacancy['location_details']['address_line_1'] ?? '' }}
                                                                {{ $vacancy['location_details']['address_line_2'] ?? '' }}
                                                                {{ $vacancy['location_details']['city'] ?? '' }}
                                                                {{ $vacancy['location_details']['state'] ?? '' }}-{{ $vacancy['location_details']['pincode'] ?? '' }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </li>

                                                    </ul>
                                                </div>
                                                <p class="mt-2">We are looking for {{ $vacancy['position'] }}. The
                                                    candidates
                                                    will get
                                                    exposure in the field of Accounting, Statutory Audits, Internal Audits,
                                                    Income Tax,
                                                    GST, TDS, etc.</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">

                                                <!-- Your Blade file -->
                                                <a href="{{ route('vacancyDetails', ['id' => $vacancy->id]) }}"
                                                    class="btn btn-primary">Details</a>
                                                <a href="{{ route('applyJob', ['id' => $vacancy->id]) }}"
                                                    class="btn btn-primary">Apply</a>



                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>
                <div class="w-100">
                    <div class="d-flex justify-content-center mt-5 w-100">
                        <ul class="pagination">
                            <li class="pagination-cell">
                                @if ($vacancyDetails->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $vacancyDetails->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $vacancyDetails->currentPage() - 5); $i <= min($vacancyDetails->lastPage(), $vacancyDetails->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $vacancyDetails->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $vacancyDetails->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($vacancyDetails->hasMorePages())
                                    <a href="{{ $vacancyDetails->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="text-center mt-2 w-100">
                        Showing {{ $vacancyDetails->firstItem() }} to
                        {{ $vacancyDetails->lastItem() }} of
                        {{ $vacancyDetails->total() }} results
                    </div> --}}

                </div>
            @else
                <h1>No Data available.</h1>
            @endif

        </div>




    </section>
@endsection
