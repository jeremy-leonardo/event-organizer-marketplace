<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts._partials.style')
    @yield('style')

</head>

<body>
    
    @include('layouts._partials.header')
    @yield('content')
    @include('layouts._partials.footer')


    @include('layouts._partials.script')
    @yield('script')
    @stack('scripts')
	
</body>

</html>