@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('donate.create')}}"> Add Donate ammount </a>
@endsection
@section('title', 'Donate Now Lists')
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
                                    <div class="panel-heading"><b>Amount:</b> {{$gset->currency_symbol}}{{$item->amount}}</div>
                                    <div class="panel-body">
                                        {!!  str_limit($item->description, 200) !!}
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn purple" href="{{route('donate.edit',$item->id)}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-danger donate_delete_btn"
                                           data-id="{{$item->id}}" data-toggle="modal"
                                           data-target="#deletedonate">
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
    <div class="modal fade" id="deletedonate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="modal-body">
    <div class="portlet light bordered">
    <div class="portlet-body form">
    <form role="form" action="{{route('donate.delete')}}" method="post">
    {{csrf_field()}}
    <div class="form-body">
    <div class="form-group form-md-line-input text-center">
    <h3>Are you Want Delete This item?</h3>
    <input type="hidden" name="id" id="donateid">
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
            $(document).on('click', '.donate_delete_btn', function () {
                var pId = $(this).data('id');
                $('#donateid').val(pId);
            });
        });
    </script>
@endsection