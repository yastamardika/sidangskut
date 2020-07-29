<?php

namespace App\Http\Controllers;

use App\Kaprodi;
use App\Mahasiswa;
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
        $role = Role::all()->where('name','penguji');

        return view('pages.kaprodi.penguji', $role);
    }

    function pilihPenguji(Request $request){

         return redirect()->back();
    }
}
