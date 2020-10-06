<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            
        return view('seller.index', compact('orders'));
    }

}
