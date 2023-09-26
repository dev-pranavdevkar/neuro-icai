@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Pune WICASA Newsletters</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Students</a>
                            <span>Pune WICASA Newsletters</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
 
    <!-- Newsletter Section Begin -->

    <section class="choose spad ">
        <div class="container">

            <div class="row mt-5">

                <div class="col-lg-12 col-12 mb-5">
                    <div class=" ">

                        {{-- <img src="{{ url('frontend/img/choose/choose-1.png') }}" alt=""> --}}

                        <div class="row px-4 px-lg-0">
                            @if (isset($newsLetterDetails) && count($newsLetterDetails) > 0)
                                @foreach ($newsLetterDetails as $newsLetter)
                                    @if ($newsLetter['for_newsletter'] == 'student') <!-- Add this condition -->
                                        <div class="col-lg-3 col-12 py-3">
                                            <div class="card newsletter-card w-10">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <a href="{{ $newsLetter['upload_newsletter_pdf'] }}"><img
                                                                    src="{{ url('frontend/img/download-pdf.png') }}" alt=""></a>
                                                        </div>
                                                        <div class="col-9 text-right">
                                                            <div class="">
                                                                <h4>{{ $newsLetter['uploaded_date'] }}</h4>
                                                            </div>
                                                            <div>
                                                                <b>{{ $newsLetter['for_newsletter'] }}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif <!-- End of the condition -->
                                @endforeach
                            @else
                                <h1>No Newsletter available.</h1>
                            @endif
                        </div>
                        
                        {{-- <div>
                            {!! $newsLetterDetails->links() !!}
                        </div> --}}
                        <div class="pt-lg-5 pt-4 d-flex justify-content-between ">
                            <a href="#" class="primary-btn">Previous Year</a>
                            <a href="#" class="primary-btn">Next Year</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
