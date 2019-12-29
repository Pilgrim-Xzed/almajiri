<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$gset->title}}</title>
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->fav}}">
    @include('frontend.template-parts.style')
    <link href="{{ asset('assets/frontend/css/color.php?color=') }}{{ $gset->color }}" rel="stylesheet">
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                'X-CSRF-Token' : "{{csrf_token()}}"
            })
        });
    </script>
</head>
<body >
<!--preloader start-->
<div class="preloader">
    <ul >
        <li>
            <div class="loader"></div>
            <div class="loading"></div>
        </li>
        <li>
            <div class="loader"></div>
            <div class="loading"></div>
        </li>
        <li>
            <div class="loader"></div>
            <div class="loading"></div>
        </li>
    </ul>
</div>
<!--preloader end-->

<!--==================================
===== Header  Top Start ==============
===================================-->
@include('frontend.template-parts.header')
<!--==================================
===== header Section End ===========
===================================-->

<!--==================================
===== Banner Section End ===========
===================================-->
@section('Banner')
    @show
<!--==================================
===== Banner Section End ===========
===================================-->

@section('Body')
    @show

<!--==================================
===== Footer Section Start ===========
===================================-->
@include('frontend.template-parts.footer')
<!--==================================
===== Footer Section End ===========
===================================-->

<!--==================================
=============== Js File ===========
===================================-->
@include('frontend.template-parts.scripts')
</body>
</html>
