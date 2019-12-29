@extends('backend.master')
@section('title', 'Social Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light form-fit">
                <div class="portlet-body">
                    <form action="{{route('social.store')}}" class="form-horizontal form-bordered" method="post">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="logo"><b>Icon</b></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">fa</span>
                                            <input id="social_icon" type="text" class="form-control socioicon"
                                                   name="social_icon"
                                                   placeholder="Click here...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="favicon"><b>Link</b></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-external-link"></i></span>
                                            <input id="social_url" type="text" class="form-control" name="social_url"
                                                   placeholder="type Your URL">
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label for="favicon"></label>
                                    <div class="form-actions">
                                                <button type="submit" class="btn green btn-lg">
                                                    <i class="fa fa-check"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="portlet box green-meadow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i>Social List
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"> Icon</th>
                                    <th class="text-center"> URL</th>
                                    <th class="text-center"> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td><i class="{{$item->icon}}"></i></td>
                                        <td>{{$item->link}}</td>
                                        <td>
                                            <button type="button" class="btn red icon_item_delete_btn" data-toggle="modal"
                                                    data-id="{{$item->id}}" data-target="#deleteSocial">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteSocial" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('social.delete')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This?</h3>
                                        <input type="hidden" name="socialid" id="socialDelId">
                                    </div>
                                </div>
                                <div class="form-actions noborder text-center">
                                    <button type="submit" class="btn blue">Yes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
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
        $(document).on('focus', '.socioicon', function () {
            $('.socioicon').iconpicker();
        });

        $(document).on('click', '.icon_item_delete_btn', function () {
            var sId = $(this).data('id');
            $('#socialDelId').val(sId);
        });
        });
    </script>
@endsection