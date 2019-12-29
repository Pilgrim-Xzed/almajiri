@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('create.whowe')}}"> Add WhoWe Section </a>
@endsection
@section('title', 'Who We Section')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-body text-center">
                    <div class="row">
                        @foreach($whowes as $whowe)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><i class="fa {{$whowe->icon}}"></i> {{$whowe->title}}</div>
                                    <div class="panel-body">
                                        {!!  str_limit($whowe->description, 100) !!}
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn purple" href="{{route('edit.whowe',$whowe->id)}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-danger whowe_delete_btn"
                                           data-id="{{$whowe->id}}" data-toggle="modal"
                                           data-target="#deletewhowe">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$whowes->render()}}
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="deletewhowe" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('delete.whowe')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This Section?</h3>
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
            $(document).on('click', '.whowe_delete_btn', function () {
                var pId = $(this).data('id');
                $('#postid').val(pId);
            });
        });
    </script>
@endsection