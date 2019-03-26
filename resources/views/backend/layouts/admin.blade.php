<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('backend/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header">
        @include('backend.layouts.includes.header')
    </header>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
        @include('backend.layouts.includes.sidebar')
    </nav>
    <!-- END SIDEBAR-->
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            @yield('content')
        </div>
        <!-- END PAGE CONTENT-->
        <footer class="page-footer">
            @include('backend.layouts.includes.footer')
        </footer>
    </div>
</div>
<!-- BEGIN THEME CONFIG PANEL-->
<div class="theme-config">
    @include('backend.layouts.includes.config')
</div>
<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{ asset('vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{ asset('backend/js/app.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{ asset('backend/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/custom.js') }}" type="text/javascript"></script>
</body>

</html>