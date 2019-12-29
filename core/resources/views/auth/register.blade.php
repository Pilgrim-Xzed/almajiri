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
                    <h1>Home - Registeration</h1>
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
                        <h3 class="text-uppercase text-center">Register</h3>
                        <form class="form-horizontal" method="post" action="{{route('register')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label text-left">Your First Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="first_name" id="first_name"  placeholder="Enter Your First Name"/>
                                    </div>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label text-left">Your Last Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Enter Your Last Name"/>
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label text-left">Your Username</label>
                                <div class="cols-sm-10">
                                    <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Enter Your Username"/>
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label text-left">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="email" id="email"  placeholder="Enter Your Email"/>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label text-left">Confirm Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="Enter your Password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Register</button>
                                <a style="padding-top: 5px;" href="{{route('login')}}" class="pull-right">Already has an Account?</a>
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