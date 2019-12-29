@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('user.subs')}}"> Send EMail </a>
@endsection
@section('title', 'Subscriber List')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Subscriber Details
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center"> Name</th>
                                <th class="text-center"> Email</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="gateway_list">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a data-id="{{$item->id}}" data-toggle="modal" data-target="#unsubs" class="btn red subsid">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$items->render()}}
                </div>
            </div>
            <div class="modal fade" id="unsubs" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <div class="portlet light bordered">
                                <div class="portlet-body form">
                                    <form role="form" action="{{route('user.unsubs')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input text-center">
                                                <h3>Do you Want to Unsubscribe This User?</h3>
                                                <input type="hidden" name="id" id="sid">
                                            </div>
                                        </div>
                                        <div class="form-actions noborder text-center">
                                            <button type="submit" class="btn blue">Yes</button>
                                            <button type="button" class="btn red" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
           $(document).on('click', '.subsid', function () {
             $('#sid').val($(this).data('id'));
           });
        });
    </script>
@endsection