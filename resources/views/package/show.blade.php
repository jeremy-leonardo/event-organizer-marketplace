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
        @if(count($packages) == 0)
          <div class="col-12 text-center pb-5 mb-5">No Data</div>
        @endif
        @foreach($packages as $package)
        <div class="col-lg-4 col-md-6 m-3 p-3 card">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{asset('img/placeholder/placeholder-image.png')}}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                @php
                  // $vendor_query = '
                  //   SELECT vendor_id, vendor_name, vendor_type_name, vendor.vendor_type_id
                  //   FROM vendor JOIN vendor_type
                  //   WHERE vendor_id = '.$package->vendor_id.' 
                  //   LIMIT 1 ;
                  // ';
                  // $vendor = DB::select($vendor_query)[0];
                  // $vendor = App\Vendor::where('vendor_id', $package->vendor_id)->join('vendor_type', 'vendor_type.vendor_type_id', '=', 'vendor.vendor_type_id')->select('vendor_id','vendor_name','vendor.vendor_type_id')->first();
                  $vendor = DB::table('vendor')
                  ->where('vendor_id', $package->vendor_id)
                  ->join('vendor_type', 'vendor_type.vendor_type_id', '=', 'vendor.vendor_type_id')
                  ->select('vendor_id','vendor_name','vendor.vendor_type_id')
                  ->first();
               @endphp
                By&nbsp;<a href="#">{{$vendor->vendor_name}}
                  @if($vendor->vendor_type_id != 1)
                    <span> &nbsp; | &nbsp; {{$vendor->vendor_type_name}} </span>
                  @endif
                </a>
              </div>
              <a class="d-block" href="/package/{{$package->package_id}}">
                <h4>{{$package->package_name}}</h4>
              </a>
              <div class="text-wrap">
                <p>
                  @php
                    if (strlen($package->package_description) > 200)
                      $package_desc = substr($package->package_description, 0, 197) . '...';  
                  @endphp
                  {{$package_desc}}
                </p>
              </div>
              <a href="/package/{{$package->package_id}}" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
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


