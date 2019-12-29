@extends('backend.master')
@section('title', 'SET EMAIL TEMPLATE')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bookmark"></i>Short Code
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> CODE</th>
                                <th> DESCRIPTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> 1</td>
                                <td>
                                    <pre>&#123;&#123;message&#125;&#125;</pre>
                                </td>
                                <td> Details Text From Script</td>
                            </tr>
                            <tr>
                                <td> 2</td>
                                <td>
                                    <pre>&#123;&#123;name&#125;&#125;</pre>
                                </td>
                                <td> Users Name. Will Pull From Database and Use in EMAIL text</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-body form">
            <form class="form-horizontal" action="{{route('email.store')}}" method="post" role="form">
                {{csrf_field()}}
                <div class="form-body">
                        <div class="form-group">
                            <label for="emailtemplate"><b>Email Sent From</b></label>
                            <input class="form-control input-lg" name="form_mail" type="text" value="{{$item->sender or ''}}">
                        </div>
                        <div class="form-group">
                            <label for="emailtemplate"><b>Email Template</b></label>
                            <textarea name="email_text" style="width: 100% !important; display: inherit;"
                                      id="email_text" rows="20">{!!  $item->email or '' !!}</textarea>
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
    <script type="text/javascript">
        $(document).ready(function(){
            bkLib.onDomLoaded(function() {
                nicEditors.allTextAreas()
            });
        });
    </script>
@endsection