<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Prodi;
use App\Status;
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
        $mahasiswa = Mahasiswa::all()->sortBy('id_prodi');
        $status = Status::all();
        $prodi = Prodi::all();

        return view('pages.pendaftar_sidang', compact(['mahasiswa','status','prodi']));
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
