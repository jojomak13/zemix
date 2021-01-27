<?php

namespace App\Http\Controllers\Seller;

use App\City;
use App\Order;
use Validator;
use App\Imports\OrderImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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
        $order = auth('seller')->user()->orders()->findOrFail($id);
        $order->load('city:id,name');
        $order->load('status:id,name');

        // return $order;
        return view('seller.orders.show', compact('order'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:512'
        ]);

        Excel::import(new OrderImport, request()->file('file'));
        
        session()->flash('success', 'Orders Imported Successfully.');
        return redirect()->route('seller.home');
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
