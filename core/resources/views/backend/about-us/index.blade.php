@extends('backend.master')
@section('title', 'About Us Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('about.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label for="form_control_1"><b>Title</b></label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{$item->title or ' '}}">
                                <span class="help-block">Title goes here...</span>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Text</b></label>
                                <textarea name="about_text" style="width: 100% !important; display: inherit;"
                                          id="about_text" rows="20">{{$item->description or ' '}}</textarea>
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
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        });
    </script>
@endsection