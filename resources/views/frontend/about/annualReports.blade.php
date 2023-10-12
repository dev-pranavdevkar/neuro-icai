@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Annual Reports</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Annual Reports</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="loan-services study-circle spad">
        <div class="container">
            @if (isset($annualReports) && count($annualReports) > 0)
                <div class="row d-flex justify-content-between">
                    {{-- 1 --}}
                    @foreach ($annualReports as $annualReport)
                        <div class="col-lg-4 py-3 ">

                            <div class="card newsletter-card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ $annualReport['annual_reports_pdf'] }}" target="_blank"
                                                download><img src="{{ url('frontend/img/download-pdf.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="col-10 text-right">
                                            <div class="">
                                                <h4>{{ \Carbon\Carbon::parse($meeting['report_start_date'])->format('Y') }}-{{ \Carbon\Carbon::parse($meeting['report_end_date'])->format('y') }}
                                                </h4>
                                            </div>
                                            <div class="">
                                                <b> {{ $annualReport['title'] }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div>
                    <div class="d-flex justify-content-center mt-5 w-100">
                        <ul class="pagination">
                            <li class="pagination-cell">
                                @if ($annualReports->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $annualReports->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $annualReports->currentPage() - 5); $i <= min($annualReports->lastPage(), $annualReports->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $annualReports->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $annualReports->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($annualReports->hasMorePages())
                                    <a href="{{ $annualReports->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="text-center mt-2 w-100">
                        Showing {{ $annualReports->firstItem() }} to {{ $annualReports->lastItem() }} of
                        {{ $annualReports->total() }} results
                    </div>
                </div>
            @else
                <h1>No Data available.</h1>
            @endif
        </div>
    </section>





@endsection
