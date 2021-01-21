@extends('layouts.admin.master')

@section('title', $seller->name . ' Transactions')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sellers.index') }}">Sellers</a></li>    
    <li class="breadcrumb-item">Seller Transactions</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTransaction">
            <i class="fa fa-exchange-alt"></i> Make Transaction
        </button>
    </div>
    <div class="card-block">
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
                        <td><label class="label label-success p-2">{{ $transaction->status }}</label></td>
                        <td colspan="2"></td>
                        <td><strong>@money($transaction->seller_fees)</strong></td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ $transaction->created_at->toDateString() }}</td>
                        <td>{{ $transaction->barcode }}</td>
                        <td>{{ $transaction->client_name }}</td>
                        <td><label class="label label-primary p-2">{{ $transaction->status }}</label></td>
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

{{-- Start Modal --}}
<div class="modal fade" id="newTransaction" tabindex="-1" aria-labelledby="newTransactionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Transaction for {{ $seller->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.sellers.transaction', $seller) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Transaction Amount</label>
                        <input type="number" class="form-control" step=".5" value="{{ $stats->seller_fees }}" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
@endsection