<?php

namespace App\Http\Controllers\Seller;

use App\City;
use Validator;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\Seller\OrderDataTable;

class HomeController extends Controller
{
    public function home(OrderDataTable $orders)
    {
        return $orders->render('seller.profile.index');
    }

    public function balance()
    {
        $transactions = auth('seller')->user()->transactions()->paginate(10);

        $stats = Transaction::select([
            DB::raw('count(*) as total_transactions'),
            DB::raw('sum(total_amount) as total_amount'),
            DB::raw('sum(shipping_fees) as shipping_fees'),
            DB::raw('sum(seller_fees) as seller_fees'),
        ])
        ->where([
            'seller_id' => auth('seller')->user()->id,
            'closed'    => 0
        ])
        ->firstOrFail();
        
        return view('seller.profile.balance', compact('transactions', 'stats'));
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

    public function cities()
    {
        $cities = City::with('prices')->paginate(10);

        // return $cities;

        return view('seller.cities', compact('cities'));
    }

}
