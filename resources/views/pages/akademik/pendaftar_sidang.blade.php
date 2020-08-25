@component('layouts.template')

    @slot('title_page')
        Data Pendaftar Sidang
    @endslot
    @slot('icon')
        bxs-spreadsheet
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0">
    @role('akademik|admin')
        @if ($mahasiswa->first() == null)
            <div class="col p-0 text-center">
                <img src="{{ asset('img/Illustrations/Status update-pana.svg') }}" class="mx-auto" style="min-height:20vh; height:30vw;" alt="Akun tidak memiliki akses data.">
                <h6><i>Belum ada data pengajuan sidang mahasiswa.</i></h6>
            </div>
        @else
        <h6 class="card-text">Unduh semua data pengajuan: </h6>
        <a href="{{ route('akademik.mahasiswa.unduh') }}" class="btn btn-outline-dark mb-4"><i class='bx bxs-cloud-download bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Unduh file</span></a>

        <table id="table" class="table table-hover table-bordered dt-responsive p-0" style="width:100%">
            <thead>
                <tr class="text-center">
                    <td style="width: 10px"></td>
                    <td>Nama Mahasiswa</td>
                    <td>Program Studi</td>
                    <td>Tgl. Pengajuan</td>
                    <td>Status</td>
                    <td>Aksi</td>
                    <td>Detail</td>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($mahasiswa as $row)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td><span class="d-inline-block text-truncate konten-tabel">
                        {{ $row->nama_mhs }}
                    </span></td>
                    <td class="fit-content"><span class="d-inline-block text-truncate konten-tabel" style="min-width: 100%; width: 10vw;">
                        {{ $prodi->find($row->id_prodi)->program_studi }}
                    </span></td>
                    <td class="fit-content"><span class="d-inline-block text-truncate konten-tabel" style="min-width: 100%; width: 10vw;">
                        {{ date("d F Y", strtotime($row->created_at)) }}
                    </span></td>
                    <td class="fit-content text-capitalize text-center"><span class="d-inline-block text-truncate konten-tabel" style=" min-width: 100%; width: 10vw;">
                        {{ $status->find($row->id_status)->status }}
                    </span></td>
                    <td class="text-center p-0">
                        <a href="{{ route('akademik.detailmhs',$row->id) }}" class="btn @switch($status->find($row->id_status)->status)
                            @case('mendaftar')
                                btn-primary
                                @break
                            @case('sidang')
                            @role('admin')
                                btn-primary
                            @else
                                btn-dark disabled
                            @endrole
                                @break
                            @case('selesai')
                                btn-success
                                @break
                            @default
                            @role('admin')
                                btn-primary
                            @else
                                btn-warning
                            @endrole
                        @endswitch btn-sm px-sm-4 m-1"><i class='bx bx-spreadsheet bx-xs align-middle'></i></a>
                    </td>
                    <td></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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