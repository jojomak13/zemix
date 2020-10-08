@extends('layouts.admin.master')

@section('title', 'Sellers')
@section('breadcrumb')
    <li class="breadcrumb-item">Sellers</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.sellers.create') }}" class="btn btn-primary" title="New Seller"><i class="feather icon-plus"></i></a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped table-bordered nowrap dataTable">
                <thead>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Phone</th>
                    <th>city</th>
                    <th>Control</th>
                </thead>
                <tbody>
                    @foreach($sellers as $seller)
                    <tr>
                        <td>{{ $seller->name }}</td>
                        <td>{{ $seller->company_name }}</td>
                        <td>{{ $seller->phone }}</td>
                        <td>{{ $seller->city->name }}</td>
                        <td>
                            <a href="{{ route('admin.sellers.show', $seller) }}" class="btn btn-primary"><i class="fa fa-exchange-alt"></i></a>
                            @if($seller->is_active)
                                <a href="javascript:void(0)" class="btn btn-info" title="Block" onclick="this.children[1].submit()">
                                    <i class="feather icon-alert-triangle"></i>
                                    <form action="{{ route('admin.sellers.activate', $seller) }}" method="POST">@csrf</form>
                                </a>
                                @else
                                <a href="javascript:void(0)" class="btn btn-success" title="Activate" onclick="this.children[1].submit()">
                                    <i class="feather icon-check"></i>
                                    <form action="{{ route('admin.sellers.activate', $seller) }}" method="POST">@csrf</form>
                                </a>
                            @endif
                            <a href="{{ route('admin.sellers.edit', $seller) }}" class="btn btn-warning"><i class="feather icon-edit"></i></a>
                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure')) this,children[1].submit()" class="btn btn-danger">
                                <i class="feather icon-trash"></i>
                                <form action="{{ route('admin.sellers.destroy', $seller) }}" method="POST">
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
                {{ $sellers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection