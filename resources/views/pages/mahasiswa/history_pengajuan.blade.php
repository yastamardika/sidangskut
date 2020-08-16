@component('layouts.template')

    @slot('title_page')
        Pengajuan Sidang
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    @role('mahasiswa')
    {{-- <div class="card shadow border-darken-2 p-3 detail-pengajuan">
        <div class="card-body px-3 py-2"> --}}
            <h6 class="card-text">PROYEK TUGAS AKHIR</h6>
            <h5 class="card-title text-uppercase"><b>{{ $mahasiswa->judul_idn }}</b></h5>
            <h6 class="card-subtitle text-uppercase"><i>{{ $mahasiswa->judul_eng }}</i></h6>
            <h6 class="card-text mt-4">Detail pengajuan:</h6>
            <div class="d-flow-root">
                <div class="col-12 col-lg-7 p-0 float-lg-left">
                    <div class="table-responsive">
                        <table class="table table-borderless m-0 detail-mahasiswa">
                            <tr>
                                <th>Status</th>
                                <td class="text-capitalize"><b>{{ $status->find($mahasiswa->id_status)->status }}</b></td>
                            </tr>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <td>{{ $mahasiswa->nama_mhs }}</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $prodi->find($mahasiswa->id_prodi)->prodi_full }}</td>
                            </tr>
                            <tr>
                                <th>Dosen Pembimbing</th>
                                <td>{{ $mahasiswa->dosbing }}</td>
                            </tr>
                            <tr>
                                <th>Tgl. Pengajuan</th>
                                <td>{{ date("l, d F Y", strtotime($mahasiswa->created_at)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                    <div class="text-center mt-1">
                        <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                        <p class="my-2">Cover Tugas Akhir</p>
                        <a href="/upload/{{$mahasiswa->file_cover_ta}}" target="_blank" class="text-center btn btn-primary text-white">Lihat File</a>
                    </div>
                </div>
            </div>
        {{-- </div>
    </div> --}}
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