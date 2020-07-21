@extends('layouts.navbar')

@section('content')
<div class="container-fluid px-md-4">
    <div class="row justify-content-center">
        <div class="col-md-12 px-md-2">
            <div class="card shadow">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
