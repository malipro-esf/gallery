<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield('title', 'Mary Art')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="{{asset('user/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
</head>
<body>
@include('user.layouts.header')
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-8" style="margin-top: 10rem" >
                <h6 class="text-white">Openning on 21st February, 2018</h6>
                <h1 class="text-white">
                    Exhibition on Modern Era
                </h1>
                <p class="pt-20 pb-20 text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim. sed do eiusmod tempor incididunt..
                </p>
{{--                <a href="#" class="primary-btn text-uppercase">Get Started</a>--}}
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


@yield('content')

@include('user.layouts.footer')

<script src="{{asset('user/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{{asset('user/js/vendor/bootstrap.min.js')}}"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{asset('user/js/easing.min.js')}}"></script>
<script src="{{asset('user/js/hoverIntent.js')}}"></script>
<script src="{{asset('user/js/superfish.min.js')}}"></script>
<script src="{{asset('user/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('user/js/justified.min.js')}}"></script>
<script src="{{asset('user/js/jquery.sticky.js')}}"></script>
<script src="{{asset('user/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('user/js/parallax.min.js')}}"></script>
<script src="{{asset('user/js/mail-script.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
