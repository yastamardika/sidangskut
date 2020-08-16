@component('layouts.template')

    @slot('title_page')
        Profil Akun
    @endslot
    @slot('icon')
        bxs-user
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 text-center">
    @role('admin|akademik|kaprodi|dosen_penguji|mahasiswa')
        <img src="img/Illustrations/ID Card-pana.svg" style="width:15vw; min-width:200px; margin-top:-15px">
        <h6 class="card-text text-uppercase mb-3" style="margin-top:-20px">Mahasiswa</h6>
        <h4 class="card-title text-uppercase"><b>Abdurrahman Jaisy Muhammad</b></h4>
        <p class="card-subtitle">abdurrahmanjaisymuhammad@mail.ugm.ac.id</p>
        <button type="submit" class="btn btn-outline-dark mt-4"><i class='bx bx-edit bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Edit Profil</span></button>
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