<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MhsDiajukanController extends Controller
{
    function index(){
        $mhs = Mahasiswa::all()->where('id_status', '2');

        return view('kaprodi.dashboard',$mhs);
    }

    function lihatPenguji($id){
        $role = Role::all()->where('name','penguji');

        return view('kaprodi.penguji', $role);
    }

    function pilihPenguji(Request $request){

         return redirect()->back();
    }
}
