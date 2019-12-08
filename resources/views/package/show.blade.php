@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <section class="blog-area section-gap pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Packages</span></h2>
            {{-- <p></p> --}}
          </div>
        </div>
      </div>
      
      <!--================ PACKAGES =================-->
      <div class="row">
        @if($packages == [])
          <div class="col-12 text-center pb-5 mb-5">No Data</div>
        @endif
        @foreach($packages as $package)
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              {{-- <img class="img-fluid" src="{{asset('img/placeholder/placeholder-image.png')}}" alt=""> --}}
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                @php
                  $vendor_query = '
                    SELECT vendor_id, vendor_name, vendor_type_name, vendor.vendor_type_id
                    FROM vendor JOIN vendor_type
                    WHERE vendor_id = '.$package->vendor_id.' 
                    LIMIT 1 ;
                  ';
                  $vendor = DB::select($vendor_query)[0];
                @endphp
                By&nbsp;<a href="#">{{$vendor->vendor_name}}
                  @if($vendor->vendor_type_id != 1)
                    <span> &nbsp; | &nbsp; {{$vendor->vendor_type_name}} </span>
                  @endif
                </a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>{{$package->package_name}}</h4>
              </a>
              <div class="text-wrap">
                <p>
                  {{$package->package_description}}
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!--================ END PACKAGES =================-->

      @if(Auth::guard('user')->check())
      <div class="row justify-content-center pt-3">
        <div class="col-lg-12 text-center">
          <div class="main_title pb-0">
            <h2><span>Create Your Booking Now!</span></h2>
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


