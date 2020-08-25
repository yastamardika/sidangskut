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
                                <td>{{ $user->find($mahasiswa->pembimbing)->name }}</td>
                            </tr>
                            <tr>
                                <th>Tgl. Persetujuan Pembimbing</th>
                                <td>{{ date("l, d F Y", strtotime($mahasiswa->tgl_acc_dosbing)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                    <div class="text-center mt-1">
                        <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                        <p class="my-2">Cover Tugas Akhir</p>
                        <a href="/upload/{{$mahasiswa->file_cover_ta}}" target="_blank" class="text-center btn btn-outline-dark">Lihat File</a>
                    </div>
                </div>
            </div>

            @if ($mahasiswa->id_status == '3' || $mahasiswa->id_status == '4')    
            <h6 class="card-text mt-4">Jadwal Sidang:</h6>
            <div class="d-flow-root">
                <div class="col-12 col-lg-7 p-0 float-lg-left">
                    <div class="table-responsive">
                        <table class="table table-borderless m-0 detail-mahasiswa">
                            <tr>
                                <th>Hari/Tanggal</th>
                                <td class="text-capitalize"><b>{{ date("l, d F Y", strtotime($sidang->tanggal_sidang)) }}</b></td>
                            </tr>
                            <tr>
                                <th>Waktu</th>
                                <td>{{ date("H:i", strtotime($sidang->waktu)) }} WIB</td>
                            </tr>
                            <tr>
                                <th>Tempat</th>
                                <td>{{ $sidang->tempat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                    <div class="text-center mt-1">
                        <p class="mb-2">Download Undangan Sidang</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class='bx bx-file bx-xs d-inline-flex pr-2 align-middle'></i>Undangan
                        </button>
                    </div>
                </div>
            </div>
            @endif
            
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