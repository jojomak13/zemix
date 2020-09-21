@extends('layouts.admin.master')

@section('title', 'Edit Role')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>    
    <li class="breadcrumb-item">Edit Role</li>    
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('admin/css/multi-select.css') }}" />
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST" autocomplete="off">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" id="name" name="name" value="{{ $role->name }}" class="form-control @error('name') is-invalid @enderror" autofocus >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="display_name">Description</label>
                <input type="text" id="display_name" value="{{ $role->display_name }}" name="display_name" class="form-control @error('display_name') is-invalid @enderror" >
                @error('display_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <h4 class="sub-title">Permissions</h4>
                <div class="form-group">
                    <select id='custom-headers' class="searchable" multiple='multiple' name="permissions[]">
                        @foreach($permissions as $permission)
                        <option {{ $role->hasPermission($permission->name)? 'selected': '' }} value='{{ $permission->id }}'>{{ $permission->display_name }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('admin/js/jquery.quicksearch.js') }}"></script>
<script src="{{ asset('admin/js/select2-custom.js') }}"></script>
@endsection