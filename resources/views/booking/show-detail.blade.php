@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <section class="blog-area section-gap pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            @php
            $status = DB::table('booking_status')
              ->select('booking_status_name')
              ->where('booking_status_id', $booking->booking_status_id)
              ->get()->first();
            $city = DB::table('city')
              ->select('city_name')
              ->where('city_id', $booking->city_id)
              ->get()->first();
            @endphp
            <h2><span>Booking {{date_format(date_create($booking->event_date),'d-m-Y')}}</span></h2>
            <br>
            <strong>Status : </strong><p>{{$status->booking_status_name}}</p>
            <br>
            <strong>City : </strong><p>{{$city->city_name}}</p>
            <br>
            <strong>Event Date : </strong><p>{{date_format(date_create($booking->event_date),'d-m-Y')}}</p>
            <br>
            <strong>Booking Description : </strong><p>{{$booking->booking_description}}</p>
            <br>
          </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Package Name</th>
                  <th>Vendor</th>
                  <th>Detail Description</th>
                  <th>Confirmed</th>
                  <th>Price</th>
                </thead>
                @if(count($booking_details) == 0)
                <tr>
                  <td colspan="5" class="text-center">No Data</td>
                </tr>
                @endif
                @php $total = 0; @endphp
                @foreach($booking_details as $booking_detail)
                <tr>
                  <td>{{$booking_detail->package_name}}</td>
                  <td>{{$booking_detail->vendor_name}}</td>
                  <td>{{$booking_detail->booking_detail_description}}</td>
                  @if($booking_detail->booking_detail_is_confirmed == 1)
                  <td>Confirmed</td>
                  @else
                  <td>Not Confirmed</td>
                  @endif
                  <td class="text-right">{{number_format($booking_detail->booking_detail_price)}}</td>
                </tr>
                @php $total = $total + $booking_detail->booking_detail_price; @endphp
                @endforeach
                @if(count($booking_details) > 0)
                <tr>
                  <td colspan="4" class="text-right"><strong>Total : </strong></td>
                  <td class="text-right">{{number_format($total)}}</td>
                </tr>
                @if($booking->booking_status_id == 1)
                <tr>
                  <td colspan="5" class="text-right">
                    <form method="POST" action="/booking/{{$booking->booking_id}}/pay">
                      {{ csrf_field() }}
                      @method('PUT')
                      <meta name="csrf-token" content="{{ Session::token() }}">  
                      <div class="form-group">
                        <button type="submit" class="main_btn">Checkout & Pay</button>
                      </div>
                    </form>
                  </td>
                </tr>
                @endif
                @endif
              </table>
            </div>
        </div>
      </div>
    </div>
  </section>

  

@endsection  

@section('script')

@endsection


