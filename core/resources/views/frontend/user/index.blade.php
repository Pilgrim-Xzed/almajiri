@extends('frontend.master')
@section('Banner')
    @include('frontend.template-parts.banner')
@endsection
@section('Body')
    <!--==================================
===== Who We Section Start ===========
===================================-->
    <section class="who-section section-padding2 section-bg-clr">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <!-- Who Content Start -->
                    <div class="who-content">
                        <h2>who we <span>are</span></h2>
                        {!! str_limit($who->description, 650) !!}
                    </div>
                    <!-- Who Content End -->
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="row">
                        @foreach($whowe as $who)
                            <div class="col-md-4 col-sm-12">
                                <!-- Who List Start -->
                                <div class="who-list">
                                    <div class="who-thumb">
                                        <i class="fa {{$who->icon}}" aria-hidden="true"></i>
                                    </div>
                                    <div class="who-content">
                                        <h4>{{$who->title}}</h4>
                                        <ul>
                                            {!! $who->description !!}
                                        </ul>
                                    </div>
                                </div>
                                <!-- Who List End -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Who We Section End ===========
    ===================================-->

    <!--==================================
===== Causes Section Start ===========
===================================-->
    <section class="causes-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading section-heading1">
                        <h2>our <span>causes</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->cause !!}
                        </p>
                        <a href="{{route('cause')}}">see al causes</a>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                @foreach($causes as $cause)
                <div class="col-md-4 col-sm-6">
                    <!-- Causes List Start -->
                    @php
                        $raised = App\CauseDonor::where('status', 1)->where('cause_id', $cause->id)->sum('amount');
                    $rstyle = ($raised * 100)/ $cause->goal;
                    @endphp
                    <div class="causes-list">
                        <div class="causes-thumb">
                            <img src="{{asset('assets/frontend/upload/images/cause')}}/{{$cause->image}}" alt="causes" style="height: 170px;">
                        </div>
                        <div class="progress causes-progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$rstyle}}%;">
                                <span>{{$rstyle}}%</span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <div class="causes-amount">
                                <p>raised <br> {{$gset->currency_symbol}} {{$raised}}</p>
                                <span>goal <br>{{$gset->currency_symbol}} {{$cause->goal}}</span>
                            </div>
                            <div class="causes-text">
                                <h4>{{$cause->title}}</h4>
                                <div style="margin-bottom: 30px">
                                {!! str_limit($cause->description, 250) !!}
                                </div>
                                <a href="{{route('single.cause', $cause->id)}}">donate now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Causes List End -->
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--==================================
    ===== Causes Section End ===========
    ===================================-->

    <!--==================================
===== Counter Section Start ===========
===================================-->
    <section class="counter-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Counter List Start -->
                    <div class="counter-list">
                        <div class="counter-thumb"><i class="fa fa-bitbucket" aria-hidden="true"></i></div>
                        <div class="counter-content">
                            <h4 class="counter">{{$don}}</h4>
                            <p>donate</p>
                        </div>
                    </div>
                    <!-- Counter List End -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Counter List Start -->
                    <div class="counter-list">
                        <div class="counter-thumb"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <div class="counter-content">
                            <h4 class="counter">{{$vol}}</h4>
                            <p>volunteers</p>
                        </div>
                    </div>
                    <!-- Counter List End -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Counter List Start -->
                    <div class="counter-list">
                        <div class="counter-thumb"><i class="fa fa-calculator" aria-hidden="true"></i></div>
                        <div class="counter-content">
                            <h4 class="counter">{{$pro}}</h4>
                            <p>projects</p>
                        </div>
                    </div>
                    <!-- Counter List End -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Counter List Start -->
                    <div class="counter-list">
                        <div class="counter-thumb"><i class="fa fa-gift" aria-hidden="true"></i></div>
                        <div class="counter-content">
                            <h4 class="counter">{{$gif}}</h4>
                            <p>gifts</p>
                        </div>
                    </div>
                    <!-- Counter List End -->
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Counter Section End ===========
    ===================================-->

    <!--==================================
===== Our Volunters Start ===========
===================================-->
    <section class="volunters-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>our <span>volunters</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->volunteer !!}
                        </p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                @foreach($volunteers as $volunteer)
                <div class="col-md-4 col-sm-6">
                    <!-- Volunter List Start -->
                    <div class="volunter-list">
                        <!-- Volunter Thumb Start -->
                        <div class="volunter-thumb">
                            <img src="{{asset('assets/frontend/upload/images/volunteer')}}/{{$volunteer->image}}" alt="volunter">
                            <div class="volunter-overlay">
                                <ul>
                                    @if($volunteer->fb != null)
                                    <li><a href="{{$volunteer->fb}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if($volunteer->tw != null)
                                    <li><a href="{{$volunteer->tw}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                        @if($volunteer->ln != null)
                                    <li><a href="{{$volunteer->ln}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Volunter Thumb End -->
                        <!-- Volunter Content Start -->
                        <div class="volunter-content">
                            <h4>{{$volunteer->fname}} {{$volunteer->lname}}</h4>
                            <p>{{$volunteer->profession}}</p>
                        </div>
                        <!-- Volunter COntent End -->
                    </div>
                    <!-- Volunter List End -->
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--==================================
    ===== Our Volunters End ===========
    ===================================-->
    
    <!--==================================
