@extends('admin.master')
@section('title', 'create blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card antiquewhite">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    <h4 class="card-title">{{__('titles.edit')}}</h4>
                    {{--<h6 class="card-subtitle"> All with bootstrap element classies </h6>--}}
                    <form class="m-t-30" action="{{route('blog.update',['blog' => $blog])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="form-group">
                            <label for="persian-name">{{__('titles.persian title')}}</label>
                            <input type="text" required class="form-control" value="{{$blog->title_persian}}" name="title_persian" id="persian-title" placeholder="{{__('titles.enter title in persian')}}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="english-name">{{__('titles.english title')}}</label>
                            <input type="text" required class="form-control" value="{{$blog->title_english}}" name="title_english" id="english-title" placeholder="{{__('titles.enter title in english')}}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="content-persian">{{__('titles.persian content')}}</label>
                            <textarea name="content_persian" id="content-persian" class="form-control" rows="4">{{$blog->content_persian}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content-persian">{{__('titles.english content')}}</label>
                            <textarea name="content_english" id="content-english" class="form-control" rows="4">{{$blog->content_english}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('titles.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content-persian');
        CKEDITOR.replace('content-english');
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

@endsection
