@extends('layouts.admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item">Dashboard</li>    
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-green">
           <div class="card-body">
              <div class="row align-items-center m-b-30">
                 <div class="col">
                    <h6 class="m-b-5 text-white">Total Profit</h6>
                    <h3 class="m-b-0 f-w-700 text-white">@money($stats->shipping_fees)</h3>
                 </div>
                 <div class="col-auto">
                    <i class="fas fa-money-bill-alt text-c-green f-18"></i>
                 </div>
              </div>
           </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-blue">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Total Amount</h6>
                        <h3 class="m-b-0 f-w-700 text-white">@money($stats->total_amount)</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-database text-c-blue f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-yellow">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Total Transactions</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{{ $stats->total_transactions }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes text-c-yellow f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-red">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Sellers Fees</h6>
                        <h3 class="m-b-0 f-w-700 text-white">@money($stats->seller_fees)</h3>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection