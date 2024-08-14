<section class="exibition-area section-gap" id="exhibitions">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10" id="last-blogs">{{__('titles.last blogs')}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-exibition-carusel">
                @foreach($blogs as $blog)
{{--                    @dd($blog->slug())--}}
                    <div class="single-exibition item" >
                        <a href="{{route('single.blog',['slug' => $blog->slug()])}}">
                            <img src="{{asset('images/blogs/'.$blog->images->first()->url)}}" alt="{{$blog->title()}}">
                        </a>
                        <ul class="tags">
                            @foreach($blog->tags as $tag)
                                <li><a href="#">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                        <a class="text-black" href="{{route('single.blog',['slug' => $blog->slug()])}}">
                            <h3 class="fa-font">{{$blog->title()}}</h3>
                            <p>
                                {!!$blog->shortDescription()!!}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
