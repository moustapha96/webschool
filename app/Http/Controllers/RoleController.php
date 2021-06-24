<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $roles = Role::all();
        $permission = Permission::get();
        return view('backend.'.Auth::user()->role.'.roles.index', compact('roles', 'permission'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|min:1'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->action('RoleController@index')
            ->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('backend.'.Auth::user()->role.'.roles.show', compact('role', 'permission', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('backend.'.Auth::user()->role.'.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->action('RoleController@index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

    public function attributionIndex()
    {
        $users = User::all();
        $roles = Role::all();
        
        return view('backend.'.Auth::user()->role.'.roles.attribution_index', compact('users', 'roles'));
    }
    public function attributionStore(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'role' => 'required|min:1'
        ]);
        $user = User::find($request->user);
        $user->assignRole($request->role);
        return redirect()->action('RoleController@attributionIndex')->with('success', 'utilisateur modifier avec succés');
    }
    public function attributionEdit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.'.Auth::user()->role.'.roles.attribution_edit', compact('roles', 'user'));
    }
    public function attributionDestroy($id)
    {
        $user = User::find($id);
        // $user->removeRole('writer');
        dd($user->role);
    }
    public function attributionUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required|min:1'
        ]);
        $user = User::find($id);
        $user->assignRole($request->role);
        return redirect()->action('RoleController@attributionIndex')->with('success', 'utilisateur modifier avec succés');
    }
}
