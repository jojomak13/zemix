@extends('layouts.seller.master')

@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('seller.update') }}" method="POST" autocomplete="off">
                @csrf
                @method('patch')
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $profile->name }}" class="form-control @error('name') is-invalid @enderror" autofocus required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="company_name">Company Name</label>
                        <input type="text" id="company_name" value="{{ $profile->company_name }}" name="company_name" class="form-control @error('company_name') is-invalid @enderror" required>
                        @error('company_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="{{ $profile->email }}" name="email" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" value="{{ $profile->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone')
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
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>{{ $profile->address }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="city_id">City</label>
                        <select id="city_id" name="city_id" class="select2 form-control @error('city_id') is-invalid @enderror" required>
                            <option value="">Select City</option>
                            @foreach($cities as $city)
                                <option {{ $city->id == $profile->city->id? 'selected':'' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection