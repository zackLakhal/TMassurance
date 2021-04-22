<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>

@yield('content')

    <!-- JAVASCRIPT -->

    <script src="{{ asset('libs/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }} "></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }} "></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }} "></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- App js -->

</body>

</html>