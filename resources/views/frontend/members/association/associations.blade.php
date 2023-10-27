@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Association</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Members</a>
                            <span>Association</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Association Section Begin -->
    <section class="latest spad">
        <div class="testimonial spad ">

        </div>
        <div class="testimonial__carousel ">
            <div class="container">
                @if (Auth::user() &&
                        in_array(
                            'members',
                            Auth::user()->roles->pluck('name')->toArray()))
                    <div class="row d-flex justify-content-end mb-5">
                        <a href="{{ url('/members/association/addAssociations') }}" class="btn btn-primary">Add New
                            Association</a>
                    </div>
                @endif
                <div class="row ">

                    @if (isset($associations) && count($associations) > 0)
                        @foreach ($associations as $association)
                            <div class="col-lg-4 my-5">
                                <div class="testimonial__item">

                                    <img class="associationImg" src={{ $association['company_logo'] }} alt="">
                                    <a href="{{ url('/members/association/associationDetails/' . $association['id']) }}"> <h5>{{ $association['company_name'] }}</h5></a>
                                    {{-- <span>ICAI Pune</span> --}}
                                    <div class="posted-details">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="{{ url('/') }}"><i
                                                        class="fa fa-calendar"></i>{{ $association['start_date'] }}</a>
                                            </li>
                                            {{-- <li><a href="{{ url('/') }}"><i class="fa fa-clock-o"></i> 10:00 AM</a> --}}
                                            </li>
                                        </ul>
                                    </div>
                                    <p>You need to pay special attention to the type of colors in your business
                                        cards. For
                                        instance, if you’re in the funeral industry, bright-luminous type of colors
                                        may not be
                                        too.</p>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <h1>Association Not available.</h1>
                    @endif

                </div>
            </div>
            <div>
                <div class="d-flex justify-content-center mt-5 w-100">
                    <ul class="pagination">
                        <li class="pagination-cell">
                            @if ($associations->onFirstPage())
                                <span class="disabled" aria-disabled="true"
                                    aria-label="@lang('pagination.previous')">Previous</span>
                            @else
                                <a href="{{ $associations->previousPageUrl() }}" rel="prev"
                                    aria-label="@lang('pagination.previous')">Previous</a>
                            @endif
                        </li>

                        @for ($i = max(1, $associations->currentPage() - 5); $i <= min($associations->lastPage(), $associations->currentPage() + 5); $i++)
                            <li
                                class="pagination-cell {{ $associations->currentPage() == $i ? 'active text-white' : '' }}">
                                <a href="{{ $associations->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="pagination-cell">
                            @if ($associations->hasMorePages())
                                <a href="{{ $associations->nextPageUrl() }}" rel="next"
                                    aria-label="@lang('pagination.next')">Next</a>
                            @else
                                <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                            @endif
                        </li>
                    </ul>
                </div>
{{--
                <div class="text-center mt-2 w-100">
                    Showing {{ $associations->firstItem() }} to {{ $associations->lastItem() }} of
                    {{ $associations->total() }} results
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Association Section End -->
@endsection
