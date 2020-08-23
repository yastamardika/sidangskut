@component('layouts.template')

    @slot('title_page')
        Profil Akun
    @endslot
    @slot('icon')
        bxs-user
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0">
    @role('admin|akademik|kaprodi|dosen_penguji|mahasiswa')
        <div class="text-center">
            <img src="img/Illustrations/ID Card-pana.svg" style="width:15vw; min-width:200px; margin-top:-15px">
            @foreach ($user->getRoleNames() as $role)
            <h6 class="card-text text-uppercase mb-3" style="margin-top:-20px">{{ str_replace("_"," ",$role) }}</h6>
            @endforeach
            <h4 class="card-title text-uppercase"><b>{{$user->name}}</b></h4>
            <p class="card-subtitle">{{$user->email}}</p>
            <button type="button" class="btn btn-outline-dark mt-4" data-toggle="modal" data-target="#exampleModalCenter">
                <i class='bx bx-edit bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Edit Profil</span>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade p-0" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <form id="editUser" action="" method="POST">
                        <h5 class="bold mb-1">Edit Profil</h5>
                        <div>
                            <label class="col-form-label">Nama Lengkap</label>
                            <input class="form-control mb-2 @error('name') is-invalid @enderror" type="text" name="name" value="{{ $user->name }}" required>
                        </div>
                        <h6 class="bold mt-3 mb-0">Reset Password <small><i>(Optional)</i></small></h6>
                        <div class="form-group clearfix m-0">
                                            
                            <div class="col-md-6 float-left pr-md-2 p-0">
                                <label for="password" class="col-form-label">New Password</label>
                                <div class="input-group mb-2 p-0">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" title="Silahkan isi kata sandi Anda." autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div id="togglePassword" class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class='bx bx-hide align-middle togglePassword' id="iconShowHide" style="font-size: 1.25rem;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-md-6 float-right pl-md-2 p-0">
                                <label for="password-confirm" class="col-form-label">Konfirmasi Password</label>
                                <div class="input-group mb-2 p-0">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" title="Silahkan isi ulang kata sandi Anda." autocomplete="new-password">
                                    <div id="toggleConfirmPassword" class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class='bx bx-hide align-middle togglePassword' id="iconShowHide" style="font-size: 1.25rem;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn m-1" data-dismiss="modal"><span class="align-middle">Batal</span></button>
                    <button type="submit" class="btn btn-primary m-1 simpan"><i class='bx bx-save bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Simpan</span></button>
                </div>
            </div>
            </div>
        </div>
        <script>
            $('.simpan').on('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: "Perbarui Data",
                    text: "Konfirmasi pembaruan data profil Akun?",
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
        @slot('title_page')
            Akses Data Ditolak
        @endslot
        @slot('icon')
            bxs-error
        @endslot

        <div class="col p-0 text-center">
            <img src="{{ asset('img/Illustrations/Security-pana.svg') }}" class="mx-auto" style="min-height:20vh; height:30vw;" alt="Akun tidak memiliki akses data.">
            <h6><i>Maaf, akun Anda tidak memiliki akses untuk melihat data.</i></h6>
        </div>
    @endrole
</div>
{{-- End isi konten --}}

@endcomponent