@extends('layouts.admin.print')

@section('title', 'Orders')

@section('content')
    @if(isset($orders))
        @foreach($orders as $order)
            @include('admin.orders.print_template', $order)
        @endforeach
    @else
        @include('admin.orders.print_template', $order)
    @endif
@endsection