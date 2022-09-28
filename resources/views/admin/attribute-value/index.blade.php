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
                    <form class="m-t-30" action="{{route('attribute-value.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="attribute">{{__('titles.attribute')}}</label>
                            <select id="attribute" name="attribute_id" class="form-control">
                                @foreach($attributes as $attribute)
                                    <option value="{{$attribute->id}}">{{!session()->get('locale') || session()->get('locale')=='fa'?$attribute->name_persian:$attribute->name_english}}</option>
                                @endforeach
                            </select>
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
                        <button type="submit" class="btn btn-primary">{{__('titles.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    @include('error-message')
                    <h4 class="card-title">{{__('titles.values')}}</h4>
{{--                    <h5 class="card-subtitle">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</h5>--}}
                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                        <thead>
                        <tr class="text-center">
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{__('titles.attribute')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.persian value')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.english value')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{__('titles.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributeValues as $value)
                        <tr class="text-center">
                            <td class="p-attribute-name" data-id="{{$value->attribute->id}}">{{session()->get('locale')}}
                                {{!session()->get('locale') || session()->get('locale')=='fa'?$value->attribute->name_persian:$value->attribute->name_english}}</td>
                            <td class="p-value-col">{{$value->value_persian}}</td>
                            <td class="e-value-col">{{$value->value_english}}</td>
                            <td>
                                <a href="#" data-id="{{$value->id}}" onclick="showModal(this)">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('attribute-value.destroy', ['attribute_value' => $value->id]) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a type="submit" onclick="getDeleteConfirmation(this)"  data-toggle="tooltip"
                                       data-placement="top" title=""  data-original-title="{{__('titles.delete')}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- .modal -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">{{__('titles.edit')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="edit-form" method="post">
                            {{method_field('put')}}
                            @csrf
                            <div class="form-group">
                                <label for="edit-attribute">{{__('titles.attribute')}}</label>
                                <select id="edit-attribute" name="attribute_id" class="form-control">
                                    @foreach($attributes as $attribute)
                                        <option value="{{$attribute->id}}">{{!session()->get('locale') ||session()->get('locale')=='fa'?$attribute->name_persian:$attribute->name_english}}</option>
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="edit-persian-name" class="control-label">{{__('titles.persian value')}}</label>
                                <input type="text" class="form-control" name="value_persian" id="edit-persian-value">
                            </div>
                            <div class="form-group">
                                <label for="edit-english-name" class="control-label">{{__('titles.english value')}}</label>
                                <input type="text" class="form-control" name="value_english" id="edit-english-value">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('titles.close')}}</button>
                        <button type="submit" onclick="$('#edit-form').submit()" class="btn btn-primary">{{__('titles.submit')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal -->
    </div>
@endsection
@section('script')
    <script>
        function showModal(el) {
            const persianValue = $(el).parent().parent().find('.p-value-col').html();
            const englishValue = $(el).parent().parent().find('.e-value-col').html();
            const attributeId = $(el).parent().parent().find('.p-attribute-name').attr('data-id');
            const valueId = $(el).attr('data-id');

            $('#edit-persian-value').val(persianValue);
            $('#edit-english-value').val(englishValue);

            $(`#edit-attribute option[value=${attributeId}]`).attr("selected", "selected");

            //set action form
            var url = '{{ route("attribute-value.update", ":attribute_value") }}';
            url = url.replace(':attribute_value',valueId);
            $('#edit-form').attr('action', url);


            $('#edit-modal').modal('show');
        }
    </script>
@endsection
