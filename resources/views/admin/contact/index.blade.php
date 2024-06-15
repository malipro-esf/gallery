@extends('admin.master')
@section('title','contact')
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    @include('error-validation')
                    @include('success-message')
                    @include('error-message')
                    <h4 class="card-title">{{__('titles.artworks')}}</h4>
                    {{--                    <h5 class="card-subtitle">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</h5>--}}
                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                        <thead>
                        <tr class="text-center">
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{__('titles.full name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.email address')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.Message')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{__('titles.replied message')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{__('titles.reply date')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($contacts as $index => $contact)
                            <tr class="text-center">
                                <td>{{++$index}}</td>
                                <td>{{$contact->full_name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>
                                    <a href="#" data-id="{{$contact->message}}" onclick="showMessageModal(this)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" id="{{$contact->id}}" data-id="{{$contact->replied_message}}" onclick="showRepliedMessageModal(this)">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>{{$contact->updated_at}}</td>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            {!! $contacts->links() !!}
        </div>



        <!-- .modal -->
        <div id="message-modal" class="modal fade animate"
             data-backdrop="true">
            <div class="modal-dialog" id="animate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('titles.message')}}</h5>
                    </div>
                    <div class="modal-body text-center p-lg">
                        <p id="p-message"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger rounded p-x-md"
                                data-dismiss="modal">{{__('titles.close')}}
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <!-- / .modal -->

        <!-- .modal -->
        <div id="replied-message-modal" class="modal fade animate "
             data-backdrop="true">
            <div class="modal-dialog modal-lg" id="animate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('titles.replied message')}}</h5>
                    </div>
                    <div class="modal-body text-center p-lg">
                        <form action="{{ route('contact.reply') }}" method="post" >
                            {{ csrf_field() }}
                            <input type="hidden" name="contact_id" id="contact-id">
                            <div class="row">
                                <div class="col">
                                    <textarea rows="5" id="p-replied-message" name="replied_message" class="w-100"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <input type="submit" class="btn btn-success" value="{{__('titles.submit')}}">
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger rounded p-x-md"
                                data-dismiss="modal">{{__('titles.close')}}
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <!-- / .modal -->
    </div>
@endsection
@section('script')
    <script>
        function showMessageModal(el) {
            $('#p-message').text($(el).attr('data-id'));
            $('#message-modal').modal('show');
        }

        function showRepliedMessageModal(el) {
            $('#p-replied-message').val($(el).attr('data-id'));
            $('#contact-id').val($(el).attr('id'));
            $('#replied-message-modal').modal('show');
        }
    </script>
@endsection
