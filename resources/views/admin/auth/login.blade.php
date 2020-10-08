@extends('layouts.admin.auth')

@section('title', 'Admin Login')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section class="login-block">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <form class="md-float-material form-material" method="POST" action="{{ route('admin.login') }}" autocomplete="off">
                @csrf
               <div class="text-center">
                  <img src="{{ asset('backend/images/logo.png') }}" alt="logo.png">
               </div>
               
               <div class="auth-box card">
                  <div class="card-block">
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <h3 class="text-center txt-primary">Sign In</h3>
                        </div>
                    </div>
                    <p class="text-muted text-center p-b-5">Sign in with your regular account</p>

                    {{-- Start danger alert --}}
                    @if(session()->has('error'))
                    <div class="col-12 mt-2">
                        <div class="alert alert-danger background-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    @endif
                    {{-- End danger alert --}}

                    <div class="form-group form-primary">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        <span class="form-bar"></span>
                        <label class="float-label">Email</label>
                    </div>
                     
                    <div class="form-group form-primary">
                        <input type="password" name="password" class="form-control" required>
                        <span class="form-bar"></span>
                        <label class="float-label">Password</label>
                    </div>

                     <div class="row m-t-25 text-left">
                        <div class="col-12">
                           <div class="checkbox-fade fade-in-primary">
                              <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="cr"><i class="cr-icon fa fa-check txt-primary"></i></span>
                                <span class="text-inverse">Remember me</span>
                              </label>
                           </div>
                        </div>
                     </div>

                     <div class="row m-t-30">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   </div>
</section>
@endsection

@section('js')
<script>
$(document).on('DOMContentLoaded', function(){
    $('.form-control').each((index, input) => {
        if(input.value.length > 0) { 
            input.classList.add("fill");
        } else { 
            input.classList.remove("fill");
        }
    })
});

$('.form-control').on('blur', function(){ 
    if($(this).val().length > 0) { 
        $(this).addClass("fill");
    } else { 
        $(this).removeClass("fill");
    }
});

$('.form-control').on('focus', function() { 
    $(this).addClass("fill");
});
</script>
@endsection