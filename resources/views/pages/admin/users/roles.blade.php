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
<div class="col-md">
    <form action="{{ route('users.set_role', $user->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>:</td>
                        <td>
                            @foreach ($roles as $row)
                            <input type="radio" name="role"
                                {{ $user->hasRole($row) ? 'checked':'' }}
                                value="{{ $row }}"> {{  $row }} <br>
                            @endforeach
                        </td>
                    </tr>
                </thead>
            </table>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm float-right">
                    Set Role
                </button>
            </div>
        </div>
    </form>
</div>
{{-- End isi konten --}}

@endcomponent