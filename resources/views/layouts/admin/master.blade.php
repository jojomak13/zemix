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
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
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
        
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                @include('layouts.admin._navbar')
                
                {{-- Start Main Wrapper --}}
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        @include('layouts.admin._sidebar')
                        {{-- Start Page Warpper --}}
                        <div class="pcoded-content">
                            @include('layouts.admin._breadcrumbs')
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                   <div class="page-wrapper">
                                      <div class="page-body">
                                            @yield('content')
                                      </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Page Warpper --}}
                    </div>
                </div>
                {{-- End Main Wrapper --}}

            </div>
        </div>

        {{-- Start Scripts --}}
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script src="{{ asset('backend/js/all.js') }}"></script>
        {{-- End Scripts --}}
        @yield('js')
    </body>
</html>