<div class="page-header card">
    <div class="row align-items-end">

        {{-- Start Success alert --}}
        @if(session()->has('success'))
        <div class="col-12 mt-2">
            <div class="alert alert-success background-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        </div>
        @endif
        {{-- End Success alert --}}

        {{-- Start Info alert --}}
        @if(session()->has('info'))
        <div class="col-12 mt-2">
            <div class="alert alert-info background-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>Info!</strong> {{ session('info') }}
            </div>
        </div>
        @endif
        {{-- End Info alert --}}
        
        {{-- Start warning alert --}}
        @if(session()->has('warning'))
        <div class="col-12 mt-2">
            <div class="alert alert-warning background-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>Notice!</strong> {{ session('warning') }}
            </div>
        </div>
        @endif
        {{-- End warning alert --}}
        
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5>@yield('title', 'Dashboard')</h5>
                    <span>@yield('description', 'Dashboard home page')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.home') }}"><i class="feather icon-home"></i></a>
                    </li>
                    @yield('breadcrumb')
                </ul>
            </div>
        </div>
    </div>
</div>