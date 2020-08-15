<?php

namespace App\Http\Controllers;

use App\Kaprodi;
use App\Mahasiswa;
use App\Penguji;
use App\Sidang;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MhsDiajukanController extends Controller
{
    function index(){
        $idKaprodi =Auth::user()->id;
        $prodi = Kaprodi::all()->where('id_user', $idKaprodi)->pluck('id_prodi');
        $mhs = Mahasiswa::all()->where('id_status', '2')->where('id_prodi', $prodi);

        return view('pages.kaprodi.dashboard',$mhs);
    }

    function lihatPenguji($id){
        $allPenguji = Role::all()->where('name', 'penguji');
        $prodi = Mahasiswa::findOrFail($id)->where('user_id', $id)->pluck('id_prodi');
        $penguji = Penguji::all()->where('id_prodi',$prodi);
        $mhs = Mahasiswa::findOrFail($id);

        return view('pages.kaprodi.penguji', $penguji);
    }

    function pilihPenguji(Request $request,$id){

        $sidang = Sidang::create([
          'id_mhs'=> $id,
          'id_penguji1'=> $request->penguji1,
          'id_penguji2'=> $request->penguji2,
          'id_pembimbing'=> $request->pembimbing,
          'tanggal_sidang'=>$request->tanggal,
        ]);
        $sidang->save();

        $mhs=Mahasiswa::findOrFail($id);
        $mhs->toQuery()->update([
            'id_status' => 2,
        ]);

        return redirect()->back();
    }
}
