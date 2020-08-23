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
    <h5 class="card-title text-uppercase"><b>SISTEM PENGUJIAN KOORDINASI RESISTANCE TEMPERATURE DETECTOR (RTD)-BOX DENGAN RELAY MENGGUNAKAN RTD-BOX SIMULATOR PADA PROJECT RAPP NXAIR 6,6 KV PT SIEMENS INDONESIA</b></h5>
    <h6 class="card-subtitle text-uppercase"><i>COORDINATION TESTING SYSTEM OF RESISTANCE TEMPERATURE DETECTOR (RTD)-BOX AND RELAY USING RTD-BOX SIMULATOR ON PROJECT RAPP NXAIR 6.6 KV PT SIEMENS INDONESIA</i></h6>
    <h6 class="card-text mt-4">Detail sidang:</h6>
    <div class="d-flow-root">
        <div class="col-12 col-lg-7 p-0 float-lg-left">
            <div class="table-responsive">
                <table class="table table-borderless m-0 detail-mahasiswa">
                    <tr>
                        <th>Status</th>
                        <td class="text-capitalize"><b>Diajukan Ke Kaprodi</b></td>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>Mahasiswa Sidang</td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td>12/654321/SV/13579</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>Teknologi Rekayasa Instrumentasi dan Kontrol</td>
                    </tr>
                    <tr>
                        <th>Dosen Penguji</th>
                        <td>
                            <b>Ketua Penguji</b>
                                <p class="mb-1">Nama Ketua Penguji</p>
                            <b>Anggota Penguji</b>
                                <p class="mb-1">Nama Anggota Penguji</p>
                            <b>Dosen Pembimbing</b>
                                <p class="mb-0">Nama Dosen Pembimbing</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Jadwal Sidang</th>
                        <td>
                            <b>Tanggal</b>
                                <p class="mb-1">18 Februari 2021</p>
                            <b>Pukul</b>
                                <p class="mb-1">09.00 - 10.00</p>
                            <b>Tempat</b>
                                <p class="mb-0">Via CISCO Webex</p>
                        </td>
                    </tr>
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
    <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            <i class='bx bx-calendar bx-xs d-inline-flex pr-2 align-middle'></i>Jadwalkan Sidang
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade p-0" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form>
                    <h5 class="bold mb-1">Pilih Dosen Penguji</h5>
                    <div>
                        <label class="col-form-label">Ketua Penguji</label>
                        <input class="form-control mb-1 @error('ketua') is-invalid @enderror" type="text" name="ketua" required>
                    </div>
                    <div>
                        <label class="col-form-label">Anggota Penguji</label>
                        <input class="form-control mb-1 @error('anggota') is-invalid @enderror" type="text" name="anggota" required>
                    </div>
                    <h5 class="bold mt-4">Jadwal Sidang</h5>
                    <div class="form-group mt-1">
                                        
                        <div class="col-md-6 float-left pr-md-2 p-0">
                            <label for="password" class="col-form-label">Tanggal Sidang</label>
                            <input class="form-control mb-1 @error('date') is-invalid @enderror" type="date" name="date" required>
                        </div>
                            
                        <div class="col-md-6 float-right pl-md-2 p-0">
                            <label for="password-confirm" class="col-form-label">Waktu</label>
                            <input class="form-control mb-1 @error('time') is-invalid @enderror" type="time" name="time" required>
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
        $('.simpan').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Jadwalkan Sidang",
                text: "Konfirmasi dan jadwalkan pelaksanaan sidang mahasiswa?",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Jadwalkan',
                focusConfirm: false,
                focusCancel: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById("ajukanPengajuan").submit();
                }
            });
        });
    </script>
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
