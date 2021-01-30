@extends('layouts.seller.master')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/datatables.css') }}">
@endsection

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
                <form action="{{ route('seller.orders.print') }}" method="POST" id="orders-form">
                    @csrf
                    {{ $dataTable->table([
                        'class' => 'table table-striped table-bordered nowrap dataTable'
                    ]) }}
                </form>
            </div>
        </div>
    </div>
    {{-- End Orders --}}
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/datatables.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
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
</script>
@endsection

