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
    
{{-- Isi konten --}}
    <div class="mb-3">
        <form role="form" action="{{ route('role.store') }}" method="POST">
            @csrf
            <h5>Tambah Role baru:</h5>            
            <div class="d-flex flex-column flex-md-row">
                <input type="text" name="role" class="col col-md-5 col-lg-3 form-control md-box mr-2 mb-2 mb-md-0 {{ $errors->has('role') ? 'is-invalid':'' }}" id="name" required="">
                <button type="submit" class="btn btn-primary">+ Tambah</button>
            </div>
            <p class="my-1">Default role: </p>
            <div class="d-inline mb-4">
                <label class="badge badge-success px-3 py-2 m-1 fit-content">
                    mahasiswa
                </label>
                <label class="badge badge-success px-3 py-2 m-1 fit-content">
                    akademik
                </label>
                <label class="badge badge-success px-3 py-2 m-1 fit-content">
                    kaprodi
                </label>
                <label class="badge badge-success px-3 py-2 m-1 fit-content">
                    dosen_penguji
                </label>
                <label class="badge badge-success px-3 py-2 m-1 fit-content">
                    admin
                </label>
            </div>
        </form>
    </div>

    <div class="col-md p-0">
        {{-- <h4 class="my-3 font-weight-bold text-center">List Role</h4> --}}

        <table id="table" class="table table-hover table-bordered dt-responsive p-0" style="width:100%">
            <thead>
                <tr class="text-center">
                    <td style="width: 10px"></td>
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
                    <td><span class="d-inline-block text-truncate konten-tabel" style="min-width: 100%;">
                        {{ $row->name }}
                    </span></td>
                    <td>
                        <span class="d-inline-block text-truncate konten-tabel" style="min-width: 100%; width: 10vw;">
                            {{ date("d/m/Y H:i:s", strtotime($row->created_at)) }}
                        </span>
                    </td>
                    <td class="text-center p-0">
                        <form id="formDelete" action="{{ route('role.destroy', $row->id) }}" method="POST" class="m-0">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm px-sm-4 m-1 delete" data-role="{{$row->name}}"><i class='bx bx-trash bx-xs align-middle'></i></button>
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
        <script>
            $('.delete').on('click', function (e) {
                e.preventDefault();
                const role = $('.delete').attr('data-role');

                Swal.fire({
                    title: "Hapus Role",
                    text: "Hapus role \"" + role + "\"?",
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