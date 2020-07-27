@component('layouts.template')

    @slot('title_page')
        Dashboard
    @endslot
    @slot('icon')
        bxs-home
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md">
    @hasrole('admin|akademik|kaprodi|dosen_penguji|mahasiswa')
    You are logged in!
    @else
    Akun tidak memiliki akses data.
    @endhasrole
</div>
{{-- End isi konten --}}

@endcomponent