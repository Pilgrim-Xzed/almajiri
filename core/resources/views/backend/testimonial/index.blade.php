@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" data-toggle="modal" data-target="#addtest"> Add New </a>
@endsection
@section('title', 'Testimonials')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
<div class="row page-bar-btn">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-body">
                <div class="row">
                    @foreach($testims as $testim)
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Testimonial {{$testim->id}}</div>
                                <div class="panel-body">
                                    <img src="{{ asset('assets/frontend/upload/images/testimonial') }}/{{$testim->image}}" class="img-responsive" style="width: 100%; height: 250px;">
                                    <h3>
                                        {{$testim->name}}
                                    </h3>
                                    <h5>
                                        {{$testim->company}}
                                    </h5>
                                    <p>
                                        <q>{{$testim->comment}}</q>
                                    </p>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-circle purple" data-toggle="modal" data-target="#edittestim{{$testim->id}}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a class="btn btn-circle red testimonial_item_delete_btn" data-id="{{$testim->id}}" data-toggle="modal"  data-target="#deletetestimonial">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Edit testim -->
                        <div id="edittestim{{$testim->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit testim {{$testim->id}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="POST" action="{{route('testim.update',$testim->id)}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{method_field('put')}}
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{ asset('assets/images/testimonial') }}/{{$testim->photo}}" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                        <span class="btn btn-success btn-file">
                          <span class="fileinput-new"> Change Image </span>
                          <span class="fileinput-exists"> Change </span>
                          <input type="file" name="photo"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" value="{{$testim->name}}" id="name" name="name" >
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input type="text" class="form-control" value="{{$testim->company}}"  id="company" name="company" >
                                            </div>
                                            <div class="form-group">
                                                <label for="comment" >Comment</label>
                                                <input type="text" name="comment" value="{{$testim->comment}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-success" >Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Test -->
<div id="addtest" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Testimonial</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{route('testim.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group form-md-line-input">
                    <div class="form-group">
                        <label for="name"><b>Name</b></label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="company"><b>Company</b></label>
                        <input type="text" class="form-control" id="company" name="company" >
                    </div>
                    <div class="form-group">
                        <label for="comment" ><b>Comment</b></label>
                        <input type="text" name="comment" class="form-control">
                    </div>
                        <div class="row">
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-7">
                        <div class="form-group">
                            <label for=""><b>Image(Support jpeg/png/jpg/bmp only)</b></label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group input-large select_image">
                                    <div class="form-control uneditable-input input-fixed input-medium"
                                         data-trigger="fileinput">
                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                        <span class="fileinput-filename"> </span>
                                    </div>
                                    <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input type="file"
                                                                       name="photo"> </span>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-lg green"><i
                                    class="fa fa-check"></i>Save</button>
                    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default red" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
    <div class="modal fade" id="deletetestimonial" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('testim.destroy')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This?</h3>
                                        <input type="hidden" name="testimonialid" id="testimonialid">
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
            $(document).on('click', '.testimonial_item_delete_btn', function () {
                var tId = $(this).data('id');
                $('#testimonialid').val(tId);
            });
        });
    </script>
@endsection