@extends('layouts.app')

@section('title')
    Login Account
@endsection

@section('body')

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
            
                <div class="card shadow">
                    <div class="card-body p-xl-5">

                    <!-- Header -->
                        <h1 class="text-uppercase bold text-center judul">Selamat Datang</h1>
                        <p class="text-center">Silahkan login akun Anda.</p>
                    <!-- End Header -->

                    <!-- Form Login -->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Input Email -->
                            <div class="form-group mb-2">
                                <label for="email" class="col-md col-form-label px-0">Email UGM</label>
                                <div class="col-md p-0">
                                    <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                        <!-- End Input Email -->

                        <!-- Input Password -->
                            <div class="form-group mb-2">
                                <div class="col-md clearfix p-0">
                                    <label for="password" class="float-left col-form-label px-0">Password</label>
                                    @if (Route::has('password.request'))
                                        <a class="btn-link float-right lupa-sandi text-right" href="{{ route('password.request') }}">
                                            {{ __('Lupa sandi?') }}
                                        </a>
                                    @endif
                                </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                <div class="input-group mb-2 p-0">
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

                            @if ($errors->all())
                                <div class="alert alert-danger my-3 p-3 d-flex">
                                    <span><i class='bx bxs-error bx-xs align-middle'></i></span>
                                    <div class="m-0 pl-3">
                                        @foreach ($errors->all() as $error)
                                            <span>{{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            

                        <!-- Button Login -->
                            <div class="form-group text-center text-md-right mt-4">
                                <div class="col-md-4 p-0 offset-md-8">
                                    <button type="submit" class="btn btn-primary text-uppercase w-100">Masuk</button>
                                </div>
                            </div>
                        <!-- End Button Login -->

                        </form>
                    <!-- End Form Login -->

                    <!-- Pindah Mendaftar Akun -->
                        <div class="col-md mt-4 text-center">
                            <label class="mb-0 mt-3">Belum memiliki akun? <a style="font-weight: 600;" href="{{ route('register') }}">Daftar disini</a></label>
                        </div>
                    <!-- Pindah Mendaftar Akun -->
                    </div>
                </div>

            <!-- Footer -->
                <p class="text-center copy-right">Copyright © 2020. Akademik Departemen Teknik Elektro dan Informatika, <br>Sekolah Vokasi, Universitas Gadjah Mada</p>
            <!-- End Footer -->
                
            </div>
        </div>
    </div>
</main>

@endsection