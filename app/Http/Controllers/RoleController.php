<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.role.index', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|string|max:50'
        ]);

        if(!Role::where('name', $request->role)->first()) {
            alert()->success('Berhasil','Role ' . $request->role . ' berhasil ditambahkan.');
        } else {
            alert()->error('Gagal','Role ' . $request->role . ' sudah ada.');
        }

        $role = Role::firstOrCreate(['name' => $request->role]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        alert()->error('Berhasil','Role ' . $role->name . ' berhasil dihapus.')->iconHtml('<i class="bx bx-trash bx-lg "></i>');
        return redirect()->back();
    }

}
