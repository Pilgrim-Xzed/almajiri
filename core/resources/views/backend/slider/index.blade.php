@extends('backend.master')
@section('title', 'Slider Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{route('slider.store')}}" class="form-horizontal form-bordered" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="boldtext"><b>Bold Text</b></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bold"></i></span>
                                        <input id="bold_text" type="text" class="form-control" name="bold_text"
                                               placeholder="type Your text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="smalltext"><b>Small Text</b></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-text-height"></i></span>
                                        <input id="small_text" type="text" class="form-control" name="small_text"
                                               placeholder="type Your text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="favicon"><b>Image: (Select png/ico file only)</b></label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large select_image">
                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="slider_image" type="file" name="slider_image"> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center" style="margin-bottom: 25px;">
                            <button type="submit" class="btn green btn-lg btn-block">
                                <i class="fa fa-check"></i> Submit
                            </button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        @foreach($items as $item)
            <div class="col-md-4 text-center">
                <img class="slider_image" width="250px" height="130"
                     src="{{url('/')}}/assets/frontend/upload/images/slider/{{$item->image}}" alt="missing"/>
                <h4><b>Bold Text: </b>{{$item->bold_text}}</h4>
                <p><b>Small Text: </b>{{$item->small_text}}</p>
                <button type="button" class="btn red slider_item_delete_btn" data-toggle="modal"
                        data-target="#deleteSlider" data-id="{{$item->id}}"><i class="fa fa-trash"></i>
                    Delete
                </button>
            </div>
        @endforeach
    </div>
    <!-- Begin Modal Delete menu -->
    <div class="modal fade" id="deleteSlider" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('slider.delete')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This?</h3>
                                        <input type="hidden" name="sliderid" id="sliderDelId">
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
    <!-- End Modal Delete menu -->
    <script type="text/javascript">
        $(document).on('click', '.slider_item_delete_btn', function () {
            var slId = $(this).data('id');
            $('#sliderDelId').val(slId);
        });
    </script>
@endsection