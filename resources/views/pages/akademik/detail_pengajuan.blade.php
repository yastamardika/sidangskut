@component('layouts.template')

    @slot('title_page')
        Detail Pengajuan Sidang
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('akademik.mahasiswa') }}">Data Pendaftar Sidang</a></li>
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    @role('akademik')
        @if ($mahasiswa->id_status == '1' || $mahasiswa->id_status == '2')
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
                                <th>Tgl. Pengajuan Sidang</th>
                                <td>{{ date("l, d F Y", strtotime($mahasiswa->created_at)) }}</td>
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
                                <th>Email</th>
                                <td><a href="mailto:{{ $mahasiswa->email }}">{{ $mahasiswa->email }}</a></td>
                            </tr>
                            <tr>
                                <th>No. Telp</th>
                                <td>{{ $mahasiswa->nomerhp }}</td>
                            </tr>
                            <tr>
                                <th>Dosen Pembimbing</th>
                                <td>{{ $mahasiswa->dosbing }}</td>
                            </tr>
                            <tr>
                                <th>Tgl. Persetujuan Pembimbing</th>
                                <td>{{ date("d F Y", strtotime( $mahasiswa->tgl_acc_dosbing )) }}</td>
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
            
            <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
                @if ($mahasiswa->id_status == '1')
                    <form action="{{ route('users.destroy', $mahasiswa->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger m-1"><i class='bx bx-trash bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Hapus</span></button>
                    </form>
                        <a href="" class="btn btn-outline-dark m-1"><i class='bx bx-edit bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Edit</span></a>
                    <form action="{{ route('akademik.ajukan', $mahasiswa->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1"><i class='bx bx-check bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Ajukan ke Kaprodi</span></button>
                    </form>
                @else
                <form action="{{ route('akademik.cancel', $mahasiswa->id) }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger m-1"><i class='bx bx-x bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-text-top">Batalkan Pengajuan</span></button>
                </form>
                @endif
            </div>
        @endif

        @if ($mahasiswa->id_status == '4')
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
                                <th>Dosen Penguji</th>
                                <td>
                                    <b>Ketua Penguji</b>
                                        <p class="mb-1">Nama Ketua Penguji</p>
                                    <b>Anggota Penguji</b>
                                        <p class="mb-1">Nama Anggota Penguji</p>
                                    <b>Dosen Pembimbing</b>
                                        <p class="mb-0">{{ $mahasiswa->dosbing }}</p>
                                </td>
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
            
            <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
                <button type="submit" class="btn btn-outline-dark m-1"><i class='bx bx-cloud-download bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Unduh</span></button>
                <button type="submit" class="btn btn-primary m-1"><i class='bx bx-check bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Verifikasi</span></button>
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