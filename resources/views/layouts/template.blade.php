@extends('layouts.navbar')
​
@section('title')
    {{ $title_page }}
@endsection
​
@section('content')

<!-- Header -->
<div class="card-header">
   <div class="d-inline-flex">
      <div class="fit-content p-3 text-center align-middle shadow icon-head">
            <i class='bx {{ $icon }} bx-sm'></i>
      </div>
      <div class="ml-4 my-auto fit-content">
            <h3 class="text-uppercase font-weight-bold m-0">{{ $title_page }}</h3>
            <ol class="d-flex flex-row flex-wrap m-0 p-0">
               {{ $link_breadcrumb }}
               <li class="breadcrumb-item active">{{ $title_page }}</li>
            </ol>
      </div>
   </div>
</div>
​<!-- End Header -->

<!-- Isi Body -->
<div class="card-body py-3 p-2 px-sm-4">

   <!-- Body-content -->
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
   
   <!-- End Body-content -->
</div>
​
<!-- End Isi Body -->​
@endsection
