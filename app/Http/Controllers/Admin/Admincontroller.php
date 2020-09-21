<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()
            ->where('id', '!=', auth()->guard('admin')->user()->id)
            ->with('roles:display_name')
            ->paginate(10);

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'display_name', 'name')->get();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();
        
        $data['password'] = bCrypt($request->password);

        Admin::create($data)->attachRole($request->role);

        session()->flash('success', 'Admin created successfully');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $admin->load('roles:id');
        $roles = Role::select('id', 'display_name')->get();
        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {

        $this->validator($request->all(), $admin)->validate();
        
        $data = $request->except('password');
        
        if($request->input('password'))
            $data['password'] = bCrypt($request->password);
        
        $admin->update($data);
        $admin->syncRoles([$request->role]);

        session()->flash('success', 'Admin updated successfully');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        
        session()->flash('success', 'Admin deleted successfully');
        return redirect()->route('admin.admins.index');
    }

    public function validator($data, $admin = NULL)
    {   
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins' . ($admin? ",email,$admin->id" : ''),
            'role' => 'required'
        ];

        if(request()->input('password') || $admin == NULL)
            $rules['password'] = 'required|min:6|max:255|confirmed';

        return Validator::make($data, $rules);
    }
}
