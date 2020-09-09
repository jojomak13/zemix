<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="colorlib" />
        <title>@yield('title', 'Home') | Dashboard | {{ config('app.name') }}</title>
        <!--[if lt IE 10]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/waves.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('admin/css/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/font-awesome-n.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/chartist.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/widget.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/pages.css') }}">
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

                
        <script data-cfasync="false" src="{{ asset('admin/js/email-decode.min.js') }}"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/popper.min.js') }}"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('admin/js/waves.min.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>

        <script src="{{ asset('admin/js/jquery.flot.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="{{ asset('admin/js/jquery.flot.categories.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="{{ asset('admin/js/curvedlines.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="{{ asset('admin/js/jquery.flot.tooltip.min.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

        <script src="{{ asset('admin/js/chartist.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

        <script src="{{ asset('admin/js/amcharts.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="{{ asset('admin/js/serial.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="{{ asset('admin/js/light.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

        <script src="{{ asset('admin/js/pcoded.min.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="{{ asset('admin/js/vertical-layout.min.js') }}" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/custom-dashboard.min.js') }}"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{ asset('admin/js/script.min.js') }}"></script>

        <script src="{{ asset('admin/js/rocket-loader.min.js') }}" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>
    </body>
</html>