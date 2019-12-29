<!DOCTYPE html>
<link rel="shortcut icon" type="image/png" href="{{asset('/assets/frontend/upload/images/logo')}}/{{$logo->fav}}" sizes="30x30">
<html lang="en" class="ie9 no-js">
<head>
    <meta charset="utf-8"/>
    <title>{{$gset->title}}</title>
    @include('backend.template-parts.meta')
    @include('backend.template-parts.style')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                'X-CSRF-Token' : "{{csrf_token()}}"
            })
        });
    </script>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{route('admin.dashboard')}}">
                <img src="{{asset('/assets/frontend/upload/images/logo')}}/{{$logo->logo}}" alt="logo" class="logo-default"
                     style="max-width: 100px; max-height: 40PX; margin-top: 4px;"/> </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        @include('backend.template-parts.topmenu')
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
@include('backend.template-parts.sidebar')
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <h3 class="page-title uppercase bold"> @yield('title')
                    @section('addNewButon')
                    @show
                </h3>
            </div>
            @section('body')
            @show
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
@include('backend.template-parts.footer')
@include('backend.template-parts.script')
<script>
    {{$contact->script}}
</script>
</body>
</html>