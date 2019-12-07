@include('layouts._partials.style')

<section class="home_banner_area">

    
    @if($register_as == '')

    <div class="col-12 text-center p-5" style="vertical-align: middle;">

        <h3 class="text-uppercase p-5" style="color: white;">
            Welcome, Please choose one of these options
        </h3>

        <button id="reg-user-btn" type="button" class="main_btn" onclick="">
            Register as User
        </button>

        <h4 class="text-uppercase pt-4 pb-4" style="color: white;">or</h4>

        <button id="reg-vendor-btn" type="button" class="main_btn" onclick="">
            Register as Vendor
        </button>

        <h4 class="text-uppercase p-5" style="color: #80d292;">
            Already have an account? <a href="{{url('/')}}/login" style="color:white;">Log in now</a>
        </h4>

    </div>

    @endif

    @if($register_as == 'user')
        <section class="p-4">
            @include('auth.register._partials.user')
        </section>
    @endif
    
    @if($register_as == 'vendor')
        <section class="p-4">
            @include('auth.register._partials.vendor')
        </section>
    @endif

</section>

@include('layouts._partials.footer')

@include('layouts._partials.script')

<script>

    $( "#reg-user-btn" ).click(function() {
        // alert( "Handler for .click() called." );
        window.location.href = "{{url('/')}}" + "/user/register";
    });
    $( "#reg-vendor-btn" ).click(function() {
        // alert( "Handler for .click() called." );
        window.location.href = "{{url('/')}}" + "/vendor/register";
    });

</script>