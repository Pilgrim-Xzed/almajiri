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
                        <h2 class="breadcrumb-color">BitCoin</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    @php
        $bitcoin = Session::get('bitcoin');
    @endphp
    <section class="blog-section blog-section1 section-padding section-bg-clr">
        <div class="container">
            <div class="row">
    <div class="col-md-12 text-center">
        <h3>
            Please Send EXACTLY <span style="color:red">{{ $bitcoin['amount']}} </span>BTC <br>
            TO <span style="color:red">{{ $bitcoin['sendto']}} </span>
        </h3>
        <br>
        <br>
        <h2>SCAN TO SEND</h2>
        {!!  $bitcoin['code']  !!}
        <br>
        <br>
        <h3 style="color: red;">** 3 Confirmation Required To credited Your Account</h3>

    </div>
            </div>
        </div>
    </section>
@endsection