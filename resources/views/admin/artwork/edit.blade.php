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
                    <h4 class="card-title">{{__('titles.edit')}} {{$locale=='fa'?$artwork->name_persian:$artwork->name_english}}</h4>
                    {{--                    <h6 class="card-subtitle"> All with bootstrap element classies </h6>--}}
                    <form class="m-t-30" action="{{route('artwork.update',['artwork' => $artwork])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="row p-t-20 l-red">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="persian-name">{{__('titles.persian name')}}</label>
                                    <input type="text" required class="form-control" value="{{$artwork->name_persian}}"
                                           name="name_persian" id="persian-name"
                                           placeholder="{{__('titles.enter name in persian')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english-name">{{__('titles.english name')}}</label>
                                    <input type="text" required class="form-control" value="{{$artwork->name_english}}"
                                           name="name_english" id="english-name"
                                           placeholder="{{__('titles.enter name in persian')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="persian-subject">{{__('titles.persian subject')}}</label>
                                    <input type="text"  class="form-control" value="{{$artwork->subject_persian}}"
                                           name="subject_persian" id="persian-subject"
                                           placeholder="{{__('titles.enter subject in persian')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english-subject">{{__('titles.english subject')}}</label>
                                    <input type="text"  class="form-control" value="{{$artwork->subject_english}}"
                                           name="subject_english" id="english-subject"
                                           placeholder="{{__('titles.enter subject in english')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20 l-red">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price-rials">{{__('titles.rials price')}}</label>
                                    <input type="text"  class="form-control" value="{{$artwork->price_rials}}"
                                           name="price_rials" id="price_rials"
                                           placeholder="{{__('titles.enter price in rials')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price-usd">{{__('titles.usd price')}}</label>
                                    <input type="text"  class="form-control" value="{{$artwork->price_usd}}"
                                           name="price_usd" id="price-usd"
                                           placeholder="{{__('titles.enter price in usd')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year-created">{{__('titles.year of creation')}}</label>
                                    <input type="text"  class="form-control" value="{{$artwork->year_created}}"
                                           oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                           maxlength="4"
                                           name="year_created" id="year-created"
                                           placeholder="{{__('titles.enter year of creation')}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">{{__('titles.image')}}</label>
                                    <input type="file" name="images[]" id="images" accept="image" multiple class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row p-t-20 l-red">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">{{__('titles.idea')}}</label>
                                    <select class="form-control" id="type" name="idea_type">
                                        <option {{$artwork->idea_type=='original'?'selected':''}} value="original">{{__('titles.original')}}</option>
                                        <option {{$artwork->idea_type=='copy'?'selected':''}} value="copy">{{__('titles.copy')}}</option>
                                        <option {{$artwork->idea_type=='unknown'?'selected':''}} value="unknown">{{__('titles.unknown')}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paint-type">{{__('titles.type')}}</label>
                                    <select class="form-control" id="paint-type" name="paint_type">
                                        <option {{$artwork->paint_type=='panel'?'selected':''}} value="panel">{{__('titles.panel painting')}}</option>
                                        <option {{$artwork->paint_type=='mural'?'selected':''}} value="mural">{{__('titles.mural')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sign">{{__('titles.sign')}}</label>
                                    <select class="form-control" id="sign" name="sign">
                                        <option {{old('sign')=='0'?'selected':''}} value="0">{{__('titles.has it')}}</option>
                                        <option {{old('sign')=='1'?'selected':''}} value="1">{{__('titles.does not have')}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="frame">{{__('titles.frame')}}</label>
                                    <select class="form-control" id="frame" name="frame">
                                        <option {{old('frame')=='1'?'selected':''}} value="0">{{__('titles.has it')}}</option>
                                        <option {{old('frame')=='0'?'selected':''}} value="1">{{__('titles.does not have')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20 l-red">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="styles">{{__('titles.style')}}</label>
                                    <select class=" form-control" multiple="multiple" required name="styles[]" id="styles">
                                        @foreach($categories->where('type','style') as $style)
                                            <option {{in_array($style->id,$artStyles)?'selected':""}}  value="{{$style->id}}">{{$locale=='fa'?$style->name_persian:$style->name_english}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="techniques">{{__('titles.technique')}}</label>
                                    <select class=" form-control" multiple="multiple" name="techniques[]" id="techniques">
                                        @foreach($categories->where('type','technique') as $technique)
                                            <option {{in_array($technique->id,$artTechniques)?'selected':""}} value="{{$technique->id}}">{{$locale=='fa'?$technique->name_persian:$technique->name_english}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attrs">{{__('titles.attributes')}}</label>
                                    @foreach($attributes as $attr)
                                        <div>
                                            <label>{{$locale=='fa'?$attr->name_persian:$attr->name_english}}: &nbsp;</label>
                                            @foreach($attr->values as $value)
                                                <input type="checkbox" name="attrValues[]" value="{{$value->id}}" {{in_array($value->id, $artAttrs)?'checked':''}} id="attrs">
                                                {{$locale=='fa'?$value->value_persian:$value->value_english}}&nbsp;&nbsp;
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20 l-red">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tags">{{__('titles.tags')}}</label>
                                    <select class=" form-control" multiple="multiple" name="tags[]" id="tags">
                                        @foreach($tags as $tag)
                                            <option  {{in_array($tag->id,$artTags)?'selected':""}} value="{{$tag->id}}">{{$locale=='fa'?$tag->name_persian:$tag->name_english}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inventory-status">{{__('titles.stock')}}</label>
                                    <select class=" form-control" multiple="multiple" name="inventory_status" id="inventory-status">
                                            <option  {{$artwork->inventory_status=='exist'?'selected':""}} value="exist">{{__('titles.exist')}}</option>
                                            <option  {{$artwork->inventory_status=='sold'?'selected':""}} value="sold">{{__('titles.sold')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="des-persian">{{__('titles.persian description')}}</label>
                                    <textarea rows="5" class="form-control" name="description_persian" placeholder="{{__('titles.enter description in persian')}}"
                                              id="des-persian">{{$artwork->description_persian}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="des-english">{{__('titles.english description')}}</label>
                                    <textarea rows="5" class="form-control" name="description_english" placeholder="{{__('titles.enter description in english')}}"
                                              id="des-english">{{$artwork->description_english}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('titles.persian statement')}}</h4>
                                        {{--                                    <h6 class="card-subtitle">CKEditor is an Open source application, which means it can be modified in any way you want. It benefits from an active community that is constantly evolving the application with free add-ons and a transparent development process.</h6>--}}
                                        <div class="form-group">
                                        <textarea name="statement_persian" placeholder="{{__('titles.enter statement in persian')}}" id="ckeditor" cols="50" rows="15" class="ckeditor">
                                           {{$artwork->statement_persian}}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('titles.english statement')}}</h4>
                                        {{--                                    <h6 class="card-subtitle">CKEditor is an Open source application, which means it can be modified in any way you want. It benefits from an active community that is constantly evolving the application with free add-ons and a transparent development process.</h6>--}}
                                        <div class="form-group">
                                        <textarea name="statement_english" placeholder="{{__('titles.enter statement in english')}}" id="ckeditor" cols="50" rows="15" class="ckeditor">
                                           {{$artwork->statement_persian}}
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

