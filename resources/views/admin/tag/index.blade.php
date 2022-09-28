@extends('admin.master')
@section('title', 'category')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    <h4 class="card-title">{{__('titles.create')}}</h4>
                    {{--                    <h6 class="card-subtitle"> All with bootstrap element classies </h6>--}}
                    <form class="m-t-30" action="{{route('tag.store')}}" method="post" enctype="multipart/form-data">
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
                    <h4 class="card-title">{{__('titles.tags')}}</h4>
{{--                    <h5 class="card-subtitle">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</h5>--}}
                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                        <thead>
                        <tr class="text-center">
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.persian name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.english name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{__('titles.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                        <tr class="text-center">
                            <td class="p-value-col">{{$tag->name_persian}}</td>
                            <td class="e-value-col">{{$tag->name_english}}</td>
                            <td>
                                <a href="#" data-id="{{$tag->id}}" onclick="showModal(this)">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('tag.destroy', ['tag' => $tag->id]) }}" method="post" style="display: inline;">
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
                                <label for="edit-persian-name" class="control-label">{{__('titles.persian name')}}</label>
                                <input type="text" class="form-control" name="name_persian" id="edit-persian-name">
                            </div>
                            <div class="form-group">
                                <label for="edit-english-name" class="control-label">{{__('titles.english name')}}</label>
                                <input type="text" class="form-control" name="name_english" id="edit-english-name">
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
            const persianName = $(el).parent().parent().find('.p-value-col').html();
            const englishName = $(el).parent().parent().find('.e-value-col').html();
            const tagId = $(el).attr('data-id');

            $('#edit-persian-name').val(persianName);
            $('#edit-english-name').val(englishName);

            //set action form
            var url = '{{ route("tag.update", ":tag") }}';
            url = url.replace(':tag',tagId);
            $('#edit-form').attr('action', url);


            $('#edit-modal').modal('show');
        }
    </script>
@endsection
