@extends('frontend.master')
@section('Body')
    <style>
        .farem:before{
            float: left;
            margin: 5px;
        }
    </style>
    <section class="breadcrumb-section contact-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>Home - Login</h1>
                </div>
            </div>
        </div>
    </section><!--Header section end-->
    <!--login section start-->
    <div class="login-section section-padding login-bg">
        <div class="container">
            <div class="row">
                @if(session()->has('message'))
                    <h4 class="text-center"><span class="alert alert-success" style="padding-bottom: 5px; padding-top: 5px;">{{session()->get('message')}}</span></h4>
                @elseif(session()->has('alert'))
                    <h4 class="text-center"><span class="alert alert-danger" style="padding-bottom: 5px; padding-top: 5px;">{{session()->get('alert')}}</span></h4>
                @endif
                <div class="col-md-8 col-md-offset-2 ">
                    <div class="main-login main-center">
                        <h3 class="text-uppercase text-center">Login</h3>
                        <form class="form-horizontal" method="post" action="{{route('login')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label text-left">Your Username</label>
                                <div class="cols-sm-10">
                                    <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Enter Username"/>
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label text-left">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Login</button>
                                <a style="padding-top: 5px;" href="{{route('password.request')}}" class="pull-right">Forgot my password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login section end-->
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.a-alert', function (e) {
                e.preventDefault();
                $(this).parent().remove();
            }) ;
        });
    </script>
@endsection



