@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('blog.index')}}"> Back </a>
@endsection
@section('title', 'Edit Post')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('blog.update', $blog->id)}}" method="post" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_control_1"><b>Title</b></label>
                                <input type="text" name="blog_title" class="form-control" id="blog_title" value="{{$blog->title}}">
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="logo"><b>Image: (Select jpg/jpeg/png only)</b></label>
                                            <div class="fileinput " data-provides="fileinput">
                                                <div class="input-group select_image">
                                                    <div class="form-control" data-trigger="fileinput">
                                                        <i class="fa fa-camera fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"> </span>
                                                    </div>
                                                    <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="blog_image" type="file" name="blog_image"> </span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Text</b></label>
                                <textarea name="blog_text" style="width: 100% !important; display: inherit;"
                                          id="blog_text" rows="20">{{$blog->body}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn green btn-block btn-lg">
                                    <i class="fa fa-check"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        });
    </script>
@endsection