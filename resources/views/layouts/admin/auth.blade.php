<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="@yield('description')" />
        <title>@yield('title', 'Home') | Dashboard | {{ config('app.name') }}</title>
        <!--[if lt IE 10]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
        @yield('css')
    </head>
    <body>
        {{-- Loader --}}
        <div class="loader-bg">
            <div class="loader-bar"></div>
        </div>
        
        @yield('content')

        {{-- Start Scripts --}}
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script src="{{ asset('backend/js/all.js') }}"></script>
        {{-- End Scripts --}}
        @yield('js')
    </body>
</html>