@component('layouts.template')

    @slot('title_page')
        Edit Pengajuan Mahasiswa
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="">Data Pendaftar Sidang</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('akademik.detailmhs', $mahasiswa->id ) }}">Detail Pengajuan Sidang</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    {{-- @hasrole('akademik') --}}
    <form method="post" action="" enctype="multipart/form-data" class="m-0">

        <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
            <a href="#" class="btn m-1"><span class="align-middle">Batal</span></a>
            <button type="submit" class="btn btn-primary m-1"><i class='bx bx-save bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Simpan</span></button>
        </div>
    </form>
    {{-- @else
    Akun tidak memiliki akses data.
    @endhasrole --}}
</div>
{{-- End isi konten --}}

@endcomponent