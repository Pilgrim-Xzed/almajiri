@extends('backend.master')
@section('addNewButon')
    <a class="btn purple-intense btn-outline btn-lg sbold pull-right" id="addfb" style="margin-left: 20px" data-toggle="modal" data-target="#fbid" data-fbid="{{$fb->app_id or ''}}"> Add Facebook comment Script </a>
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('blog.create')}}"> Add Post </a>
@endsection
@section('title', 'Blog Post')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-body text-center">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">{{$post->title}}</div>
                                    <div class="panel-body">
                                        <img src="{{asset('assets/frontend/upload/images/blog')}}/{{$post->image}}" style="height: 270px; width: 270px">
                                        {!!  str_limit($post->body, 100) !!}
                                        <p style="color: #9d1611">
                                            {{$post->created_at->diffForhumans()}}
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn purple" href="{{route('blog.edit',$post->id)}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-danger post_item_delete_btn"
                                           data-id="{{$post->id}}" data-toggle="modal"
                                           data-target="#deletepost">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$posts->render()}}
                </div>
            </div>
        </div>
    </div>
    </div>



    <div class="modal fade" id="fbid" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Facebook Comment Script for Blog Comment</h4>
    </div>
    <div class="modal-body">
    <div class="portlet light bordered">
    <div class="portlet-body form">
    <form role="form" action="{{route('fb.appId')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <div class="form-group">
                <label for="comment"><b>Facebook Comment Script</b></label>
                <textarea id="app_id" name="app_id" class="form-control" rows="10">
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block btn-success"><i
                        class="fa fa-check"></i>Update
            </button>
        </div>
    </form>
        <div class="modal-footer">
            <button type="button" class="btn red btn-default" data-dismiss="modal">Close
            </button>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
    <form role="form" action="{{route('blog.delete')}}" method="post">
    {{csrf_field()}}
    <div class="form-body">
    <div class="form-group form-md-line-input text-center">
    <h3>Are you Want Delete This Post?</h3>
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
            $(document).on('click', '.post_item_delete_btn', function () {
                var pId = $(this).data('id');
                $('#postid').val(pId);
            });
            $(document).on('click','#addfb',function () {
                $('#app_id').val($(this).data('fbid'))
            });

        });
    </script>
@endsection