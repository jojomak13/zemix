@extends('layouts.admin.master')

@section('title', 'Orders')
@section('breadcrumb')
    <li class="breadcrumb-item">Orders</li>    
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary" title="New Order"><i class="feather icon-plus"></i></a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            {{ $dataTable->table([
                'class' => 'table table-striped table-bordered nowrap dataTable'
            ]) }}
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/sp-1.0.1/datatables.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
@endsection