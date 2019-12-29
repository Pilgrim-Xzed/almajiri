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
                        <h2 class="breadcrumb-color">Blog Single</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->

    <!--==================================
    ===== Blog Single Section Start ===========
    ===================================-->
    <section class="blog-single-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-single-content details-content">
                        <div class="blog-single-desc">
                            <div class="blog-single-thumb"><img src="{{asset('assets/frontend/upload/images/blog')}}/{{$post->image}}" alt="blog"></div>
                            <div class="blog-single-header">
                                <h4>{{$post->title}}</h4>
                            </div>
                            {!! $post->body !!}
                        </div>
                    </div>
                    <div class="fb-comments" data-href="{{request()->url()}}" data-numposts="5" data-width="755" data-parent="true"></div>
                </div>

                <div class="col-md-4">
                    <aside>
                        <div class="widget widget-categories">
                            <h4>Leatest Posts</h4>
                            <ul>
                                @foreach($posts as $singlepost)
                                <li>
                                    <a href="{{route('post', $singlepost->id)}}">{{$singlepost->title}}</a>
                                </li>
                                    @endforeach
                            </ul>

                        </div>
                    </aside>
                </div>
            </div>
            <span id="blog-share"></span>
        </div>
    </section>
    <!--==================================
    ===== Blog Section End ===========
    ===================================-->
    {!! $appid->app_id !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#blog-share").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
            });
        });
    </script>
@endsection
