@extends('layouts.navbar')
​
@section('title')
    <title>Manajemen User</title>
@endsection
​
@section('content')
<!-- Header -->
<div class="card-header">
    <div class="d-inline-flex">
        <div class="fit-content p-3 text-center align-middle shadow icon-head"><i class='bx bx-shield-quarter bx-sm'></i></div>
        <div class="ml-4 my-auto fit-content">
            <h3 class="text-uppercase font-weight-bold m-0">Manajemen User</h3>
            <ol class="d-flex flex-row flex-wrap m-0 p-0">
                {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                <li class="breadcrumb-item active">Role</li>
            </ol>
        </div>
    </div>
</div>
​<!-- End Header -->
<!-- Isi Body -->
<div class="card-body py-4 p-2 px-sm-4">
    <!-- Body-content -->
            <div class="col-md-6">
                @if (session('error'))
                    @alert(['type' => 'danger'])
                        {!! session('error') !!}
                    @endalert
                @endif

                <form role="form" action="{{ route('role.store') }}" method="POST">
                    @csrf
                    {{-- <label for="role">Tambah User:</label> --}}
                    <div class="d-flex flex-row">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm mx-auto mx-sm-0">Tambah User</a>
                    </div>
                </form>
            </div>
            <div class="col-md p-0 p-sm-3">
                <h4 class="my-3 font-weight-bold text-center">List User</h4>
                @if (session('success'))
                    @alert(['type' => 'success'])
                        {!! session('success') !!}
                    @endalert
                @endif
                
                <table id="table" class="table table-hover dt-responsive p-0" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <td style="min-width: 30px">#</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Status</td>
                            <td>Aksi</td>
                            <td>Detail</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($users as $row)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td><span class="d-inline-block text-truncate" style="max-width: 10rem !important">{{ $row->name }}</span></td>
                            <td class="fit-content"><span class="d-inline-block text-truncate" style="max-width: 8rem !important">{{ $row->email }}</span></td>
                            <td>
                                @foreach ($row->getRoleNames() as $role)
                                <label for="" class="badge badge-info p-2 text-wrap" style="max-width: 5rem">{{ $role }}</label>
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if ($row->status)
                                <label class="badge badge-success">Aktif</label>
                                @else
                                <label for="" class="badge badge-default">Suspend</label>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('users.roles', $row->id) }}" class="btn btn-warning btn-sm px-sm-4 m-1"><i class='bx bxs-check-shield bx-xs'></i></a>
                                    <a href="{{ route('users.edit', $row->id) }}" class="btn btn-dark btn-sm px-sm-4 m-1"><i class='bx bxs-user-detail bx-xs'></i></a>
                                    <button class="btn btn-danger btn-sm px-sm-4 m-1"><i class='bx bxs-trash bx-xs'></i></button>
                                </form>
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
            </div>
    <!-- End Body-content -->
    </div>
​
<!-- End Isi Body -->​
@endsection
