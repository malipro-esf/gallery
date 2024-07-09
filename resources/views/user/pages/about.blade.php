@extends('user.layouts.app')
@section('title', __('titles.about mary'))
@section('content')
    <!-- Start about info Area -->
    <section class="section-gap info-area" id="about">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">{{__('titles.few words about mary')}}</h1>
                    </div>
                </div>
            </div>
            <div class="single-info row mt-40">
                <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
                    <div class="info-thumb">
                        <img src="{{asset('user/img/mary/mary-about.jpg')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 no-padding info-rigth">
                    <div class="info-content">
                        <h2 class="pb-30" id="start-about"> {{__('titles.Where did it start')}}<br></h2>
                        <pre class="about-text" id="about-content">{{__('about.about')}}</pre>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about info Area -->
@endsection

@section('script')
    <script>
        if($('#start-about').text()!=='Where did it start?') {
            $('#start-about').addClass('start-about')
            $('#about-content').addClass('about-content')
            console.log('persian')
        }
        else {
            $('#start-about').removeClass('start-about')
            $('#about-content').removeClass('about-content')
            console.log('en')
        }
    </script>
@endsection
