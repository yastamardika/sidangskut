@component('layouts.template')

    @slot('title_page')
        Tambah User Baru
    @endslot
    @slot('icon')
        bxs-user-plus
    @endslot
    @slot('link_breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Manajemen User</a></li>
    @endslot
    
{{-- Isi konten --}}
    <div class="col-md p-0">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required>
                <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                <p class="text-danger">{{ $errors->first('password') }}</p>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                    <option value="">Pilih</option>
                    @foreach ($role as $row)
                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('role') }}</p>
            </div>
            <div class="col-12 d-inline-flex flex-column-reverse flex-lg-row justify-content-end p-0 mt-4 mx-auto">
                <a href="{{ route('users.index') }}" class="btn m-1"><span class="align-middle">Batal</span></a>
                <button type="submit" class="btn btn-primary m-1"><i class='bx bx-save bx-xs d-inline-flex pr-2 align-middle'></i><span class="align-middle">Simpan</span></button>
            </div>
        </form>
    </div>
{{-- End isi konten --}}

@endcomponent