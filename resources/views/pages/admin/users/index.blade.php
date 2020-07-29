@component('layouts.template')

    @slot('title_page')
        Manajemen User
    @endslot
    @slot('icon')
        bxs-id-card
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
<!-- Isi konten -->
    <div class="col-md-6 p-0">
        <form role="form" action="{{ route('users.create') }}" method="GET">
            @csrf
            <label for="role">Tambah User baru:</label>
            <div class="d-flex flex-row">
                <button type="submit" class="btn btn-primary">+ Tambah</button>
            </div>
        </form>
    </div>

    <div class="col-md p-0">
        <table id="table" class="table table-hover table-bordered dt-responsive p-0" style="width:100%">
            <thead>
                <tr class="text-center">
                    <td style="width: 30px">#</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Aksi</td>
                    <td>Detail</td>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($users as $row)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td><span class="d-inline-block text-truncate konten-tabel">{{ $row->name }}</span></td>
                    <td class="fit-content"><span class="d-inline-block text-truncate konten-tabel" style="    min-width: calc(100% - 80px); width: 10vw;">{{ $row->email }}</span></td>
                    <td>
                        @foreach ($row->getRoleNames() as $role)
                        <label for="" class="badge badge-info p-2 text-wrap" style="min-width: calc(100% - 80px); width: 11vw;">{{ $role }}</label>
                        @endforeach
                    </td>
                    <td class="text-center p-0">
                        <form action="{{ route('users.destroy', $row->id) }}" method="POST" class="m-0">
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
<!-- End isi konten -->

@endcomponent