@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Batches</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Students</a>
                            <span>Batches</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="event-page py-5 spad">


        <div class="container">
            @if (isset($batchs) && count($batchs) > 0)
                <div class="row">

                    @foreach ($batchs as $batch)
                        <div class="col-lg-6 py-3">
                            {{-- ------------------------------------------------------------------------------------------- --}}
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $batch['batch_name'] }}</h5>

                                    <table class="table ">



                                        <tbody>
                                            <tr>

                                                <th scope="col">Batch Start Date:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($batch['start_date'])->format('d-M-Y') }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Batch End Date:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($batch['end_date'])->format('d-M-Y') }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Batch Time:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($batch['start_date'])->format('h:i A') }}
                                                    To {{ \Carbon\Carbon::parse($batch['end_date'])->format('h:i A') }}</td>
                                            </tr>

                                            <tr>

                                                <th scope="col">Cut off Date:</th>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($batch['batch_cut_off_date'])->format('d-M-Y h:i A') }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Batch Fee:</th>
                                                <td scope="col">
                                                    <span>₹ {{ $batch['fees'] }} </span><br>

                                                    {{-- <span>If you Paid Before {{ \Carbon\Carbon::parse($batch['end_date'])->format('d-M-Y') }}:  ₹ {{ $batch['early_bird_fees'] }} </span><br> --}}


                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Offer:</th>
                                                <td scope="col">
                                                    <b class="blink">If you Paid Before
                                                        {{ \Carbon\Carbon::parse($batch['end_date'])->format('d-M-Y') }}: ₹
                                                        {{ $batch['early_bird_fees'] }} </b><br>


                                                </td>



                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">

                                        <div>

                                            <a
                                                href="{{ Auth::user() ? route('batchDetails', ['id' => $batch->id]) : url('/login') }}">
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

                    <div class="d-flex justify-content-center d-none">
                        {!! $batchs->links() !!}
                    </div>
                </div>
            @else
                <h1>No event details available.</h1>
            @endif


        </div>

    </section>
    <!-- Upcomming Batchs Section End -->
@endsection
