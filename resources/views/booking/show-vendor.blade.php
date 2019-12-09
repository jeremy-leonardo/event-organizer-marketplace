@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <section class="blog-area section-gap pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Bookings</span></h2>
            {{-- <p></p> --}}
          </div>
        </div>
      </div>
      
      <!--================ BOOKINGS =================-->
      <div class="row">
        @if(count($bookings) == 0)
          <div class="col-12 text-center pb-5 mb-5">No Data</div>
        @endif
        @foreach($bookings as $booking)
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              {{-- <img class="img-fluid" src="{{asset('img/placeholder/placeholder-image.png')}}" alt=""> --}}
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>{{date("d-m-Y", strtotime($booking->event_date))}}</h4>
              </a>
              <div class="text-wrap">
                <p>
                  {{$booking->booking_description}}
                </p>
              </div>
              {{-- <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a> --}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!--================ END BOOKINGS =================-->

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


