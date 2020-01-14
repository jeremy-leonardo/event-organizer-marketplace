<div class="top_menu" style="display:block; height:50px!important;">
  <div class="container">
    <div class="row">
      <div class="col-7">
        <div class="float-left">
          <!-- <p>Phone: +0123456789</p> -->
          {{-- <p>Support email: jeremy.leonardo@binus.ac.id</p> --}}
          @auth('user')
          <p>Hello, <a href="{{url('/user/' . Auth::guard('user')->user()->user_id . '/edit')}}"
            > {{Auth::guard('user')->user()->user_name}}</a></p>
          </a>
          @endauth
          @auth('vendor')
            <p>Hello, <a href="{{url('/vendor/' . Auth::guard('vendor')->user()->vendor_id . '/edit')}}"
              > {{Auth::guard('vendor')->user()->vendor_name}}</a></p>
            </a>
          @endauth
        </div>
      </div>
      <div class="col-5">
        <div class="float-right">
          <ul class="right_side">
            @auth('user')
            <li>
              <a href="/user/bookings">
                My Bookings
              </a>
            </li>
            @endauth
            @auth('vendor')
            <li>
              <a href="/vendor/bookings">
                Received Booking Details
              </a>
            </li>
            @endauth
            <li>
              <a href="{{url('/')}}/logout">
                Log out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
