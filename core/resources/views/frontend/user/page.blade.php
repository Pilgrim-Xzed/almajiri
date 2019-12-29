@extends('frontend.master')
@section('Body')
    <!--==================================
===== Breadcrumb Section Start ===========
===================================-->
    <section class="breadcrumb-section section-bg-clr5" style="background-image: url('{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->breadcrumb}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2 class="breadcrumb-color">{{$item->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    <section class="about-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="about-us">
                        {!! $item->details !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection