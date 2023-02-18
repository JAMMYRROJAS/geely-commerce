<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.show')->only('show');
        $this->middleware('can:roles.edit')->only('edit', 'update');
    }

    public function index()
    {
        $roles = Role::get();
        return view('back.role.index', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('back.role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('back.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));

        Alert::alert()->success('Todo correcto', 'Rol actualizado exitosamente!');

        return redirect()->route('roles.index');
    }
}
