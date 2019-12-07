@include('layouts._partials.style')

<section class="home_banner_area">

    
    @if($login_as == '')

    <div class="col-12 text-center p-5" style="vertical-align: middle;">

        <h3 class="text-uppercase p-5" style="color: white;">
            Welcome, Please choose one of these options
        </h3>

        <button id="reg-user-btn" type="button" class="main_btn" onclick="">
            Login as User
        </button>
        <h4 class="text-uppercase pt-4 pb-4" style="color: white;">or</h4>
        <button id="reg-vendor-btn" type="button" class="main_btn" onclick="">
            Login as Vendor
        </button>

        <h4 class="text-uppercase p-5" style="color: #80d292;">
            New here? <a href="{{url('/')}}/register" style="color:white;">Sign up now</a>
        </h4>

    </div>

    @endif

    @if($login_as == 'user')
        <section class="p-4">
            @include('auth.login._partials.user')
        </section>
    @endif
    
    @if($login_as == 'vendor')
        <section class="p-4">
            @include('auth.login._partials.vendor')
        </section>
    @endif

</section>

@include('layouts._partials.footer')

@include('layouts._partials.script')

<script>

    $( "#reg-user-btn" ).click(function() {
        // alert( "Handler for .click() called." );
        window.location.href = "{{url('/')}}" + "/user/login";
    });
    $( "#reg-vendor-btn" ).click(function() {
        // alert( "Handler for .click() called." );
        window.location.href = "{{url('/')}}" + "/vendor/login";
    });

</script>