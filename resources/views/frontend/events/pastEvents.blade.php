@extends('frontend.layouts.main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Past Events</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Events</a>
                            <span>Past Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="event-page py-5 spad">


        <div class="container">
            @if (isset($eventDetails) && count($eventDetails) > 0)
                <div class="row">

                    @foreach ($eventDetails as $event)
                        <div class="col-lg-6 py-3">
                            {{-- ------------------------------------------------------------------------------------------- --}}
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event['event_name'] }}</h5>

                                    <table class="table ">



                                        <tbody>
                                            <tr>

                                                <th scope="col">Event Start Date:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($event['event_start_date'])->format('d-M-Y') }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Event End Date:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($event['event_end_date'])->format('d-M-Y') }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Event Time:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($event['event_end_date'])->format('h:i A') }}
                                                    To 06:00 PM</td>
                                            </tr>

                                            <tr>

                                                <th scope="col">Cut off Date:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($event['event_cut_off_date'])->format('d-M-Y h:i A') }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Event Fee:</th>
                                                <td scope="col">

                                                    <span>For Members: ₹ {{ $event['price_for_members'] }}</span><br>

                                                    <span>For Students: ₹ {{ $event['price_for_students'] }} </span><br>
                                                    <span>For Others: ₹ {{ $event['event_fee'] }} </span><br>

                                                </td>



                                            </tr>



                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">


                                        <div>

                                            <a
                                                href="{{ Auth::user() ? route('eventDetails', ['id' => $event->id]) : url('/login') }}">
                                                <button type="button" class="btn btn-primary">Details

                                                </button>
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- ------------------------------------------------------------------------------------------- --}}
                        </div>
                    @endforeach










                </div>

                <div>
                    <div class="d-flex justify-content-center mt-5 w-100">
                        <ul class="pagination">
                            <li class="pagination-cell">
                                @if ($eventDetails->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $eventDetails->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $eventDetails->currentPage() - 5); $i <= min($eventDetails->lastPage(), $eventDetails->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $eventDetails->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $eventDetails->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($eventDetails->hasMorePages())
                                    <a href="{{ $eventDetails->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="text-center mt-2 w-100">
                        Showing {{ $eventDetails->firstItem() }} to {{ $eventDetails->lastItem() }} of
                        {{ $eventDetails->total() }} results
                    </div>
                </div>
            @else
                <h1>No Data available.</h1>
            @endif


        </div>

    </section>
    <!-- Upcomming Events Section End -->


@endsection
