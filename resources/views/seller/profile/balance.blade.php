@extends('layouts.seller.master')

@section('title', 'Balance')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Balance</h1>
    </div>

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
                            <td><strong>@money($transaction->price)</strong></td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $transaction->created_at->toDateString() }}</td>
                            <td>{{ $transaction->barcode }}</td>
                            <td>{{ $transaction->client_name }}</td>
                            <td><label class="badge badge-primary p-2">{{ $transaction->status }}</label></td>
                            <td>@money($transaction->total_amount)</td>
                            <td>@money($transaction->shipping_price)</td>
                            <td>@money($transaction->price)</td>
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