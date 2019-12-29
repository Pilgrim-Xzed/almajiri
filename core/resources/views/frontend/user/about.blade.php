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
                        <h2 class="breadcrumb-color">About Us</h2>
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
                <div class="col-md-6 col-sm-12">
                    <div class="about-us">
                        <h3>{{$about->title}}</h3>
                        {!! $about->description !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="history-us">

                        <div class="history-content">
                            <!-- Swiper -->
                            <div class="swiper-container history-container">
                                <span>history</span>
                                <div class="swiper-wrapper">
                                    @foreach($histories as $history)
                                    <div class="swiper-slide">
                                        <div class="history-text">

                                            <h6>{{$history->title}}</h6>

                                            {!! $history->text !!}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination "></div>
                            </div><!-- client container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
