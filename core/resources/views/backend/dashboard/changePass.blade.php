@extends('backend.master')
@section('title', 'Dashboard')
@section('smallTitle', 'dashboard & statistics')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('admin.updatepass')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label for="curPass"><b>Current Password</b></label>
                                    <input type="password" name="cur_pw" class="form-control" id="cur_pw">
                                    <span class="help-block">Type your current Password...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label for="newPass"><b>New Password</b></label>
                                    <input type="password" name="new_pw" class="form-control" id="new_pw">
                                    <span class="help-block">Type your New Password...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label for="conPass"><b>Confirm Password</b></label>
                                    <input type="password" name="con_pw" class="form-control" id="com_pw">
                                    <span class="help-block">confirm your New Password...</span>
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