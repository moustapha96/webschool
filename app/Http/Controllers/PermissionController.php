<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $permission = Permission::get();
        return view('backend.admin.permission.index',compact('permission'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'guard_name' => 'required'
        ]);
            
        $permission = Permission::create(['name' => $request->name,'guard_name' => $request->guard_name]);
       
        return redirect()->action('PermissionController@index')
                        ->with('success','permission created successfully');
    }
 
    public function show($id)
    {
        $permission = Permission::find($id);

        return view('backend.admin.permission.show',compact('permission'));
    }
    
   
    public function edit($id)
    {
        
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'guard_name' => 'required',
        ]);
    
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        $permission->save();
    
        return redirect()->action('PermissionController@index')
                        ->with('success','permission updated successfully');
    }
   
    public function destroy($id)
    {
        DB::table("permission")->where('id',$id)->delete();
        return redirect()->route('PermissionController@index')
                        ->with('success','permission deleted successfully');
    }
}
