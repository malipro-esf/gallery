@extends('admin.master')
@section('title', 'category')

@section('content')

    <div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    @include('error-message')
                    <h4 class="card-title">{{__('titles.attributes')}}</h4>
{{--                    <h5 class="card-subtitle">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</h5>--}}
                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                        <thead>
                        <tr class="text-center">
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{__('titles.persian name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.english name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.values')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{__('titles.filterable')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{__('titles.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributes as $attribute)
                        <tr class="text-center">
                            <td class="p-name-col">{{$attribute->name_persian}}</td>
                            <td class="e-name-col">{{$attribute->name_english}}</td>
                            <td><a href="{{route('attribute-value.index',['attribute_id' => $attribute->id])}}"><i class="fa fa-eye"></i> </a> </td>
                            <td class="filter-col" data-id="{{$attribute->filterable}}">{{$attribute->filterable?__('titles.yes'):__('titles.no')}}</td>
                            <td>
                                <a href="#" data-id="{{$attribute->id}}" onclick="showModal(this)">
                                    <i class="fa fa-edit"></i>
                                </a>
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
                                <label for="edit-persian-name" class="control-label">{{__('titles.persian name')}}</label>
                                <input type="text" class="form-control" name="name_persian" id="edit-persian-name">
                            </div>
                            <div class="form-group">
                                <label for="edit-english-name" class="control-label">{{__('titles.english name')}}</label>
                                <input type="text" class="form-control" name="name_english" id="edit-english-name">
                            </div>
                            <div class="form-group">
                                <label for="filterable">&nbsp;</label>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="edit-filterable" name="filterable">{{__('titles.filterable')}}
                                    </label>
                                </fieldset>
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
            const persianName = $(el).parent().parent().find('.p-name-col').html();
            const englishName = $(el).parent().parent().find('.e-name-col').html();
            const filterable = $(el).parent().parent().find('.filter-col').attr('data-id');
            const id = $(el).attr('data-id');

            $('#edit-persian-name').val(persianName);
            $('#edit-english-name').val(englishName);

            if(filterable==1)
                $('#edit-filterable').prop('checked',true);
            else{
                $('#edit-filterable').prop('checked',false);
            }

            //set action form
            var url = '{{ route("attribute.update", ":attribute") }}';
            url = url.replace(':attribute',id);
            $('#edit-form').attr('action', url);

            $('#edit-modal').modal('show');
        }
    </script>
@endsection
