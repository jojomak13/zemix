@extends('layouts.admin.master')

@section('title', 'Sellers')
@section('breadcrumb')
    <li class="breadcrumb-item">Sellers</li>    
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/datatables.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.sellers.create') }}" class="btn btn-primary" title="New Seller"><i class="feather icon-plus"></i></a>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/datatables.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
@endsection