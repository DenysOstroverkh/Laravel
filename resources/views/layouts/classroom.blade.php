<!DOCTYPE html>
<html lang="{{ session('applocale') ? session('applocale') : app()->getLocale() }}">
    <head>
        @include('partials.meta')
        @include('partials.assets.styles')
        @stack('head')
        @stack('styles')
    </head>
    <body class="@yield('body-class')">
        <div id="app" class="classroom">
            @include('partials.navbar.main')
            <main class="main-container @yield('container-class')">
                @yield('content')
            </main>
            {{-- @include('partials.footer') --}}
        </div>
        @include('partials.assets.scripts')
        @include('partials.jsvars')
        @stack('scripts')
    </body>
</html>
