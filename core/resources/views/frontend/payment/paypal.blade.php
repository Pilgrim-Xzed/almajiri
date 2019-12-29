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
    <section class="blog-section blog-section1 section-padding section-bg-clr">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
            <form action="https://secure.paypal.com/cgi-bin/webscr" method="post" id="myform">
                {{--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="myform">--}}
                @php
                    $paypal = Session::get('Paypal');
                @endphp
                <input type="hidden" name="cmd" value="_xclick" />
                <input type="hidden" name="business" value="{{$paypal['sendto']}}" />
                <input type="hidden" name="cbt" value="{{$gset->title}}" />
                <input type="hidden" name="currency_code" value="USD" />
                <input type="hidden" name="quantity" value="1" />
                <input type="hidden" name="item_name" value="Add Money To {{$gset->title}} Account" />
                <input type="hidden" name="custom" value="{{$paypal['track']}}" />
                <input type="hidden" name="amount" value="{{$paypal['amount']}}" />
                <input type="hidden" name="return" value="{{route('home')}}"/>
                <input type="hidden" name="cancel_return" value="{{route('home')}}" />
                <input type="hidden" name="notify_url" value="{{route('paypal.payment')}}" />
            </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById("myform").submit();
    </script>
@endsection