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
        $role = Role::firstOrCreate(['name' => $request->role]);
        return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Ditambahkan']);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Dihapus']);
    }

}
