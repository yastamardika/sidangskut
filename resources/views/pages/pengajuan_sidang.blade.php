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
                <label class="col-form-label">Nomor Induk Mahasiswa (NIM)</label>
                <input class="form-control mb-2 @error('nim') is-invalid @enderror" type="text" placeholder="Masukkan NIM" name="nim" value="{{ old('nim') }}">
            </div>
            <div>
                <label class="col-form-label">Nomor HP/Whatsapp</label>
                <input class="form-control mb-2 @error('nomerhp') is-invalid @enderror" type="text" placeholder="Masukkan No. HP/WA" name="nomerhp" value="{{ old('nomerhp') }}">
            </div>
            <div>
                <label class="col-form-label">Program Studi</label>
                <select class="form-control mb-2" id="inputGroupSelect01" name="prodi" value="{{ old('prodi') }}" required>
                    <option selected>Pilih Program Studi...</option>
                    @foreach ($prodis as $rows)
                    <option value="{{ $rows->id }}">{{ $rows->program_studi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col">
            <div>
                <label class="col-form-label">Judul Tugas Akhir (Indonesia)</label>
                <input class="form-control mb-2 @error('judulIDN') is-invalid @enderror" type="text" placeholder="Masukkan judul" name="judulIDN" value="{{ old('judulIDN') }}" required>
            </div>

            <div>
                <label class="col-form-label">Judul Tugas Akhir (English)</label>
                <input class="form-control mb-2 @error('judulENG') is-invalid @enderror" type="text" placeholder="Masukkan judul" name="judulENG" value="{{ old('judulENG') }}" required>
            </div>

            <div>
                <label class="col-form-label">Dosen Pembimbing</label>
                <input class="form-control mb-2 @error('dosbing') is-invalid @enderror" type="text" placeholder="Masukkan nama Dosen Pembimbing" name="dosbing" value="{{ old('dosbing') }}" required>
            </div>

            <div>
                <label class="col-form-label">Tanggal Persetujuan Proyek Akhir</label>
                <input class="form-control mb-2 @error('tgl_acc') is-invalid @enderror" type="date" placeholder="Masukkan tanggal" name="tgl_acc" value="{{ old('tgl_acc') }}" required>
            </div>

            <div>
                <label class="col-form-label">Upload Cover Judul Laporan Proyek Akhir</label>
                <label for="form-file" class="custom-file-upload mb-3 btn btn-dark d-flex fit-content"><i class='bx bx-upload pr-2 bx-xs'></i>Upload file</label>
                <div>
                    <input id="form-file" type="file" class="mb-3 @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required>
                </div>
                {{-- @error('file')
                <div class="text-danger">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="form-check">
                <input type="checkbox" name="terms">
                <label>Saya telah mengisi data dengan benar.</label>
            </div>


        <button type="submit" name="button" class="btn btn-primary d-flex mx-auto mt-4">Mengajukan</button>
    </form>

</div>
<!-- End isi konten -->

@endcomponent