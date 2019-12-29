@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('volunteer.list')}}"> Back </a>
@endsection
@section('title', 'Send EMail')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('volunteer.send')}}" method="post" novalidate>
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label for="form_control_1"><b>Subject</b></label>
                                <input type="text" name="subject" class="form-control" id="subject" required>
                                <span class="help-block">Email Subject goes here...</span>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Message</b></label>
                                <textarea name="msg" style="width: 100% !important; display: inherit;"
                                          id="msg" rows="20" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn green btn-block btn-lg">
                                    <i class="fa fa-mail-reply"></i> Send
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