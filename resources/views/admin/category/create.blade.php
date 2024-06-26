@extends('admin.master')
@section('title', 'create category ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card antiquewhite">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    <h4 class="card-title">{{__('titles.create '.$type)}}</h4>
{{--                    <h6 class="card-subtitle"> All with bootstrap element classies </h6>--}}
                    <form class="m-t-30" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="{{$type}}">
                        <div class="form-group">
                            <label for="persian-name">{{__('titles.persian name')}}</label>
                            <input type="text" required class="form-control" value="{{old('name_persian')}}" name="name_persian" id="persian-name" placeholder="{{__('titles.enter name in persian')}}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="english-name">{{__('titles.english name')}}</label>
                            <input type="text" required class="form-control" value="{{old('name_english')}}" name="name_english" id="english-name" placeholder="{{__('titles.enter name in english')}}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="image">{{__('titles.image')}}</label>
                            <input type="file" name="image" id="image" accept="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description-persian">{{__('titles.persian description')}}</label>
                            <textarea name="description_persian" id="description-persian" class="form-control" rows="4">{{old('description_persian')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description-persian">{{__('titles.english description')}}</label>
                            <textarea name="description_english" id="description-persian" class="form-control" rows="4">{{old('description_english')}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('titles.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('script')--}}
{{--<script>--}}
{{--    ClassicEditor--}}
{{--        .create( document.querySelector( '#editor' ) )--}}
{{--        .catch( error => {--}}
{{--            console.error( error );--}}
{{--        } );--}}
{{--</script>--}}
{{--@endsection--}}

