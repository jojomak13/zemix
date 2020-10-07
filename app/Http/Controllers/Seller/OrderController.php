<?php

namespace App\Http\Controllers\Seller;

use App\City;
use App\Order;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function create()
    {
        $cities = City::select('id', 'name')->get();
        return view('seller.orders.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $data['status_id'] = 1; 
        
        auth('seller')->user()->orders()->create($data);

        session()->flash('success', 'Order Created Successfully.');
        return redirect()->route('seller.home');
    }

    public function show($id)
    {
        return auth('seller')->user()->orders()->findOrFail($id);
    }

    public function validator($data)
    {
        return Validator::make($data, [
            'client_name' => 'required|string|min:5|max:255',
            'phone' => 'required|string|min:11|max:11',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'description' => 'string|nullable',
            'city_id' => 'required',
            'content' => 'required'
        ], [], [
            'city_id' => 'City'
        ]);     
    }
}
