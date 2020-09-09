@extends('layouts.admin.master')

@section('title', 'New City')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.cities.index') }}">Cities</a></li>    
    <li class="breadcrumb-item">New City</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
        	<form action="{{ route('admin.cities.store') }}" method="POST" autocomplete="off">
        		@csrf
	        	<div class="form-group">
	        		<label for="name">City Name</label>
	        		<input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	        	</div>
	        	<div class="form-group">
	        		<label for="code">Zip Code</label>
	        		<input type="text" id="code" value="{{ old('zip_code') }}" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror">
                    @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	        	</div>
	        	<div class="form-group">
	        		<label for="shipment_price">Shipment Price</label>
	        		<input type="text" id="shipment_price" value="{{ old('shipment_price') }}" name="shipment_price" class="form-control @error('shipment_price') is-invalid @enderror">
                    @error('shipment_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	        	</div>
	        	<div class="form-group">
	        		<button type="submit" class="btn btn-success">Create</button>
	        	</div>
        	</form>
        </div>
    </div>
</div>
@endsection