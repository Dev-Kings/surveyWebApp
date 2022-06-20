<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user){
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user){
        if($user->hasRole($request->role)){
            return back()->with('message', 'Role already exists');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned');
    }

    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role doesn\'t exist');
    }

    public function givePermission(Request $request, User $user){
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists');
        }
        $user->givePermissionTo($request->permission);

        return back()->with('message', 'Permission added');
    }

    public function revokePermission(User $user, Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            
            return back()->with('message', 'Permission revoked');
        }
        return back()->with('message', 'Permission doesn\'t exist');
    }

    public function destroy(User $user){
        if($user->hasRole('admin')){
            return back()->with('message', 'Admin can\'t delete an admin');
        }
        $user->delete();

        return back()->with('message', 'User'.$user->name.'deleted');
    }
}
