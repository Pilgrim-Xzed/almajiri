@extends('backend.master')
@section('title', 'Sections Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('section.store')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="form_control_1"><b>Our Causes</b></label>
                                    <textarea class="form-control" name="cause" rows="8">{{$item->cause or ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Our Volunteer</b></label>
                                    <textarea class="form-control" name="volunteer" rows="8">{{$item->volunteer or ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Become Volunteer</b></label>
                                    <textarea class="form-control" name="be_volunteer" rows="8">{{$item->be_volunteer or ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Who Talk About Us</b></label>
                                    <textarea class="form-control" name="who_talk" rows="8">{{$item->who_talk or ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Upcoming Events</b></label>
                                    <textarea class="form-control" name="event" rows="8">{{$item->event or ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Latest Blogs</b></label>
                                    <textarea class="form-control" name="blog" rows="8">{{$item->blog or ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Our Sponsors</b></label>
                                    <textarea class="form-control" name="sponsor" rows="8">{{$item->sponsor or ''}}</textarea>
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
@endsection