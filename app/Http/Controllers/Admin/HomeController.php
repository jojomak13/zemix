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
        $monthStats = Transaction::select([
            DB::raw('count(*) as total_transactions'),
            DB::raw('sum(total_amount) as total_amount'),
            DB::raw('sum(shipping_fees) as shipping_fees'),
            DB::raw('sum(seller_fees) as seller_fees'),
        ])
        ->where('status', '!=', 'paid')
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->firstOrFail();
        
        return view('admin.index', compact('monthStats'));
    }

    public function chartData()
    {
        $yearStats = Transaction::select([
            DB::raw('sum(total_amount) as total_amount'),
            DB::raw('sum(shipping_fees) as shipping_fees'),
            DB::raw('sum(seller_fees) as seller_fees'),
            DB::raw('MONTH(created_at) as month')
        ])
        ->where('status', '!=', 'paid')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();
        
        return response()->json($yearStats);
    }
}
