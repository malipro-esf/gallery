@extends('admin.master')
@section('title', 'create artwork')

@section('content')
    @php $locale = session()->get('locale')?:'fa' @endphp
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    <h4 class="card-title">{{__('titles.edit')}} {{$locale=='fa'?$setting->title_persian:$setting->title_english}}</h4>
                    {{--                    <h6 class="card-subtitle"> All with bootstrap element classies </h6>--}}
                    <form class="m-t-30" action="{{route('settings.update',['setting' => $setting])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="row p-t-20 l-red">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="persian-name">{{__('titles.persian title')}}</label>
                                    <input type="text" required class="form-control" value="{{$setting->title_persian}}"
                                           name="title_persian" id="persian-name"
                                           placeholder="{{__('titles.enter title in persian')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english-name">{{__('titles.english title')}}</label>
                                    <input type="text" required class="form-control" value="{{$setting->title_english}}"
                                           name="title_english" id="english-name"
                                           placeholder="{{__('titles.enter title in persian')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('titles.persian text')}}</h4>
                                        {{--                                    <h6 class="card-subtitle">CKEditor is an Open source application, which means it can be modified in any way you want. It benefits from an active community that is constantly evolving the application with free add-ons and a transparent development process.</h6>--}}
                                        <div class="form-group">
                                        <textarea name="text_persian"
                                                  placeholder="{{__('titles.enter text in persian')}}"
                                                  id="ckeditor" cols="50" rows="15" class="ckeditor">
                                           {{$setting->text_persian}}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('titles.english text')}}</h4>
                                        {{--                                    <h6 class="card-subtitle">CKEditor is an Open source application, which means it can be modified in any way you want. It benefits from an active community that is constantly evolving the application with free add-ons and a transparent development process.</h6>--}}
                                        <div class="form-group">
                                        <textarea name="text_english"
                                                  placeholder="{{__('titles.enter text in english')}}"
                                                  id="ckeditor" cols="50" rows="15" class="ckeditor">
                                           {{$setting->text_persian}}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('titles.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('admin/template/assets/libs/ckeditor/ckeditor.js')}}"></script>

