@component('layouts.template')

    @slot('title_page')
        Ubah Role User
    @endslot
    @slot('icon')
        bxs-check-shield
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Manajemen User</a></li>
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0">
    <form id="changeRole" action="{{ route('users.set_role', $user->id) }}" method="post" class="col-12 p-0 m-0">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="table-responsive">
            <table class="table table-bordered m-0">
                <tr>
                    <th>Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        @foreach ($roles as $row)
                        <input type="radio" name="role" class="roleClass"
                            {{ $user->hasRole($row) ? 'checked':'' }}
                            value="{{ $row }}"> {{  $row }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr id="prodi">
                    <th>Program Studi</th>
                    <td>
                        <select class="form-control" id="inputGroupSelect01" name="prodi" required>
                            <option disabled selected value>Pilih Program Studi...</option>
                            @foreach ($prodi as $rows)
                                @if ($kaprodi != null)
                                    <option value="{{ $rows->id }}" {{ $kaprodi->id_prodi == $rows->id ? 'selected' : '' }}>{{ $rows->prodi_full }}</option>
                                @elseif ($penguji != null)
                                <option value="{{ $rows->id }}" {{ $penguji->id_prodi == $rows->id ? 'selected' : '' }}>{{ $rows->prodi_full }}</option>
                                @else
                                    <option value="{{ $rows->id }}">{{ $rows->prodi_full }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <script>
                
                </script>
            </table>
        </div>
        <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
            <a href="{{ route('users.index') }}" class="btn m-1"><span class="align-middle">Batal</span></a>
            <button type="submit" class="btn btn-primary m-1 simpan"><i class='bx bx-save bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Simpan</span></button>
        </div>
    </form>
    <script>
        $('.simpan').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Perbarui Data",
                text: "Perbarui Role untuk data User ini?",
                icon: 'warning',
                iconHtml: '<i class="bx bx-error bx-lg "></i>',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Perbarui',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById("changeRole").submit();
                }
            });
        });
    </script>
</div>
<!-- End isi konten -->

@endcomponent