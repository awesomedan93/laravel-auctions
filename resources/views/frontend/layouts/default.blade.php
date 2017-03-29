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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/jquery.backtotop.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mobilemenu.js') }}"></script>

@yield('custom-footer-js')

</body>
</html>