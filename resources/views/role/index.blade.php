@extends('layouts.navbar')
​
@section('title')
    <title>Manajemen Role</title>
@endsection
​
@section('content')
<!-- Header -->
    <div class="card-header">
        <div class="d-inline-flex">
            <div class="fit-content p-3 text-center align-middle shadow icon-head"><i class='bx bx-shield-quarter bx-sm'></i></div>
            <div class="ml-4 my-auto fit-content">
                <h3 class="text-uppercase font-weight-bold m-0">Manajemen Role User</h3>
                <ol class="d-flex flex-row flex-wrap m-0 p-0">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                    <li class="breadcrumb-item active">Role</li>
                </ol>
            </div>
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
                
                <table id="table" class="table table-hover dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <td>#</td>
                            <td>Role User</td>
                            <td>Created At</td>
                            <td>Aksi</td>
                            <td>Detail</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($role as $row)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ date("d/m/Y H:i:s", strtotime($row->created_at)) }}</td>
                            <td>
                                <form action="{{ route('role.destroy', $row->id) }}" method="POST" class="m-0 text-center">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm px-sm-4"><i class='bx bxs-trash bx-xs'></i></button>
                                </form>
                            </td>
                            <td></td>
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
