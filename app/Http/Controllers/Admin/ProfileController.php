<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ProfileController extends Controller
{

    public function edit()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $this->validator($request->all(), $admin)->validate();
        
        $data = $request->except('password');
        
        if($request->input('password'))
            $data['password'] = bCrypt($request->password);
        
        $admin->update($data);

        session()->flash('success', 'Profile updated successfully');
        return redirect()->route('admin.profile.edit');
    }

    public function validator($data, $admin)
    {   
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins,email,' . $admin->id,
        ];

        if(request()->input('password'))
            $rules['password'] = 'required|min:6|max:255|confirmed';

        return Validator::make($data, $rules);
    }
}
