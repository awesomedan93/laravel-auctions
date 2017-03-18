<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('frontend.includes.head')
</head>
<body id="top">

@include('frontend.includes.header')

    @yield('content')

@include('frontend.includes.footer')

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.backtotop.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mobilemenu.js') }}"></script>
</body>
</html>