@component('layouts.template')

@slot('title_page')
    Penjadwalan Sidang
@endslot
@slot('icon')
    bxs-file
@endslot
@slot('link_breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('kaprodi') }}">Sidang D4 TRIK</a></li>
@endslot

{{-- Isi konten --}}
<div class="col-md p-0 d-lg-inline">
    {{-- @hasrole('kaprodi') --}}
    <h6 class="card-text">PROYEK TUGAS AKHIR</h6>
    <h5 class="card-title text-uppercase"><b>{{ $mahasiswa->judul_idn }}</b></h5>
    <h6 class="card-subtitle text-uppercase"><i>{{ $mahasiswa->judul_eng }}</i></h6>
    <h6 class="card-text mt-4">Detail sidang:</h6>
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
                @if ($sidang != null)
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
                @endif
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-5 p-0 mt-3 mt-lg-0 float-lg-right">
            <div class="text-center mt-1">
                <i class="bx bx-file" style="font-size: 4rem !important;"></i>
                <p class="my-2">Cover Tugas Akhir</p>
                <a href="/upload/" target="_blank" class="text-center btn btn-outline-dark">Lihat File</a>
            </div>
        </div>
    </div>
    @if ($sidang != null)
    </div>
        <div class="mt-3">
            <small>*Apabila terdapat kesalahan/perubahan data silahkan hubungi bagian Akademik DTEDI SV UGM.</small>
        </div>
    @else
    <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            <i class='bx bx-calendar bx-xs d-inline-flex pr-2 align-middle'style="margin: 0 0 1px"></i>Jadwalkan Sidang
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade p-0" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form id="jadwalkanSidang" action="{{ route('kaprodi.jadwalkan', $mahasiswa->id) }}" method="POST" class="m-0">
                @csrf
                    <h5 class="bold mb-1">Pilih Dosen Penguji</h5>
                    <div>
                        <label class="col-form-label">Ketua Penguji</label>
                        <select class="form-control penguji" id="ketuaPenguji" data-pembimbing="{{ $mahasiswa->pembimbing }}" name="penguji1" required>
                            <option disabled selected value>Pilih Dosen Penguji...</option>
                            @foreach ($penguji as $rows)
                                <option value="{{ $rows->id }}">{{ $user->find($rows->id)->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="col-form-label">Anggota Penguji</label>
                        <select class="form-control penguji" id="anggotaPenguji" name="penguji2" required>
                            <option disabled selected value>Pilih Dosen Penguji...</option>
                            @foreach ($penguji as $rows)
                                <option value="{{ $rows->id }}">{{ $user->find($rows->id)->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <h5 class="bold mt-4">Jadwal Sidang</h5>
                    <div class="form-group mt-1">

                        <div class="col-md-6 float-left pr-md-2 p-0">
                            <label for="password" class="col-form-label">Tanggal Sidang</label>
                            <input class="form-control mb-1 @error('tanggal') is-invalid @enderror" type="date" name="tanggal" required>
                        </div>

                        <div class="col-md-6 float-right pl-md-2 p-0">
                            <label for="password-confirm" class="col-form-label">Waktu</label>
                            <input class="form-control mb-1 @error('waktu') is-invalid @enderror" type="time" name="waktu" required>
                        </div>

                    </div>
                    <div>
                        <label class="col-form-label">Tempat</label>
                        <input class="form-control mb-1 @error('tempat') is-invalid @enderror" type="text" name="tempat" required>
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
        $(document).ready(function () {
            var idPembimbing = $('#ketuaPenguji').attr('data-pembimbing')
            var x = document.getElementById("ketuaPenguji");
            var y = document.getElementById("anggotaPenguji");
            var id = x.options[x.selectedIndex].value;
            var id2 = y.options[y.selectedIndex].value;

            for (var i = 1; i < x.length; i++) {
                if (x.options[i].value == idPembimbing) {
                    x[i].disabled = true ;
                    y[i].disabled = true ;
                }
            }
        });
        $(".penguji").on("change", function () {
            var idPembimbing = $('#ketuaPenguji').attr('data-pembimbing')
            var x = document.getElementById("ketuaPenguji");
            var y = document.getElementById("anggotaPenguji");
            var id = x.options[x.selectedIndex].value;
            var id2 = y.options[y.selectedIndex].value;

            for (var i = 1; i < y.length; i++) {
                (y.options[i].value == id) ? y[i].disabled = true : y[i].disabled = false ;
            }
            for (var i = 1; i < x.length; i++) {
                (x.options[i].value == id2) ? x[i].disabled = true : x[i].disabled = false ;
            }

            for (var i = 1; i < x.length; i++) {
                if (x.options[i].value == idPembimbing) {
                    x[i].disabled = true ;
                    y[i].disabled = true ;
                }
            }
        });

        $('.simpan').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Jadwalkan Sidang",
                text: "Aksi ini hanya dapat dilakukan 1 kali. Pastikan data yang Anda masukkan benar. Lanjutkan penjadwalan pelaksanaan sidang?",
                footer: "Apabila terdapat kesalahan/perubahan silahkan hubungi Akademik DTEDI SV UGM.",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Jadwalkan',
                focusConfirm: false,
                focusCancel: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById("jadwalkanSidang").submit();
                }
            });
        });
    </script>
    @endif
    {{-- @else
        @slot('title_page')
            Akses Data Ditolak
        @endslot
        @slot('icon')
            bxs-error
        @endslot

        <div class="col p-0 text-center">
            <img src="{{ asset('img/Illustrations/Security-pana.svg') }}" class="mx-auto" style="min-height:20vh;
    height:30vw;" alt="Akun tidak memiliki akses data.">
    <h6><i>Maaf, akun Anda tidak memiliki akses untuk melihat data.</i></h6>
</div>
@endrole --}}
</div>
{{-- End isi konten --}}

@endcomponent
