@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('create.history')}}"> Add History </a>
@endsection
@section('title', 'Our History')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-body text-center">
                    <div class="row">
                        @foreach($histories as $history)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">{{$history->title}}</div>
                                    <div class="panel-body">
                                        {!!  str_limit($history->text, 100) !!}
                                        <p style="color: #9d1611">
                                            {{$history->created_at->diffForhumans()}}
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn purple" href="{{route('edit.history',$history->id)}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-danger history_delete_btn"
                                           data-id="{{$history->id}}" data-toggle="modal"
                                           data-target="#deletehistory">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$histories->render()}}
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="deletehistory" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('delete.history')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This history?</h3>
                                        <input type="hidden" name="postid" id="postid">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.history_delete_btn', function () {
                var pId = $(this).data('id');
                $('#postid').val(pId);
            });
        });
    </script>
@endsection