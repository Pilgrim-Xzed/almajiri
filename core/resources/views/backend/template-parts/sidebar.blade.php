<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"></div>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('subscribers')}}" class="nav-link">
                    <i class="icon-user-follow"></i>
                    <span class="title">Subscribers</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Volunteer Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{route('volunteer.list')}}" class="nav-link ">
                            <span class="title">Volunteer List</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('voluteer.pendinglist')}}" class="nav-link ">
                            <span class="title">Pending Volunteer List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="{{route('gateway.index')}}" class="nav-link ">
                    <i class="icon-list"></i>
                    <span class="title">Gateway List</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Deposit</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{route('deposit.list')}}" class="nav-link ">
                            <span class="title">Depositor List</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('pendingDeposite.list')}}" class="nav-link ">
                            <span class="title">Pending Deposit List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-magic-wand"></i>
                    <span class="title">Website Controls</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{route('general.index')}}" class="nav-link nav-toggle">
                            <span class="title">General Settings</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('email.index')}}" class="nav-link nav-toggle">
                            <span class="title">Email Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-screen-desktop"></i>
                    <span class="title">Interface Controls</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{route('logoIcon.index')}}" class="nav-link ">
                            <span class="title">Logo, Icons and BreadCrumb Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('menu.index')}}" class="nav-link ">
                            <span class="title">Menu Manager</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('slider.index')}}" class="nav-link ">
                            <span class="title">Slider Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('whowe.index')}}" class="nav-link ">
                            <span class="title">Who We Section</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">About Us Settings</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('about.index')}}" class="nav-link ">
                                    <span class="title">About US</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('history')}}" class="nav-link ">
                                    <span class="title">Our History</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('sponsor.list')}}" class="nav-link ">
                            <span class="title">Sponsor Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('testimonial')}}" class="nav-link ">
                            <span class="title">Testimonial Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('social.index')}}" class="nav-link ">
                            <span class="title">Social Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('donate.index')}}" class="nav-link ">
                            <span class="title">Donate Now Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('cause.index')}}" class="nav-link ">
                            <span class="title">Cause Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('event.index')}}" class="nav-link ">
                            <span class="title">Event Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('blog.index')}}" class="nav-link ">
                            <span class="title">Blog Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('section.index')}}" class="nav-link ">
                            <span class="title">Sections Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('contact.index')}}" class="nav-link ">
                            <span class="title">Contact Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('footer.index')}}" class="nav-link ">
                            <span class="title">Footer Text</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