===== Become Joining Section Start =====
===================================-->
    <section class="joining-section section-padding section-bg-clr2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-4" >
                    <!-- Section Heading Start -->
                    <div class="section-heading section-heading2">
                        <h2>Become <span>volunters</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->be_volunteer !!}
                        </p>
                        <div class="join-button">
                            <a data-toggle="modal" data-target="#be-volunteer">Join Now</a>
                        </div>

                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Become Joining Section End ======
    ===================================-->

    <!--==================================
    ===== WHO TALK ABOUT US Section Start ======
    ===================================-->
    <section class="clients-section section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>Who talk <span>about us</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->who_talk !!}
                        </p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- volunter List Start -->
                    <div class="become-list">
                        <!-- Swiper -->
                        <div class="swiper-container volunter-container">

                            <div class="swiper-wrapper">
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <!-- volunter Item Start -->
                                        <div class="become-item">
                                            <div class="become-item1">
                                                <div class="become-thumb">
                                                    <img src="{{asset('assets/frontend/upload/images/testimonial')}}/{{$testimonial->image}}"
                                                         alt="clients">
                                                </div>
                                                <div class="become-content">
                                                    <h4>{{$testimonial->name}}</h4>
                                                    <p>{{$testimonial->company}}</p>
                                                    <p>{{$testimonial->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- volunter Item End -->
                                    </div>
                                @endforeach
                            </div>

                            <!-- Add Pagination -->
                            <div class="swiper-pagination">

                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="swiper-button-prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <!-- volunter List End -->
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== WHO TALK ABOUT US Section End ===========
    ===================================-->

    <!--==================================
===== Upcoming Section Start ===========
===================================-->
    <section class="upcoming-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading section-heading1">
                        <h2>Upcoming <span>Events</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->event !!}
                        </p>
                        <a href="{{route('event')}}">see all events</a>
                    </div>
                    <!-- Section Heading End -->
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
        </div>
    </section>
    <!--==================================
    ===== Upcoming Section End ===========
    ===================================-->

    <!--==================================
    ===== Blog Section Start ===========
    ===================================-->
    <section class="blog-section section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>our <span>latest blogs</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->blog !!}
                        </p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-sm-6">
                        <!-- Blog List Start -->
                        <div class="blog-list">
                            <div class="blog-thumb">
                                <img src="{{asset('assets/frontend/upload/images/blog/')}}/{{$blog->image}}" alt="blog"
                                     style="width: 555px; height: 350px">
                                <div class="blog-overlay">
                                </div>
                                <div class="blog-overlay-icon">
                                    <a href="{{asset('assets/frontend/upload/images/blog/')}}/{{$blog->image}}" data-rel="lightcase"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-date">
                                    <div class="blog-date1">
                                        <p>{{date('d', strtotime($blog->created_at))}}</p>
                                        <p>{{date('M', strtotime($blog->created_at))}}</p>
                                        <p>{{date('y', strtotime($blog->created_at))}}</p>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <h3><a href="{{route('post', $blog->id)}}">{{$blog->title}}</a></h3>
                                    <p>{!!  str_limit($blog->body, 250) !!}</p>
                                    <a href="{{route('post', $blog->id)}}">read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- Blog List End -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--==================================
    ===== Blog Section End ===========
    ===================================-->

    <!--==================================
    ===== Sponsors Section Start ===========
    ===================================-->
    <section class=" sponsor-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>our <span>sponsers</span></h2>
                        <span><img src="{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->fav}}"
                                   alt="icon"></span>
                        <p>
                            {!! $section->sponsor !!}
                        </p>
                    </div><!-- section-heading -->
                    <div class="section-wrapper">
                        <div class="client-list">
                            <!-- Swiper -->
                            <div class="swiper-container client-container">
                                <div class="swiper-wrapper">
                                    @foreach($sponsors as $sponsor)
                                        <div class="swiper-slide">
                                            <div class="our-client"><a href="{{$sponsor->link}}" target="_blank"><img
                                                            src="{{asset('assets/frontend/upload/images/sponsors')}}/{{$sponsor->image}}"
                                                            alt="client"></a></div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next">

                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>

                                </div>
                                <div class="swiper-button-prev">
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                </div>
                            </div><!-- client container -->
                        </div><!-- client list-->
                    </div><!-- swiper wrapper -->
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </section><!-- section -->
    <!--==================================
    ===== Sponsors Section End ===========
    ===================================-->
@endsection