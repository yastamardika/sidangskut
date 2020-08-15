@component('layouts.template')

    @slot('title_page')
        Dashboard
    @endslot
    @slot('icon')
        bxs-home
    @endslot
    @slot('link_breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
    @endslot
    
{{-- Isi konten --}}
<div class="col-md p-0">
    @role('mahasiswa')
        <div class="card bg-primary p-4">
            <div class="d-inline-block text-center text-lg-left">
                <div class="col-12 col-lg-3 p-0 text-lg-right float-right" style="margin: -8px 0 -15px !important;">
                    <img src="img/Illustrations/Status update-pana.svg" class="fit-content" style="z-index:100;">
                </div>
                <div class="col-12 col-lg-9 mt-3 my-lg-auto p-0 fit-content float-left">
                    <h6 class="card-text mb-1">PROYEK TUGAS AKHIR</h6>
                    <h5 class="card-title text-uppercase text-truncate"><b>SISTEM PENGUJIAN KOORDINASI RESISTANCE TEMPERATURE DETECTOR (RTD)-BOX DENGAN RELAY MENGGUNAKAN RTD-BOX SIMULATOR PADA PROJECT RAPP NXAIR 6,6 KV PT SIEMENS INDONESIA</b></h5>
                    <p class="text-uppercase m-0">
                        <label class="badge badge-success px-3 py-2 my-1 m-lg-0 fit-content" style="border: 2px solid white">
                            Status: Diajukan ke Kaprodi
                        </label>
                    </p>
                    <button type="submit" class="btn btn-outline-light align-middle mt-3"><i class="bx bxs-spreadsheet bx-xs d-inline-flex pr-2 align-middle"></i><span class="align-middle">Detail</span></button>
                </div>
            </div>
        </div>
        <div class="col p-0 text-center">
            <img src="{{ asset('img/Illustrations/Add data-pana.svg') }}" class="mx-auto" style="min-height:20vh; height:30vw; margin-top:-60px">
            <h6><i>Anda belum melakukan pengajuan sidang.</i></h6>
            <button type="submit" class="btn btn-primary my-4"><i class='bx bxs-file bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Mengajukan Sidang</span></button>
        </div>

    @elserole('akademik')
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-3 col-xl-2 p-0">
                        <div class="card">
                            <div>
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xl-2 p-0">
                        <div class="card">
                            <div>
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xl-2 p-0">
                        <div class="card">
                            <div>
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xl-2 p-0">
                        <div class="card">
                            <div>
                                <canvas id="myChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                Content A
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                Content B
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                Content C
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script>
            var i = 1;
            while (i <= 6) {
                var ctx = document.getElementById('myChart' + i);
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{

                            backgroundColor: ["#8e5ea2", "#bebebe6b"],
                            data: [7, 10]
                        }]
                    },
                    options: {
                        cutoutPercentage: 60,
                        legend: {position:'bottom'}
                    }
                });
                i++;
            }
        </script>
    @elserole('admin|kaprodi|dosen_penguji')
        You are logged in!
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