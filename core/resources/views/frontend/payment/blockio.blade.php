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
                        <h2 class="breadcrumb-color">Block IO</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    <section class="blog-section blog-section1 section-padding section-bg-clr">
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    @php
                        $amount = Session::get('amount');
                        $bcoin = Session::get('bcoin');
                        $sendadd = Session::get('sendadd');
                        $qrurl = Session::get('qrurl');
                    @endphp
                    <div  class="col-md-8 col-md-offset-2 text-center">

                        <h1>{!! $gset->currency_symbol !!} {{$amount}}
                            <i class="fa fa-exchange"></i> <i class="fa fa-bitcoin"></i> {{ $bcoin }}</h1>
                        <br><br><br>
                        <h3> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }} BTC</span> <br><br>
                            TO <span style="color: green"> {{ $sendadd}}</span> <br></h3>
                        <br><br>
                        {!! $qrurl !!}
                        <h2 style="font-weight:bold;">SCAN TO SEND</h2>

                        <br><br>
                        <h4 style="color: red;"> ** Minimum 3 confirmations  Required to Credit your account.</h4>
                        <br/>

                    </div>


                </div>
            </div>
        </div>
    </div>
        </div>
    </section>
@endsection