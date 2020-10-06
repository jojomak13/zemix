@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Orders</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Shipping Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->client_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->city->name }}</td>
                            <td>{{ $order->status->name }}</td>
                            <td>@money($order->price)</td>
                            <td>@money($order->shipping_price)</td>
                            <td>
                                <a href="#" class="btn btn-primary">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
