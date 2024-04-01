<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

@stack('meta')

<!-- Primary Meta Tags -->
<title>{{config('app.name', 'Scan DeFi')}} | @yield('title', 'Your security, our priority.')</title>
<meta name="title" content="{{config('app.name', 'Scan DeFi')}} | @yield('title', 'Your security, our priority.')">
<meta name="description" content="@yield('description', 'Welcome to Scan DeFi, the only platform focused on fighting against scams in a contractual, media and social way. Our ecosystem supports 12 fundamental pillars, from a Scanner, to a Swap, NFTs, Staking, video games and much more. Get started now, we have referral systems to reward your support to the community.')">

<!-- Google site verification -->
{{-- <meta name="google-site-verification" content="aVzxiStDzAeQnYfiVt_ps_J7ehadLEQVo5tVSkeJz8E" /> --}}

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5W9DGC3EKR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5W9DGC3EKR');
</script>

<!-- Robots -->
{{-- <meta name="robots" content="NOODP"> --}}
<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<link rel="canonical" href="{{url()->current()}}" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="{{config('app.name', 'Scan DeFi')}} | @yield('title', 'Your security, our priority.')">
<meta property="og:description" content="@yield('description', 'Welcome to Scan DeFi, the only platform focused on fighting against scams in a contractual, media and social way. Our ecosystem supports 12 fundamental pillars, from a Scanner, to a Swap, NFTs, Staking, video games and much more. Get started now, we have referral systems to reward your support to the community.')">
<meta property="og:image:secure_url" content="@yield('image', asset('images/rrss/203x136.jpg'))">
<meta property="og:image" content="@yield('image', asset('images/rrss/203x136.jpg'))">
<meta property="og:image:alt" content="{{config('app.name', 'Scan DeFi')}} | @yield('title', 'Your security, our priority.')">
{{-- <meta property="fb:app_id" content="1101120513382473"> --}}

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="{{config('app.name', 'Scan DeFi')}} | @yield('title', 'Your security, our priority.')">
<meta property="twitter:description" content="@yield('description', 'Welcome to Scan DeFi, the only platform focused on fighting against scams in a contractual, media and social way. Our ecosystem supports 12 fundamental pillars, from a Scanner, to a Swap, NFTs, Staking, video games and much more. Get started now, we have referral systems to reward your support to the community.')">
<meta property="twitter:image" content="@yield('image', asset('images/rrss/203x136.jpg'))">

<!-- GSUITE -->
{{-- <meta name="google-site-verification" content="WUzhi5ZpJWZNPEcqiOp9d7kwast2C1BmPGO1li2t1p0" /> --}}

<!-- MOBILE APP META TAGS -->
<meta name="theme-color" content="#000000">
<meta name="HandheldFriendly" content="true">
<meta name="mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">

<meta name="msapplication-TileImage" content="{{ asset('images/favicon/144x144.png') }}">
<meta name="apple-mobile-web-app-title" content="{{ config('app.name', 'Scan DeFi') }}">

<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/16x16.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/32x32.png') }}">
<link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/favicon/64x64.png') }}">
<link rel="icon" type="image/png" sizes="128x128" href="{{ asset('images/favicon/128x128.png') }}">

@stack('links')
