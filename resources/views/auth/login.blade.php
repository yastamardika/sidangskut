@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
        
            <div class="card shadow">
                <div class="card-body">

                    <!-- Header -->
                    <h1 class="text-uppercase font-weight-bold text-center judul">Selamat Datang</h1>
                    <p class="text-center">Silahkan login akun Anda.</p>
                    <!-- End Header -->

                    <!-- Form Login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Input Email -->
                        <div class="form-group">
                            <label for="email" class="col-md col-form-label">{{ __('E-Mail Address') }}</label>
                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Input Email -->

                        <!-- Input Password -->
                        <div class="form-group">
                            <div class="col-md clearfix">
                                <label for="password" class="float-left col-form-label">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                    <a class="btn-link float-right lupa-sandi text-right" href="{{ route('password.request') }}">
                                        {{ __('Lupa sandi?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Input Password -->

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <!-- Button Login -->
                        <div class="form-group mb-0 mt-4">
                            <div class="col-md-6 offset-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </div>
                        <!-- End Button Login -->

                    </form>
                    <!-- End Form Login -->
                </div>
            </div>

            <!-- Footer -->
            <p class="text-center copy-right">Copyright © 2020.<br>Akademik Departemen Teknik Elektro dan Informatika, <br>Sekolah Vokasi, Universitas Gadjah Mada</p>
            <!-- End Footer -->
            
        </div>
    </div>
</div>
@endsection
