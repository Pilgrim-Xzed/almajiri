@extends('backend.master')

@section('title', 'Dashboard')
@section('smallTitle', 'dashboard & statistics')
@section('body')
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row page-bar-btn">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$user}}">0</span>
                    </div>
                    <div class="desc"> Total Subscribers</div>
                </div>
                <a class="more" href="{{route('subscribers')}}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$pendingvol}}"></span>
                    </div>
                    <div class="desc"> Pending Volunteers</div>
                </div>
                <a class="more" href="{{route('voluteer.pendinglist')}}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow-mint">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$vol}}"></span>
                    </div>
                    <div class="desc"> Total Volunteers</div>
                </div>
                <a class="more" href="{{route('volunteer.list')}}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$pendingORders}}"></span>
                    </div>
                    <div class="desc"> New Donation</div>
                </div>
                <a class="more" href="{{route('pendingDeposite.list')}}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$acceptedorders}}"></span>
                    </div>
                    <div class="desc"> Accepted Donations</div>
                </div>
                <a class="more" href="{{route('deposit.list')}}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$orders}}"></span>
                    </div>
                    <div class="desc"> All Donations</div>
                </div>
                <a class="more" href="{{route('deposit.list')}}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
@endsection