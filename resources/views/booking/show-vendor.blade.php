{{-- SHOW VENDOR'S RECEIVED BOOKING DETAIL (NOT BOOKING) --}}

@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <section class="blog-area section-gap pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Received Booking Details</span></h2>
            {{-- <p></p> --}}
          </div>
        </div>
      </div>
      
      <!--================ BOOKINGS =================-->
      <div class="row">
       <div class="table-responsive">
          <table class="table">
            <thead>
              <th>Booking Event Date</th>
              <th>Package Name</th>
              <th>User</th>
              <th>Detail Description</th>
              <th>Booking / Event Description</th>
              <th>Confirmation Status</th>
            </thead>
            @if(count($booking_details) == 0)
            <tr>
              <td colspan="6" class="text-center">No Data</td>
            </tr>
            @endif
            @foreach($booking_details as $booking_detail)
            <tr>
              <td href="/booking/{{$booking_detail->booking_id}}">{{$booking_detail->event_date}}</td>
              <td>{{$booking_detail->package_name}}</td>
              <td>{{$booking_detail->user_name}}</td>
              <td>{{$booking_detail->booking_detail_description}}</td>
              <td>{{$booking_detail->booking_description}}</td>
              @if($booking_detail->booking_detail_is_confirmed == 1)
              <td>Confirmed</td>
              @elseif($booking_detail->booking_detail_is_confirmed == -1)
              <td>Rejected</td>
              @else
              <td>
                {{-- Not Confirmed --}}
                {{-- <form method="POST" action="/booking-detail/{{$booking_detail->booking_detail_id}}/set-confirmed">
                  @method('PUT')
                  <div class="form-group">
                    <button type="submit" class="main_btn btn">Set as Confirmed</button>
                  </div>
                </form> --}}
                <div class="dropdown">
                  <button class="main_btn btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form method="POST" action="/booking-detail/{{$booking_detail->booking_detail_id}}/confirm">
                      {{ csrf_field() }}
                      <meta name="csrf-token" content="{{ Session::token() }}">  
                      @method('PUT')
                      <div class="form-group pb-0 mb-0 pt-0 mt-0">
                        <button type="submit" class="dropdown-item">Confirm</button>
                      </div>
                    </form>
                    {{-- <form method="POST" action="/booking-detail/{{$booking_detail->booking_detail_id}}/reject">
                      {{ csrf_field() }}
                      <meta name="csrf-token" content="{{ Session::token() }}">  
                      @method('PUT')
                      <div class="form-group pb-0 mb-0 pt-0 mt-0">
                        <button type="submit" class="dropdown-item">Reject</button>
                      </div>
                    </form> --}}
                  </div>
                </div>
                
              </td>
              @endif
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <!--================ END BOOKINGS =================-->

    </div>
  </section>

  

@endsection  

@section('script')

@endsection


