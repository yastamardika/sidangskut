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
        $mahasiswa = Mahasiswa::all()->sortBy('id_status');
        $status = Status::all();
        $prodi = Prodi::all();

        return view('pages.akademik.pendaftar_sidang', compact(['mahasiswa','status','prodi']));
    }

    public function detail($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $prodi = Prodi::all();
        $status = Status::all();

        return view('pages.akademik.detail_pengajuan', compact(['mahasiswa','status','prodi']));
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

        return view('pages.akademik.pendaftar_sidang', $mahasiswa);
    }

    public function delete($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        unlink("upload/" . $mahasiswa->file_cover_ta);
        $mahasiswa->delete();

        alert()->error('Berhasil Dihapus','Data pengajuan sidang oleh ' . $mahasiswa->nama_mhs . ' berhasil dihapus.')->iconHtml('<i class="bx bx-trash bx-lg "></i>');
        return redirect()->route('akademik.mahasiswa');
    }

    public function ajukan($id){
        $mahasiswa=Mahasiswa::findOrFail($id);
        $mahasiswa->id_status = '2';

        $mahasiswa->save();

        alert()->success('Berhasil Diajukan','Data berhasil diajukan ke Kaprodi.');
        return redirect()->route('akademik.mahasiswa');
    }

    public function cancel($id){
        $mahasiswa=Mahasiswa::findOrFail($id);
        $mahasiswa->id_status = '1';

        $mahasiswa->save();

        alert()->success('Berhasil Dibatalkan','Pembatalan pengajuan Data berhasil.');
        return redirect()->route('akademik.mahasiswa');
    }

    // public function editProposal($proposalId, Upload $upload){
    //     $upload = $upload->where('id', $proposalId)
    //                      ->first();

    //     return view('content.edit_proposal', compact('upload'));
    // }
}
