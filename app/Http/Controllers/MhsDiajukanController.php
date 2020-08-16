<?php

namespace App\Http\Controllers;

use App\Kaprodi;
use App\Prodi;
use App\Mahasiswa;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class MhsDiajukanController extends Controller
{
    function index(){
        $idKaprodi = Auth::user()->id;
        $prodi = Kaprodi::where('id_user', $idKaprodi)->pluck('id_prodi');
        $namaprodi = Prodi::where('id', $prodi)->first();
        $mahasiswa = Mahasiswa::where('id_prodi', $prodi[0])->whereNotIn('id_status', [ 1 ])->get();
        $status = Status::all();
        
        return view('pages.kaprodi.pendaftar_sidang', compact(['namaprodi','mahasiswa','status']));
    }

    function lihatPenguji($id){
        $role = Role::all()->where('name','penguji');

        return view('pages.kaprodi.detail_pengajuan', $role);
    }

    function pilihPenguji(Request $request){

         return redirect()->back();
    }
}
