<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Prodi;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class SidangRegController extends Controller
{
    protected $nim_comp;

    public function __construct(Request $req)
    {
        // $this->middleware('auth');
        $nim = $req->nim;
        $pattern = "/[\/]/";
        $this->nim_comp = preg_split($pattern, $nim);
    }

    public function index(){
        // if(!Gate::allows('isSiswa')){
        //     abort(404,"Maaf, anda tidak memiliki akses");
        // }
        // $mhs = Mahasiswa::all();

        $prodis = Prodi::all();
        return view('pages.pengajuan_sidang')->with('prodis', $prodis);
    }

    public function upload(Request $req){
        $verifikasi1 = Mahasiswa::all()->where('user_id', $this->nim_comp[1])->first();

        $verifikasi2 = Mahasiswa::where('id_status', "3")->first();
        $verifikasi3 = Mahasiswa::where('id_status', "1")->orWhere('id_status', "2")->first();

        $validate = Validator::make($req->all(),
        [
            'judulIDN' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
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

            return redirect()->route('pendaftaran')->with($notification);
        }
        else if ($verifikasi1 != null && $verifikasi3 != null) {
            $notification = array(
                'title' => 'PROSES GAGAL',
                'message' => 'Terdapat sidang Tugas Akhir yang sedang diajukan!',
                'alert-type' => 'failed'
            );

            return redirect()->route('pendaftaran')->with($notification);
        }
        else {
            $path=$req->file;
            $nama_proposal = $this->nim_comp[1]."_".$req->judulIDN."_".date('Ym').".".$path->extension();
            $tujuan_upload = 'upload';
            $path->move($tujuan_upload,$nama_proposal);

            Mahasiswa::create([
                'nama_mhs' => Auth::user()->name,
                'email' => Auth::user()->email,
                'user_id' => $this->nim_comp[1],
                'nim' => $req->nim,
                'id_prodi' => $req->prodi,
                'judul_idn' => $req->judulIDN,
                'judul_eng' => $req->judulENG,
                'dosbing' => $req->dosbing,
                'nomerhp' => $req->nomerhp,
                'tgl_acc_dosbing' => $req->tgl_acc,
                'file_cover_ta' => $nama_proposal,
                'id_status' => '1',
            ]);

            $notification = array(
                'title' => 'PROSES PENGAJUAN',
                'message' => 'Data berhasil disimpan dan sedang diajukan!',
                'alert-type' => 'success'
            );

            return Redirect::to('/pendaftaran')->with($notification);

            // $upload->judul = $req->judul;
            // $upload->jumlah = $req->jumlah;
            // $upload->file_proposal = $req->$nama_proposal;
            // $upload->save();

            // return redirect()->route('buat');
            // echo $path;
        }

    }
}
