@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <section class="blog-area section-gap pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Package Detail</span></h2>
            {{-- <p></p> --}}
          </div>
        </div>
      </div>
      
      <!--================ PACKAGES =================-->
      <div class="row">
        @if($package->package_is_active == 1)
        <div class="col-lg-12 col-md-12 pb-0 mb-0">
          <div class="single-blog pb-0 mb-0">
            <div class="thumb">
              {{-- <img class="img-fluid" src="{{asset('img/placeholder/placeholder-image.png')}}" alt=""> --}}
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
              </div>
                <h4>{{$package->package_name}}</h4>
              <div class="text-wrap">
                  <strong> Price Range : </strong> {{$package->package_lower_bound_price}} - {{$package->package_upper_bound_price}}
              </div>
              <div class="text-wrap">
                <p>{{$package->package_description}}</p>
              </div>
              <br>
              <div class="text-wrap">
                  <h5>Vendor Information</h5>
                  <strong>Name : </strong> {{$vendor->vendor_name}}
                  <br>
                  @php
                  $vendor_type = DB::table('vendor_type')
                    ->where('vendor_type_id', $vendor->vendor_type_id)
                    ->get()->first();
                  @endphp
                  <strong>Type : </strong> {{$vendor_type->vendor_type_name}}
                  <br>
                  <strong>Phone Number : </strong> {{$vendor->vendor_phone_number}}
              </div>
            </div>
          </div>
          <div class="dropdown text-right pb-5 mb-5">
            <button class="main_btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tag to Booking
            </button>
            {{-- WORK IN PROGRESS --}}
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @php
              $bookings = DB::table('booking')
                ->where('user_id', Auth::guard('user')->user()->user_id)
                ->get();
              @endphp
              @if(count($bookings) == 0)
              <a class="dropdown-item">You don't have any upcoming booking</a>
              @endif
              @foreach($bookings as $booking)
              <a class="dropdown-item" href="/tag/booking-{{$booking->booking_id}}/package-{{$package->package_id}}">Booking {{$booking->event_date}}</a>
              @endforeach
            </div>
          </div>
        </div>
        @elseif($package->package_is_active == 0)
        <div class="col-lg-12 text-center">
          <div class="main_title pb-0">
            <h4>Package Unavailable</h4>
            <p>Package might be unavailable due to being disabled by vendor.</p>
          </div>
        </div>
        @endif
      </div>
      <!--================ END PACKAGES =================-->

      @if(Auth::guard('user')->check() && $package->package_is_active == 1)
      <div class="row justify-content-center pt-3">
        <div class="col-lg-12 text-center">
          <div class="main_title pb-0">
            <h2><span>Create Your Booking Now!</span></h2>
            <p>You'll need to create a booking first before taking a package from this page.</p>
            <p>Create one if you haven't!</p>
          </div>
          <a name="" id="" class="main_btn" href="/booking/create" role="button">
            Create A Booking
          </a>
        </div>
      </div>
      @endif

    </div>
  </section>

  

@endsection  

@section('script')

@endsection


