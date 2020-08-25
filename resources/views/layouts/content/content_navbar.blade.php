{{-- Isi konten --}}
   <ul id="nav-active" class="nav flex-column">
      <li class="d-md-block d-none text-center">
         <img src="{{ asset('img/logo.png') }}" class="mx-auto" style="height:100px" alt="">
      </li>
   <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-4 mt-4 mb-2 text-muted text-bold">
      Beranda
   </h6>
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
         <a class="nav-link" href="{{ url('/dashboard') }}">
            Dashboard<span class="sr-only">(current)</span>
            <i class='bx bxs-home bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
         </a>
      </li>
      <li class="nav-item {{ Request::is('profil') ? 'active' : '' }}">
         <a class="nav-link" href="{{ url('/profil') }}">
            Profil Akun<span class="sr-only">(current)</span>
            <i class='bx bxs-user bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
         </a>
      </li>
      @role('admin|akademik|kaprodi')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-4 mt-4 mb-2 text-muted text-bold">
         Data
      </h6>
      @elserole('mahasiswa|dosen_penguji')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-4 mt-4 mb-2 text-muted text-bold">
         Sidang
      </h6>
      @else
      @endrole
   {{-- Mahasiswa--}}
      @role('mahasiswa')
         <li class="nav-item {{ Request::is('pengajuan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/pengajuan') }}">
                  Pengajuan Sidang
                  <i class='bx bxs-file bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>
   {{-- End Mahasswa --}}

   {{-- Akademik --}}
      @elserole('akademik')
         <li class="nav-item {{ Request::is('dashboard/pendaftar-sidang*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('akademik.mahasiswa') }}">
                  Pendaftar Sidang
                  <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>
   {{-- End Akademik --}}

      @elserole('kaprodi')
         <li class="nav-item {{ Request::is('kaprodi/dashboard/pendaftar-sidang*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kaprodi') }}">
                  Pendaftar Sidang
                  <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>


   {{-- Penguji --}}
      @elserole('dosen_penguji')
         <li class="nav-item {{ Request::is('penguji*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('penguji') }}">
                  Mahasiswa Sidang
                  <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>
   {{-- End Penguji --}}

   {{-- Admin --}}
      @elserole('admin')
         <li class="nav-item {{ Request::is('dashboard/pendaftar-sidang*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('akademik.mahasiswa') }}">
                  Pendaftar Sidang
                  <i class='bx bxs-spreadsheet bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                  Jadwal Sidang
                  <i class='bx bxs-calendar bx-xs bx-pull-right' style="margin: 0 0 1px"></i>
            </a>
         </li>
         <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-4 mt-4 mb-2 text-muted text-bold">
            Manajemen
         </h6>
         <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/users') }}">
                  User
                  <i class='bx bxs-id-card bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>
         <li class="nav-item {{ Request::is('role*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/role') }}">
                  Role User
                  <i class='bx bx-shield-quarter bx-xs bx-pull-right' style="margin-top: 0.2rem"></i>
            </a>
         </li>
      @endrole
   {{-- End Admin --}}

   </ul>
{{-- End isi konten --}}