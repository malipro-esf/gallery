@extends('admin.master')
@section('title', 'category')

@section('content')

    @php $locale = session()->get('locale'); @endphp
    <div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    @include('error-message')
                    <h4 class="card-title">{{__('titles.comments')}}</h4>
{{--                    <h5 class="card-subtitle">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</h5>--}}
                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                        <thead>
                        <tr class="text-center">
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.artwork')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.user name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.email address')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.ip address')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.agent system')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.verification status')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{__('titles.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr class="text-center">
                            <td class="p-value-col">{{$locale=='fa'?$comment->artwork->name_persian:$comment->artwork->name_english}}</td>
                            <td class="e-value-col">{{$comment->user_name}}</td>
                            <td class="e-value-col">{{$comment->email}}</td>
                            <td class="e-value-col">{{$comment->ip_address}}</td>
                            <td class="e-value-col">{{$comment->agent_system}}</td>
                            <td class="e-value-col">{{$comment->verification_status}}</td>
                            <td>
                                <a href="#" data-id="{{$comment->id}}" onclick="showModal(this)">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('tag.destroy', ['tag' => $comment->id]) }}" method="post" style="display: inline;">
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
