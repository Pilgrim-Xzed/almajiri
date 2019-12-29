<title>{{$gset->title}}</title>
@include('backend.template-parts.style')
<body class=" login">
<style>
    .farem:before{
        float: left;
        margin: 5px;
    }
</style>
<div class="menu-toggler sidebar-toggler"></div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="../assets/pages/img/logo-big.png" alt=""/> </a>
</div>
@if(session()->has('message'))
    <h4 class="text-center"><span class="alert" style="background-color: #3FABA4; color: #fff;">{{session()->get('message')}}</span></h4>
@elseif(session()->has('alert'))
    <h4 class="text-center"><span class="alert" style="background-color: red; color: #fff;">{{session()->get('alert')}}</span></h4>
@endif
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{route('admin.login')}}" method="post">
        {{csrf_field()}}
        <h3 class="form-title font-green">Sign In</h3>
        <div class="alert alert-danger display-hide">
        </div>
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="Username" name="username"/>
            @if ($errors->has('username'))
                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Passord</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Password" name="password"/>
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-actions text-center">
            <button type="submit" class="btn btn-block green uppercase">Login</button>
        </div>
        <div class="create-account">
            <p>
                {{$footer->heading}}
            </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>
@include('backend.template-parts.script')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.a-alert', function (e) {
            e.preventDefault();
            $(this).parent().remove();
        }) ;
    });
</script>
</body>