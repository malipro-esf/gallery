@extends('user.layouts.app')

@section('title', 'Mary Art')

@section('content')

    @include('user.layouts.blog_slider')

    <!-- Start gallery Area -->
    <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10 text-white">{{__('titles.artworks')}}</h1>
                        <p>

                        </p>
                    </div>
                </div>
            </div>
            <div id="grid-container" class="row">
                @foreach($artworks as $art )
                    <a class="single-gallery" href="#"><img class="grid-item" src="{{asset('images/artworks/'.$art->images[0]->url)}}"></a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End gallery Area -->

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var delayInMilliseconds = 2000; //1 second

            setTimeout(function() {
                $('#loader').css('display', 'none');

            }, delayInMilliseconds);
        });
    </script>
@endsection
