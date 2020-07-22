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
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
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
        <nav id="navbarSupportedContent" class="nav px-0 col-md-3 col-lg-2 vh-100 d-md-block bg-light sidebar collapse position-fixed shadow">
            <div class="pt-3">
            <!-- List Item Nav -->
                <ul id="nav-active" class="nav flex-column">
                    <li class="nav-item d-md-block d-lg-block d-xl-block d-sm-none">
                        <a class="d-block mb-3 text-center" href="{{ url('/dashboard') }}">
                            <img src="img/logo.png" class="w-50 mx-auto" alt="">
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            Dashboard<span class="sr-only">(current)</span>
                            <i class='bx bxs-home bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                        </a>
                    </li>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
                    Data
                </h6>
                    @role('mahasiswa')
                        <li class="nav-item {{ Request::segment(1) === 'pendaftaran' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/pendaftaran') }}">
                                Pengajuan Sidang
                                <i class='bx bxs-file-blank bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>

                {{-- Akademik --}}
                    @elserole('akademik')
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Pendaftar Sidang
                                <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                {{-- End Akademik --}}

                    @elserole('kaprodi')
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Pendaftar Sidang
                                <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                
                
                {{-- Penguji --}}
                    @elserole('dosen_penguji')
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Mahasiswa Sidang
                                <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                {{-- End Penguji --}}

                {{-- Admin --}}
                    @elserole('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                Pendaftar Sidang
                                <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                Jadwal Sidang
                                <i class='bx bxs-calendar bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
                            Menejemen
                        </h6>
                        <li class="nav-item {{ Request::segment(1) === 'users' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/users') }}">
                                User
                                <i class='bx bxs-id-card bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'role' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/role') }}">
                                Role User
                                <i class='bx bxs-shield bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
                            </a>
                        </li>
                    @endrole
                {{-- End Admin --}}
                </ul>
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
            
            <!-- Isi Konten -->
                <div class="container-fluid px-md-4">
                    <div class="row justify-content-center">
                        <div class="col-md-12 px-md-2">
                            <div class="card shadow">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Isi Konten -->

            </div>
        <!-- End Konten -->
        </main>
        
    </div>
</div>
</body>
</html>
