<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidangReg;
use App\Models\User;

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
        $tview = SidangReg::where('id_mhs', $this->nim_comp[1])->get();

        return view('pages.history',['tviews' => $tview]);
    }
  
    // public function editProposal($proposalId, Upload $upload){
    //     $upload = $upload->where('id', $proposalId)
    //                      ->first();

    //     return view('content.edit_proposal', compact('upload'));
    // }
}
