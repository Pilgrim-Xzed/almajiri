@extends('backend.master')
@section('title', 'Footer Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('footer.store')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label for="form_control_1"><b>Heading</b></label>
                                    <input type="text" name="footer_head" class="form-control" id="footer_head"
                                           value="{{$item->heading or ' '}}">
                                    <span class="help-block">Footer Heading goes here...</span>
                                </div>
                                <div class="form-group">
                                    <label for="form_control_1"><b>Text</b></label>
                                    <textarea name="footer_text" style="width: 100% !important; display: inherit;"
                                              id="footer_text" rows="20">{{$item->text or ' '}}</textarea>
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