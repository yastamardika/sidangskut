<?php

namespace App\Http\Controllers;

use App\Prodi;
use App\Mahasiswa;
use App\Penguji;
use App\Sidang;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class MhsDiujiController extends Controller
{
    function index(){
        $idPenguji = Auth::user()->id;
        // $prodi = Penguji::where('id_user', $idPenguji)->pluck('id_prodi');
        $prodi = Penguji::all();
        $mahasiswa = Mahasiswa::whereBetween('id_status', [3, 4])->get();
        $status = Status::all();
        $user = User::all();
        $sidang = Sidang::where('id_penguji1', $idPenguji)->orWhere('id_penguji2', $idPenguji)->orWhere('id_pembimbing', $idPenguji)->get()->sortBy('tanggal_sidang');
        return view('pages.penguji.mahasiswa_sidang', compact(['mahasiswa','status','user','sidang']));
        // if ($prodi->first() != null) {
        //     $mahasiswa = Mahasiswa::whereBetween('id_status', [3, 4])->get();
        //     $status = Status::all();
        //     $user = User::all();
        //     $sidang = Sidang::where('id_penguji1', $idPenguji)->orWhere('id_penguji2', $idPenguji)->orWhere('id_pembimbing', $idPenguji)->get()->sortBy('tanggal_sidang');
        //     return view('pages.penguji.mahasiswa_sidang', compact(['mahasiswa','status','user','sidang']));
        // } else {
        //     return view('errors.prodiNotFound');
        // }
    }

    function detail($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $sidang = Sidang::where('id_mhs', $mahasiswa->user_id)->first();

        return view('pages.penguji.detail_sidang', compact(['mahasiswa','sidang']));
    }
}
