@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Members Noticeboard</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Members</a>
                            <span>Members Noticeboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="loan-services  spad">
        <div class="container">
            @if (isset($memberNoticeBoard) && count($memberNoticeBoard) > 0)
                <div class="row d-flex justify-content-between">
                    {{-- 1 --}}
                  
                    @foreach ($memberNoticeBoard as $studentNotice)
                    @if ($studentNotice['type'] == 'members')
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
                                @if ($memberNoticeBoard->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $memberNoticeBoard->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $memberNoticeBoard->currentPage() - 5); $i <= min($memberNoticeBoard->lastPage(), $memberNoticeBoard->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $memberNoticeBoard->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $memberNoticeBoard->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($memberNoticeBoard->hasMorePages())
                                    <a href="{{ $memberNoticeBoard->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="text-center mt-2 w-100">
                        Showing {{ $memberNoticeBoard->firstItem() }} to {{ $memberNoticeBoard->lastItem() }} of
                        {{ $memberNoticeBoard->total() }} results
                    </div> --}}
                </div>
            @else
                <h1>No Data available.</h1>
            @endif
        </div>
    </section>
@endsection



