@component('layouts.template')

    @slot('title_page')
        Detail Pengajuan Sidang
    @endslot
    @slot('icon')
        bxs-file
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('akademik.mahasiswa') }}">Data Pendaftar Sidang</a></li>
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    @role('akademik')
        @if ($mahasiswa->id_status == '1' || $mahasiswa->id_status == '2')
            <h6 class="card-text">PROYEK TUGAS AKHIR</h6>
            <h5 class="card-title text-uppercase"><b>{{ $mahasiswa->judul_idn }}</b></h5>
            <h6 class="card-subtitle text-uppercase"><i>{{ $mahasiswa->judul_eng }}</i></h6>
            <h6 class="card-text mt-4">Detail pengajuan:</h6>
            <div class="d-flow-root">
                <div class="col-12 col-lg-7 p-0 float-lg-left">
                    <div class="table-responsive">
                        <table class="table table-borderless m-0 detail-mahasiswa">
                            <tr>
                                <th>Status</th>
                                <td class="text-capitalize"><b>{{ $status->find($mahasiswa->id_status)->status }}</b></td>
                            </tr>
                            <tr>
                                <th>Tgl. Pengajuan Sidang</th>
                                <td>{{ date("l, d F Y", strtotime($mahasiswa->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <td>{{ $mahasiswa->nama_mhs }}</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $prodi->find($mahasiswa->id_prodi)->prodi_full }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><a href="mailto:{{ $mahasiswa->email }}">{{ $mahasiswa->email }}</a></td>
                            </tr>
                            <tr>
                                <th>No. Telp</th>
                                <td>{{ $mahasiswa->nomerhp }}</td>
                            </tr>
                            <tr>
                                <th>Dosen Pembimbing</th>
                                <td>{{ $user->find($mahasiswa->pembimbing)->name }}</td>
                            </tr>
                            <tr>
                                <th>Tgl. Persetujuan Pembimbing</th>
                                <td>{{ date("d F Y", strtotime( $mahasiswa->tgl_acc_dosbing )) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                    <div class="text-center mt-1">
                        <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                        <p class="my-2">Cover Tugas Akhir</p>
                        <a href="/upload/{{$mahasiswa->file_cover_ta}}" target="_blank" class="text-center btn btn-outline-dark">Lihat File</a>
                    </div>
                </div>
            </div>
            
            <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
                @if ($mahasiswa->id_status == '1')
                    <form id="deletePengajuan" action="{{ route('akademik.delete', $mahasiswa->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger m-1 delete" data-user="{{$mahasiswa->nama_mhs}}"><i class='bx bx-trash bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Hapus</span></button>
                    </form>
                    <button type="button" class="btn btn-outline-dark m-1" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class='bx bx-edit bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Edit</span>
                    </button>
                    <form id="ajukanPengajuan" action="{{ route('akademik.ajukan', $mahasiswa->id) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1 ajukan" data-user="{{$mahasiswa->nama_mhs}}" data-prodi="{{$prodi->find($mahasiswa->id_prodi)->prodi_full}}"><i class='bx bx-check bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Ajukan ke Kaprodi</span></button>
                    </form>
                @endif
                @if ($mahasiswa->id_status == '2')
                <form id="batalPengajuan" action="{{ route('akademik.cancel', $mahasiswa->id) }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger m-1 batalAjukan" data-user="{{$mahasiswa->nama_mhs}}" data-prodi="{{$prodi->find($mahasiswa->id_prodi)->prodi_full}}"><i class='bx bx-x bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-text-top">Batalkan Pengajuan</span></button>
                </form>
                @endif
            </div>

            <!-- Modal -->
            <div class="modal fade p-0" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <form id="simpanPerubahan" action="" method="POST">
                            <h5 class="bold mb-1">Sunting Pengajuan Sidang</h5>
                            <div>
                                <label class="col-form-label">Judul TA (Indonesia)</label>
                                <input class="form-control mb-2 @error('judulIDN') is-invalid @enderror" type="text" name="judulIDN" value="{{ $mahasiswa->judul_idn }}" required>
                            </div>
                            <div>
                                <label class="col-form-label">Judul TA (English)</label>
                                <input class="form-control mb-2 @error('judulENG') is-invalid @enderror" type="text" name="judulENG" value="{{ $mahasiswa->judul_eng }}" required>
                            </div>
                            <div class="form-group mt-1">
                                                
                                <div class="col-md-6 float-left pr-md-2 p-0">
                                    <label for="password" class="col-form-label">Dosen Pembimbing</label>
                                    <select class="form-control penguji" id="pembimbing" name="pembimbing" required>
                                        <option disabled selected value>Pilih Dosen Penguji...</option>
                                        @foreach ($penguji as $rows)
                                            <option value="{{ $rows->id_user }}" {{ $mahasiswa->pembimbing == $rows->id_user ? 'selected' : '' }}>{{ $user->find($rows->id_user)->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    
                                <div class="col-md-6 float-right pl-md-2 p-0">
                                    <label for="password-confirm" class="col-form-label">Tgl. Persetujuan Pembimbing</label>
                                    <input class="form-control mb-2 @error('tgl_acc') is-invalid @enderror" type="date" name="tgl_acc" value="{{ $mahasiswa->tgl_acc_dosbing }}" required>
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
                $('.delete').on('click', function (e) {
                    e.preventDefault();
                    const user = $('.delete').attr('data-user');
    
                    Swal.fire({
                        title: "Hapus Pengajuan",
                        text: "Hapus data pengajuan oleh \"" + user + "\"?",
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
                            document.getElementById("deletePengajuan").submit();
                        }
                    });
                });

                $('.simpan').on('click', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "Sunting Data",
                        text: "Konfirmasi perubahan data pengajuan sidang mahasiswa?",
                        icon: 'question',
                        showCancelButton: true,
                        cancelButtonText: 'Kembali',
                        confirmButtonText: 'Oke',
                        focusConfirm: false,
                        focusCancel: false,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            document.getElementById("simpanPerubahan").submit();
                        }
                    });
                });

                $('.ajukan').on('click', function (e) {
                    e.preventDefault();
                    const user = $('.ajukan').attr('data-user');
                    const prodi = $('.ajukan').attr('data-prodi');
    
                    Swal.fire({
                        title: "Mengajukan ke Kaprodi",
                        text: "Konfirmasi dan ajukan data mahasiswa " + user + " ke Kaprodi " + prodi + "?",
                        icon: 'question',
                        showCancelButton: true,
                        cancelButtonText: 'Kembali',
                        confirmButtonText: 'Ajukan',
                        focusConfirm: false,
                        focusCancel: false,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            document.getElementById("ajukanPengajuan").submit();
                        }
                    });
                });

                $('.batalAjukan').on('click', function (e) {
                    e.preventDefault();
                    const user = $('.batalAjukan').attr('data-user');
                    const prodi = $('.batalAjukan').attr('data-prodi');
    
                    Swal.fire({
                        title: "Batalkan Pengajuan",
                        text: "Konfirmasi pembatalan pengajuan data mahasiswa " + user + " ke Kaprodi " + prodi + "?",
                        icon: 'warning',
                        iconHtml: '<i class="bx bx-error bx-lg "></i>',
                        confirmButtonColor: '#e3342f',
                        showCancelButton: true,
                        cancelButtonText: 'Kembali',
                        confirmButtonText: 'Batalkan',
                        focusConfirm: false,
                        focusCancel: false,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            document.getElementById("batalPengajuan").submit();
                        }
                    });
                });
            </script>
        @endif

        @if ($mahasiswa->id_status == '4')
            <h6 class="card-text">PROYEK TUGAS AKHIR</h6>
            <h5 class="card-title text-uppercase"><b>{{ $mahasiswa->judul_idn }}</b></h5>
            <h6 class="card-subtitle text-uppercase"><i>{{ $mahasiswa->judul_eng }}</i></h6>
            <h6 class="card-text mt-4">Detail pengajuan:</h6>
            <div class="d-flow-root">
                <div class="col-12 col-lg-7 p-0 float-lg-left">
                    <div class="table-responsive">
                        <table class="table table-borderless m-0 detail-mahasiswa">
                            <tr>
                                <th>Status</th>
                                <td class="text-capitalize"><b>{{ $status->find($mahasiswa->id_status)->status }}</b></td>
                            </tr>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <td>{{ $mahasiswa->nama_mhs }}</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $prodi->find($mahasiswa->id_prodi)->prodi_full }}</td>
                            </tr>
                            <tr>
                                <th>Dosen Penguji</th>
                                <td>
                                    <b>Ketua Penguji</b>
                                        <p class="mb-1">{{ $user->find($sidang->id_penguji1)->name }}</p>
                                    <b>Anggota Penguji</b>
                                        <p class="mb-1">{{ $user->find($sidang->id_penguji2)->name }}</p>
                                    <b>Dosen Pembimbing</b>
                                        <p class="mb-0">{{ $user->find($sidang->id_pembimbing)->name }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                    <div class="text-center mt-1">
                        <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                        <p class="my-2">Cover Tugas Akhir</p>
                        <a href="/upload/{{$mahasiswa->file_cover_ta}}" target="_blank" class="text-center btn btn-outline-dark">Lihat File</a>
                    </div>
                </div>
            </div>
            
            <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
                <button type="submit" class="btn btn-outline-dark m-1"><i class='bx bx-cloud-download bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Unduh</span></button>
                <button type="submit" class="btn btn-primary m-1"><i class='bx bx-check bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Verifikasi</span></button>
            </div>
        @endif
    @elserole('admin')
        <h6 class="card-text">PROYEK TUGAS AKHIR</h6>
        <h5 class="card-title text-uppercase"><b>{{ $mahasiswa->judul_idn }}</b></h5>
        <h6 class="card-subtitle text-uppercase"><i>{{ $mahasiswa->judul_eng }}</i></h6>
        <h6 class="card-text mt-4">Detail pengajuan:</h6>
        <div class="d-flow-root">
            <div class="col-12 col-lg-7 p-0 float-lg-left">
                <div class="table-responsive">
                    <table class="table table-borderless m-0 detail-mahasiswa">
                        <tr>
                            <th>Status</th>
                            <td class="text-capitalize"><b>{{ $status->find($mahasiswa->id_status)->status }}</b></td>
                        </tr>
                        <tr>
                            <th>Tgl. Pengajuan Sidang</th>
                            <td>{{ date("l, d F Y", strtotime($mahasiswa->created_at)) }}</td>
                        </tr>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <td>{{ $mahasiswa->nama_mhs }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>{{ $mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>{{ $prodi->find($mahasiswa->id_prodi)->prodi_full }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><a href="mailto:{{ $mahasiswa->email }}">{{ $mahasiswa->email }}</a></td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td>{{ $mahasiswa->nomerhp }}</td>
                        </tr>
                        <tr>
                            <th>Dosen Pembimbing</th>
                            <td>{{ $user->find($mahasiswa->pembimbing)->name }}</td>
                        </tr>
                        <tr>
                            <th>Tgl. Persetujuan Pembimbing</th>
                            <td>{{ date("d F Y", strtotime( $mahasiswa->tgl_acc_dosbing )) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                <div class="text-center mt-1">
                    <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                    <p class="my-2">Cover Tugas Akhir</p>
                    <a href="/upload/{{$mahasiswa->file_cover_ta}}" target="_blank" class="text-center btn btn-outline-dark">Lihat File</a>
                </div>
            </div>
        </div>
        
        <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
            <form id="deletePengajuan" action="{{ route('akademik.delete', $mahasiswa->id) }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger m-1 delete" data-user="{{$mahasiswa->nama_mhs}}"><i class='bx bx-trash bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Hapus</span></button>
            </form>
            <button type="button" class="btn btn-outline-dark m-1" data-toggle="modal" data-target="#exampleModalCenter">
                <i class='bx bx-edit bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Edit</span>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade p-0" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <form id="simpanPerubahan" action="" method="POST">
                        <h5 class="bold mb-1">Sunting Pengajuan Sidang</h5>
                        <div>
                            <label class="col-form-label">Judul TA (Indonesia)</label>
                            <input class="form-control mb-2 @error('judulIDN') is-invalid @enderror" type="text" name="judulIDN" value="{{ $mahasiswa->judul_idn }}" required>
                        </div>
                        <div>
                            <label class="col-form-label">Judul TA (English)</label>
                            <input class="form-control mb-2 @error('judulENG') is-invalid @enderror" type="text" name="judulENG" value="{{ $mahasiswa->judul_eng }}" required>
                        </div>
                        <div class="form-group mt-1">
                                            
                            <div class="col-md-6 float-left pr-md-2 p-0">
                                <label for="password" class="col-form-label">Dosen Pembimbing</label>
                                <select class="form-control" id="pembimbing" name="pembimbing" required>
                                    <option disabled selected value>Pilih Dosen Penguji...</option>
                                    @foreach ($penguji as $rows)
                                        <option value="{{ $rows->id_user }}" {{ $mahasiswa->pembimbing == $rows->id_user ? 'selected' : '' }}>{{ $user->find($rows->id_user)->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                
                            <div class="col-md-6 float-right pl-md-2 p-0">
                                <label for="password-confirm" class="col-form-label">Tgl. Persetujuan Pembimbing</label>
                                <input class="form-control mb-2 @error('tgl_acc') is-invalid @enderror" type="date" name="tgl_acc" value="{{ $mahasiswa->tgl_acc_dosbing }}" required>
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
            $('.delete').on('click', function (e) {
                e.preventDefault();
                const user = $('.delete').attr('data-user');

                Swal.fire({
                    title: "Hapus Pengajuan",
                    text: "Hapus data pengajuan oleh \"" + user + "\"?",
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
                        document.getElementById("deletePengajuan").submit();
                    }
                });
            });

            $('.simpan').on('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: "Sunting Data",
                    text: "Konfirmasi perubahan data pengajuan sidang mahasiswa?",
                    icon: 'question',
                    showCancelButton: true,
                    cancelButtonText: 'Kembali',
                    confirmButtonText: 'Oke',
                    focusConfirm: false,
                    focusCancel: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        document.getElementById("simpanPerubahan").submit();
                    }
                });
            });
        </script>

        @if ($mahasiswa->id_status == '3' || $mahasiswa->id_status == '4')
        <h6 class="card-text mt-4">Detail sidang mahasiswa:</h6>
        <div class="d-flow-root">
            <div class="col-12 col-lg-7 p-0 float-lg-left">
                <div class="table-responsive">
                    <table class="table table-borderless m-0 detail-mahasiswa">
                        <tr>
                            <th>Jadwal Sidang</th>
                            <td>
                                <b>Tanggal</b>
                                    <p class="mb-1">{{ date("l, d F Y", strtotime($sidang->tanggal_sidang)) }}</p>
                                <b>Pukul</b>
                                    <p class="mb-1">{{ date("H:i", strtotime($sidang->waktu)) }} WIB</p>
                                <b>Tempat</b>
                                    <p class="mb-0">{{ $sidang->tempat }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Dosen Penguji</th>
                            <td>
                                <b>Ketua Penguji</b>
                                    <p class="mb-1">{{ $user->find($sidang->id_penguji1)->name }}</p>
                                <b>Anggota Penguji</b>
                                    <p class="mb-1">{{ $user->find($sidang->id_penguji2)->name }}</p>
                                <b>Dosen Pembimbing</b>
                                    <p class="mb-0">{{ $user->find($sidang->id_pembimbing)->name }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
                <div class="text-center mt-1">
                    <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                    <p class="my-2">Berkas Berita Acara</p>
                    <a href="/upload/{{$mahasiswa->file_cover_ta}}" target="_blank" class="text-center btn btn-outline-dark">Lihat File</a>
                </div>
            </div>
        </div>

        <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
            <button type="submit" class="btn btn-outline-dark m-1"><i class='bx bx-cloud-download bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Unduh Berita Aca</span></button>
        </div>
        @endif
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