@extends('layouts.admin.master')

@section('title', 'Cities')
@section('breadcrumb')
    <li class="breadcrumb-item">Cities</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary" title="New City"><i class="feather icon-plus"></i></a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped table-bordered nowrap dataTable">
                <thead>
                    <th>City Name</th>
                    <th>Zip Code</th>
                    <th>Shipping Price</th>
                    <th>Control</th>
                </thead>
                <tbody>
                    @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->zip_code }}</td>
                        <td>@money($city->shipping_price)</td>
                        <td>
                            <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-warning"><i class="feather icon-edit"></i></a>
                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure')) this,children[1].submit()" class="btn btn-danger">
                                <i class="feather icon-trash"></i>
                                <form action="{{ route('admin.cities.destroy', $city) }}" method="POST">
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
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection