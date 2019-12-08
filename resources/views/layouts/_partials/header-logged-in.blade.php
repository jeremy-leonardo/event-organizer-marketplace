<div class="top_menu">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="float-left">
          <!-- <p>Phone: +0123456789</p> -->
          {{-- <p>Support email: jeremy.leonardo@binus.ac.id</p> --}}
          @auth('user')
            <p>Hello, {{Auth::guard('user')->user()->user_name}}</p>
          @endauth
          @auth('vendor')
            <p>Hello, {{Auth::guard('vendor')->user()->vendor_name}}</p>
          @endauth
        </div>
      </div>
      <div class="col-lg-5">
        <div class="float-right">
          <ul class="right_side">
            <li>
              <a href="tracking.html">
                Booking Status
              </a>
            </li>
            <li>
              <a href="contact.html">
                Contact Us
              </a>
            </li>
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
