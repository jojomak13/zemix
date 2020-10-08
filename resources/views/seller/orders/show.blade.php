@extends('layouts.seller.master')

@section('title', 'Order Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <ul>
                    <li class="my-2"><strong class="text-muted">Client Name</strong>: {{ $order->client_name }}</li>
                    <li class="my-2"><strong class="text-muted">Phone</strong>: {{ $order->phone }}</li>
                </ul>
                <ul>
                    <li class="my-2"><strong class="text-muted">City</strong>: {{ $order->city->name }}</li>
                    <li class="my-2"><strong class="text-muted">Status</strong>: {{ $order->status->name }}</li>
                </ul>
            </div>
            <ul>
                <li><strong class="text-muted">Address</strong>: {{ $order->address }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-3 rounded">
        <div class="card-header">Order Content</div>
        <div class="card-body">
           <p>{!! $order->content !!}</p> 
        </div>
    </div>
    
    <div class="card mt-3 rounded">
        <div class="card-header">Order Description</div>
        <div class="card-body">
           <p>{{  $order->description  }}</p> 
        </div>
    </div>
</div>
@endsection