<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers.">

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">
    <meta name="twitter:site" content="@zemix">
    <meta name="twitter:title" content="Zemix">
    <meta name="twitter:description" content="Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers.">
    <meta name="twitter:creator" content="@zemix">
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="{{ url('images/logo.png') }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="Zemix for shipping" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:image" content="{{ url('images/logo.png') }}" />
    <meta property="og:image:width" content="423" />
    <meta property="og:image:height" content="153" />
    <meta property="og:description" content="Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers." />
    <meta property="og:site_name" content="Zemix" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Home') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X1X87K1JHL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-X1X87K1JHL');
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.seller._navbar')
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- Start Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')
    {{-- End Scripts --}}
</body>
</html>
