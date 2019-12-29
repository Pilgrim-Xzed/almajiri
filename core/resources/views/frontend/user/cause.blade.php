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
                        <h2 class="breadcrumb-color">Our Causes</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    <!--==================================
===== Causes Section Start ===========
===================================-->

    <section class="causes-section causes-section1 section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>Causes <span>grid</span></h2>
                        <span>
                            <img src="{{asset('assets/frontend/upload/images/logo')}}/{{$logo->fav}}" alt="icon">
                        </span>
                        <p>
                            {!! $section->cause !!}
                        </p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                @foreach($causes as $cause)
                <div class="col-sm-6">
                    <!-- Causes List Start -->
                    @php
                        $raised = App\CauseDonor::where('status', 1)->where('cause_id', $cause->id)->sum('amount');
                    $rstyle = ($raised * 100)/ $cause->goal;
                    @endphp
                    <div class="causes-list causes-list1">
                        <div class="causes-thumb">
                            <img src="{{asset('assets/frontend/upload/images/cause')}}/{{$cause->image}}" alt="causes" style="height: 374px">
                        </div>
                        <div class="progress causes-progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$rstyle}}%;">
                                <span>{{$rstyle}}%</span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <div class="causes-amount">
                                <p>raised <br> {{$gset->currency_symbol}}{{$raised}} </p>
                                <span>goal <br>{{$gset->currency_symbol}}{{$cause->goal}}</span>
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
           {{$causes->render()}}
        </div>
    </section>

    <!--==================================
    ===== Causes Section End ===========
    ===================================-->
@endsection
