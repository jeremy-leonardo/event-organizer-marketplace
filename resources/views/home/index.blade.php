@extends('layouts.app')

@section('style')

@endsection

@section('content')

	<!--================Home Banner Area =================-->
	<section class="home_banner_area mb-40">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="col-lg-12">
						{{-- <p class="sub text-uppercase">Best Packages</p> --}}
						<h3><span>Host</span> Your <br />Great <span>Event</span></h3>
						<h4>Leisurely Host Your Event, Let Us Do The Job For You</h4>
						<a class="main_btn mt-40" href="/packages">View Packages</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  <section class="feature-area section_gap_bottom_custom pt-5">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Why Us ?</span></h2>
            {{-- <p></p> --}}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="single-feature">
            {{-- <a href="#" class="title"> --}}
              <i class="flaticon-money"></i>
              <h3>Money back gurantee</h3>
            {{-- </a> --}}
            {{-- <p></p> --}}
          </div>
        </div>

        <div class="col-4">
          <div class="single-feature">
            {{-- <a href="#" class="title"> --}}
              <i class="flaticon-support"></i>
              <h3>24/7 Support</h3>
            {{-- </a> --}}
            {{-- <p></p> --}}
          </div>
        </div>

        <div class="col-4">
          <div class="single-feature">
            {{-- <a href="#" class="title"> --}}
              <i class="flaticon-blockchain"></i>
              <h3>Secure payment</h3>
            {{-- </a> --}}
            {{-- <p></p> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

@endsection  

@section('script')

@endsection


