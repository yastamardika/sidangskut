@extends('layouts.app')

@section('title')
    Register
@endsection

@section('body')

<main class="py-4 pt-5 mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">

                <div class="card shadow">    
                    <div class="card-body">

                    <!-- Header -->
                        <h1 class="mb-4 text-uppercase font-weight-bold text-center judul">Mendaftar Akun</h1>
                    <!-- End Header -->

                    <!-- Form Login -->
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Input Nama -->
                            <div class="form-group mb-2">
                                <label for="name" class="col-md col-form-label">Nama Lengkap</label>
                                <div class="col-md">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required title="Silahkan isi nama Anda." autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <!-- End Input Nama -->

                        <!-- Input E-Mail -->
                            <div class="form-group mb-2">
                                <label for="email" class="col-md col-form-label">Email UGM</label>
                                <div class="col-md">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required title="Silahkan isi dengan Email UGM Anda." autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <!-- End Input E-Mail -->

                        <!-- Input Password -->
                            <div class="form-group clearfix">
                                
                                <div class="col-md-6 float-left pr-md-2">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required title="Silahkan isi kata sandi Anda." autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    
                                <div class="col-md-6 float-right pl-md-2">
                                    <label for="password-confirm" class="col-form-label">Konfirmasi Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required title="Silahkan isi ulang kata sandi Anda." autocomplete="new-password">
                                </div>

                            </div>
                        <!-- End Input Password -->

                        <!-- Check Terms of Use -->
                            <div class="form-group col-md mt-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="terms">Saya setuju dengan <a href="">Ketentuan Penggunaan</a> yang ada.</label>
                                    @error('terms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <!-- End Check Terms of Use -->

                        <!-- Button Register -->
                            <div class="form-group">
                                <div class="col-md-5 p-0 offset-md-8">
                                    <button type="submit" class="btn btn-primary text-uppercase">Daftar</button>
                                </div>
                            </div>
                        <!-- End Button Register -->

                        </form>
                    <!-- End Form Login -->

                    <!-- Pindah Mendaftar Akun -->
                        <div class="col-md mt-4 text-center">
                            <label class="mb-0 mt-3">Sudah memiliki akun? <a style="font-weight: 600;" href="{{ route('login') }}">Login</a></label>
                        </div>
                    <!-- Pindah Mendaftar Akun -->
                    </div>
                </div>
            
            <!-- Footer -->
                <p class="text-center copy-right">Copyright © 2020.<br>Akademik Departemen Teknik Elektro dan Informatika, <br>Sekolah Vokasi, Universitas Gadjah Mada</p>
            <!-- End Footer -->
            
            </div>
        </div>
    </div>
</main>

@endsection