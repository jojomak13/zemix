@extends('layouts.admin.master')

@section('title', 'Edit Order')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>    
    <li class="breadcrumb-item">Edit Order</li>    
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
@endsection

@section('content')
<form action="{{ route('admin.orders.update', $order) }}" method="POST" autocomplete="off">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-block">
                    <div class="form-row">
                        {{-- Start Client Name --}}
                        <div class="form-group col-md-6">
                            <label for="client_name">Client Name</label>
                            <input type="text" id="client_name" name="client_name" value="{{ $order->client_name }}" class="form-control @error('client_name') is-invalid @enderror" required>
                            @error('client_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- End Client Name --}}
                        
                        {{-- Start Phone --}}
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" value="{{ $order->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- End Phone --}}

                        {{-- Start Price --}}
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="number" id="price" step="0.5" value="{{ $order->price }}" name="price" class="form-control @error('price') is-invalid @enderror" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- End Price --}}

                        {{-- Start Shipping Price --}}
                        <div class="form-group col-md-6">
                            <label for="shipping_price">Shipping Price</label>
                            <input type="number" id="shipping_price" min="1" step="0.5" value="{{ $order->shipping_price }}" name="shipping_price" class="form-control @error('shipping_price') is-invalid @enderror" required>
                            @error('shipping_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- End Shipping Price --}}

                        {{-- Start Address --}}
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>{{ $order->address }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- End Address --}}

                        {{-- Start Notes --}}
                        <div class="form-group col-md-6">
                            <label for="notes">Notes</label>
                            <textarea id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror">{{ $order->notes }}</textarea>
                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- End Notes --}}

                        {{-- Start Description --}}
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ $order->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- End Description --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-block">
                    {{-- Start Barcode --}}
                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" disabled id="barcode" value="{{ $order->barcode }}" class="form-control" required>
                    </div>
                    {{-- End Barcode --}}

                    {{-- Start Seller Name --}}
                    <div class="form-group">
                        <label for="seller">Seller Name</label>
                        <input type="text" disabled id="seller" value="{{ $order->seller->name }}" class="form-control" required>
                    </div>
                    {{-- End Seller Name --}}

                    {{-- Start Driver --}}
                    <div class="form-group">
                        <label for="driver_id">Driver</label>
                        <select id="driver_id" name="driver_id" class="form-control @error('driver_id') is-invalid @enderror" required>
                            <option value="">Select Driver</option>
                            @foreach($drivers as $driver)
                                <option {{ $driver->id == $order->driver_id? 'selected':'' }} value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- End Driver --}}

                    {{-- Start City --}}
                    <div class="form-group">
                        <label for="city_id">City</label>
                        <select id="city_id" name="city_id" class="form-control @error('city_id') is-invalid @enderror" required>
                            <option value="">Select City</option>
                            @foreach($cities as $city)
                                <option {{ $city->id == $order->city_id? 'selected':'' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- End City --}}

                    {{-- Start Status --}}
                    <div class="form-group">
                        <label for="status_id">Status</label>
                        <select id="status_id" name="status_id" class="form-control @error('status_id') is-invalid @enderror" required>
                            <option value="">Select Status</option>
                            @foreach($statues as $status)
                                <option {{ $status->id == $order->status_id? 'selected':'' }} value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- End Status --}}

                    {{-- Start As Driver --}}
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="as_driver" id="as_driver">
                            <label for="as_driver" class="form-check-label">As Driver</label>
                        </div>
                    </div>
                    {{-- End As Driver --}}

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    {{-- Start Content --}}
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" class="editor form-control @error('content') is-invalid @enderror">{{ $order->content }}</textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- End Content --}}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
@endsection

@section('js')
<script src="{{ asset('backend/js/libs/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/ckeditor/ckeditor.js') }}"></script>
<script>
    $('select').select2();
    
    ClassicEditor.create(document.querySelector( '.editor' ), {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'bulletedList',
                'numberedList',
                '|',
                'indent',
                'outdent',
                '|',
                'insertTable',
                'undo',
                'redo'
            ]
        },
        language: 'en',
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
    })
</script>
@endsection