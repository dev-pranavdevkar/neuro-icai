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
                            <div class="col-lg-6 py-3 ">

                                <div class="card jobcard h-100">

                                    <div class="card-body ">
                                        <h5 class="card-title">{{ $vacancy['position'] }}</h5>
                                        <h6 class="card-subtitle mb-2 ">{{ $vacancy['ca_firm_name'] }}</h6>
                                        <div class=" posted-details">
                                            <ul class="d-flex justify-content-start">
                                                <li class="mr-5"><i class="fa fa-briefcase"
                                                        aria-hidden="true"></i>{{ $vacancy['experience'] }}
                                                    Yrs</li>
                                                <li class="mr-5"><i class="fa fa-inr" aria-hidden="true"></i>30K-50K</li>
                                                <li class="mr-5"><i class="fa fa-map-marker"
                                                        aria-hidden="true"></i>{{ $vacancy['location_details']['city'] }}
                                                </li>
                                            </ul>
                                            <div class="mt-2">
                                                <ul class="d-flex justify-content-between">
                                                    <li class="d-flex"><i class="fa fa-location-arrow mt-1"
                                                            aria-hidden="true"></i>
                                                        {{ $vacancy['location_details']['address_line_1'] }}
                                                        {{ $vacancy['location_details']['address_line_2'] }}
                                                        {{ $vacancy['location_details']['city'] }}
                                                        {{ $vacancy['location_details']['state'] }}-{{ $vacancy['location_details']['pincode'] }}

                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="mt-2">We are looking for {{ $vacancy['position'] }}. The candidates
                                                will get
                                                exposure in the field of Accounting, Statutory Audits, Internal Audits,
                                                Income Tax,
                                                GST, TDS, etc.</p>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">

                                            {{-- <a  href="{{ route('vacancyDetails', ['id' => $vacancy->id]) }}" class="btn btn-primary">Apply</a> --}}
                                            <a href="#" class="btn btn-primary" data-toggle="modal"
                                                data-target="#applyJob">Apply</a>

                                            <div class="modal fade" id="applyJob" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel">
                                                                Job Application For {{ $vacancy['position'] }}
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="contact__form__text p-4">
                                                                <div class="contact__form__title">
                                                                    <h5>{{ $vacancy['position'] }}</h5>

                                                                </div>
                                                                <form action="#">
                                                                    @csrf
                                                                
                                                                    <div class="input-list">
                                                                        <input type="text" placeholder="Your First name" name="name">
                                                                        <input type="text" placeholder="Your Last name" name="last_name">
                                                                    </div>
                                                                
                                                                    <div class="input-list">
                                                                        <input type="text" placeholder="Your contact number" name="contact_number">
                                                                        <input type="text" placeholder="Your email Id" name="email">
                                                                    </div>
                                                                
                                                                    <input type="file" name="resume_pdf">
                                                                
                                                                    <!-- Experience Field -->
                                                                    <div class="input-list">
                                                                       
                                                                        <select id="experience" name="experience" onchange="toggleExperienceField(this.value)">
                                                                            <option value="" disabled selected>Select Experience</option>
                                                                            @for ($i = 0; $i <= 10; $i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                
                                                                    <!-- Hidden Fields (displayed only if experience is greater than 0) -->
                                                                    <div id="experienceFields" style="display: none;">
                                                                        <div class="input-list">
                                                                            <input type="text" placeholder="Qualification" name="qualification">
                                                                        </div>
                                                                
                                                                        <div class="input-list">
                                                                            <input type="text" placeholder="Expected Package" name="expected_package">
                                                                            <input type="text" placeholder="Current Package" name="current_package">
                                                                            <input type="text" placeholder="Notice Period (in days)" name="notice_period">
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <button type="submit" class="site-btn">Submit</button>
                                                                </form>
                                                                
                                                                @push('scripts')
                                                                    <script>
                                                                        function toggleExperienceField(value) {
                                                                            var experienceFields = document.getElementById("experienceFields");
                                                                
                                                                            if (value !== "") {
                                                                                experienceFields.style.display = "block";
                                                                            } else {
                                                                                experienceFields.style.display = "none";
                                                                            }
                                                                        }
                                                                    </script>
                                                                @endpush
                                                                
                                                                
                                                                @push('scripts')
                                                                    <script>
                                                                        function toggleExperienceField(value) {
                                                                            var experienceFields = document.getElementById("experienceFields");
                                                                
                                                                            if (value > 0) {
                                                                                experienceFields.style.display = "block";
                                                                            } else {
                                                                                experienceFields.style.display = "none";
                                                                            }
                                                                        }
                                                                    </script>
                                                                @endpush
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>


<<<<<<< HEAD
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
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="text-center mt-2 w-100">
                        Showing {{ $vacancyDetails->firstItem() }} to
                        {{ $vacancyDetails->lastItem() }} of
                        {{ $vacancyDetails->total() }} results
                    </div>
=======
>>>>>>> 648e0e776a1a7dc4d1c4485b90a01feec0d44098
                </div>
            @else
                <h1>No Data available.</h1>
            @endif

        </div>




    </section>
@endsection
