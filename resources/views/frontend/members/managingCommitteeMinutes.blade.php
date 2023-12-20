@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Managing Committee Minutes</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Members</a>
                            <span>Managing Committee Minutes</span>
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
                        @if (isset($meetings) && count($meetings) > 0)
                            <div class="row px-4 px-lg-0">
                                @foreach ($meetings as $meeting)
                                    <div class="col-lg-3 col-12 py-3">
                                        <div class="card newsletter-card w-10">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="{{ $meeting['meeting_pdf'] }}" download><img
                                                                src="{{ url('frontend/img/download-pdf.png') }}"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="col-9 text-right">
                                                        <div class="">
                                                            <h4> {{ \Carbon\Carbon::parse($meeting['meeting_date'])->format('d-M-Y') }} </h4>
                                                        </div>
                                                        <div>
                                                            <b> {{ $meeting['tittle'] }} </b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div>
                                {!! $eventDetails->links() !!}
                            </div>
                        @else
                            <h1>No Meetings available.</h1>
                        @endif
                        {{-- <div class="pt-lg-5 pt-4 d-flex justify-content-between ">
                            <a href="#" class="primary-btn">Previous</a>
                            <a href="#" class="primary-btn">Next</a>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

