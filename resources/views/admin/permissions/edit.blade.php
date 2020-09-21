@extends('layouts.admin.master')

@section('title', 'Edit City')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.cities.index') }}">Cities</a></li>    
    <li class="breadcrumb-item">Edit City</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
        	<form action="{{ route('admin.cities.update', $city) }}" method="POST" autocomplete="off">
        		@csrf
                @method('patch')
	        	<div class="form-group">
	        		<label for="name">City Name</label>
	        		<input type="text" id="name" name="name" value="{{ $city->name }}" class="form-control @error('name') is-invalid @enderror" autofocus required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	        	</div>
	        	<div class="form-group">
	        		<label for="code">Zip Code</label>
	        		<input type="text" id="code" value="{{ $city->zip_code }}" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror" required>
                    @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	        	</div>
	        	<div class="form-group">
	        		<label for="shipping_price">Shipping Price</label>
	        		<input type="text" id="shipping_price" value="{{ $city->shipping_price }}" name="shipping_price" class="form-control @error('shipping_price') is-invalid @enderror" required>
                    @error('shipping_price')
                        <span class="invalid-feedback" role="alert">
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
</div>
@endsection