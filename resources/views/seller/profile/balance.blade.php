@extends('layouts.seller.master')

@section('title', 'Balance')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Balance</h1>
    </div>

    {{-- Start Stats --}}
    <div class="row mb-4 stats">
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-primary pr-4">
                        <i class="fa fa-exchange fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Total Transactions</span>
                        <h4 class="text-muted">{{ $stats->total_transactions }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-info pr-4">
                        <i class="fa fa-dollar fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Total Amount</span>
                        <h4 class="text-muted">@money($stats->total_amount)</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-warning pr-4">
                        <i class="fa fa-dollar fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Shipping Fees</span>
                        <h4 class="text-muted">@money($stats->shipping_fees)</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-success pr-4">
                        <i class="fa fa-dollar fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Total Cash</span>
                        <h4 class="text-muted">@money($stats->seller_fees)</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Stats --}}
    
    <div class="card rounded">
        <div class="card-header">Balance</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Delivery Date</th>
                            <th>Order Code</th>
                            <th>Client Name</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                            <th>Shipping Fees</th>
                            <th>Company Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($transactions as $transaction)
                        @if($transaction->status == 'paid')
                        <tr class="bg-info text-white">
                            <td>{{ $transaction->created_at->toDateString() }}</td>
                            <td colspan="2"></td>
                            <td><label class="badge badge-success p-2">{{ $transaction->status }}</label></td>
                            <td colspan="2"></td>
                            <td><strong>@money($transaction->seller_fees)</strong></td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $transaction->created_at->toDateString() }}</td>
                            <td>{{ $transaction->barcode }}</td>
                            <td>{{ $transaction->client_name }}</td>
                            @if($transaction->status == 'Canceled')
                            <td><label class="badge badge-warning p-2">{{ $transaction->status }}</label></td>
                            @elseif($transaction->status == 'Failed')
                            <td><label class="badge badge-danger p-2">{{ $transaction->status }}</label></td>
                            @elseif($transaction->status == 'COD received')
                            <td><label class="badge badge-success p-2">{{ $transaction->status }}</label></td>
                            @else
                            <td><label class="badge badge-primary p-2">{{ $transaction->status }}</label></td>
                            @endif
                            <td>@money($transaction->total_amount)</td>
                            <td>@money($transaction->shipping_fees)</td>
                            <td>@money($transaction->seller_fees)</td>
                        </tr>   
                        @endif
                    @empty
                        <tr>
                            <td colspan="7">No Transactions to show</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end m-2">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection