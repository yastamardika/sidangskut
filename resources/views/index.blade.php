<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SiDasi TEDI SV UGM</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        {{-- Icon --}}
        <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body>
        <div class="loading">
            <div class="progress-container card card-body fit-content p-3 shadow">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <span class="text-center mt-2">Memuat data . . .</span>
            </div>
        </div>
        <!-- Header -->
            <header id="header" class="header-transparent">
                <div class="container-fluid px-5">
                    <div id="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('img/logo_w.png') }}" alt=""></a>
                    </div>

                    <nav id="nav-menu-container">
                        @if (Route::has('login'))
                        <ul class="nav-menu">
                            @auth
                            <li><a href="{{ url('/dashboard') }}"><i class='bx bx-user-circle bx-sm d-inline-flex pr-2 align-middle'></i><span class="align-middle">Akun Saya</span></a></li>
                            @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Sign Up</a></li>
                                @endif
                            @endauth
                        </ul>  
                        @endif
                    </nav>
                </div>
            </header>
        <!-- End Header -->
        
        <!-- ======= Hero Section ======= -->
            <section id="hero">
                <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
                <h1>DTEDI SV UGM</h1>
                <h2>Sistem Informasi Pendaftaran Sidang Tugas Akhir</h2>
                @if (Route::has('login'))
                    <ul class="nav-menu">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn-get-started">Ajukan Sidang</a>
                        @else
                        <a href="{{ route('register') }}" class="btn-get-started">Ajukan Sidang</a>
                        @endauth
                    </ul>  
                @endif
                <p class="col copy-right text-center px-4 text-white" style="bottom: 15px;position: absolute;">
                    <span class="text-md-left float-md-left">Copyright © 2020.</span>
                    <span class="text-md-right float-md-right">Akademik Departemen Teknik Elektro dan Informatika, <br>Sekolah Vokasi, Universitas Gadjah Mada</span>
                </p>
                </div>
            </section>
        <!-- End Hero Section -->
    </body>
    
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</html>
