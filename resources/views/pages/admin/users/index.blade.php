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

{{-- Isi konten --}}
    <div class="col-md-6 p-0 mb-3">
        <form role="form" action="{{ route('users.create') }}" method="GET">
            @csrf
            <h5 for="role">Tambah User baru:</h5>
            <div class="d-flex flex-row">
                <button type="submit" class="btn btn-primary">+ Tambah</button>
            </div>
        </form>
    </div>

    <div class="col-md p-0">
        <table id="table" class="table table-hover table-bordered dt-responsive p-0" style="width:100%">
            <thead>
                <tr class="text-center">
                    <td style="width: 10px"></td>
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
                    <td><span class="d-inline-block text-truncate konten-tabel">
                        {{ $row->name }}
                    </span></td>
                    <td class="fit-content"><span class="d-inline-block text-truncate konten-tabel" style="min-width: 100%; width: 14vw;">
                        {{ $row->email }}
                    </span></td>
                    <td class="text-center">
                        @foreach ($row->getRoleNames() as $role)
                        <label for="" class="badge badge-pill badge-success p-2 text-wrap" style="min-width: 50%; width: 8rem;">
                            {{ $role }}
                        </label>
                        @endforeach
                    </td>
                    <td class="text-center p-0">
                        <form id="formDelete" action="{{ route('users.destroy', $row->id) }}" method="POST" class="m-0">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ route('users.roles', $row->id) }}" class="btn btn-warning btn-sm px-sm-4 m-1"><i class='bx bxs-key bx-xs text-black-50 align-middle'></i></a>
                            <a href="{{ route('users.edit', $row->id) }}" class="btn btn-dark btn-sm px-sm-4 m-1"><i class='bx bxs-user-detail bx-xs align-middle'></i></a>
                            <button class="btn btn-danger btn-sm px-sm-4 m-1 delete" data-user="{{$row->name}}"><i class='bx bx-trash bx-xs align-middle'></i></button>
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
        <script>
            $('.delete').on('click', function (e) {
                e.preventDefault();
                const user = $('.delete').attr('data-user');

                Swal.fire({
                    title: "Hapus User",
                    text: "Hapus data user \"" + user + "\"?",
                    icon: 'warning',
                    iconHtml: '<i class="bx bx-error bx-lg "></i>',
                    confirmButtonColor: '#e3342f',
                    showCancelButton: true,
                    cancelButtonText: 'Kembali',
                    confirmButtonText: 'Hapus',
                    focusConfirm: false,
                    focusCancel: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        document.getElementById("formDelete").submit();
                    }
                });
            });
        </script>
    </div>
{{-- End isi konten --}}

@endcomponent
