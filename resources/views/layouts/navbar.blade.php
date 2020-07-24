@extends('layouts.app')

@section('body')

<!-- Button Navigation Bar - Mobile Ver. -->
    <nav class="navbar fixed-top d-md-none d-lg-none d-xl-none d-sm-block navbar-dark bg-dark navbar-expand-md flex-md-nowrap shadow">
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
        <nav id="navbarSupportedContent" class="nav px-0 col-md-3 col-lg-3 col-xl-2 vh-100 d-md-block bg-light sidebar position-fixed shadow overflow-auto pt-md-0 pt-5 pb-4 collapse">
            <div class="pt-3 w-100">

            <!-- List Item Nav -->
                @include('layouts.content.content_navbar')
            <!-- End List Item Nav -->
            
            </div>
        </nav>
    <!-- End Navigation -->

        <main class="col-md-9 col-lg-9 col-xl-10 ml-sm-auto my-4 p-0 my-md-0">
        <!-- Konten -->
            <div class="content" style="padding-top: 1rem; padding-bottom: 1rem;">
            <!-- Header Wolcome & Logout -->
                <div class="container-fluid px-md-4">
                    <div class="row justify-content-center">
                        <div class="col-md-12 px-md-2">
                            <div class="card shadow account-header" style="margin-bottom: 1rem;">

                                <div class="clearfix">
                                    <div class="ml-4 my-auto fit-content float-left">
                                        <div class="d-flex flex-row flex-wrap m-0 p-0">
                                            <span>Selamat datang,</span>
                                        </div>
                                        <h3 class="font-weight-bold m-0">{{ Auth::user()->name }}</h3>
                                    </div>
                                    <div class="fit-content p-2 text-center align-middle float-right mr-4">
                                        <a class="btn logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </div>
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
    
@endsection