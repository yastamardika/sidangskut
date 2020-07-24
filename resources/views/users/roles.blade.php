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
    
<!-- Isi konten -->
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
<!-- End isi konten -->

@endcomponent
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Set Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> --}}
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">Set Role</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
