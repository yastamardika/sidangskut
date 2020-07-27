@component('layouts.template')

    @slot('title_page')
        Manajemen Role User
    @endslot
    @slot('icon')
        bx-shield-quarter
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
<!-- Isi konten -->
    <div>
        <form role="form" action="{{ route('role.store') }}" method="POST">
            @csrf
            <label for="role">Tambah Role baru:</label>
            <div class="d-flex flex-column flex-md-row">
                <input type="text" name="role" class="col col-md-5 col-lg-3 form-control md-box mr-2 mb-2 mb-md-0 {{ $errors->has('role') ? 'is-invalid':'' }}" id="name" required="">
                <button type="submit" class="btn btn-primary">+ Tambah</button>
            </div>
        </form>
    </div>

    <div class="col-md p-0">
        {{-- <h4 class="my-3 font-weight-bold text-center">List Role</h4> --}}

        <table id="table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr class="text-center">
                    <td style="width: 30px">#</td>
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
<!-- End isi konten -->

@endcomponent