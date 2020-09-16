@extends('layouts.admin.master')

@section('title', 'New Driver')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">Drivers</a></li>    
    <li class="breadcrumb-item">New Driver</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <form action="{{ route('admin.drivers.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" autofocus required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" id="age" value="{{ old('age') }}" min="18" name="age" class="form-control @error('age') is-invalid @enderror" required>
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="vehicle">Vehicle</label>
                    <select id="vehicle" name="vehicle" class="form-control @error('vehicle') is-invalid @enderror" required>
                        <option value="">Select Vehicle</option>
                        <option {{ old('vehicle') == 'car'? 'selected':'' }} value="car">Car</option>
                        <option {{ old('vehicle') == 'motor_bike'? 'selected':'' }} value="motor_bike">Motor Bike</option>
                    </select>
                    @error('vehicle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="vehicle_number">Vehicle Number</label>
                    <input type="text" id="vehicle_number" value="{{ old('vehicle_number') }}" name="vehicle_number" class="form-control @error('vehicle_number') is-invalid @enderror" required>
                    @error('vehicle_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="ssn">SSN</label>
                    <input type="text" id="ssn" value="{{ old('ssn') }}" name="ssn" class="form-control @error('ssn') is-invalid @enderror" required>
                    @error('ssn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <input type="checkbox" id="trusted" value="true" name="trusted" class="form-check-input">
                        <label for="trusted" class="form-check-label">Trusted</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection