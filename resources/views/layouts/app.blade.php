<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
     @yield('css')
   <!-- third party css -->
   <link href="{{Vite::asset('resources/assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
   <!-- third party css end -->

   <!-- App css -->
   <link href="{{Vite::asset('resources/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{Vite::asset('resources/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        @include('layouts.partials.sidebar')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                @include('layouts.partials.navbar-main')
                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')



                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            @include('layouts.partials.footer-main')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar  -->
    @include('layouts.partials.right-sidebar')

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- demo app -->
    <script src="{{ Vite::asset('resources/assets/js/vendor.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/app.min.js') }}"></script>

    <script src="{{ Vite::asset('resources/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    @yield('js')
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:07 GMT -->

</html>
