
@extends('frontend.layouts.main')
@section('main-container')
         <main class="py-4">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-3 col-md-offset-6">
                     @if($message = Session::get('error'))
                     <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                     </div>
                     @endif
                     @if($message = Session::get('success'))
                     <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                     </div>
                     @endif
                     <div class="card card-default">
                        <div class="card-header">
                            The Institute Of Chartered Accountants Of India
                        </div>
                        <div class="card-body text-center">
                           <form action="/payment" method="POST" >
                              @csrf
                              <script src="https://checkout.razorpay.com/v1/checkout.js"
                                 data-key="rzp_test_dgP2NOTC5SZRnq"
                                 data-amount="50001" 
                                 data-currency="INR"
                                 data-buttontext="Pay 500 INR"
                                 data-name="The Institute Of Chartered Accountants Of India"
                                 data-description="Rozerpay"
                                 data-image="https://cybercollege.info/wp-content/uploads/2021/06/cropped-logo.png"
                                 data-prefill.name="name"
                                 data-prefill.email="email"
                                 data-theme.color="#F37254"></script>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>
         {{-- <div class="container">
            @if ($eventRegistration->isNotEmpty())
                <div>
                    <h2>Event Details:</h2>
                    <ul>
                        @foreach ($eventRegistration as $event)
                            <li>
                                Event Name: {{ $event->eventDetails->event_name }}
                                Event Start Date: {{ $event->eventDetails->event_start_date }}
                                Event End Date: {{ $event->eventDetails->event_end_date }}
                                Location: {{ $event->eventDetails->location_details['city'] }},
                                {{ $event->eventDetails->location_details['state'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <h1>No event details available.</h1>
            @endif
        </div> --}}

        <div class="container">
         @if (isset($eventDetails) && count($eventDetails) > 0)
             <div class="">
                 <h2>Event Details:</h2>
                 <ul>
                     @foreach ($eventDetails as $event)
                         <li>
                             Event Name: {{ $event['event_name'] }}
                             Event Start Date: {{ $event['event_start_date'] }}
                             Event End Date: {{ $event['event_end_date'] }}
                             Location: {{ $event['location_details']['city'] }},
                             {{ $event['location_details']['state'] }}
                         </li>
                     @endforeach
                 </ul>
             </div>
          
         @else
             <h1>No event details available.</h1>
         @endif
 
     </div>
        
        @endsection