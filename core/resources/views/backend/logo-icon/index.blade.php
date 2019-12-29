@extends('backend.master')
@section('title', 'LOGO & ICON & Breadcrumb SETTING')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light form-fit">
                <div class="portlet-body">
                    <form action="{{route('logoIcon.update')}}" class="form-horizontal form-bordered" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="logo"><b>Logo: (Select jpg/jpeg/png only)</b></label>
                                    <div class="fileinput " data-provides="fileinput">
                                        <div class="input-group select_image">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="fa fa-camera fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="logo_image" type="file" name="logo_image"> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="favicon"><b>Favicon: (Select png/ico file only)</b></label>
                                    <div class="fileinput" data-provides="fileinput">
                                        <div class="input-group select_image">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="fa fa-camera fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="fav_image" type="file" name="fav_image"> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="favicon"><b>BreadCrumb: (Select jpg/jpeg/png/bmp only)</b></label>
                                    <div class="fileinput" data-provides="fileinput">
                                        <div class="input-group select_image">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="fa fa-camera fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="crumb_image" type="file" name="crumb_image"> </span>
                                        </div>
                                    </div>
                                </div>
                                <label for="favicon"></label>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-block green btn-lg">
                                        <i class="fa fa-check"></i> Sumbit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4">
                <div class="portlet box green-meadow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Current Logo
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <img class="logo_img img-responsive" width="345px" height="170px"
                             src="{{url('/')}}/assets/frontend/upload/images/logo/{{$item->logo}}" alt="missing"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Current Icon
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body logo_body">
                        <img class="logo_img img-responsive" width="250px" height="90px"
                             src="{{url('/')}}/assets/frontend/upload/images/logo/{{$item->fav}}" alt="missing"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="portlet box green-meadow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Current BreadCumb
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <img class="logo_img img-responsive" width="345px" height="250px"
                             src="{{url('/')}}/assets/frontend/upload/images/logo/{{$item->breadcrumb}}" alt="missing"/>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection