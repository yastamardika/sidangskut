<?php

namespace App\Http\Controllers;

use App\Kaprodi;
use App\Prodi;
use App\Mahasiswa;
use App\Penguji;
use App\Sidang;
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

    function detail($id){
        $mhs = Mahasiswa::findOrFail($id);
        $allPenguji = Role::all()->where('name', 'penguji');
        $prodi = Mahasiswa::findOrFail($id)->where('user_id', $id)->pluck('id_prodi');
        $penguji = Penguji::all()->where('id_prodi',$prodi);
        return view('pages.kaprodi.detail_pengajuan', compact(['mhs','penguji']));
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
