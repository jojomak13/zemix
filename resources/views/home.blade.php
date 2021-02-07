@extends('layouts.home.master')

@section('title', 'Courier Service Company')

@section('content')
<header class="banner" id="banner">
    <div class="container">
        <h1>Courier Service Company</h1>
        <h2>Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers.</h2>
    </div>
</header>
<section class="contact-us">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <a href="tel:+201095204943">+201095204943</a>
                </div>
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="mailto:support@zemix.org">support@zemix.org</a>
                </div>
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <a href="https://www.facebook.com/ZEMIIXX">fb.com/ZEMIIXX</a>
                </div>
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <a href="javascript:void(0)">3/4 Hay Street, off Algeria Street, next to the Republic headquarters, Al Basateen neighborhood, Maadi</a>
                </div>
            </div>
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d863.9501311481887!2d31.2761411!3d29.9851622!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0!2zMjnCsDU5JzA3LjIiTiAzMcKwMTYnMzMuMCJF!5e0!3m2!1sar!2seg!4v1612285607283!5m2!1sar!2seg" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
<footer>
    <div>
    </div>
    <div class="copyright text-center">
        <span class="text-white">
            &copy;2021 <a href="{{ url('/') }}">{{ config('app.name') }}</a> | All Rights Reserved
        </span>
    </div>  
</footer>
@endsection
