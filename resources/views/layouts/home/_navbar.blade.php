<nav class="navbar fixed-top navbar-expand-md navbar-dark  shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid w-50" src="{{ url('images/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            @auth
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('seller.orders.create') }}" class="nav-link">New Order</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Make Request</a>
                </li>
            </ul>
            @endauth

            <ul class="navbar-nav ml-auto">
                @auth('seller')
                <li class="nav-item">
                    <a href="{{ route('seller.home') }}" class="nav-link">Home</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('seller.login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('seller.register') }}" class="nav-link">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>