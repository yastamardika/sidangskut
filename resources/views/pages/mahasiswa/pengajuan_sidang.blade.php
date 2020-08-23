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
    
{{-- Isi konten --}}
<div class="col-md p-0">
    @role('mahasiswa')
        <h4 class="my-1 bold text-center">FORMULIR PENGAJUAN SIDANG TUGAS AKHIR</h4>
        <p class="mb-4 text-center">Departemen Teknik Elektro dan Informatika</p>
        
        <form id="ajukanSidang" method="post" action="{{route('upload')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="col p-0">
                <h5 class="bold">Identitas Mahasiswa</h5>
                <div>
                    <label class="col-form-label">Nomor Induk Mahasiswa (NIM)</label>
                    <input class="form-control mb-2 @error('nim') is-invalid @enderror" type="text" name="nim" placeholder="Contoh: 16/123456/SV/09876" value="{{ old('nim') }}" required>
                </div>

                <div class="clearfix">                                
                    <div class="col-md-6 float-left p-0 pr-md-2">
                        <label class="col-form-label">Program Studi</label>
                        <select class="form-control mb-2" id="inputGroupSelect01" name="prodi" value="{{ old('prodi') }}" required>
                            <option selected>Pilih Program Studi...</option>
                            @foreach ($prodi as $rows)
                            <option value="{{ $rows->id }}">{{ $rows->program_studi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 float-right p-0 pl-md-2">
                        <label class="col-form-label">Nomor HP/Whatsapp</label>
                        <input class="form-control mb-2 @error('nomerhp') is-invalid @enderror" type="text" name="nomerhp" value="{{ old('nomerhp') }}" required>
                    </div>
                </div>
            </div>

            <div class="col p-0 mt-4">
                <h5 class="bold">Tugas Akhir</h5>
                <div>
                    <label class="col-form-label">Judul Tugas Akhir (Indonesia)</label>
                    <input class="form-control mb-2 @error('judulIDN') is-invalid @enderror" type="text" name="judulIDN" value="{{ old('judulIDN') }}" required>
                </div>

                <div>
                    <label class="col-form-label">Judul Tugas Akhir (English)</label>
                    <input class="form-control mb-2 @error('judulENG') is-invalid @enderror" type="text" name="judulENG" value="{{ old('judulENG') }}" required>
                </div>

                <div class="clearfix">                                
                    <div class="col-md-6 float-left p-0 pr-md-2">
                        <label class="col-form-label">Dosen Pembimbing</label>
                        <input class="form-control mb-2 @error('dosbing') is-invalid @enderror" type="text" name="dosbing" value="{{ old('dosbing') }}" required>
                    </div>

                    <div class="col-md-6 float-right p-0 pl-md-2">
                        <label class="col-form-label">Tgl. Persetujuan Pembimbing</label>
                        <input class="form-control mb-2 @error('tgl_acc') is-invalid @enderror" type="date" name="tgl_acc" value="{{ old('tgl_acc') }}" required>
                    </div>
                </div>
                
                <div>
                    <label class="col-form-label">Cover Laporan Tugas Akhir</label>
                    <label for="form-file" class="custom-file-upload mb-1 btn btn-dark d-flex fit-content"><i class='bx bx-upload pr-2 bx-xs'></i>Upload file</label>
                    <span id="nameFiles" class="d-inline-block text-truncate align-middle" style="min-width: 175px; max-width: 20vw"></span>
                    <input id="form-file" type="file" class="mb-3 @error('file') is-invalid @enderror" name="file" onchange="NameFile()" value="{{ old('file') }}" required>
                    {{-- @error('file')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
            </div>

            <div class="form-check d-inline-flex p-0 mt-2">
                <input type="checkbox" name="terms" class="mr-2 mt-1">
                <label>Saya telah mengisi data dengan benar.</label>
            </div>

            <button type="submit" name="button" class="btn btn-primary d-flex mx-auto justify-content-center mt-4 simpan">Mengajukan</button>
        </form>
        <script>
            $('.simpan').on('click', function (e) {
                e.preventDefault();
    
                Swal.fire({
                    title: "Peringatan",
                    text: "Anda hanya dapat mengajukan sidang 1 kali. Pastikan data yang Anda masukkan benar. Lanjutkan pengajuan?",
                    footer: "Apabila terdapat kesalahan/perubahan silahkan hubungi Akademik DTEDI SV UGM.",
                    icon: 'question',
                    iconHtml: '<i class="bx bx-error bx-lg "></i>',
                    showCancelButton: true,
                    cancelButtonText: 'Kembali',
                    confirmButtonText: 'Ajukan Sidang',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        document.getElementById("ajukanSidang").submit();
                    }
                });
            });
        </script>
    @else
        @slot('title_page')
            Akses Data Ditolak
        @endslot
        @slot('icon')
            bxs-error
        @endslot

        <div class="col p-0 text-center">
            <img src="{{ asset('img/Illustrations/Security-pana.svg') }}" class="mx-auto" style="min-height:20vh; height:30vw;" alt="Akun tidak memiliki akses data.">
            <h6><i>Maaf, akun Anda tidak memiliki akses untuk melihat data.</i></h6>
        </div>
    @endrole
</div>
{{-- End isi konten --}}

@endcomponent