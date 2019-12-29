@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('menu.index')}}"> Back </a>
@endsection
@section('title', 'Add New Menu')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <form role="form" action="{{route('menu.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label for="form_control_1"><b>Menu Name</b></label>
                            <input type="text" name="page_title" class="form-control"
                                   id="form_control_1" placeholder="Enter Menu Name">
                            <span class="help-block">Your Menu Name goes here...</span>
                        </div>
                        <div class="form-group">
                            <label for="form_control_1"><b>Page Content</b></label>
                            <textarea name="page_content"
                                      style="width: 100% !important; display: inherit;"
                                      id="page_content" rows="15"></textarea>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn btn-block btn-lg green"><i
                                    class="fa fa-check"></i>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        });
    </script>
@endsection
