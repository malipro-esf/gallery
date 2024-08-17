@extends('user.layouts.app')
@section('title', $blog->title())
@section('content')
    <!-- Start blog-posts Area -->

    <section class="blog-posts-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list">
                    <div class="single-post">
                        <img class="img-fluid" src="{{asset('images/blog/'.$blog->images->first()->url)}}" alt="">
                        <a href="#">
                            <h1>
                              {{$blog->title()}}
                            </h1>
                        </a>
                        <div class="content-wrap">
                            {!! $blog->content()!!}
                        </div>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6 col-sm-6">
                                    <ul id="com-like">
                                        <li><a  id="a-like" data-id="post-{{$blog->id}}" onclick="addToLikes(this)"><span class="lnr lnr-heart"></span>
                                                    <span id="likes-count">{{$blog->likes->count().' '.__('titles.likes')}}</span></a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>
                                                <span id="comment-count">{{$blog->comments->where('verification_status', 1)->count().' '.__('titles.comments')}}</span></a></li>
                                    </ul>
                                </div>
                                <div class="social-wrap col-lg-6">
                                    <ul id="social-ul">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <!-- Start comment-sec Area -->
                        <section class="comment-sec-area pt-80 pb-80">
                            <div class="container">
                                <div class="row flex-column">
                                    <h5 class="text-uppercase pb-80">{{$blog->comments->where('verification_status', 1)->count().' '.__('titles.comments')}}</h5>
                                    <br>
                                    @foreach($blog->comments->where('verification_status', 1) as $comment)
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/blog/c1.jpg" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">{{$comment->user_fullname}}</a></h5>
                                                        <p class="date">{{$comment->created_at}}</p>
                                                        <p class="comment">
                                                            {{$comment->comment}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($comment->reply)
                                            <div class="comment-list left-padding">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="img/blog/c1.jpg" alt="">
                                                        </div>
                                                        <div class="desc">
                                                            <p class="comment">
                                                                {{$comment->reply}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </section>
                        <!-- End comment-sec Area -->

                        <!-- Start commentform Area -->
                        <section class="commentform-area pt-80">
                            <div class="container">
                                <h5 class="pb-50">{{__('titles.leave reply')}}</h5>
                                <div class="row flex-row d-flex">
                                    <div class="col-lg-4 col-md-6">
                                        <input id="name" placeholder="{{__('titles.enter your name')}}" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = '{{__('titles.enter your name')}}'"
                                               class="common-input mb-20 form-control" required type="text">
                                        <label id="error-name" class="alert-warning dis-non">{{__('titles.enter your name')}}</label>
                                        <input id="email" placeholder="{{__('titles.enter email address')}}"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = '{{__('titles.enter email address')}}'"
                                               class="common-input mb-20 form-control" required type="email">
                                        <label id="error-email" class="alert-warning dis-non">{{__('titles.enter email address')}}</label>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <textarea id="message" class="form-control mb-10" name="message" placeholder="{{__('titles.Message')}}"
                                                  onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('titles.Message')}}'"
                                                  required></textarea>
                                        <label id="error-message" class="alert-warning dis-non">{{__('titles.enter message')}}</label>
                                        <a class="primary-btn mt-20 fa-hand-pointer" onclick="addComment()">{{__('titles.submit')}}</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End commentform Area -->
                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-widget search-widget">
                        <form class="example" action="{{route('blogs')}}" style="margin:auto;max-width:300px">
                            <input type="text" id="search-title" placeholder="{{__('titles.search_blogs')}}" name="search_blog">
                            <button type="submit" ><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="single-widget recent-posts-widget" id="recent-blogs">
                        <h4 class="title">{{__('titles.recent_blogs')}}</h4>
                        <div class="blog-list" id="blogs-list">
                            @foreach($blogs as $post)
                            <div class="single-recent-post d-flex flex-row">
                                <div class="recent-thumb">
                                    <img class="img-post" src="{{asset('images/blogs/'.$post->images->first()->url)}}" alt="{{$post->title()}}">
                                </div>
                                <div class="recent-details" id="div-recent">
                                    <a href="{{route('single.blog',['slug' => $blog->slug()])}}">
                                        <h4>
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
                            @foreach($blog->tags as $tag)
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
    document.addEventListener('DOMContentLoaded', function() {
        var locale = localStorage.getItem('locale');

        if (locale) {
            if (locale === 'persian') {
                $('p').css('line-height', '1.5rem');
                $('.single-post').addClass('persian-single-blog');
                $('#com-like').addClass('text-right');
                $('#tags-widget').addClass('text-right');
                $('#social-ul').addClass('text-left');
                $('#recent-blogs').addClass('text-right');
                $('#blogs-list').addClass( 'text-right');
                $('#search-title').addClass( 'text-right');
                $('#blogs-list').addClass( 'dir-rtl');
                $('#div-recent').addClass( 'm-r-20');
                $('#div-recent').removeClass( 'm-l-20');
                $('h4').addClass( 'fa-font remove-before-content');

            } else if (locale === 'english') {
                $('.single-post').removeClass('persian-single-blog');
                $('#com-like').removeClass('dir-ltr text-right');
                $('#tags-widget').removeClass('text-right');
                $('#blogs-list').removeClass( 'text-right');
                $('#blogs-list').addClass( 'text-left');
                $('#blogs-list').removeClass( 'dir-rtl');
                $('#search-title').removeClass( 'text-right');
                $('#div-recent').addClass( 'm-l-20');
                $('#div-recent').removeClass( 'm-r-20');

            }

            $('#loader').css('display', 'none');
        }
    });

    // Check cookies for liked posts
    if (getCookie('liked-post-' + $('#a-like').attr('data-id'))) {
        $(".lnr-heart").css('color','red');
    }

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Function to get a cookie by name
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function addToLikes(el) {

        var postId = $(el).attr('data-id')

        // Handle like button click
            if (!getCookie('liked-post-' + postId)) {

                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let formData = new FormData;
                formData.append('_token', CSRF_TOKEN);
                formData.append('postId', {{$blog->id}} );
                $.ajax({
                    url: '{{route('add.to.like')}}', // form action url
                    type: 'POST', // form submit method get/post
                    processData: false,
                    contentType: false,
                    data: formData,
                    error: function (errors) {
                        if (errors.status == 401) {
                            toastr.info('Your access is limited', '', 'error')
                        }
                        if (errors.status == 500) {
                            toastr.info('An error occurred on the server side', '', 'error')
                        }
                        if (errors.status == 404) {
                            toastr.info('User not found', '', 'error')
                        }
                    },
                    success: function (data) {
                        if(data) {
                            // Display an info toast with no title
                            toastr.info('{{__('messages.thanks liked')}}')
                            //check data type
                            setCookie('liked-post-' + postId, true, 365);
                            $(".lnr-heart").css('color','red');
                            var likes = $("#likes-count").text();
                            var count = parseInt(likes);
                            count += 1;
                            $("#likes-count").text(count + ' {{__('titles.likes')}}')
                        } else
                            toastr.info('{{__('messages.error failed')}}')

                    },
                });

            } else {
                toastr.info('{{__('messages.already liked')}}');
            }



    }

    function addComment() {
        if($('#name').val()=='' || $('#name').val().length<3 ) {
            $('#error-name').css('display','block');
            $('#name').focus();
            return false;
        }

        var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var email = $('#email').val();

        if (!regex.test(email)) {
            $('#error-email').css('display','block');
            return false;
        }
        if($('#message').val()=='' || $('#name').val().length<3) {
            $('#error-message').css('display','block');
            return false;
        }

        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let formData = new FormData;
        formData.append('_token', CSRF_TOKEN);
        formData.append('blogId', {{$blog->id}} );
        formData.append('user_fullname', $('#name').val() );
        formData.append('email', $('#email').val() );
        formData.append('comment', $('#message').val() );
        $.ajax({
            url: '{{route('add.blog.comment')}}', // form action url
            type: 'POST', // form submit method get/post
            processData: false,
            contentType: false,
            data: formData,
            error: function (errors) {
                if (errors.status == 401) {
                    toastr.info('Your access is limited', '', 'error')
                }
                if (errors.status == 500) {
                    toastr.info('An error occurred on the server side', '', 'error')
                }
                if (errors.status == 404) {
                    toastr.info('User not found', '', 'error')
                }
            },
            success: function (data) {
                if(data) {
                    // Display an info toast with no title
                    toastr.info('{{__('messages.thanks comment')}}')
                    $('#name').val('');
                    $('#error-name').css('display','none');
                    $('#email').val('');
                    $('#error-email').css('display','none');
                    $('#error-message').css('display','none');
                    $('#message').val('');

                } else
                    toastr.info('{{__('messages.error failed')}}')

            },
        });

    }
</script>
@endsection
