<?php

namespace App\Http\Controllers;

use App\Penguji;
use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengujiController extends Controller
{
    public function index(){
        $prodi = Prodi::all();

        return view('',$prodi);
    }

    public function pilihProdi(Request $request){

        $penguji = Penguji::insert([
            'id_user' => Auth::user()->id,
            'id_prodi' => $request->prodi
        ]);
        $penguji->save();

        return view('');
    }

    public function gantiProdi(Request $request,$id){
        $prodi = Prodi::find($id);

        $penguji = Penguji::update([
            'id_user' => Auth::user()->id,
            'id_prodi' => $request->prodi
        ]);
        $penguji->save();

        return view('');
    }
}
