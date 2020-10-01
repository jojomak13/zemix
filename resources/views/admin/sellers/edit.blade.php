@extends('layouts.admin.master')

@section('title', 'Edit Seller')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sellers.index') }}">Sellers</a></li>    
    <li class="breadcrumb-item">Edit Seller</li>    
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-block">
        <form action="{{ route('admin.sellers.update', $seller) }}" method="POST" autocomplete="off">
            @csrf
            @method('patch')
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $seller->name }}" class="form-control @error('name') is-invalid @enderror" autofocus required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="company_name">Company Name</label>
                    <input type="text" id="company_name" value="{{ $seller->company_name }}" name="company_name" class="form-control @error('company_name') is-invalid @enderror" required>
                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="{{ $seller->email }}" name="email" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" value="{{ $seller->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
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
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>{{ $seller->address }}</textarea>
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
                            <option {{ $city->id == $seller->city->id? 'selected':'' }} value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <h4 class="text-muted mb-3">
                <button class="btn btn-primary" id="new-custom-price"><i class="feather icon-plus"></i></button>
                Custom Shipping Price 
            </h4>
            <div class="custom-prices">
                @foreach($seller->prices as $price)
                    <div class="form-row">
                        <div class="card col-md-6">
                            <div class="city-card d-flex">
                                <select name="cities[]" class="form-control">
                                    <option value="" data-price="0">Select City</option> 
                                    @foreach ($cities as $city)
                                        <option {{ $price->pivot->city_id == $city->id? 'selected':'' }} value="{{ $city->id }}" data-price="{{ $city->shipping_price }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="prices[]" value="{{ $price->pivot->shipping_price }}" step="0.5" class="form-control">
                                <button class="btn btn-danger delete-cutsom-price"><i class="feather icon-trash"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach   
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/libs/select2.min.js') }}"></script>
<script>
    $('select.select2').select2();

    let customList = $('.custom-prices');
    $('#new-custom-price').on('click', function(e){
        e.preventDefault();

        customList.append(`
        <div class="form-row">
            <div class="card col-md-6">
                <div class="city-card d-flex">
                    <select name="cities[]" class="form-control">
                        <option value="" data-price="0">Select City</option> 
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" data-price="{{ $city->shipping_price }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="prices[]" value="0" step="0.5" class="form-control">
                    <button class="btn btn-danger delete-cutsom-price"><i class="feather icon-trash"></i></button>
                </div>
            </div>
        </div>`) ;
    });

    customList.on('change', function(e){
        if(e.target.tagName == 'SELECT'){
            let price = e.target.options[e.target.selectedIndex].getAttribute('data-price');
            e.target.nextElementSibling.value = price;
        }
    });

    customList.on('click', function(e){
        e.preventDefault();

        if(e.target.tagName == 'BUTTON'){
            e.target.parentElement.parentElement.parentElement.remove();
        }
    });
</script>
@endsection