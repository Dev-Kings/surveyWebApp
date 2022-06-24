<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        //$permissions = Permission::all();
        $permissions = DB::table('permissions')->orderBy('id')->SimplePaginate(5);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create(){
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $validated = $request->validate(['name' => 'required']);
        Permission::create($validated);
        return to_route('admin.permissions.index')->with('message', 'Permission created');
    }

    public function edit(Permission $permission){
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission){
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);

        return to_route('admin.permissions.index')->with('message', 'Permission updated');
    }

    public function destroy(Permission $permission){
        $permission->delete();

        return back()->with('message', 'Permission deleted');
    }

    public function assignRole(Request $request, Permission $permission){
        if($permission->hasRole($request->role)){
            return back()->with('message', 'Role has permission');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned');
    }

    public function removeRole(Permission $permission, Role $role){
        if($permission->hasRole($role)){
            $permission->removeRole($role);

            return back()->with('message', $role->name.' denied permission to '.$permission->name);
        }
        return back()->with('message', '$role doesn\'t exist');
    }
}