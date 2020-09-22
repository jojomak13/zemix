@extends('layouts.admin.master')

@section('title', 'Roles')
@section('breadcrumb')
    <li class="breadcrumb-item">Roles</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary" title="New Role"><i class="feather icon-plus"></i></a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped table-bordered nowrap dataTable">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Users Count</th>
                    <th>Control</th>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->users_count }}</td>
                        <td>
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-warning"><i class="feather icon-edit"></i></a>
                            <button {{ $role->users_count? 'disabled':'' }} onclick="if(confirm('Are you sure')) this,children[1].submit()" class="btn btn-danger {{ $role->users_count? 'disabled':'' }}">
                                <i class="feather icon-trash"></i>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection