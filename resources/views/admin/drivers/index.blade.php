@extends('layouts.admin.master')

@section('title', 'Drivers')
@section('breadcrumb')
    <li class="breadcrumb-item">Drivers</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.drivers.create') }}" class="btn btn-primary" title="New Driver"><i class="feather icon-plus"></i></a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped table-bordered nowrap dataTable">
                <thead>
                    <th>Name</th>
                    <th>Vehicle</th>
                    <th>Vehicle Number</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Control</th>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                    <tr>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->vehicle }}</td>
                        <td>{{ $driver->vehicle_number }}</td>
                        <td>{{ $driver->phone }}</td>
                        <td class="text-center">
                        @if($driver->trusted)
                            <label class="label label-primary"><i class="feather icon-check-circle font-weight-bold"></i></label>
                        @else
                            <label class="label label-warning"><i class="feather icon-alert-octagon font-weight-bold"></i></label>
                        @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.drivers.edit', $driver) }}" class="btn btn-warning"><i class="feather icon-edit"></i></a>
                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure')) this,children[1].submit()" class="btn btn-danger">
                                <i class="feather icon-trash"></i>
                                <form action="{{ route('admin.drivers.destroy', $driver) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $drivers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection