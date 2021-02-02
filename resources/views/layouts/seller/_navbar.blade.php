<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="width: 100px" class="img-fluid" src="{{ url('images/logo.png') }}" alt="{{ config('app.name') }} Logo" title="{{ config('app.name') }} Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            @auth
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('seller.orders.create') }}" class="nav-link">New order</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#import_orders_modal">Import as excel</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('seller.balance') }}" class="nav-link">Balance</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('seller.cities') }}" class="nav-link">Cities List</a>
                </li>
            </ul>
            @endauth

            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user('seller')->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('seller.home') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('seller.orders.create') }}">New Order</a>
                        <a class="dropdown-item" href="{{ route('seller.balance') }}">Balance</a>
                        <a class="dropdown-item" href="{{ route('seller.edit') }}">Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>

{{-- Start Import File Modal --}}
<div class="modal fade" id="import_orders_modal" tabindex="-1" aria-labelledby="import_orders_modal" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('seller.orders.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="import_orders_modal">Import Orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="file">Upload</span>
                        </div>
                        <div class="custom-file @error('file')is-invalid @enderror">
                            <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" aria-describedby="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        @error('file')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- End Import File Modal --}}
