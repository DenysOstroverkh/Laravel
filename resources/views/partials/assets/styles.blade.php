<!-- Styles -->
<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@include('partials.assets.fonts')

<!-- Web lang navbar item active class -->
<style type="text/css">
  .mrp-navbar-lang-item[data-title="{{strtoupper(app()->getLocale())}}"]{
    font-weight: 800;
    pointer-events: none;
  }
</style>
