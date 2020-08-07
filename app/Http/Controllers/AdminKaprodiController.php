<?php

namespace App\Http\Controllers;

use App\Kaprodi;
use App\Prodi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class AdminKaprodiController extends Controller
{
    public function index()
    {
        $getRole = DB::table('model_has_roles')->where('role_id',2)->pluck('model_id');
        $user =User::find($getRole);

        return response()->json([
            'all' => $user,
        ]);
    }

    public function detailKaprodi($id){
        $prodi = Prodi::all();
        $user = User::findOrFail($id);
        return response()->json([
            'terpilih' => $user,
            'prodi' => $prodi
        ]);
        // return view('users.kaprodi.detail', $user, $prodi);
    }

    public function tambahKaprodi(Request $request, $id){
        $user = User::find($id);
        $kaprodi = Kaprodi::create([
            'id_prodi' => $request->prodi,
            'id_user' => $id
        ]);
        $kaprodi->save();
        return view('admin.kaprodi.tambah');
    }
}
