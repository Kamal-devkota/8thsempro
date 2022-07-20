<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function add()
    {
        return view('admin.roles.add');
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        return redirect('/admin/roles/add')->with('message', 'add success.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit',compact('role'));
    }

    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        return redirect('/admin/roles/index')->with('message', 'update success.');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/admin/roles/index')->with('message', 'delete success.');
    }

    public function editPermissions($id)
    {
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.role_id', 'role_has_permissions.permission_id')
            ->all();
        // dd(array_key_exists(93,$rolePermissions));
        // dd($rolePermissions);
        $role = Role::find($id);
        $permissions = $role->permissions->pluck('name', 'id')->toArray();
        $allpermissions = Permission::all()->pluck('name', 'id')->toArray();
        // dd(array_search('create-employees', $allpermissions));
        return view('admin.roles.manage-permissions',compact('role','permissions','allpermissions'));
    }

    public function updatePermissions(Request $request,$id)
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $role = Role::find($id);
        $permissions = $role->permissions()->get();
        $role->revokePermissionTo($permissions);
        // dd($request->permissions);
        $role->givePermissionTo($request->permissions);
        return redirect('/admin/roles/index')->with('message', 'permissions update success.');
    }
}
