<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $stats = Transaction::select([
            DB::raw('count(*) as total_transactions'),
            DB::raw('sum(total_amount) as total_amount'),
            DB::raw('sum(shipping_fees) as shipping_fees'),
            DB::raw('sum(seller_fees) as seller_fees'),
        ])
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->firstOrFail();
        
        return view('admin.index', compact('stats'));
    }
}
