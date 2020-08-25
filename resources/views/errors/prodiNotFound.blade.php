@component('layouts.template')

    @slot('title_page')
        Akses Program Studi belum ada
    @endslot
    @slot('icon')
        bxs-error
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot

{{-- Isi konten --}}
    <div class="col-md p-0">
        <div class="col p-0 text-center">
            <img src="{{ asset('img/Illustrations/Security-pana.svg') }}" class="mx-auto" style="min-height:20vh; height:30vw;" alt="Akun tidak memiliki akses data.">
            <h6><i>Maaf, akun Anda belum memiliki akses ke Program Studi.</i></h6>
            <small><i>*Silahkan hubungi Bagian Akademik DTEDI SV UGM apabila terdapat masalah ini atau untuk informasi lebih lanjut.</i></small>
        </div>
    </div>
{{-- End isi konten --}}

@endcomponent
