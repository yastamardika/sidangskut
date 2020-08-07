@extends('layouts.app')

@section('body')

{{-- Button Navigation Bar - Mobile Ver. --}}
    <nav class="navbar fixed-top d-md-none d-lg-none d-xl-none d-sm-block navbar-dark navbar-expand-md flex-md-nowrap shadow">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <a class="navbar-toggler float-right" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class='bx bx-menu'></i>
        </a>
    </nav>
{{-- End Button Navigation Bar - Mobile Ver. --}}

<div class="container-fluid">
    <div class="row">

    {{-- Navigation --}}
        <nav id="navbarSupportedContent" class="nav px-0 vh-100 d-md-block bg-light sidebar position-fixed shadow overflow-auto pt-md-0 pt-4 pb-4 collapse navbar-body">
            <div class="pt-sm-3 pb-4 w-100">

            {{-- List Item Nav --}}
                @include('layouts.content.content_navbar')
            {{-- End List Item Nav --}}
            
            </div>
        </nav>
    {{-- End Navigation --}}

    {{-- Konten --}}
        <main class="ml-sm-auto my-4 p-0 my-md-0 content-body">
            <div class="content my-4 my-md-3">
            {{-- Header Wolcome & Logout --}}
                <div class="container-fluid px-md-4">
                    <div class="card shadow account-header" style="margin-bottom: 1rem;">

                        <div class="clearfix">
                            <div class="mx-4 my-auto pb-3 pb-sm-0 fit-content float-left user">
                                <div class="d-flex flex-row flex-wrap m-0 p-0">
                                    <span>Selamat datang,</span>
                                </div>
                                <h3 class="font-weight-bold m-0">{{ Auth::user()->name }}</h3>
                            </div>
                            <div class="fit-content p-2 text-center align-middle float-right mr-4 logout">
                                <a class="btn logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- End Header Wolcome & Logout --}}
            
            {{-- Isi Konten --}}
                <div class="container-fluid px-md-4">
                    <div class="card shadow">

                        @yield('content')
                        
                    </div>
                </div>
            {{-- End Isi Konten --}}

            </div>
        </main>
    {{-- End Konten --}}
        
    </div>
</div>
    
@endsection