@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->


    <!-- Breadcrumb Section End -->

    <section class="event-page py-5 spad">


    <div class="container">


        {{-- ------Tab View --}}
        <section class="py-5  ">
            <div class="row m-0  bg-white">
                <div class="col-lg-12">



                    <div class="row">


                        <div class="col-lg-12 py-3">

                            <div class="card">
                                <div class="card-body">

                                    <div class="row ">
                                        <div class="col-lg-3 ">

                                            <div class=" ">


                                                <img src="{{ url('/frontend/img/icai.png') }}"
                                                    alt="">

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="card-title tex-left">{{ $offers_of_association['offers'] }}</h5>
                                            <table class="table ">



                                                <tbody>
                                                    <tr>

                                                        <th scope="col">Offer ID:</th>
                                                        <td scope="col">
                                                            {{ $offers_of_association['id'] }} 
                                                        </td>
                                                        

                                                    </tr>
                                                    <tr>

                                                        <th scope="col">Discount:</th>
                                                        <td scope="col">
                                                            {{ $offers_of_association['discount'] }} 
                                                        </td>
                                                        

                                                    </tr>
                                                    <tr>

                                                        <th scope="col">User ID:</th>
                                                        <td scope="col">
                                                            {{ Auth::user()->id }}
                                                        </td>


                                                    </tr>
                                                    <tr>

                                                        <th scope="col">Offer Valid Upto:</th>
                                                        <td scope="col">
                                                            {{ \Carbon\Carbon::parse($offers_of_association['start_date'])->format('d-M-Y') }}
                                                            TO
                                                            {{ \Carbon\Carbon::parse($offers_of_association['end_date'])->format('d-M-Y') }}
                                                        </td>


                                                    </tr>

                                                   

                                                    <tr>

                                                        <th scope="col">Offer Pdf:</th>
                                                        <td scope="col">
                                                         <a href="{{ $offers_of_association['offers_pdf'] }}">Click Here to Download</a>  
                                                        </td>
                                                    </tr>

                                                    
                                                    <tr>
                                                        <th scope="col">Offer Status</th>
                                                        <td scope="col">
                                                            @if (!$offers_of_association['is_redeemed'])
                                                                <button type="button" class="btn btn-primary" href="">Redeem Now</button>
                                                            @else
                                                                <p>Redeemed</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    


                                           


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-3 border-left-dashed">

                                            <div>
                                                
                                                <p class="text-center">{{ $offers_of_association['offers'] }}</p>
                                                <div class="d-flex justify-content-center">
                                                    {!! $qrOfferData !!}
                                                </div>
                                                
                                                {{-- <p class="text-center">{{ $alreadyRegistered->payment_status }}</p> --}}
                                            </div>

                                        </div>
                                    </div>


                             

                                </div>
                            </div>

                      

                        </div>


                    </div>

                </div>


                <!-- tab-content -->





            </div>


        </section>
        {{-- Tab View  --}}


    </div>






</section>

@endsection
