@extends('layouts.seller.master')

@section('title', 'Cities List')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Cities List</div>
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table([
                    'class' => 'table table-striped table-bordered nowrap dataTable'
                ]) }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/datatables.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection