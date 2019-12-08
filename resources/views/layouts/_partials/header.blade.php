<header class="header_area">
    @if(Auth::guard('user')->check() || Auth::guard('vendor')->check())
        @include('layouts._partials.header-logged-in')
    @endif
    @include('layouts._partials.header-menu')
</header>
