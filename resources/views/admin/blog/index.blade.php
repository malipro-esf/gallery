@extends('admin.master')
@section('title', 'blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    @include('error-message')
{{--                    <h4 class="card-title">{{__('titles.'.$type)}}</h4>--}}
                    {{--                    <h5 class="card-subtitle">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</h5>--}}
                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                        <thead>
                        <tr class="text-center">
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{__('titles.id')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{__('titles.persian title')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.english title')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{__('titles.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($blogs as $index => $blog)

                            <tr class="text-center">
                                <td>{{++$index}}</td>
                            <tr class="text-center">
                                <td>{{++$index}}</td>

                        @foreach($blogs as $blog)
                            <tr class="text-center">
                                <td>{{$blog->title_persian}}</td>
                                <td>{{$blog->title_english}}</td>
                                <td>
                                    <a href="{{route('blog.edit',['blog' => $blog])}}"  data-toggle="tooltip"
                                       data-placement="top" title="" data-original-title="{{__('titles.edit')}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('blog.destroy', ['blog' => $blog->id]) }}" method="post" style="display: inline;">
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
        <div id="description-modal" class="modal fade animate"
             data-backdrop="true">
            <div class="modal-dialog" id="animate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">توضیحات</h5>
                    </div>
                    <div class="modal-body text-center p-lg">
                        <p id="p-description"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger rounded p-x-md"
                                data-dismiss="modal">بستن
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <!-- / .modal -->
    </div>
@endsection
