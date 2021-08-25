<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/animsition/css/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div>
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/my_script.js') }}" defer></script>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" defer></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}" defer></script>

    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}" defer></script>

    <script src="{{ asset('vendor/select2/select2.min.js') }}" defer></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}" defer></script>

    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}" defer></script>
    <script src="{{ asset('js/my_script.js') }}" defer></script>

    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}" defer></script>



    <script src="{{ asset('js/side/jquery.min.js') }}"></script>
    <script src="{{ asset('js/side/popper.js') }}"></script>
    <script src="{{ asset('js/side/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/side/main.js') }}"></script>


</body>
</html>
