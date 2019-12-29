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
                        <h2 class="breadcrumb-color">Cause</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    @php
        $perfect = Session::get('Perfect');
    @endphp
    <section class="blog-section blog-section1 section-padding section-bg-clr">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
    <form action="https://perfectmoney.is/api/step1.asp" method="POST" id="myform">
        <input type="hidden" name="PAYEE_ACCOUNT" value="{{ $perfect['value1'] }}">
        <input type="hidden" name="PAYEE_NAME" value="{{$gset->title}}">
        <input type='hidden' name='PAYMENT_ID' value='{{ $perfect['track'] }}'>
        <input type="hidden" name="PAYMENT_AMOUNT" value="{{ $perfect['amount'] }}">
        <input type="hidden" name="PAYMENT_UNITS" value="USD">
        <input type="hidden" name="STATUS_URL" value="{{route('pm.payment')}}">
        <input type="hidden" name="PAYMENT_URL" value="{{route('home')}}">
        <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
        <input type="hidden" name="NOPAYMENT_URL" value="{{route('home')}}">
        <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
        <input type="hidden" name="SUGGESTED_MEMO" value="Annonymous">
        <input type="hidden" name="BAGGAGE_FIELDS" value="IDENT"><br>
    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById("myform").submit();
    </script>
@endsection