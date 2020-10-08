<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
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

            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('seller.home') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('seller.orders.create') }}">New Order</a>
                        <a class="dropdown-item" href="#">Cash Request</a>
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
