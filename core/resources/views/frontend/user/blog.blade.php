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
                        <h2 class="breadcrumb-color">Latest Blog</h2>
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
                    <div class="blog-list blog-list1">
                        <div class="blog-thumb">
                            <img src="{{asset('assets/frontend/upload/images/blog/')}}/{{$blog->image}}" alt="blog" style="width: 555px; height: 350px">
                            <div class="blog-overlay">
                            </div>
                            <div class="blog-overlay-icon">
                                <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
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
            <div class="text-center">
          {{$blogs->render()}}
            </div>
        </div>
    </section>
    <!--==================================
   ===== Blog Section End ===========
   ===================================-->
@endsection
