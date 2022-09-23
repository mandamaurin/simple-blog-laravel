<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
    	return view('admin.role.index');
    }

    public function getRoles(Request $request)
    {
    	
    	if ($request->ajax()) {
            $data = Role::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'. route('role.edit', $row->id) .'" class="edit btn btn-success btn-sm">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);   
        } 
    }

    public function create()
    {
    	$permissions = Permission::all();
    	return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Role::with('permissions')->find($id);
        $permissions = Permission::all();
        $role_permission = $data->permissions->map(function ($row) {
            return $row->name;
        });
        $role_permission_array = $role_permission->toArray();
        
        return view('admin.role.edit', compact('data', 'permissions', 'role_permission_array'));
    }

    public function update(Request $request, $id)
    {

    }

}
