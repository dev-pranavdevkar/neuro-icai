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

             
                </div>  
                <div class="w-100">
                    <div class="d-flex justify-content-center mt-5 w-100">
                        <ul class="pagination">
                            <li class="pagination-cell">
                                @if ($batchs->onFirstPage())
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.previous')">Previous</span>
                                @else
                                    <a href="{{ $batchs->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">Previous</a>
                                @endif
                            </li>

                            @for ($i = max(1, $batchs->currentPage() - 5); $i <= min($batchs->lastPage(), $batchs->currentPage() + 5); $i++)
                                <li
                                    class="pagination-cell {{ $batchs->currentPage() == $i ? 'active text-white' : '' }}">
                                    <a href="{{ $batchs->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="pagination-cell">
                                @if ($batchs->hasMorePages())
                                    <a href="{{ $batchs->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">Next</a>
                                @else
                                    <span class="disabled" aria-disabled="true"
                                        aria-label="@lang('pagination.next')">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="text-center mt-2 w-100">
                        Showing {{ $batchs->firstItem() }} to
                        {{ $batchs->lastItem() }} of
                        {{ $batchs->total() }} results
                    </div>
                </div>
            @else
                <h1>No Data available.</h1>
            @endif


        </div>

    </section>
    <!-- Upcomming Batchs Section End -->
@endsection
