@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('menu.create')}}"> Add Menu </a>
@endsection
@section('title', 'Menu Management')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Menu List
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center"> Serial</th>
                                <th class="text-center"> Name</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{route('menu.edit', $item->id)}}"
                                           class="btn purple menu_item_edit_btn"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn red menu_item_delete_btn" data-toggle="modal"
                                                data-target="#deleteMenu" data-id="{{$item->id}}"><i
                                                    class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin Modal Delete menu -->
        <div class="modal fade" id="deleteMenu" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="portlet light bordered">
                            <div class="portlet-body form">
                                <form role="form" action="{{route('menu.delete')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="form-group form-md-line-input text-center">
                                            <h3>Are you Want Delete This?</h3>
                                            <input type="hidden" name="itemid" id="menuDelId">
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
        <!-- End Modal Delete menu -->
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.menu_item_delete_btn', function () {
                $('#menuDelId').val($(this).data('id'));
            });
        });
    </script>
@endsection