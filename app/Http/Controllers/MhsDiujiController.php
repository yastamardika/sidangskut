<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MhsDiujiController extends Controller
{
    function index(){
        $idKaprodi = Auth::user()->id;
        $prodi = Kaprodi::where('id_user', $idKaprodi)->pluck('id_prodi');
        $namaprodi = Prodi::where('id', $prodi)->first();
        $mahasiswa = Mahasiswa::where('id_prodi', $prodi[0])->whereBetween('id_status', [2, 3])->get()->sortBy('id_status');
        $status = Status::all();

        return view('pages.penguji.mahasiswa_sidang', compact(['namaprodi','mahasiswa','status']));
    }
}
