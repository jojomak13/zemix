<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X1X87K1JHL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-X1X87K1JHL');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers.">
    <meta name="theme-color" content="#302b63" />

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

    <title>@if($__env->yieldContent('title')) @yield('title') - @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "{{ config('app.name') }}",
          "description": "Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers.",
          "openingHours": ["Sa-Fr 09:00-21:00"],
          "paymentAccepted": "Cash",
          "priceRange": "$",
          "url": "https://www.zemix.org",
          "telephone": "(+20) 109-5204-943",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Maadi",
            "addressRegion": "Cairo",
            "postalCode": "11742",
            "streetAddress": "3/4 Hay Street, off Algeria Street, next to the Republic headquarters, Al Basateen neighborhood"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.8",
            "reviewCount": "250"
          },
          "founder": {
            "@type": "Person",
            "additionalName": "Ahmed Ghaly"
          },
          "areaServed": "Egypt",
          "email": "support@zemix.org",
          "legalName": "{{ config('app.name') }}",
          "logo": "{{ url('images/logo.png') }}",
          "image": "{{ url('images/logo.png') }}",
          "hasMap": "https://www.google.com/maps?cid=5471718797107203641"
        }
    </script>
</head>
<body>
    <div>
        @include('layouts.home._navbar')
        @yield('content')
    </div>

    {{-- Start Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')
    {{-- End Scripts --}}
</body>
</html>
