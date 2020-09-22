<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create_roles'])->only(['create', 'store']);
        $this->middleware(['permission:read_roles'])->only(['index']);
        $this->middleware(['permission:update_roles'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_roles'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->withCount('admins as users_count')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::select('id', 'display_name')->get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($this->validateForm());

        $role->attachPermissions($request->permissions);

        session()->flash('success', 'Role created successfully');
        return redirect()->route('admin.roles.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->load('permissions:id');
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($this->validateForm($role));

        $role->syncPermissions($request->permissions);

        session()->flash('success', 'Role updated successfully');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->loadCount('admins as count');

        if($role->count){
            session()->flash('warning', 'There are users in this role, delete them first');
        } else { 
            $role->delete();
            session()->flash('success', 'Role deleted successfully');
        }
        
        return redirect()->route('admin.roles.index');
    }

    protected function validateForm($role = null)
    {
        $roles = [
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'permissions' => 'required|array|min:1'
        ];
        
        $roles['name'] .= ($role)? ',name,' . $role->id : ''; 
        return request()->validate($roles);
    }
}
