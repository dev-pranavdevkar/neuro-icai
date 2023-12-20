@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->

    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $associationDetails['company_name'] }}</h2>
                        <div class="breadcrumb__links">
                            <a href="#">Events</a>
                            <span>{{ $associationDetails['company_name'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Association Section Begin -->
    <section class="loan-services spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                {{-- 1 --}}
                <div class="col-lg-12 py-3 mt-">
                    <div class="card member-card p-4">
                        <div class="card-body " style="border: 1px solid #909090">
                            <div class="row">
                                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                    <div class="member-card-img">
                                        <img src="{{ $association['company_logo'] ?? url('frontend/img/icai.png') }}"
                                            alt="">

                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h4>{{ $associationDetails['company_name'] }}</h4>

                                    <ul>
                                        <li class="my-2"><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                href="#">
                                                {{ $associationDetails['location_details']['address_line_1'] }}
                                                {{ $associationDetails['location_details']['address_line_2'] }}
                                                {{ $associationDetails['location_details']['city'] }}
                                                {{ $associationDetails['location_details']['state'] }}
                                                {{ $associationDetails['location_details']['country'] }}-{{ $associationDetails['location_details']['pincode'] }}</a>
                                        </li>

                                        <li class="my-2"><i class="fa fa-phone" aria-hidden="true"></i> <a
                                                href="tel:+91{{ $associationDetails['mobile_no'] }}">
                                                {{ $associationDetails['mobile_no'] }}</a>
                                        </li>
                                        <li class="my-2"><i class="fa fa-envelope" aria-hidden="true"></i><a
                                                href="mailto:{{ $associationDetails['company_email'] }}"></a>
                                            {{ $associationDetails['company_email'] }}</a>
                                        </li>

                                        <li class="my-2"><i class="fa fa-calendar" aria-hidden="true"></i><a
                                                href="#"></a>
                                            Offer Start From
                                            {{ \Carbon\Carbon::parse($associationDetails['start_date'])->format('d/M/Y') }}
                                            Offer Ends At
                                            {{ \Carbon\Carbon::parse($associationDetails['end_date'])->format('d/M/Y') }}

                                            </a>
                                        </li>
                                        <li class="my-2"><i class="fa fa-ticket" aria-hidden="true"></i><a href="#">
                                                {{ $associationDetails['limits'] }}
                                            </a>

                                        </li>

                                        <li class="my-2"><i class="fa fa-file-text" aria-hidden="true"></i>Offers PDF: <a
                                                href="{{ $associationDetails['offers_pdf'] }}"><b> Click Here to Download
                                                    PDF</b></a></li>
                                    </ul>
                                    {{-- <p class="text-danger"><b>If above contact nos. are not responding you may complaint on<a
                                        class="text-primery"   href="tel:+918237166008"> 8237166008</a></b></p> --}}

                                </div>


                                <div class="col-lg-12 mt-5">
                                    <h5 class="text-primery">Offers At {{ $associationDetails['company_name'] }}</h5>
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>

                                                <th scope="col">Offers</th>
                                                <th scope="col">Discounts</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            {{-- {{ dd($associationDetails->offers_of_association) }} --}}

                                            @if (isset($associationDetails->offers_of_association) && $associationDetails->offers_of_association->count() > 0)
                                                {{-- Now you can iterate over $associationDetails->offers_of_association and display the data --}}
                                                @foreach ($associationDetails->offers_of_association as $offer)
                                                    @if ($offer->is_active == 1)
                                                        <tr>
                                                            <td>{{ $offer->offers }}</td>
                                                            <td>{{ $offer->discount }}</td>
                                                            <td> 
                                                                
                                                                <a href="{{ auth()->check() ? route('redeemOfferTicket', ['id' => $offer->id]) : route('login') }}"
                                                                    class="btn btn-primary">Redeem</a>

                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif









                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>
    </section>
    <!-- Association Section End -->
@endsection
