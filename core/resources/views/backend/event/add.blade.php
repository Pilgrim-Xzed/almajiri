@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('event.index')}}"> Back </a>
@endsection
@section('title', 'Create Event')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('event.store')}}" method="post" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>Title</b></label>
                                        <input type="text" name="title" class="form-control" id="title" required>
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
                                                                <input id="image" type="file" name="image" required> </span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_control_1"><b>Topic</b></label>
                                    <input type="text" name="topic" class="form-control" id="topic" required>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>Location</b></label>
                                        <input type="text" name="location" class="form-control" id="location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="form_control_1"><b>Start Date</b></label>
                                    <input type="date" name="start_date" class="form-control"
                                           id="start_date" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>End Date</b></label>
                                        <input type="date" name="end_date" class="form-control"
                                               id="end_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>Time</b></label>
                                        <input type="text" name="time" class="form-control" id="time">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>Organizer Name</b></label>
                                        <input type="text" name="organize_by" class="form-control" id="organize_by">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>Organizer Email</b></label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="form_control_1"><b>Organizer Phone No.</b></label>
                                        <input type="text" name="phone" class="form-control" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Organizer Address</b></label>
                                <textarea name="address" style="width: 100% !important; display: inherit;"
                                          id="address" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Organizer Website</b></label>
                                <input type="text" name="website" class="form-control" id="website">
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Description</b></label>
                                <textarea name="description" style="width: 100% !important; display: inherit;"
                                          id="description" rows="20"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn green btn-block btn-lg">
                                    <i class="fa fa-check"></i> Submit
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
            nicEditors.editors.push(
                new nicEditor().panelInstance(
                    document.getElementById('description')
                )
        );
        });
    </script>
@endsection