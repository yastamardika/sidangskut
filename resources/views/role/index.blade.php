@extends('layouts.navbar')
​
@section('title')
    <title>Manajemen Role</title>
@endsection
​
@section('content')
<!-- Header -->
    <div class="card-header">
        <div class="col-md">
            <h1 class="text-uppercase font-weight-bold">Manajemen Role User</h1>
        </div>
        <div class="col-md">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Role</li>
            </ol>
        </div>
    </div>
​<!-- End Header -->
<!-- Isi Body -->
    <div class="card-body py-4">
    <!-- Body-content -->
            <div class="col-md-6">
                @if (session('error'))
                    @alert(['type' => 'danger'])
                        {!! session('error') !!}
                    @endalert
                @endif

                <form role="form" action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <label for="role">Tambah Role:</label>
                    <div class="d-flex flex-row">
                        <input type="text" name="role" class="form-control col-md-6 {{ $errors->has('role') ? 'is-invalid':'' }} mr-md-3" id="name" required="">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            <div class="col-md">
                <h4 class="my-3 font-weight-bold text-center">List Role</h4>
                @if (session('success'))
                    @alert(['type' => 'success'])
                        {!! session('success') !!}
                    @endalert
                @endif
                
                <table id="data" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr class="text-center">
                            <td>#</td>
                            <td>Role User</td>
                            <td>Created At</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($role as $row)
                        <tr>
                            <td class="align-middle text-center">{{ $no++ }}</td>
                            <td class="align-middle">{{ $row->name }}</td>
                            <td class="align-middle">{{ date("d/m/Y H:i:s", strtotime($row->created_at)) }}</td>
                            <td>
                                <form action="{{ route('role.destroy', $row->id) }}" method="POST" class="m-0 text-center">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm"><i class='bx bx-trash bx-xs'></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="float-right">
                    {!! $role->links() !!}
                </div>

            </div>
    <!-- End Body-content -->
    </div>
​
<!-- End Isi Body -->
@endsection
