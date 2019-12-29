@extends('backend.master')
@section('title', 'Contact Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('contact.store')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label for="form_control_1"><b>Email</b></label>
                                    <input type="text" name="contact_email" class="form-control" id="contact_email"
                                           value="{{$item->email or ' '}}">
                                    <span class="help-block">Your Email id goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label for="form_control_1"><b>Mobile</b></label>
                                    <input type="text" name="contact_mobile" class="form-control" id="contact_mobile"
                                           value="{{$item->mobile or ' '}}">
                                    <span class="help-block">Your Mobile Number goes here...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label for="form_control_1"><b>Location</b></label>
                                    <input type="text" name="contact_location" class="form-control"
                                           id="contact_location"
                                           value="{{$item->location or ' '}}">
                                    <span class="help-block">Your Location goes here...</span>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Live Chat Script (If You have any)</b></label>
                                    <textarea type="text" name="contact_script" class="form-control" rows="7">
                                    {!!  $item->script or '' !!}
                                    </textarea>
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
@endsection