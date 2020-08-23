@extends('layouts.app')

@section('title')
    Reset Password
@endsection

@section('body')

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
            
                <div class="card shadow">
                    <div class="card-body p-xl-5">

                        <div class="col p-0 text-center mb-2">
                            <img src="{{ asset('img/Illustrations/Forgot password-pana.svg') }}" class="mx-auto mb-3" style="min-height:20vh; height:20vw;">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h4>Pemulihan Akun</h4>
                            <p>Masukkan alamat email agar kami dapat menghubungi Anda nanti.</p>
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group mb-2">
                                <div class="col-md p-0">
                                    <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email UGM">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-center text-md-right mt-4 mb-0">
                                <div class="col-md-5 p-0 offset-md-7">
                                    <button type="submit" class="btn btn-primary text-uppercase w-100">Kirim Link Pemulihan</button>
                                </div>
                            </div>
                        </form>
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
