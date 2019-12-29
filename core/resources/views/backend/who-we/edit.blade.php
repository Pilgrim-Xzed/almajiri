@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('whowe.index')}}"> Back </a>
@endsection
@section('title', 'Edit WhoWe Section')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('update.whowe', $who->id)}}" method="post" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label for="logo"><b>Icon</b></label>
                                <div class="input-group">
                                    <span class="input-group-addon">fa</span>
                                    <input id="social_icon" type="text" class="form-control socioicon"
                                           name="social_icon" value="{{$who->icon}}"
                                           placeholder="Click here...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Title</b></label>
                                <input type="text" name="who_title" class="form-control" id="who_title" value="{{$who->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Description(Maximum 300 Characters)</b></label>
                                <textarea name="who_text" style="width: 100% !important; display: inherit;"
                                          id="who_text" rows="8" maxlength="300" required>{{$who->description}}</textarea>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('focus', '.socioicon', function () {
                $('.socioicon').iconpicker();
            });
        });
    </script>
@endsection