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

    public function detail($id){
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.pendaftar_sidang', $mahasiswa);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $path=$request->file;
        $nama_proposal = $this->nim_comp[1]."_".$request->judulIDN."_".date('Ym').".".$path->extension();
        $tujuan_upload = 'upload';
        $path->move($tujuan_upload,$nama_proposal);

        Mahasiswa::update([
            'nama_mhs' => Auth::user()->name,
            'email' => Auth::user()->email,
            'user_id' => $this->nim_comp[1],
            'nim' => $request->nim,
            'id_prodi' => $request->prodi,
            'judul_idn' => $request->judulIDN,
            'judul_eng' => $request->judulENG,
            'dosbing' => $request->dosbing,
            'nomerhp' => $request->nomerhp,
            'tgl_acc_dosbing' => $request->tgl_acc,
            'file_cover_ta' => $nama_proposal
        ]);

        return view('pages.pendaftar_sidang', $mahasiswa);
    }

    public function delete($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->back()->with(['success' => 'Pengajuan oleh: <strong>' . $mahasiswa->nama_mhs . '</strong> Dihapus']);
    }

    public function ajukan($id){
        $mhs=Mahasiswa::findOrFail($id);
        $mhs->toQuery()->update([
            'id_status' => 2,
        ]);

        return view('pages.pendaftar_sidang');
    }

    // public function editProposal($proposalId, Upload $upload){
    //     $upload = $upload->where('id', $proposalId)
    //                      ->first();

    //     return view('content.edit_proposal', compact('upload'));
    // }
}
