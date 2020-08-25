@extends('layouts.app')

@section('title')
    Register
@endsection

@section('body')

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow">    
                    <div class="card-body p-xl-5">

                    <!-- Header -->
                        <h1 class="mb-4 text-uppercase bold text-center judul">Mendaftar Akun</h1>
                    <!-- End Header -->

                    <!-- Form Login -->
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Input Nama -->
                            <div class="form-group mb-2">
                                <label for="name" class="col-md col-form-label px-0">Nama Lengkap</label>
                                <div class="col-md p-0">
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
                                <label for="email" class="col-md col-form-label px-0">Email UGM</label>
                                <div class="col-md p-0">
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
                            <div class="form-group clearfix m-0">
                                
                                <div class="col-md-6 float-left pr-md-2 p-0">
                                    <label for="password" class="col-form-label">Password</label>
                                    <div class="input-group mb-2 p-0">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required title="Silahkan isi kata sandi Anda." autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="togglePassword" class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class='bx bx-hide align-middle togglePassword' id="iconShowHide" style="font-size: 1.25rem;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6 float-right pl-md-2 p-0">
                                    <label for="password-confirm" class="col-form-label">Konfirmasi Password</label>
                                    <div class="input-group mb-2 p-0">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required title="Silahkan isi ulang kata sandi Anda." autocomplete="new-password">
                                        <div id="toggleConfirmPassword" class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class='bx bx-hide align-middle togglePassword' id="iconShowHide" style="font-size: 1.25rem;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <!-- End Input Password -->

                        <!-- Check Terms of Use -->
                            <div class="form-group col-md mt-2 p-0">
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
                            <div class="form-group text-center text-md-right mt-4">
                                <div class="col-md-4 p-0 offset-md-8">
                                    <button type="submit" class="btn btn-primary text-uppercase w-100">Daftar</button>
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
                <p class="text-center copy-right">Copyright © 2020. Akademik Departemen Teknik Elektro dan Informatika, <br>Sekolah Vokasi, Universitas Gadjah Mada</p>
            <!-- End Footer -->
            
            </div>
        </div>
    </div>
</main>

@endsection