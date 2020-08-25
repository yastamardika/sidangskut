@extends('layouts.app')

@section('body')

{{-- Button Navigation Bar - Mobile Ver. --}}
    <nav class="navbar fixed-top d-md-none d-lg-none d-xl-none d-sm-flex navbar-dark navbar-expand-md flex-md-nowrap shadow align-content-center">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo_w.png') }}" alt=""></a>
        <a class="navbar-toggler float-right" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class='bx bx-menu'></i>
        </a>
    </nav>
{{-- End Button Navigation Bar - Mobile Ver. --}}

<div class="container-fluid">
    <div class="row">

        {{-- Navigation --}}
        <nav id="navbarSupportedContent"
            class="nav px-0 vh-100 d-md-block bg-light sidebar position-fixed shadow overflow-auto pt-md-0 pt-5 pb-4 collapse navbar-body">
            <div class="pt-sm-3 pb-4 w-100">

                {{-- List Item Nav --}}
                @include('layouts.content.content_navbar')
                {{-- End List Item Nav --}}

            </div>
        </nav>
        {{-- End Navigation --}}

        {{-- Konten --}}
        <main class="ml-sm-auto my-5 p-0 my-md-0 content-body">
            <div class="content my-4 my-md-3">
                {{-- Header Wolcome & Logout --}}
                <div class="container-fluid px-md-4">
                    <div class="card shadow" style="margin-bottom: 1rem;">

                        <div class="card account-header" style="z-index:1;">
                            <div class="clearfix">
                                <div class="mx-2 mx-md-3 mx-lg-4 my-auto pb-3 pb-sm-0 fit-content float-left user">
                                    <div class="d-flex flex-row flex-wrap m-0 p-0">
                                        <span>Selamat datang,</span>
                                    </div>
                                    <h3 class="bold m-0 mb-sm-2">{{ Auth::user()->name }}</h3>
                                </div>
                                <div class="fit-content p-2 text-center align-middle float-right mr-md-3 mr-lg-4 logout">
                                    <a class="btn logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>

                        @role('akademik')
                        @if (Request::is('dashboard'))
                        <div class="card-body p-0">
                            <ul class="nav nav-pills nav-fill flex-nowrap" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true"><i
                                            class='bx bxs-bar-chart-square bx-xs d-block d-sm-inline-flex pr-sm-2 align-middle'></i><span
                                            class="align-middle">Statistik</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false"><i
                                            class='bx bxs-bell-ring bx-xs d-block d-sm-inline-flex pr-sm-2 align-middle'></i><span
                                            class="align-middle">Notifikasi</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class='bx bxs-info-circle bx-xs d-block d-sm-inline-flex pr-sm-2 align-middle'></i><span
                                            class="align-middle">Tutorial</span></a>
                                </li>
                            </ul>
                        </div>
                        @endif
                        @endrole

                    </div>
                </div>
                {{-- End Header Wolcome & Logout --}}

                {{-- Isi Konten --}}
                <div class="container-fluid px-md-4">
                    <div class="card shadow">

                        @yield('content')

                    </div>

                    {{-- Footer --}}
                    <p class="copy-right text-center clearfix mb-4">
                        <span class="text-md-left float-md-left">Copyright © 2020.</span>
                        <span class="text-md-right float-md-right">Akademik Departemen Teknik Elektro dan Informatika,
                            <br>Sekolah Vokasi, Universitas Gadjah Mada</span>
                    </p>
                    {{-- End Footer --}}

                </div>
                {{-- End Isi Konten --}}

            </div>
        </main>
        {{-- End Konten --}}

    </div>
</div>

@endsection
