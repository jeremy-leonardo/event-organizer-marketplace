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
      
      <!--================ PACKAGE DETAIL =================-->
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
                  <strong> Price : </strong> {{$package->package_price}}
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
          @if(Auth::guard('user')->check())
          <div class="dropdown text-right pb-5 mb-5">
            <button id="booking-detail-modal-btn" class="main_btn" data-toggle="modal" data-target="#modelId">Add to Booking</button>
          </div>
          @elseif(Auth::guard('vendor')->check() && $package->vendor_id == Auth::guard('vendor')->user()->vendor_id)
          <div class="text-right pb-5 mb-5">
            <a name="" id="" class="main_btn" href="/package/{{$package->package_id}}/edit" role="button">
              Edit Package
            </a>
          </div>
          @endif
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
      <!--================ END PACKAGE DETAIL =================-->

      @if(Auth::guard('user')->check() && $package->package_is_active == 1)
      <div class="row">
        <div class="col-lg-12 text-center pt-5 mt-5 pb-3">
          <div class="main_title pb-0 mb-3 text-center">
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


  @if(Auth::guard('user')->check())
  <!-- CREATE BOOKING DETAIL FORM -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Package to Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          @php
          $bookings = DB::table('booking')
            ->where('user_id', Auth::guard('user')->user()->user_id)
            ->get();
          @endphp
          @if(count($bookings) == 0)
            <div class="text-center">You don't have any upcoming booking</div>
          @else
          <form method="POST" action="/booking-detail/create">
            {{ csrf_field() }}
            <meta name="csrf-token" content="{{ Session::token() }}">  
            <div class="form-group" hidden>
              <input type="number" class="form-control" name="package" id="package" value={{$package->package_id}}>
            </div>
            <div class="form-group" hidden>
              <input type="number" class="form-control" name="booking-detail-price" id="booking-detail-price" value={{$package->package_price}}>
            </div>
            <div class="form-group">
              <label for="booking">Booking</label><br>
              <select id="booking" name="booking">
                {{-- @if(count($bookings) == 0)
                <option value=-1>You don't have any upcoming booking</option>
                @endif --}}
                @foreach($bookings as $booking)
                <option value={{$booking->booking_id}}>Booking {{date_format(date_create($booking->event_date),'d-m-Y')}}</a>
                @endforeach
              </select>
            </div><br><br>

            <div class="form-group">
              <label for="booking-detail-description">Booking Detail Description</label>
              <textarea class="form-control" name="booking-detail-description" id="booking-detail-description" aria-describedby="help-booking-detail-description" placeholder="Booking Detail Description"></textarea>
              <small id="help-booking-detail-description" class="form-text text-muted">Please describe your preferences or other information for the vendor</small>
            </div>

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
  
            <div class="form-group">
              <button type="submit" class="main_btn">Submit</button>
            </div>
  
          </form>
          @endif

        </div>
      </div>
    </div>
  </div>
  @endif

  

@endsection  

@section('script')

<script>
  if({{$errors->any()}}){
    $("#booking-detail-modal-btn").click();
  }
</script>

@endsection


