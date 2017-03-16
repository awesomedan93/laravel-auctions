<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')
</head>
<body id="top">

@include('includes.header')

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->

    @yield('content')

    <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>

@include('includes.footer')

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.backtotop.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mobilemenu.js') }}"></script>
</body>
</html>