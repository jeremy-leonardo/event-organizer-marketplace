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
        <div class="col-lg-12 col-md-12">
          <div class="single-blog">
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
                <p>
                  {{$package->package_description}}
                </p>
              </div>
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


