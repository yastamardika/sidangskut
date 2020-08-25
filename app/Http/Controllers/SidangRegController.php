<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Prodi;
use App\Status;
use App\User;
use Illuminate\Support\Str;
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

        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $prodi = Prodi::all();
        $status = Status::all();

        if( $mahasiswa == null ){
            return view('pages.mahasiswa.pengajuan_sidang', compact('prodi'));
        } else {
            return view('pages.mahasiswa.history_pengajuan', compact(['prodi','mahasiswa','status']));
        }
    }

    public function upload(Request $req){
        $verifikasi1 = Mahasiswa::where('id_status', "3")->first();
        $verifikasi2 = Mahasiswa::where('id_status', "3")->first();
        $verifikasi3 = Mahasiswa::where('id_status', "1")->orWhere('id_status', "2")->first();

        $validate = Validator::make($req->all(),
        [
            'nim' => ['required','regex:/^\d{2,}\/\d{6,}\/[A-z]{2,}\/\d{5,}$/i'],
            'prodi' => 'required',
            'nomerhp' => ['required','numeric'],
            'judulIDN' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
            'judulENG' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
            'dosbing' => ['required','not_regex:/[\/*:?"<>\\\|]/i'],
            'tgl_acc' => 'required',
            'file' => ['required','mimes:pdf','max:1000'],
            'terms' => 'accepted'
        ]
        );

        if($validate->fails()){
            return redirect()->route('pengajuan')
                             ->withErrors($validate)
                             ->withInput();
        }
        else if ($verifikasi1 != null && $verifikasi2 != null) {
            $notification = array(
                'title' => 'PROSES DIBATALKAN',
                'message' => 'Sidang Tugas Akhir sudah diterima! Silahkan lihat jadwal sidang Anda.',
                'alert-type' => 'warning'
            );

            return redirect()->route('pengajuan')->with($notification);
        }
        else if ($verifikasi1 != null && $verifikasi3 != null) {
            $notification = array(
                'title' => 'PROSES GAGAL',
                'message' => 'Terdapat sidang Tugas Akhir yang sedang diajukan!',
                'alert-type' => 'failed'
            );

            return redirect()->route('pengajuan')->with($notification);
        }
        else {
            $path=$req->file;
            $nama_proposal = $this->nim_comp[1]."-".Str::words($req->judulIDN,4,'')."-".date('Ym').Str::random(16).".".$path->extension();
            $tujuan_upload = 'upload';
            $path->move($tujuan_upload,$nama_proposal);

            Mahasiswa::create([
                'nama_mhs' => Auth::user()->name,
                'email' => Auth::user()->email,
                'user_id' => Auth::user()->id,
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

            alert()->success('Berhasil Diajukan','Data berhasil disimpan dan sedang diajukan.');
            return Redirect::to('/pengajuan');

            // $upload->judul = $req->judul;
            // $upload->jumlah = $req->jumlah;
            // $upload->file_proposal = $req->$nama_proposal;
            // $upload->save();

            // return redirect()->route('buat');
            // echo $path;
        }

    }
}
