@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Latest Updates</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Latest Updates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Letest Updates Section Begin -->
    <section class="loan-services spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                {{-- 1 --}}
                <div class="col-lg-12 py-3 ">
                    <div class="card member-card p-4 HomeupdatesCard">
                        <div class="card-body " style="border: 1px solid #909090">
                            <div class="row">
                                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                    <div class="member-card-img">
                                        <img src="{{ url('frontend/img/updatelogo.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h4>Latest Updates Are:</h4>
                                    @if (isset($combinedData) && count($combinedData) > 0)
                                        <div class="">

                                            <ul>

                                                @foreach ($combinedData as $update)
                                                    <li class="my-2"><i class="fa fa-bullhorn" aria-hidden="true"></i>              {{-- Determine the link based on the type of update --}}
                                                        @if (isset($update->title))
                                                            <a href=" {{ $update->upload_newsletter_pdf ?? ($update->notice_board_pdf ?? url('/')) }}"
                                                                class="">
                                                                {{ $update->title }}
                                                            </a>
                                                        @elseif(isset($update->event_name))
                                                        <a href="{{ Auth::user() ? route('eventDetails', ['id' => $update->id]) : url('/login') }}"
                                                            class="">
                                                            {{ $update->event_name }}
                                                        </a>
                                                        @elseif(isset($update->association_name))
                                                            <a href="{{ url('/members/association/associations') }}"
                                                                class="">
                                                                {{ $update->association_name }}
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach

                                            </ul>


                                        </div>
                                    
                                    @else
                                        <h1>No Data available.</h1>
                                    @endif
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="d-flex justify-content-center mt-5 w-100">
                        <ul class="pagination">
                            <li class="pagination-cell">
                                @if ($combinedData->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $combinedData->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $combinedData->currentPage() - 5); $i <= min($combinedData->lastPage(), $combinedData->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $combinedData->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $combinedData->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($combinedData->hasMorePages())
                                    <a href="{{ $combinedData->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="text-center mt-2 w-100">
                        Showing {{ $combinedData->firstItem() }} to {{ $combinedData->lastItem() }} of
                        {{ $combinedData->total() }} results
                    </div> --}}
                </div>




            </div>
        </div>
    </section>

@endsection
