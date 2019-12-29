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
                        <h2 class="breadcrumb-color">Event</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->

    <!--==================================
     ===== Event Section Start ===========
     ===================================-->
    <section class="event-single-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="event-single-header">
                        <h2>{{$item->title}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="event-single-slider">
                        <!-- Swiper -->
                        <div class="swiper-container events-container">
                                    <div class="event-single-item">
                                        <img src="{{asset('assets/frontend/upload/images/event')}}/{{$item->image}}" alt="events">
                                    </div>
                        </div>
                    </div>
                    <div class="event-single-details">
                        <h4>event details</h4>
                        <div class="event-single-details-item">
                            <ul>
                                <li>
                                    <p>Topic :</p>
                                    <span>{{$item->topic}}</span>
                                </li>
                                <li>
                                    <p>Location : </p>
                                    <span>{{$item->location}}</span>
                                </li>
                                <li>
                                    <p>Start Date : </p>
                                    <span>{{date('d M Y', strtotime($item->start_date))}}</span>
                                </li>
                                <li>
                                    <p>End Date : </p>
                                    <span>{{date('d M Y', strtotime($item->end_date))}}</span>
                                </li>
                                <li>
                                    <p>Time :</p>
                                    <span>{{$item->time}}</span>
                                </li>
                            </ul>
                            <p>Share :</p>
                            <span id="share"></span>
                        </div>
                    </div>
                    <div class="event-single-organizer event-single-details">
                        <h4>Organizer</h4>
                        <div class="event-single-organizer-item event-single-details-item">
                            <ul>
                                <li>
                                    <p>Organized by : </p>
                                    <span>{{$item->organized_by}}</span>
                                </li>
                                <li>
                                    <p>Mobile : </p>
                                    <span>{{$item->phone}}</span>
                                </li>
                                <li>
                                    <p>Email : </p>
                                    <span>{{$item->email}}</span>
                                </li>
                                <li>
                                    <p>Website : </p>
                                    <span><a href="{{$item->website}}" style="color: #737271">{{$item->website}}</a></span>
                                </li>
                                <li>
                                    <p>Address : </p>
                                    <span>{{$item->address}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="event-single-desc">
                        <h4>event description</h4>
                     {!! $item->description !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <aside>
                        <div class="widget widget-register">
                            <ul id="countdown" class="widget-countdown">
                                <li class="clock-item"><span class="count-number days"></span><p>Days</p></li>
                                <li class="clock-item"><span class="count-number hours"></span><p>Hours</p></li>
                                <li class="clock-item"><span class="count-number minutes"></span><p>Min</p></li>
                                <li class="clock-item"><span class="count-number seconds"></span><p>Sec</p></li>
                            </ul>
                        </div>
                        <div class="widget widget-categories">
                            <h4>Events list</h4>
                            <ul>
                                @foreach($events as $event)
                                <li>
                                    <a href="{{route('single.event', $event->id)}}">{{$event->title}}</a>
                                </li>
                                    @endforeach
                            </ul>

                        </div>
                    </aside>
                </div>
            </div>
        </div>

    </section>
    <!--==================================
    ===== Event Section End ===========
    ===================================-->
    <script type="text/javascript">
        $(document).ready(function () {
        var countdown = $('#countdown');
        var date = {{date('m', strtotime($item->start_date))}} + '/' + {{date('d', strtotime($item->start_date))}} + '/' + {{date('Y', strtotime($item->start_date))}}
        countdown.countdown({
            date: date,
            offset: +2,
            day: 'Day',
            days: 'Days'
        });
            $("#share").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
            });
        });
    </script>
@endsection
