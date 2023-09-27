@extends('frontend.layouts.main')
@section('main-container')


    <section class="px-3">
        <div class="row py-5">
            <div class="col-lg-3 ">
                {{-- <ul class="" style="list-style: none">
                    <li>Personal Details</li>
                    <li>Change Password</li>
                    <li>Help And Support</li>
                    <li>Vacancy
                        <ul style="list-style: none">
                            <li>Posted Vacancy</li>
                            <li>Applications</li>
                        </ul>
                    </li>
                    <li>Batchs</li>
                </ul> --}}
            </div>
            <div class="col-lg-6">2</div>
            <div class="col-lg-3">
                <div class="card digitalIDCard">
                    <div class="card-body">
                        {{-- Logo Image --}}
                        <div>
                            <img src="{{ url('/frontend/img/logo.jpg') }}" alt="">
                        </div>
                        {{-- Profile Picture --}}
                        <div>
                            <img src="{{ url('/frontend/img/icai.png') }}" alt="">
                        </div>

                        {{-- Personal Info --}}
                        <div>
                            <ul>
                                <li>Name:  {{ Auth::user()->name }}</li>
                                <li>Email ID</li>
                                <li>Mobile Number</li>
                                <li>Email ID</li>
                                <li>MemberShip ID</li>
                            </ul>
                        </div>
                        {{-- Scanner --}}
                        <div>
                            <img src="{{ url('/frontend/img/icai.png') }}" alt="">
                        </div>

                    </div>
                </div>
            </div>

        </div>

        </div>
    </section>
    {{-- <a href="{{ route('logout') }}">Logout</a> --}}
@endsection
