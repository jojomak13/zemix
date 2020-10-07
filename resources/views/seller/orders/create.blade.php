@extends('layouts.app')

@section('title', 'New Order')

@section('content')
<div class="container">
    <form action="{{ route('seller.orders.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            {{-- Start Client Name --}}
                            <div class="form-group col-md-6">
                                <label for="client_name">Client Name <abbr title="Required Field">*</abbr></label>
                                <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" class="form-control @error('client_name') is-invalid @enderror" required>
                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- End Client Name --}}
                            
                            {{-- Start Phone --}}
                            <div class="form-group col-md-6">
                                <label for="phone">Phone <abbr title="Required Field">*</abbr></label>
                                <input type="text" id="phone" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- End Phone --}}

                            {{-- Start Price --}}
                            <div class="form-group col-md-6">
                                <label for="price">Price <abbr title="Required Field">*</abbr></label>
                                <input type="number" id="price" min="1" step="0.5" value="{{ old('price') }}" name="price" class="form-control @error('price') is-invalid @enderror" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- End Price --}}

                            {{-- Start Description --}}
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
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
                    <div class="card-body">

                        {{-- Start City --}}
                        <div class="form-group">
                            <label for="city_id">City <abbr title="Required Field">*</abbr></label>
                            <select id="city_id" name="city_id" class="form-control @error('city_id') is-invalid @enderror" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option {{ $city->id == old('city_id')? 'selected':'' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- End City --}}

                        {{-- Start Address --}}
                        <div class="form-group">
                            <label for="address">Address <abbr title="Required Field">*</abbr></label>
                            <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- End Address --}}

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        {{-- Start Content --}}
                        <div class="form-group">
                            <label for="content">Content <abbr title="Required Field">*</abbr></label>
                            <textarea id="content" name="content" class="editor form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
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
    </form>
</div>
@endsection


@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script>
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