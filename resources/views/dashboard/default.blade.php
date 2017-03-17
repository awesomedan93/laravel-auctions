<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    @include('dashboard.includes.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('dashboard.includes.header')

    @yield('content')

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>


</div>
<!-- ./wrapper -->

@include('dashboard.includes.footer')
</body>
</html>
