<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') </title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icofont.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/slick.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/slick-theme.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }} ">
    @yield('css')
</head>
<body>

@yield('content')

<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/login.js') }}"></script>
</body>
</html>	