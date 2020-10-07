@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    {{-- Start Stats --}}
    <div class="row mb-4 stats">
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-dark pr-4">
                        <i class="fa fa-map-marker fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Custom Prices</span>
                        <h3 class="text-muted">{{ $orders->total() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-primary pr-4">
                        <i class="fa fa-cubes fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Total Orders</span>
                        <h3 class="text-muted">{{ $orders->total() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-success pr-4">
                        <i class="fa fa-truck fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Shipped Orders</span>
                        <h3 class="text-muted">45</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-warning pr-4">
                        <i class="fa fa-warning fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Failed Orders</span>
                        <h3 class="text-muted">4560</h3>
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
                        <span class="font-weight-bold">Total Cash</span>
                        <h3 class="text-muted">4560</h3>
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
                        <span class="font-weight-bold">Received Cash</span>
                        <h3 class="text-muted">4560</h3>
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
                        <span class="font-weight-bold">Unreceived Cash</span>
                        <h3 class="text-muted">4560</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="stat col-md-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="icon text-danger pr-4">
                        <i class="fa fa-dollar fa-3x"></i>
                    </div>
                    <div class="info">
                        <span class="font-weight-bold">Shipping Fees</span>
                        <h3 class="text-muted">4560</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Stats --}}

    {{-- Start Orders --}}
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
                            <td><a href="tel:{{ $order->phone }}">{{ $order->phone }}</a></td>
                            <td>{{ $order->city->name }}</td>
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
