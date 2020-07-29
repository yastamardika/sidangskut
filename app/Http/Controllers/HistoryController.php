<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\SidangReg;
use App\User;

class HistoryController extends Controller
{
    protected $nim_comp;

    public function __construct()
    {
        // $this->middleware('auth');
        $nim = "YY/123456/XX/NNNNN";
        $pattern = "/[\/]/";
        $this->nim_comp = preg_split($pattern, $nim);
    }

    public function index(){
        $mhs = Mahasiswa::where('id_status', 1)->get();

        return view('pages.akademik.all',$mhs);
    }

    public function ajukan($id){
        $mhs=Mahasiswa::find($id);
        $mhs->toQuery()->update([
            'id_status' => '2',
        ]);

        return view('pages.akademik.all');
    }

    // public function editProposal($proposalId, Upload $upload){
    //     $upload = $upload->where('id', $proposalId)
    //                      ->first();

    //     return view('content.edit_proposal', compact('upload'));
    // }
}
