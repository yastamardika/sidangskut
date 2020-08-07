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
    <div class="col-md">
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
            <div class="form-group">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-send"></i> Simpan
                </button>
            </div>
        </form>
    </div>
{{-- End isi konten --}}

@endcomponent