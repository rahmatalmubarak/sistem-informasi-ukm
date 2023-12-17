<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-uinib.png') }}">
</head>

<style>
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
        transition: margin-left .3s ease-in-out;
        margin-left: 0;
    }

    .navbar-expand .navbar-nav .nav-link {
        padding-right: 0rem;
        padding-left: 1rem;
    }

    .container {
        max-width: 1024px;
    }

    .dropdown-menu-lg {
        max-width: 250px;
        min-width: 200px;
        padding: 0;
    }

    .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav
    .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
        color : #c53d4a; 
    }

    .dropdown-item.active, .dropdown-item:active {
        background-color: #ff3e3e;

    }

    .periode-link {
        color: rgb(255, 71, 71);
    }
    .periode-link:hover {
        color: rgb(24, 24, 24);
    }


</style>