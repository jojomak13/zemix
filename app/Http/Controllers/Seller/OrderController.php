<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('seller.orders.create');
    }

    public function show($id)
    {
        return auth('seller')->user()->orders()->findOrFail($id);
    }
}
