@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Upcoming Events</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Events</a>
                            <span>Upcoming Events</span>
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
                                                    {{ \Carbon\Carbon::parse($event['event_start_date'])->format('h:i A') }}
                                                    To
                                                    {{ \Carbon\Carbon::parse($event['event_end_date'])->format('h:i A') }}
                                                </td>
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

                                                <tr>
                                                    <th scope="col">Offer:</th>
                                                    <td scope="col">
                                                        <b class="blink">If you Paid Before
                                                            {{ \Carbon\Carbon::parse($event['early_bird_date'])->format('d-M-Y') }}: <br/>
                                                            For Students: ₹ {{ $event['early_bird_non_member_fees'] }} For Members: ₹ {{ $event['early_bird_member_fees'] }} </b>
    
    
                                                    </td>
    
    
    
                                                </tr>



                                            </tr>
                                            {{-- <tr>

                                                <th scope="col">Brochure:</th>
                                                <td scope="col"> <a href="{{ $event['broacher_pdf'] }}">Click Here To
                                                        Download </a></td>
                                            </tr> --}}

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        {{-- <div>
                                            <a href="{{route('eventDetails',['id'=>$event->id])}}"  class="btn btn-secondary">Details</a>
                                        </div> --}}

                                        {{-- old button code is --}}
                                        {{-- <div>

                                            <a
                                                href="{{ Auth::user() ? route('eventDetails', ['id' => $event->id]) : url('/login') }}">
                                                <button type="button" class="btn btn-primary">Register

                                                </button>
                                            </a>
                                        </div> --}}
                                        {{-- ============================= --}}
                                        <div>
                                            @if (Auth::user())
                                                @if ($event->is_user_registered)
                                                    <button type="button" class="btn btn-success">Registered</button>
                                                @else
                                                    <a href="{{ route('eventDetails', ['id' => $event->id]) }}">
                                                        <button type="button" class="btn btn-primary">Register</button>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ url('/login') }}">
                                                    <button type="button" class="btn btn-primary">Register</button>
                                                </a>
                                            @endif
                                        </div>
                                        {{-- ======================================================== --}}

                                        {{-- ========================================================== --}}

                                    </div>

                                </div>
                            </div>
                            {{-- ------------------------------------------------------------------------------------------- --}}
                        </div>
                    @endforeach



                </div>
                <div class="w-100">
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

                    {{-- <div class="text-center mt-2 w-100">
                        Showing {{ $eventDetails->firstItem() }} to
                        {{ $eventDetails->lastItem() }} of
                        {{ $eventDetails->total() }} results


                        <div class="d-flex justify-content-center d-none">
                            {!! $eventDetails->links() !!}

                        </div>
                    </div> --}}
                @else
                    <h1>No Data available.</h1>
            @endif


        </div>

    </section>
    <!-- Upcomming Events Section End -->
@endsection




{{-- <div class="d-flex justify-content-between">
    <div><a href=""><button type="button"
                class="btn btn-secondary">Details</button></a></div>
    <div><button type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#eventRegister">Register</button></div>
</div> --}}
<!------------------- Modal -------------------------------->
{{-- <div class="modal fade" id="eventRegister" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    Event Registration
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="contact__form__text p-4" >
                    <div class="contact__form__title">
                        <h5>{{ $event['event_name'] }}</h5>

                    </div>
                    <form action="#">
                        <div class="input-list">
                            <input type="text" placeholder="Your First name">
                            <input type="text" placeholder="Your Last name">
                        </div>
                        <div class="input-list">
                            <input type="text" placeholder="Your contact number">
                            <input type="text" placeholder="Your email Id">
                        </div>

                        <button type="submit" class="site-btn">Submit</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> --}}
{{-- ====================================== --}}
