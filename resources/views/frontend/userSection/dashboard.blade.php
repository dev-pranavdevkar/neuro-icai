@extends('frontend.layouts.main')
@section('main-container')
    <h1>{{ Auth::user()->name }}</h1>

    <h1>Event Details</h1>
    <table>
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Event Start Date</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($eventDetails as $event)
                <tr>
                    <td>{{ $event['event_name'] }}</td>
                    <td>{{ $event['event_start_date'] }}</td>
                    <!-- Add more cells for other attributes -->
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('logout') }}">Logout</a>
    @endsection
