@extends('layouts.admin.master')

@section('title', 'Admins')
@section('breadcrumb')
    <li class="breadcrumb-item">Admins</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary" title="New Admin"><i class="feather icon-plus"></i></a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped table-bordered nowrap dataTable">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Control</th>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="text-center">
                            role here
                        </td>
                        <td>
                            <a href="{{ route('admin.admins.edit', $admin) }}" class="btn btn-warning"><i class="feather icon-edit"></i></a>
                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure')) this,children[1].submit()" class="btn btn-danger">
                                <i class="feather icon-trash"></i>
                                <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST">
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
                {{ $admins->links() }}
            </div>
        </div>
    </div>
</div>
@endsection