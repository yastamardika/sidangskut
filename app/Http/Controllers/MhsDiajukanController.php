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

        if ($prodi->first() != null) {
            $namaprodi = Prodi::where('id', $prodi)->first();
            $mahasiswa = Mahasiswa::where('id_prodi', $prodi[0])->whereBetween('id_status', [2, 3])->get()->sortBy('id_status');
            $status = Status::all();
            return view('pages.kaprodi.pendaftar_sidang', compact(['namaprodi','mahasiswa','status']));
        } else {
            return view('errors.prodiNotFound');
        }
    }

    function detail($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $idProdi = $mahasiswa->id_prodi;
        $penguji = User::role('dosen_penguji')->get();
        // $allPenguji = Penguji::where('id_prodi', $prodi)->get();
        $user = User::all();
        $status = Status::all();
        $prodi = Prodi::all();
        $sidang = Sidang::where('id_mhs', $mahasiswa->user_id)->first();

        return view('pages.kaprodi.detail_pengajuan', compact(['user','mahasiswa','status','prodi','penguji','sidang']));
    }

    function pilihPenguji(Request $request,$id){

        $sidang = Sidang::create([
          'id_mhs' => Mahasiswa::findOrFail($id)->user_id,
          'id_penguji1' => $request->penguji1,
          'id_penguji2' => $request->penguji2,
          'id_pembimbing' => Mahasiswa::findOrFail($id)->pembimbing,
          'tanggal_sidang' => $request->tanggal,
          'waktu' => $request->waktu,
          'tempat' => $request->tempat,
        ]);
        $sidang->save();

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->id_status = '3';
        $mahasiswa->save();

        return redirect()->back();
    }
}
