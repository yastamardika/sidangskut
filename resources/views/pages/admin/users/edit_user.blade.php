@component('layouts.template')

    @slot('title_page')
        Edit Data User
    @endslot
    @slot('icon')
        bxs-user
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Manajemen User</a></li>
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    @hasrole('admin')    
    <form id="editUser" method="post" action="{{ route('users.updates', $user->id) }}" class="m-0" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="col p-0">
            <h5 class="bold">Identitas User</h5>
            <div>
                <label class="col-form-label">Nama User</label>
                <input class="form-control mb-2 @error('name') is-invalid @enderror" type="text" name="name" value="{{ $user->name }}" required>
            </div>
            <div>
                <label class="col-form-label">Email</label>
                <input class="form-control mb-2 @error('email') is-invalid @enderror" type="email" name="email" placeholder="@*ugm.ac.id" value="{{ $user->email }}" required>
            </div>
            <h5 class="bold mt-4">Reset Password <small><i>(Optional)</i></small></h5>
            <div class="form-group clearfix mt-2">
                                
                <div class="col-md-6 float-left pr-md-2 p-0">
                    <label for="password" class="col-form-label">New Password</label>
                    <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" title="Silahkan isi kata sandi Anda." autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    
                <div class="col-md-6 float-right pl-md-2 p-0">
                    <label for="password-confirm" class="col-form-label">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" title="Silahkan isi ulang kata sandi Anda." autocomplete="new-password">
                </div>

            </div>
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
                text: "Perbarui data User ini?",
                icon: 'warning',
                iconHtml: '<i class="bx bx-error bx-lg "></i>',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Perbarui',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById("editUser").submit();
                }
            });
        });
    </script>
    @else
    Akun tidak memiliki akses data.
    @endhasrole
</div>
{{-- End isi konten --}}

@endcomponent