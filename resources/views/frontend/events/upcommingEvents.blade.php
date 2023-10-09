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
                                                <td scope="col">{{ \Carbon\Carbon::parse($event['event_start_date'])->format('d-M-Y') }}</td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Event End Date:</th>
                                                <td scope="col"> {{ \Carbon\Carbon::parse($event['event_end_date'])->format('d-M-Y') }}</td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Event Time:</th>
                                                <td scope="col">{{ \Carbon\Carbon::parse($event['event_end_date'])->format('h:i A') }} To 06:00 PM</td>
                                            </tr>

                                            <tr>

                                                <th scope="col">Cut off Date:</th>
                                                <td scope="col">{{ \Carbon\Carbon::parse($event['event_cut_off_date'])->format('d-M-Y h:i A') }}</td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Event Fee:</th>
                                                <td scope="col">
                                                    @if (Auth::user() && in_array('members', Auth::user()->roles->pluck('name')->toArray()))
                                                        {{ $event['price_for_members'] }} <br />
                                                    
                                                        @elseif (Auth::user() && in_array('student', Auth::user()->roles->pluck('name')->toArray()))
                                                            {{ $event['price_for_students'] }} <br />
                                                    
                                                        @else
                                                            {{ $event['event_fee'] }}
                                                    @endif
                                                </td>
                                                
                                                

                                            </tr>
                                            {{-- <tr>

                                                <th scope="col">Brochure:</th>
                                                <td scope="col"> <a href="{{ $event['broacher_pdf'] }}">Click Here To
                                                        Download </a></td>
                                            </tr> --}}

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between">
                                        <div><a href="/eventsDetails/{{ $event['id'] }}">
                                                <button type="button" class="btn btn-secondary">Details</button>
                                            </a>

                                        </div>

                                        <div>

                                            <a href="{{ Auth::user() ? url('/razorpay-payment') : url('/login') }}">
                                                <button type="button" class="btn btn-primary">Register

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
            @else
                <h1>No event details available.</h1>
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
