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

                                    <div class="">
                                        @if (isset($combinedData) && count($combinedData) > 0)
                                            <ul>
                                                
                                                @foreach ($combinedData as $update)
                                                    <li class="my-2"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                                                              {{-- Determine the link based on the type of update --}}
                                                              @if (isset($update->title))
                                                              <a href=" {{ $update->upload_newsletter_pdf ?? ($update->notice_board_pdf ?? url('/')) }}"
                                                                  class="">
                                                                  {{ $update->title }}
                                                              </a>
                                                          @elseif(isset($update->event_name))
                                                              <a href="{{ Auth::user() ? route('eventDetails', ['id' => $event->id]) : url('/login') }}"
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
                                          
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>
    </section>
    <!-- Letest Updates Section End -->
@endsection
