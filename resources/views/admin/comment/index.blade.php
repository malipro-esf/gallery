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
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.model')}}</th>
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
                            <td class="p-value-col">{{class_basename($comment->commentable_type)}}</td>
                            <td class="e-value-col">{{$comment->user_fullname}}</td>
                            <td class="e-value-col">{{$comment->email}}</td>
                            <td class="e-value-col">{{$comment->ip_address}}</td>
                            <td class="e-value-col">{{$comment->user_agent}}</td>
                            <td class="e-value-col"><button onclick="changeStatus(this, {{$comment->id}}, {{$comment->verification_status}})" class="btn btn-small {{$comment->verification_status?'btn-success':'btn-warning'}}">
                                    {{$comment->verification_status?__('titles.verified'):__('titles.unverified')}}</button></td>
                            <td>
                                <a href="#" data-id="{{$comment->id}}" onclick="showModal(this, '{{$comment->comment}}', '{{$comment->reply}}')">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="post" style="display: inline;">
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
                        <div class="form-group">
                        <textarea id="message" class="form-control"></textarea>
                        <form action="" id="edit-form" method="post">
                            {{method_field('put')}}
                            @csrf
                            <div class="form-group">
                                <label for="edit-persian-name" class="control-label">{{__('titles.reply')}}</label>
                                <textarea class="form-control" name="reply" id="reply"></textarea>
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
        function showModal(el, message, reply) {
            $('#message').val(message)
            const commentID = $(el).attr('data-id');

            //set action form
            var url = '{{ route("comment.update", ":comment") }}';
            url = url.replace(':comment',commentID);
            $('#edit-form').attr('action', url);
            $('#reply').text(reply);

            $('#edit-modal').modal('show');
        }

        function changeStatus(el, commentId, status) {

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData;
            formData.append('_token', CSRF_TOKEN);
            formData.append('commentId', commentId );
            formData.append('status', status );
            $.ajax({
                url: '{{route('comment.change.status')}}', // form action url
                type: 'POST', // form submit method get/post
                processData: false,
                contentType: false,
                data: formData,
                error: function (errors) {
                    if (errors.status == 401) {
                        toastr.info('Your access is limited', '', 'error')
                    }
                    if (errors.status == 500) {
                        toastr.info('An error occurred on the server side', '', 'error')
                    }
                    if (errors.status == 404) {
                        toastr.info('User not found', '', 'error')
                    }
                },
                success: function (data) {
                    if(data) {
                        // Display an info toast with no title
                        toastr.info('{{__('messages.status changed')}}')
                        if(status){
                            $(el).addClass('btn-warning')
                            $(el).removeClass('btn-success')
                            $(el).text('{{__('titles.unverified')}}')
                        }
                        else  {
                            $(el).removeClass('btn-warning')
                            $(el).addClass('btn-success')
                            $(el).text('{{__('titles.verified')}}')

                        }

                    } else
                        toastr.info('{{__('messages.error failed')}}')

                },
            });

        }

    </script>
@endsection
