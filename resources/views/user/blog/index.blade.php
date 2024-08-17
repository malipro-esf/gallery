@extends('user.layouts.app')
@section('title', __('titles.blogs'))
@section('content')
    <!-- Start blog-posts Area -->
    <section class="blog-posts-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list" id="div-list">
                    @if($blogs)
                        @foreach($blogs as $blog)
                        <div class="single-post">
                            <img src="{{asset('images/blogs/'.$blog->images->first()->url)}}" alt="{{$blog->title()}}">
                            <ul class="tags">
                                @foreach($blog->tags as $tag)
                                    <li><a href="{{route('blogs',['tag' => $tag->name])}}">{{$tag->name}}</a></li>&nbsp;
                                @endforeach
                            </ul>
                            <a href="{{route('single.blog',['slug' => $blog->slug()])}}">
                                <h2>{{$blog->title()}}</h2>
                            </a>

                            <p>
                                {!! $blog->shortDescription()!!}
                            </p>
                            <div class="bottom-meta">
                                <div class="user-details row align-items-center">
                                    <div class="comment-wrap col-lg-6">
                                        <ul>
                                            <li><a href="#">{{$blog->likes->count()}} {{__('titles.likes')}}</a></li>
                                            <li><a href="#">{{$blog->comments->count()}} {{__('titles.comments')}}</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-widget search-widget">
                        <form class="example" action="{{route('blogs')}}" style="margin:auto;max-width:300px">
                            <input type="text" id="search-title" placeholder="{{__('titles.search_blogs')}}" name="search_blog">
                            <button type="submit" ><i class="fa fa-search"></i></button>
                        </form>
                    </div>



                    <div class="single-widget recent-posts-widget" id="recent-blogs">
                        <h4 class="title fa-font remove-before-content">{{__('titles.recent_blogs')}}</h4>
                        <div class="blog-list" id="blogs-list">
                            @foreach($blogs as $post)
                                <div class="single-recent-post d-flex flex-row">
                                    <div class="recent-thumb">
                                        <img class="img-post" src="{{asset('images/blogs/'.$post->images->first()->url)}}" alt="{{$post->title()}}">
                                    </div>
                                    <div class="recent-details" id="div-recent">
                                        <a href="{{route('single.blog',['slug' => $blog->slug()])}}">
                                            <h4 class="fa-font remove-before-content">
                                                {{$post->title()}}
                                            </h4>
                                        </a>
                                        <p>&nbsp;
                                            {{--                                        02 hours ago--}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single-widget tags-widget" id="tags-widget">
                        <h4 class="title">{{__('titles.tags')}}</h4>
                        <ul>
                            @foreach($tags as $tag)
                                <li><a href="{{route('blogs',['tag' => $tag->name])}}">{{$tag->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End blog-posts Area -->
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            var locale = localStorage.getItem('locale');
            // alert(locale)
            if (locale) {
                if (locale === 'persian') {
                    $('.single-post').addClass('persian-single-blog');
                    $('#div-list').addClass('text-right')
                    $('#div-list').addClass('dir-rtl')
                    $('#tags-widget').addClass('text-right');
                    $('#recent-blogs').addClass('text-right');
                    $('#div-recent').addClass( 'm-r-20');
                    $('#div-recent').addClass( 'text-right');
                    $('#div-recent').removeClass( 'm-l-20');
                    $('#blogs-list').addClass( 'dir-rtl');
                    $('#search-title').addClass( 'text-right');
                }
                else {
                    $('#div-list').removeClass('text-right')
                    $('#div-list').removeClass('dir-rtl')
                    $('#div-recent').removeClass( 'm-r-20');
                    $('#div-recent').addClass( 'm-l-20');
                    $('#blogs-list').removeClass( 'dir-rtl');
                    $('#search-title').removeClass( 'text-right');
                }
            }

            $('#loader').css('display', 'none');
        });
    </script>
@endsection
