@component('layouts.template')

    @slot('title_page')
        Detail Sidang
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="">Daftar Data Sidang</a></li>
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    <h6 class="card-text">PROYEK TUGAS AKHIR</h6>
    <h5 class="card-title text-uppercase"><b>{{ $mahasiswa->judul_idn }}</b></h5>
    <h6 class="card-subtitle text-uppercase"><i>{{ $mahasiswa->judul_eng }}</i></h6>
    <small>Mahasiswa {{ $mahasiswa->nama_mhs }}</small>
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
</div>
{{-- End isi konten --}}

@endcomponent