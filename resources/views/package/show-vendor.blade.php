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
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              {{-- <img class="img-fluid" src="{{asset('img/placeholder/placeholder-image.png')}}" alt=""> --}}
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
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

    </div>
  </section>

  

@endsection  

@section('script')

@endsection


