@extends('admin.master')
@section('title', 'show artwork')
@section('content')
    @php $locale = session()->get('locale'); @endphp
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="true">
                            {{__('titles.Basic specifications')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#des-statement" role="tab" aria-controls="pills-setting" aria-selected="false">
                            {{__('titles.description and statement')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="images-tab" data-toggle="pill" href="#images" role="tab" aria-controls="pills-setting" aria-selected="false">
                            {{__('titles.images')}}</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('titles.persian name')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$artwork->name_persian}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('titles.english name')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$artwork->name_english}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('titles.persian subject')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$artwork->subject_persian}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('titles.english subject')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$artwork->subject_english}}</p>
                                </div>
                            </div>
                            <hr>
                            <h4>{{__('titles.style')}}</h4>
                            @foreach($artwork->styles as $style)
                                <span class="badge-pill bg-success p-1">
                                    {{$locale=='fa'?$style->style->name_persian:$style->style->name_english}}</span>
                            @endforeach
                            <hr>
                            <h4>{{__('titles.technique')}}</h4>
                            @foreach($artwork->techniques as $tec)
                                <span class="badge-pill bg-info p-1">
                                    {{$locale=='fa'?$tec->technique->name_persian:$tec->technique->name_english}}</span>
                            @endforeach
                            <hr>
                            <h4>{{__('titles.idea')}}</h4>
                            <p><span class="badge badge-pill font-14 badge-warning p-1">{{__('titles.'.$artwork->idea_type)}}</span></p>
                            <hr>
                            <h4>{{__('titles.type')}}</h4>
                            <p><span class="badge badge-pill font-14 badge-warning p-1">{{__('titles.'.$artwork->paint_type)}}</span></p>
                            <hr>
                            <h4>{{__('titles.year of creation')}}</h4>
                            <p><span class="badge badge-pill font-14 badge-cyan p-1">{{$artwork->year_created}}</span></p>
                            <hr>
                            <h4>{{__('titles.rials price')}}</h4>
                            <p><span class="badge badge-primary font-14 p-2">{{$artwork->price_rials}}</span></p>
                            <hr>
                            <h4>{{__('titles.usd price')}}</h4>
                            <p><span class="badge badge-primary font-14 p-2">{{$artwork->price_usd}}</span></p>
                            <h4>{{__('titles.stock')}}</h4>
                            <p><span class="badge {{$artwork->inventory_status=='sold'?'badge-danger':"badge-info"}} font-14 p-2">
                                    {{__('titles.'.$artwork->inventory_status)}}</span></p>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="des-statement" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <h4>{{__('titles.persian description')}}</h4>
                            <p>{{$artwork->description_persian}}</p>
                            <hr>
                            <h4>{{__('titles.english description')}}</h4>
                            <p>{{$artwork->description_english}}</p>
                            <hr>
                            <h4>{{__('titles.persian statement')}}</h4>
                            <p>{!! $artwork->statement_persian !!}</p>
                            <hr>
                            <h4>{{__('titles.english statement')}}</h4>
                            <p>{!! $artwork->statement_english !!}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    @foreach($artwork->images as $image)
                                        <img src="{{asset('images/artworks/'.$image->url)}}" alt="artwork">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

    {{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('error-validation')--}}
{{--                    @include('success-message')--}}
{{--                    <h4 class="card-title">{{__('titles.show')}}</h4>--}}
{{--                    <hr>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.persian name')}}</div>--}}
{{--                        <div class="col-md-4 ">{{$artwork->name_persian}}</div>--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.english name')}}</div>--}}
{{--                        <div class="col-md-4 ">{{$artwork->name_english}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.persian subject')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->subject_persian}}</div>--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.english subject')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->subject_english}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}

{{--                    </div>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.type')}}</div>--}}
{{--                        <div--}}
{{--                            class="col-md-4">{{$locale=='fa' || $locale==null?__('titles.'.$artwork->paint_type):$artwork->paint_type}}</div>--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.idea')}}</div>--}}
{{--                        <div--}}
{{--                            class="col-md-4">{{$locale=='fa' || $locale==null?__('titles.'.$artwork->idea_type):$artwork->idea_type}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.rials price')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->price_rials}}</div>--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.usd price')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->price_usd}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.year of creation')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->year_created}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.persian description')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->description_persian}}</div>--}}
{{--                        <div class="col-md-2 div-title">{{__('titles.english description')}}</div>--}}
{{--                        <div class="col-md-4">{{$artwork->decription_english}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row row-details">--}}
{{--                        <div class="col div-title">{{__('titles.images')}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        @foreach($artwork->images as $image)--}}
{{--                            <div class="col"><img src="{{$image?asset('images/artworks/'.$image->url):''}}"></div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
@endsection
