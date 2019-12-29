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
						<h2 class="breadcrumb-color">Coin Pay</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
	@php
		$form = Session::get('form');
	$bcoin = Session::get('bcoin');
	$amon= Session::get('amount');
	@endphp
	<section class="blog-section blog-section1 section-padding section-bg-clr">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
	<div class="panel-body text-center">
			<h1>{{$gset->currency_symbol}} {{$amon}}
					<i class="fa fa-exchange"></i> <i class="fa fa-bitcoin"></i> {{ $bcoin }}</h1>

		<br/>

		<p>{!! $form !!}</p>
		</div>
	</div>
			</div>
		</div>
	</section>

@endsection