@extends('layouts.seller.master')

@section('title', 'Profile')

@section('content')
<div class="container">

    {{-- Start Alerts --}}
    @include('layouts.seller._alerts')
    {{-- End Alerts --}}

    {{-- Start Orders --}}
    <div class="card" id="orders">
        <div class="card-header">Orders</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Client Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Shipping Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->barcode }}</td>
                            <td>{{ $order->client_name }}</td>
                            <td><a href="tel:{{ $order->phone }}">{{ $order->phone }}</a></td>
                            <td>{{ $order->city->name }}</td>
                            <td title="{{ $order->address }}" data-toggle="tooltip">{{ substr($order->address, 0, 35) }}...</td>
                            <td>{{ $order->status->name }}</td>
                            <td>@money($order->price)</td>
                            <td>@money($order->shipping_price)</td>
                            <td>
                                <a href="{{ route('seller.orders.show', $order) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
    {{-- End Orders --}}
</div>
@endsection

