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
                        <h2 class="breadcrumb-color">Upcomig Events</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    <!--==================================
   ===== Blog Section Start ===========
   ===================================-->

    <section class="blog-section blog-section1 section-padding section-bg-clr">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>Upcoming <span>Events</span></h2>
                        <span>
                          <img src="{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->event !!}
                        </p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                    @foreach($events as $event)
                        <div class="col-sm-6">
                            <!-- Upcoming List Start -->
                            <div class="upcoming-list">
                                <div class="upcoming-thumb">
                                    <img src="{{asset('assets/frontend/upload/images/event')}}/{{$event->image}}" alt="events">
                                    <div class="upcoming-overlay">
                                        <span>{{date('d', strtotime($event->start_date))}}</span>
                                        <p>{{date('M Y', strtotime($event->start_date))}}</p>
                                    </div>
                                </div>
                                <div class="upcoming-content">

                                    <div class="upcoming-text">
                                        <h4><a href="{{route('single.event', $event->id)}}">{{$event->title}}</a></h4>
                                        <p>{!! str_limit($event->description, 250) !!}</p>
                                        <div class="upcomming-readmore">
                                            <a href="{{route('single.event', $event->id)}}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Upcoming List End -->
                        </div>
                    @endforeach
            </div>
            <div class="text-center">
                {{$events->render()}}
            </div>
        </div>
    </section>
    <!--==================================
   ===== Blog Section End ===========
   ===================================-->
@endsection
