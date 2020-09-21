@extends('layouts.admin.master')

@section('title', 'Permissions')
@section('breadcrumb')
    <li class="breadcrumb-item">Permissions</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped table-bordered nowrap dataTable">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection