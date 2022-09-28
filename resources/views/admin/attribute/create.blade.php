@extends('admin.master')
@section('title', 'category')

@section('content')

    <div class="row">
    <div class="col-12">
        <div class="card antiquewhite">
            <div class="card-body">
                @include('error-validation')
                @include('success-message')
                <h4 class="card-title">{{__('titles.create')}}</h4>
                {{--                    <h6 class="card-subtitle"> All with bootstrap element classies </h6>--}}
                <form class="m-t-30" action="{{route('attribute.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                        <label for="values">{{__('titles.values')}}</label><br>
                        <label for="values">{{__('titles.Persian')}}:</label>

                        <div class="row">
                            <div class="col-3">
                                <input type="text" required class="form-control" name="values[p][]" id="values" >

                            </div>
                            <div class="col-3">
                                <input type="text"  class="form-control" name="values[p][]">

                            </div>
                            <div class="col-3">
                                <input type="text"  class="form-control" name="values[p][]">

                            </div>
                            <div class="col-3">
                                <input type="text"  class="form-control" name="values[p][]" >
                            </div>
                        </div>
                        <label for="values_english">{{__('titles.English')}}:</label>

                        <div class="row">
                            <div class="col-3">
                                <input type="text" required class="form-control" name="values[e][]" id="values_english" >

                            </div>
                            <div class="col-3">
                                <input type="text"  class="form-control" name="values[e][]" id="" >

                            </div>
                            <div class="col-3">
                                <input type="text"  class="form-control" name="values[e][]"  >

                            </div>
                            <div class="col-3">
                                <input type="text"  class="form-control" name="values[e][]">
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="filterable">&nbsp;</label>
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" name="filterable"> {{__('titles.filterable')}}
                            </label>
                        </fieldset>
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('titles.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
