<header class="header-section">
    <!-- Header top start -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-wrapper">
                        <!-- Header section start -->
                        <div class="header-top-section">
                            <!-- header top left start -->
                            <div class="header-top-left">
                                <ul>
                                    <li>
                                        <i class="fa fa-envelope-o" aria-hidden="true"> </i>
                                        <p>
                                            <a href="contact.html">{{$contact->email}}</a>
                                        </p>
                                    </li>

                                    <li>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <P>{{$contact->mobile}}</P>
                                    </li>

                                </ul>

                            </div>
                            <!-- Header top left end -->

                            <!-- Header top right start -->
                            <div class="header-top-right">
                                <ul class="social-link-list  social-link-list1">
                                    @foreach($socials as $social)
                                        <li><a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a></li>
                                    @endforeach
                                </ul>

                            </div>
                            <!-- Header top right end -->
                        </div>
                        <!-- Header section end -->
                    </div>
                    <!-- section-wrapper -->
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->

    <!-- Header bottom start -->
    <div class="header-bottom header header-wrapper">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-menu">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img
                                            src="{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->logo}}"
                                            alt="logo"></a>
                            </div>

                            <!-- Collect the nav links, forms, and oth
                                er content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav menu-click">
                                    <li class="@if(Request::url() == url('/')) menu-active @endif"><a class="page-scroll" href="{{route('home')}}">Home <span
                                                    class="sr-only">(current)</span></a></li>
                                    <li><a class="page-scroll" href="{{route('about')}}">about us</a></li>
                                    @foreach($menus as $menu)
                                        <li><a class="page-scroll" href="{{route('page',$menu->id)}}">{{$menu->name}}</a></li>
                                    @endforeach
                                    <li><a class="page-scroll" href="{{route('cause')}}">Causes</a></li>
                                    <li><a class="page-scroll" href="{{route('event')}}">Event</a></li>
                                    <li><a class="page-scroll" href="{{route('blog')}}">Blog</a></li>
                                    <li><a class="page-scroll" href="{{route('contact')}}">contact</a></li>
                                </ul>
                                <div class="donate-button">
                                    <button type="button" data-toggle="modal" data-target="#donate-popup">donate<br> now
                                    </button>
                                </div>
                            </div><!-- /.navbar-collapse -->

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- header-bottom end -->
</header>
