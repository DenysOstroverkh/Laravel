<!DOCTYPE html>
<html lang="{{ session('applocale') ? session('applocale') : app()->getLocale() }}">
    <head>
        @include('partials.meta')
        @include('partials.assets.styles')
        @stack('head')
        @stack('styles')
    </head>
    <body class="@yield('body-class')">
        {{-- <div class="fireflies">@include('partials.fireflies')</div> --}}
        <div id="app">
            {{-- <div class="radial-background"></div> --}}
            @include('partials.navbar.main')
            <main class="main-container @yield('container-class')">
                @yield('content')
            </main>
            @if(!in_array(request()->segment(1), ['classroom']))
                @include('partials.footer')
            @endif
        </div>
        @include('partials.assets.scripts')
        @include('partials.jsvars')
        @stack('scripts')
    </body>
</html>
