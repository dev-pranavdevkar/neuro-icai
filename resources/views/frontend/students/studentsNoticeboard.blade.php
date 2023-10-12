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

    <!-- Newsletter Section Begin -->

    <section class="loan-services study-circle spad">
        <div class="container">
            @if (isset($studentNoticeBoard) && count($studentNoticeBoard) > 0)
                <div class="row d-flex justify-content-between">
                    {{-- 1 --}}
                    @foreach ($studentNoticeBoard as $studentNotice)
                        <div class="col-lg-4 py-3 ">

                            <div class="card newsletter-card w-100">
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
                    @endforeach
                </div>
            @else
                <h1>No Notice details available.</h1>
            @endif
        </div>
    </section>
@endsection


{{-- <h5>Student's Noticeboard</h5>
<p>
    @if (isset($studentNoticeBoard) && count($studentNoticeBoard) > 0)
        <ul class="text-left  px-lg-5 px-4 fa-list-notice">
            @foreach ($studentNoticeBoard as $studentNotice)
                <li>
                    <a href={{ $studentNotice['notice_board_pdf'] }}>
                        {{ $studentNotice['title'] }}</a>

                </li>
            @endforeach
        </ul>
    @else
        <h1>No Notice details available.</h1>
    @endif
</p> --}}
