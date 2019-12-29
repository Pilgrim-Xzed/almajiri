@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('cause.create')}}"> Add Cause </a>
@endsection
@section('title', 'Causes Lists')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-body text-center">
                    <div class="row">
                        @foreach($items as $item)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">{{$item->title}}</div>
                                    <div class="panel-body">
                                        <img src="{{asset('assets/frontend/upload/images/cause')}}/{{$item->image}}" style="height: 270px; width: 270px">
                                        {!!  str_limit($item->description, 200) !!}
                                        <p style="color: #9d1611">
                                            {{$item->created_at->diffForhumans()}}
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn purple" href="{{route('cause.edit',$item->id)}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-danger post_item_delete_btn"
                                           data-id="{{$item->id}}" data-toggle="modal"
                                           data-target="#deletepost">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$items->render()}}
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="deletepost" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="modal-body">
    <div class="portlet light bordered">
    <div class="portlet-body form">
    <form role="form" action="{{route('cause.delete')}}" method="post">
    {{csrf_field()}}
    <div class="form-body">
    <div class="form-group form-md-line-input text-center">
    <h3>Are you Want Delete This Cause?</h3>
    <input type="hidden" name="causeid" id="causeid">
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
            $(document).on('click', '.post_item_delete_btn', function () {
                var pId = $(this).data('id');
                $('#causeid').val(pId);
            });
        });
    </script>
@endsection