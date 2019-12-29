@extends('backend.master')
@section('title', 'Sponsors Lists')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{route('sponsor.store')}}" class="form-horizontal form-bordered" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="favicon"><b>Image: (Select jpg, jpeg, png, bmp file only)</b></label>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group select_image">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="image" type="file" name="image"> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="general-form">
                                                <label for="bonus"><b>Website Link</b></label>
                                            <input type="text" name="link" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                    <div class="text-center">
                                        <label></label>
                                        <button type="submit" class="btn green btn-block btn-lg">
                                            <i class="fa fa-check"></i> Submit
                                        </button>
                                    </div>
                            </div>
                        </div>

                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        @foreach($items as $item)
            <div class="col-md-2 text-center">
                <img class="slider_image" width="150px" height="50"
                     src="{{url('/')}}/assets/frontend/upload/images/sponsors/{{$item->image}}" alt="missing"/>
                <P><b>Link: </b>{{$item->link}}</P>

                <button type="button" class="btn red sponsor-delete-btn" data-toggle="modal"
                        data-target="#deletesponsor" data-id="{{$item->id}}"><i class="fa fa-trash"></i>
                    Delete
                </button>
                <p></p>
            </div>
        @endforeach
    </div>
    <!-- Begin Modal Delete menu -->
    <div class="modal fade" id="deletesponsor" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('sponsor.delete')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This Item?</h3>
                                        <input type="hidden" name="imgid" id="imgid">
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
    <script type="text/javascript">
        $(document).on('click', '.sponsor-delete-btn', function () {
            var slId = $(this).data('id');
            $('#imgid').val(slId);
        });
    </script>
@endsection