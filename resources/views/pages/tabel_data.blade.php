@extends('layouts.app')

@section('content')
@if(Session::has('message'))
   <div class="toast">
      <strong>{{ Session::get('title') }}</strong>
      <div>
         {{ Session::get('message') }}
      </div>
      <small>Now</small>
   </div>
@endif

<h3>History Pendaftaran Sidang</h3>
{{-- <div>
   <form action="" method="get">
      <input type="text" placeholder="Cari Judul" name="search">
   </form>
</div> --}}
<table>
   <thead>
      <tr>
         <th>Judul TA</th>
         <th>Dosen Pembimbing</th>
         <th>Tanggal Pengajuan</th>
         <th>Status</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      @foreach($tviews as $row)
      <tr>
         <td>{{ $row->judul_id }}</td>
         <td>{{ $row->dosbing }}</td>
         <td>{{ date("l, d F Y", strtotime($row->created_at)) }}</td>
         <td><span class="status">{{ $row->status }}</span></td>
         <td>
            <a href="">
               <button type="button" class="btn btn-warning float-right" style="margin-right: 5px;">Lihat</button>
            </a>
         </td>
         <td>&nbsp;</td>
      </tr>
      @endforeach
   </tbody>
</table>
</div>
@endsection
