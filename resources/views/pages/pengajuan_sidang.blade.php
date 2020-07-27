@component('layouts.template')

    @slot('title_page')
        Buat Pengajuan Sidang
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
<!-- Isi konten -->
<div class="col-md">
    <h4 class="my-1 font-weight-bold text-center">FORMULIR PENGAJUAN SIDANG TUGAS AKHIR</h4>
    <p class="mb-4 text-center">Departemen Teknik Elektro dan Informatika</p>
    
    <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="col">
            <div>
                <label>Nomor Induk Mahasiswa (NIM)</label>
                <input class="form-control @error('nim') is-invalid @enderror" type="text" placeholder="Masukkan NIM" name="nim" value="{{ old('nim') }}">
            </div>
            <div>
                <label>Program Studi</label>
                <select class="custom-select" id="inputGroupSelect01" name="prodi" value="{{ old('prodi') }}" required>
                    <option selected>Pilih Program Studi...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>

        <div class="col">
            <div>
                <label>Judul Tugas Akhir (Indonesia)</label>
                <input class="form-control @error('judulID') is-invalid @enderror" type="text" placeholder="Masukkan judul" name="judulID" value="{{ old('judulID') }}" required>
            </div>

            <div>
                <label>Judul Tugas Akhir (English)</label>
                <input class="form-control @error('judulENG') is-invalid @enderror" type="text" placeholder="Masukkan judul" name="judulENG" value="{{ old('judulENG') }}" required>
            </div>

            <div>
                <label>Dosen Pembimbing</label>
                <input class="form-control @error('dosbing') is-invalid @enderror" type="text" placeholder="Masukkan nama Dosen Pembimbing" name="dosbing" value="{{ old('dosbing') }}" required>
            </div>

            <div>
                <label>Tanggal Persetujuan Proyek Akhir</label>
                <input class="form-control @error('tgl_acc') is-invalid @enderror" type="date" placeholder="Masukkan tanggal" name="tgl_acc" value="{{ old('tgl_acc') }}" required>
            </div>

            <div>
                <label>Upload Cover Judul Laporan Proyek Akhir</label>
                <div>
                    <input type="file" class="@error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required>
                </div>
                {{-- @error('file')
                <div class="text-danger">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="form-check">
                <input type="checkbox" name="terms">
                <label>Saya telah mengisi data dengan benar.</label>
            </div>


        <button type="submit" name="button" class="btn btn-primary d-flex mx-auto">Mengajukan</button>
    </form>
</div>
<!-- End isi konten -->

@endcomponent