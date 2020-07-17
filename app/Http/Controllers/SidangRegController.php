<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SidangReg;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class SidangRegController extends Controller
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
        // if(!Gate::allows('isSiswa')){
        //     abort(404,"Maaf, anda tidak memiliki akses");
        // }

        return view('pages.sidangreg');
    }

    public function upload(Request $req){
        $verifikasi1 = SidangReg::all()->where('id_mhs', $this->nim_comp[1])->first();
        $verifikasi2 = SidangReg::where('status', "Diterima")->first();
        $verifikasi3 = SidangReg::where('status', "Diproses")->orWhere('status', "Diverifikasi Akademik")->first();
        
        $validate = Validator::make($req->all(),
        [
            'judulID' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
            'judulENG' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
            'dosbing' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
            'tgl_acc' => 'required',
            'file' => 'required|mimes:pdf|max:1000',
            'terms' => 'accepted'
        ]
        );

        if($validate->fails()){
            return redirect()->route('pendaftaran')
                             ->withErrors($validate)
                             ->withInput();
        }
        else if ($verifikasi1 != null && $verifikasi2 != null) {
            $notification = array(
                'title' => 'PROSES DIBATALKAN',
                'message' => 'Sidang Tugas Akhir sudah diterima! Silahkan lihat jadwal sidang Anda.',
                'alert-type' => 'warning'
            );            

            return redirect()->route('history')->with($notification);
        }
        else if ($verifikasi1 != null && $verifikasi3 != null) {
            $notification = array(
                'title' => 'PROSES GAGAL',
                'message' => 'Terdapat sidang Tugas Akhir yang sedang diajukan!',
                'alert-type' => 'failed'
            );            

            return redirect()->route('history')->with($notification);
        }
        else {
            $path=$req->file;
            $nama_proposal = $this->nim_comp[1]."_".$req->judulID."_".date('Y').".".$path->extension();
            $tujuan_upload = 'upload';
            $path->move($tujuan_upload,$nama_proposal);


            SidangReg::create([
                'id_mhs' => $this->nim_comp[1],
                'judul_id' => $req->judulID,
                'judul_eng' => $req->judulENG,
                'dosbing' => $req->dosbing,
                'tgl_acc_dosbing' => $req->tgl_acc,
                'file_cover_ta' => $nama_proposal,
                'status' => "Diproses"
            ]);

            $notification = array(
                'title' => 'PROSES PENGAJUAN',
                'message' => 'Data berhasil disimpan dan sedang diajukan!',
                'alert-type' => 'success'
            );            

            return Redirect::to('/pendaftaran/history')->with($notification);

            // $upload->judul = $req->judul;
            // $upload->jumlah = $req->jumlah;
            // $upload->file_proposal = $req->$nama_proposal;
            // $upload->save();
            
            // return redirect()->route('buat');
            // echo $path;
        }

    }
}
