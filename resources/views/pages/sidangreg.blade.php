@extends('layouts.app')

@section('content')
@if(Session::has('message'))
<div class="toast">
    <strong>{{ Session::get('title') }}</strong>
    <div>
        {{ Session::get('message') }}
    </div>
    <small>Now</small>
</div>
@endif
<div class="container">
    <h3 class="text-center p-3">Buat Pengajuan</h3>

    <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col">
                <div>
                    <label>Nama</label><br>
                    <input type="text" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}">
                </div><br>
                <div>
                    <label>Email UGM</label><br>
                    <input type="text" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                </div><br>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Program Studi</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Pilih Program Studi...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select><br>
                <div>
                    <label>Nama</label><br>
                    <input type="text" placeholder="Masukkan Nama" name="judulID" value="{{ old('judulID') }}">
                </div><br>
            </div>
            <div class="col">
                <div>
                    <label>Judul Tugas Akhir (Indonesia)</label>
                    <input type="text" placeholder="Masukkan judul" name="judulID" value="{{ old('judulID') }}">
                    @error('judulID')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div><br>

                <div>
                    <label>Judul Tugas Akhir (English)</label>
                    <input type="text" placeholder="Masukkan judul" name="judulENG" value="{{ old('judulENG') }}">
                    @error('judulENG')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div><br>

                <div>
                    <label>Dosen Pembimbing</label>
                    <input type="text" placeholder="Masukkan nama Dosen Pembimbing" name="dosbing"
                        value="{{ old('dosbing') }}">
                    @error('dosbing')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div><br>

                <div>
                    <label>Tanggal Persetujuan Proyek Akhir</label>
                    <input type="date" placeholder="Masukkan tanggal" name="tgl_acc" value="{{ old('tgl_acc') }}">
                    @error('tgl_acc')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div><br>

                <div>
                    <label>Upload Cover Judul Laporan Proyek Akhir</label>
                    <div>
                        <input type="file" name="file" value="{{ old('file') }}">
                    </div>
                    @error('file')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div><br>

                <div class="form-check">
                    <input type="checkbox" name="terms">
                    <label>Saya telah mengisi data dengan benar </label>
                    @error('terms')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <button type="submit" name="button" class="btn btn-primary d-flex mx-auto">Mengajukan</button>
    </form>
</div>
<script>
    $(document).ready(function(){
    $('.toast').toast('show');
  });
</script>
@endsection
