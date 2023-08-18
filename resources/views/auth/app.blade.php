<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css'])
    <link href="{{Vite::asset('resources/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{Vite::asset('resources/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid">
        @yield('content')

    </div>
    <!-- end auth-fluid-->

    <!-- bundle -->
    @vite(['resources/js/app.js'])
    <script src="{{ Vite::asset('resources/assets/js/vendor.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/app.min.js') }}"></script>

    <script src="{{ Vite::asset('resources/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
</body>


<!-- Mirrored from coderthemes.com/hyper/saas/pages-logout-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:21:16 GMT -->

</html>
