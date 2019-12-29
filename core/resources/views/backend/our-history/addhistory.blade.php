@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('history')}}"> Back </a>
@endsection
@section('title', 'Create history')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('store.history')}}" method="post" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label for="form_control_1"><b>Title</b></label>
                                <input type="text" name="history_title" class="form-control" id="history_title">
                                <span class="help-block">History title goes here...</span>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Description(Maximum 350 Characters)</b></label>
                                <textarea name="history_text" style="width: 100% !important; display: inherit;"
                                          id="history_text" rows="8" maxlength="350"></textarea>
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