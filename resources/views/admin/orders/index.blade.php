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
            <form action="{{ route('admin.orders.print') }}" method="POST" id="orders-form">
                @csrf
                {{ $dataTable->table([
                    'class' => 'table table-striped table-bordered nowrap dataTable'
                ]) }}
            </form>
        </div>
    </div>
</div>

@include('admin.orders._history')
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('backend/js/datatables.js') }}"></script>
<script>
    function checkAll(){
        $('input[class="item-checkbox"]:checkbox').each(function(){
            if($('input[class="check-all"]:checkbox:checked').length){
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        })
    }

    $(document).on('click', '.printBtn', function(){
        $('#orders-form').submit();
    });

    window.onload = () => {
        document.querySelector('a#mobile-collapse').click()
    }
</script>
@endsection