@extends('layouts.seller.master')

@section('title', 'Cities List')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Cities List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Shipping Price</th>
                            <th>Zip Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            @if($city->prices->first())
                            <td>@money($city->prices->first()->pivot->shipping_price)</td>
                            @else
                            <td>@money($city->shipping_price)</td>
                            @endif
                            <td>{{ $city->zip_code }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection