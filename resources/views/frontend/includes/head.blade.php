@yield('page_title')
<meta charset="utf-8">
@yield('page_meta_description')
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ asset('assets/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
@yield('custom-css')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
@yield('custom-js')