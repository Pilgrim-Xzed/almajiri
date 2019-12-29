@extends('backend.master')
@section('title', 'My Profile')
@section('smallTitle', 'dashboard & statistics')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('admin.updateprofile')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label for="curPass"><b>Name:</b></label>
                                <input type="text" name="admin_name" class="form-control" value="{{$item->name}}">
                                <span class="help-block">Type your Name...</span>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="newPass"><b>Email:</b></label>
                                <input type="text" name="admin_email" class="form-control" value="{{$item->email}}">
                                <span class="help-block">Type Email ID...</span>
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