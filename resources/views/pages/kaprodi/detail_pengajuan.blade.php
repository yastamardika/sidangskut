@component('layouts.template')

    @slot('title_page')
        Detail Pengajuan Sidang
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="">Data Pendaftar Sidang</a></li>
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    {{-- @hasrole('kaprodi') --}}
    <div class="d-flow-root">
        <div class="col-12 col-lg-6 p-0 float-lg-left">
            <h5 class="bold text-center text-sm-left">DATA MAHASISWA</h5>
            <div class="table-responsive">
                <table class="table table-borderless detail-mahasiswa">
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <th>No. Telp</th>
                        <td></td>
                    </tr>
                </table>
            </div>
            <h5 class="bold text-center text-sm-left">DATA TUGAS AKHIR</h5>
            <div class="table-responsive">
                {{-- <table class="table table-borderless detail-mahasiswa">
                    <tr>
                        <th>Judul TA</th>
                        <td>{{ $mahasiswa->judul_idn }}<br><small><i>{{ $mahasiswa->judul_eng }}</i></small></td>
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
            </div> --}}
        </div>
        <div class="col-12 col-lg-5 p-0 float-lg-right">
            <p class="text-center">Preview File Cover Tugas Akhir</p>
            {{-- <iframe src="/upload/{{$mahasiswa->file_cover_ta}}#toolbar=0&navpanes=0&scrollbar=0" style="width: 100%;height: 480px;border: 2px solid;" type="application/pdf"></iframe> --}}
        </div>
    </div>
    
    <div class="col-12 p-0 mt-4 text-center text-xl-right">
        <button type="submit" class="btn btn-danger"><i class='bx bxs-check-shield bx-xs d-inline-flex pr-2 align-middle'></i>Hapus</button>
        <button type="submit" class="btn btn-dark m-1"><i class='bx bxs-check-shield bx-xs d-inline-flex pr-2 align-middle'></i>Edit</button>
        <button type="submit" class="btn btn-primary"><i class='bx bxs-check-shield bx-xs d-inline-flex pr-2 align-middle'></i>Ajukan ke Kaprodi</button>
    </div>
    {{-- @else
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
    @endrole --}}
</div>
{{-- End isi konten --}}

@endcomponent