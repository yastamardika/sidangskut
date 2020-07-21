<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- Button Navigation Bar - Mobile Ver. -->
    <nav class="navbar d-md-none d-lg-none d-xl-none d-sm-block navbar-dark bg-dark navbar-expand-md flex-md-nowrap shadow">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
<!-- End Button Navigation Bar - Mobile Ver. -->

<div class="container-fluid">
    <div class="row">

    <!-- Navigation -->
        <nav id="navbarSupportedContent" class="nav col-md-3 col-lg-2 vh-100 d-md-block bg-light sidebar collapse position-fixed shadow">
            <div class="pt-3">
            <!-- List Item Nav -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/dashboard') }}">
                            Dashboard <span class="sr-only">(current)</span>
                            <span data-feather="home"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Data
                            <span data-feather="file"></span>
                        </a>
                    </li>
                </ul>
                <!-- TAMBAHAN
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                </a>
                </h6> Dilanjut <ul>-->
            <!-- End List Item Nav -->
            </div>
        </nav>
    <!-- End Navigation -->

        <main class="col-md-9 ml-sm-auto col-lg-10 px-3">
        <!-- Konten -->
            <div class="content" style="padding-top: 1.5rem; padding-bottom: 1.5rem;">
            <!-- Header Wolcome & Logout -->
                <div class="container-fluid px-md-4">
                    <div class="row justify-content-center">
                        <div class="col-md-12 px-md-2">
                            <div class="card shadow" style="margin-bottom: 1.5rem;">
                                <div class="header">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Header Wolcome & Logout -->
                @yield('content')
            </div>
        <!-- End Konten -->
        </main>
        
    </div>
</div>
</body>
</html>
