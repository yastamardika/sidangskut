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
        // $role = DB::table('model_has_roles')->select('model_id')->get();
        $getRole = DB::table('model_has_roles')->where('role_id',2)->pluck('model_id');
        // $getRole = Role::findByName('kaprodi');
        $user =User::find($getRole);
        return response()->json([
            'all' => $user,
        ]);
    }

    public function detailKaprodi($id){
        $user = User::findOrFail($id);
        return view('users.kaprodi.detail', $user);
    }

    public function tambahKaprodi(Request $request, $id){
        $user = User::Find();
        $role = Role::select('id')->where('id', );
        $prodi = Prodi::get();
        $kaprodi = Kaprodi::create([
            'id_prodi' => $request->prodi,
            'id_user' => $id
        ]);
        return view('admin.kaprodi.tambah',$role);
    }
}
