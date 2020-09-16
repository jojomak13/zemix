@extends('layouts.admin.master')

@section('title', 'Edit Driver')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">Drivers</a></li>    
    <li class="breadcrumb-item">Edit Driver</li>    
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <form action="{{ route('admin.drivers.update', $driver) }}" method="POST" autocomplete="off">
            @csrf
            @method('PATCH')

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $driver->name }}" class="form-control @error('name') is-invalid @enderror" autofocus required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" id="age" value="{{ $driver->age }}" min="18" name="age" class="form-control @error('age') is-invalid @enderror" required>
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
                        <option {{ $driver->vehicle == 'car'? 'selected':'' }} value="car">Car</option>
                        <option {{ $driver->vehicle == 'motor_bike'? 'selected':'' }} value="motor_bike">Motor Bike</option>
                    </select>
                    @error('vehicle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="vehicle_number">Vehicle Number</label>
                    <input type="text" id="vehicle_number" value="{{ $driver->vehicle_number }}" name="vehicle_number" class="form-control @error('vehicle_number') is-invalid @enderror" required>
                    @error('vehicle_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" value="{{ $driver->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="ssn">SSN</label>
                    <input type="text" id="ssn" value="{{ $driver->ssn }}" name="ssn" class="form-control @error('ssn') is-invalid @enderror" required>
                    @error('ssn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <input {{  $driver->trusted? 'checked':'' }} type="checkbox" id="trusted" value="true" name="trusted" class="form-check-input">
                        <label for="trusted" class="form-check-label">Trusted</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection