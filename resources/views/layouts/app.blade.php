<!DOCTYPE html>
<html lang="tr">
  <head>
    <title>@yield('title', 'IGMG Türkiye | İslam Toplumu Milli Görüş')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'İslam Toplumu Milli Görüş (IGMG) Türkiye resmi web sitesi.')">
    <meta name="keywords" content="@yield('meta_keywords', 'IGMG, İslam Toplumu Milli Görüş, Milli Görüş, İslam, Türkiye')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'IGMG Türkiye | İslam Toplumu Milli Görüş')">
    <meta property="og:description" content="@yield('meta_description', 'İslam Toplumu Milli Görüş (IGMG) Türkiye resmi web sitesi.')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">

    <!-- PNotify -->
    <link href="https://cdn.jsdelivr.net/npm/@pnotify/core@5.2.0/dist/PNotify.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@pnotify/mobile@5.2.0/dist/PNotifyMobile.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@pnotify/core@5.2.0/dist/BrightTheme.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
  
  @include('partials.header')
  
  @yield('content')

  @include('partials.footer')

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  
  <!-- PNotify JS -->
  <script src="https://cdn.jsdelivr.net/npm/@pnotify/core@5.2.0/dist/PNotify.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@pnotify/mobile@5.2.0/dist/PNotifyMobile.js"></script>
  <script src="{{ asset('js/member_ajax.js') }}?v=1.0"></script>

  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

  <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
  
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  
  @stack('scripts')
    
  </body>
</html>
