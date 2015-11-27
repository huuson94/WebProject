<!DOCTYPE html>
<html lang="en">
<head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Include the CSS -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    @yield('addcss')
</head>
<body>

    <!-- Include HTML -->
    @yield('addcontent')

    <!-- Include jQuery (required) and the JS -->
    <script src="{{url('assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/myScript.js')}}"></script>
    @yield('addjs')
</body>
</html>