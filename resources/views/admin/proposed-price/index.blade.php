@extends('admin.master')
@section('title','proposed prices')
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
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{{__('titles.persian name')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.proposed price')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.phone')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{__('titles.email')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{__('titles.image')}}</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{__('titles.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($proposePrices as $index => $price)
                            <tr class="text-center">
                                <td>{{++$index}}</td>
                                <td>{{$price->artwork->name}}</td>
                                <td>{{$price->price}}</td>
                                <td>{{$price->phone}}</td>
                                <td>{{$price->email}}</td>
                                <td><span class="badge {{$price->status=='pending'?'badge-warning':($price->status=='accepted'?'badge-success':'badge-danger')}}">
                                {{__('titles.'.$price->status)}}</span>
                                </td>
                                <td><img class="img-list" src="{{$price->images?asset('images/artworks/'.$price->artwork->images[0]->url):''}}"></td>

                                <td>
                                    <a href="{{route('artwork.show',['artwork' => $price->artwork])}}"  data-toggle="tooltip"
                                       data-placement="top" title="" data-original-title="{{__('titles.show')}}">
                                        <i class="fa fa-eye"></i>
                                    </a>


                                    <a href="{{route('proposed-price.edit',['artwork' => $price])}}"  data-toggle="tooltip"
                                       data-placement="top" title="" data-original-title="{{__('titles.edit')}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('proposed-price.destroy', ['artwork' => $price->id]) }}" method="post" style="display: inline;">
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
        <div>
            {!! $proposePrices->links() !!}
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
@section('script')
    <script>
        function showModal(el) {
            $('#p-description').text($(el).attr('data-id'));
            $('#description-modal').modal('show');
        }
    </script>
@endsection
@endsection
