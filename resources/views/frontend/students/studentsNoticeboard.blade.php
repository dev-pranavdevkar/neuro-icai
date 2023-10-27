@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Students Noticeboard</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Students</a>
                            <span>Students Noticeboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    {{-- <section class="loan-services spad">
        <div class="container">
            @if (isset($studentNoticeBoard) && count($studentNoticeBoard) > 0)
                <div class="row d-flex justify-content-between">
                    @foreach ($studentNoticeBoard as $studentNotice)
                    @if ($studentNotice['type'] == 'student')
                        <div class="col-lg-4 my-3">
                            <div class="card newsletter-card h-100 w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ $studentNotice['notice_board_pdf'] }}" target="_blank" download>
                                                <img src="{{ url('frontend/img/download-pdf.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-10 text-right">
                                            <div class="">
                                                <h4>{{ \Carbon\Carbon::parse($studentNotice['updated_at'])->format('d M Y') }}</h4>
                                            </div>
                                            <div class="">
                                                @if ($studentNotice['type'] == 'student')
                                                    <b>{{ $studentNotice['title'] }}</b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-5 w-100">
                    <ul class="pagination">
                        <li class="pagination-cell">
                            @if ($studentNoticeBoard->onFirstPage())
                                <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">Previous</span>
                            @else
                                <a href="{{ $studentNoticeBoard->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Previous</a>
                            @endif
                        </li>

                        @for ($i = max(1, $studentNoticeBoard->currentPage() - 5); $i <= min($studentNoticeBoard->lastPage(), $studentNoticeBoard->currentPage() + 5); $i++)
                            <li class="pagination-cell {{ $studentNoticeBoard->currentPage() == $i ? 'active text-white' : '' }}">
                                <a href="{{ $studentNoticeBoard->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="pagination-cell">
                            @if ($studentNoticeBoard->hasMorePages())
                                <a href="{{ $studentNoticeBoard->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
                            @else
                                <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                            @endif
                        </li>
                    </ul>
                </div>

                <div class="text-center mt-2 w-100">
                    Showing {{ $studentNoticeBoard->firstItem() }} to {{ $studentNoticeBoard->lastItem() }} of {{ $studentNoticeBoard->total() }} results
                </div>
            @else
                <h1>No Data available.</h1>
            @endif
        </div>
    </section> --}}

    <section class="loan-services  spad">
        <div class="container">
            @if (isset($studentNoticeBoard) && count($studentNoticeBoard) > 0)
                <div class="row d-flex justify-content-between">
                    {{-- 1 --}}

                    @foreach ($studentNoticeBoard as $studentNotice)
                    @if ($studentNotice['type'] == 'student')
                        <div class="col-lg-4 my-3 ">

                            <div class="card newsletter-card h-100 w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ $studentNotice['notice_board_pdf'] }}" target="_blank" download><img
                                                    src="{{ url('frontend/img/download-pdf.png') }}" alt=""></a>
                                        </div>
                                        <div class="col-10 text-right">
                                            <div class="">
                                                <h4>{{ \Carbon\Carbon::parse($studentNotice['updated_at'])->format('d M Y') }}</h4>
                                            </div>
                                            <div class="">
                                                <b> {{ $studentNotice['title'] }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endif
                    @endforeach

                </div>
                <div>
                    <div class="d-flex justify-content-center mt-5 w-100">
                        <ul class="pagination">
                            <li class="pagination-cell">
                                @if ($studentNoticeBoard->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $studentNoticeBoard->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $studentNoticeBoard->currentPage() - 5); $i <= min($studentNoticeBoard->lastPage(), $studentNoticeBoard->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $studentNoticeBoard->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $studentNoticeBoard->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($studentNoticeBoard->hasMorePages())
                                    <a href="{{ $studentNoticeBoard->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="text-center mt-2 w-100">
                        Showing {{ $studentNoticeBoard->firstItem() }} to {{ $studentNoticeBoard->lastItem() }} of
                        {{ $studentNoticeBoard->total() }} results
                    </div> --}}
                </div>
            @else
                <h1>No Data available.</h1>
            @endif
        </div>
    </section>

@endsection
