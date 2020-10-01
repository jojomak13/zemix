@extends('layouts.admin.master')

@section('title', 'Orders')
@section('breadcrumb')
    <li class="breadcrumb-item">Orders</li>    
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/datatables.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            {{ $dataTable->table([
                'class' => 'table table-striped table-bordered nowrap dataTable'
            ]) }}
        </div>
    </div>
</div>

@include('admin.orders._history')
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/datatables.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('backend/js/datatables.js') }}"></script>
<script>
    window.onload = () => {
        document.querySelector('a#mobile-collapse').click()
    }
</script>
@endsection