<header class="header_area">
  @if(Auth::guard('user')->check() || Auth::guard('vendor')->check())
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
  @endif
  <div class="main_menu">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light w-100">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="index.html">
          <img src="img/logo.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
          <div class="row w-100 mr-0">
            <div class="col-lg-7 pr-0">
              <ul class="nav navbar-nav center_nav pull-right">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Shop</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="category.html">Shop Category</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="single-product.html">Product Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="checkout.html">Product Checkout</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cart.html">Shopping Cart</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Blog</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="single-blog.html">Blog Details</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Pages</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="tracking.html">Tracking</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="elements.html">Elements</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-5 pr-0">
              <!-- <ul class="nav navbar-nav navbar-right right_nav pull-right">
                <li class="nav-item">
                  <a href="#" class="icons">
                    <i class="ti-search" aria-hidden="true"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="icons">
                    <i class="ti-shopping-cart"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="icons">
                    <i class="ti-user" aria-hidden="true"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                  </a>
                </li>
              </ul> -->
              <ul class="nav navbar-nav navbar-right right_nav pull-right">
                <li class="nav-item">
                  @if (!Auth::check())
                  <a href="/login" class="nav-link">
                    <i class="ti-user" aria-hidden="true"></i><span> Login</span>
                  </a>
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>