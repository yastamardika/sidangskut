@extends('layouts.navbar')

@section('content')
<!-- Header -->
    <div class="card-header">Dashboard</div>
<!-- End Header -->
<!-- Isi Body -->
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        You are logged in!
    </div>
<!-- End Isi Body -->
@endsection