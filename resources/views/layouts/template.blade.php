@extends('layouts.navbar')

@section('title')
    {{ $title_page }}
@endsection

@section('content')

{{-- Header --}}
<div class="card-header px-4 py-4 px-md-5">
   <div class="d-inline-flex">
      <div class="fit-content p-3 text-center shadow icon-head">
            <i class='bx {{ $icon }} bx-sm align-middle'></i>
      </div>
      <div class="ml-3 ml-md-4 my-auto fit-content">
            <h3 class="text-uppercase bold m-0">{{ $title_page }}</h3>
            <ol class="d-sm-inline-flex d-none flex-row flex-wrap m-0 p-0">
               {{ $link_breadcrumb }}
               <li class="breadcrumb-item active">{{ $title_page }}</li>
            </ol>
      </div>
   </div>
</div>
{{-- End Header --}}

{{-- Isi Body --}}
<div class="card-body p-4 p-lg-5">

   {{-- Body-content --}}
   @if (session('status'))
      <div class="alert alert-success" role="alert">
            {{ session('status') }}
      </div>
   @endif
   @if (session('error'))
      @alert(['type' => 'danger'])
            {!! session('error') !!}
      @endalert
   @endif

   {{ $slot }}

   {{-- End Body-content --}}
</div>
{{-- End Isi Body --}}

@endsection
