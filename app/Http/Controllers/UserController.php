<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
use App\Prodi;
use App\Mahasiswa;
use App\Kaprodi;
use App\Penguji;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.users.index', compact('users'));
    }

    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        return view('pages.admin.users.create', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => 'required|string|min:8',
            'role' => 'required|string|exists:roles,name'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => true
        ]);

        $user->assignRole($request->role);

        alert()->success('Berhasil','User ' . $request->name . ' berhasil ditambahkan.');
        return redirect(route('users.index'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.users.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;

        if ($user->hasAnyRole('mahasiswa') && Mahasiswa::where('nama_mhs', $user->name)->first() != null) {
            $mahasiswa = Mahasiswa::where('user_id', $id)->first();
            $mahasiswa->nama_mhs = $request->name;
            $mahasiswa->email = $request->email;
            $mahasiswa->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;

        $user->save();

        alert()->success('Berhasil Update','User ' . $request->name . ' berhasil diperbarui.');
        return redirect(route('users.index'));
    }

    public function destroy($id)
    {
        $kaprodi = Kaprodi::where('id_user', $id)->first();
        $user = User::findOrFail($id);

        if ($kaprodi != null) {
            $kaprodi->delete();
        }
        $user->delete();

        alert()->error('Berhasil Dihapus','User ' . $user->name . ' berhasil dihapus.')->iconHtml('<i class="bx bx-trash bx-lg "></i>');
        return redirect()->back();
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        //Default, set dua buah variable dengan nilai null
        $permissions = null;
        $hasPermission = null;

        //Mengambil data role
        $roles = Role::all()->pluck('name');

        //apabila parameter role terpenuhi
        if (!empty($role)) {
            //select role berdasarkan namenya, ini sejenis dengan method find()
            $getRole = Role::findByName($role);

            //Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();

            //Mengambil data permission
            $permissions = Permission::all()->pluck('name');
        }
        return view('pages.admin.users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        //select role berdasarkan namanya
        $role = Role::findByName($role);

        //fungsi syncPermission akan menghapus semua permissio yg dimiliki role tersebut
        //kemudian di-assign kembali sehingga tidak terjadi duplicate data
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        $prodi = Prodi::all();
        $kaprodi = Kaprodi::where('id_user', $id)->first();
        $penguji = Penguji::where('id_user', $id)->first();

        return view('pages.admin.users.roles', compact('user', 'roles', 'prodi', 'kaprodi', 'penguji'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required',
            'prodi' => 'required'
        ]);
        $user = User::findOrFail($id);
        $kaprodiExists = Kaprodi::where('id_user', $id)->first();
        $pengujiExists = Penguji::where('id_user', $id)->first();

        if ($kaprodiExists == null && $request->role == 'kaprodi') {
            $kaprodi = Kaprodi::create([
                'id_prodi' => $request->prodi,
                'id_user' => $id
            ]);
            $kaprodi->save();
        } else if ($request->role == 'kaprodi') {
            if ($kaprodiExists != null) {
                $kaprodi = Kaprodi::where('id_user', $id)->first();
                $kaprodi->id_prodi = $request->prodi;
                $kaprodi->save();
            } else {
                $kaprodi = Kaprodi::create([
                    'id_prodi' => $request->prodi,
                    'id_user' => $id
                ]);
                $kaprodi->save();
            }
        } else if ($pengujiExists == null && $request->role == 'dosen_penguji') {
            $penguji = Penguji::create([
                'id_prodi' => $request->prodi,
                'id_user' => $id
            ]);
            $penguji->save();
        } else if ($request->role == 'dosen_penguji') {
            if ($pengujiExists != null) {
                $penguji = Penguji::where('id_user', $id)->first();
                $penguji->id_prodi = $request->prodi;
                $penguji->save();
            } else {
                $penguji = Penguji::create([
                    'id_prodi' => $request->prodi,
                    'id_user' => $id
                ]);
                $penguji->save();
            }
        }

        if ($user->hasAnyRole('kaprodi') == true && $request->role != 'kaprodi') {
            if ($kaprodiExists) {
                $kaprodiExists->delete();
            }
        } else if ($user->hasAnyRole('dosen_penguji') == true && $request->role != 'dosen_penguji') {
            if ($pengujiExists) {
                $pengujiExists->delete();
            }
        }

        //menggunakan syncRoles agar terlebih dahulu menghapus semua role yang dimiliki
        //kemudian di-set kembali agar tidak terjadi duplicate
        $user->syncRoles($request->role);

        alert()->success('Berhasil Update','Role User berhasil diperbarui.');
        return redirect(route('users.index'));
    }
}
