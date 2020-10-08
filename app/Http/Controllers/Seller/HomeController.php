<?php

namespace App\Http\Controllers\Seller;

use App\City;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $orders = auth('seller')
            ->user()
            ->orders()
            ->latest()
            ->with('status:id,name')
            ->with('city:id,name')
            ->paginate(10);

        return view('seller.profile.index', compact('orders'));
    }

    public function balance()
    {
        $transactions = auth('seller')->user()->transactions()->paginate(10);

        return view('seller.profile.balance', compact('transactions'));
    }

    public function edit(Request $request)
    {
        $profile = auth('seller')->user();
        $cities = City::select('id', 'name')->get();

        return view('seller.profile.edit', compact('profile', 'cities'));
    }

    public function update(Request $request)
    {
        $profile = auth('seller')->user();

        $this->validator($request->all(), $profile)->validate();
        
        $data = $request->except('password');
        
        if($request->input('password'))
            $data['password'] = bCrypt($request->password);
        
        $profile->update($data);

        session()->flash('success', 'Profile Updated Successfully.');
        return redirect()->route('seller.home');
    }

    public function validator($data, $seller)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email,' . $seller->id,
            'phone' => 'required|string|max:11|min:11|unique:sellers,phone,' . $seller->id,
            'address' => 'required|string|max:255',
            'city_id' => 'required'
        ];

        if(request()->input('password'))
            $rules['password'] = 'required|min:6|max:255|confirmed';

        return Validator::make($data, $rules);
    }
}
