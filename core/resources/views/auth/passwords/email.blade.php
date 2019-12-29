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
                    <h1>Home - Reset Password</h1>
                </div>
            </div>
        </div>
    </section><!--Header section end-->

    <div class="login-section section-padding login-bg">
        <div class="container">
            <div class="row">
                @if(session()->has('success'))
                    <h4 class="text-center"><span class="alert alert-success" style="padding-bottom: 5px;">{{session()->get('success')}}</span></h4>
                @elseif(session()->has('alert'))
                    <h4 class="text-center"><span class="alert alert-danger" style="padding-bottom: 5px;">{{session()->get('alert')}}</span></h4>
                @endif
                    <div class="col-md-8 col-md-offset-2 ">
                        <div class="main-login main-center">
                            <h3 class="text-uppercase text-center">Reset Password</h3>
                            <form class="form-horizontal" method="post" action="{{route('forgot.pass')}}">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="password" class="cols-sm-2 control-label text-left">Password</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required/>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.a-alert', function (e) {
                e.preventDefault();
                $(this).parent().remove();
            }) ;
        });
    </script>
@endsection
