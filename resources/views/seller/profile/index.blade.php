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

{{-- Start Import File Modal --}}
<div class="modal fade" id="import_orders_modal" tabindex="-1" aria-labelledby="import_orders_modal" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('seller.orders.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="import_orders_modal">Import Orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="file">Upload</span>
                        </div>
                        <div class="custom-file @error('file')is-invalid @enderror">
                            <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" aria-describedby="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        @error('file')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- End Import File Modal --}}
@endsection

