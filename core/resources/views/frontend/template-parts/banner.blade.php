<section class="banner-section">
    <div class="slider-option">
        <div id="slider" class="carousel slide wow fadeInDown" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @php
                    $i = 1;
                @endphp
                @foreach($sliders as $slider)
                    <div class="item @if($i == 1) active @endif">
                        <div class="slider-item">
                            <img src="{{asset('assets/frontend/upload/images/slider')}}/{{$slider->image}}"
                                 alt="slider">
                            <div class="slider-content-area">
                                <div class="container">
                                    <div class="slider-content">
                                        @php
                                            $lastSpacePosition = strrpos($slider->bold_text," ");
                                            $textWithoutLastWord =substr($slider->bold_text,0,$lastSpacePosition);

                                            $pieces = explode(' ', $slider->bold_text);
                                            $last_word = array_pop($pieces);
                                        @endphp
                                        <h1> {{$textWithoutLastWord}} <span>{{$last_word or ''}}</span></h1>
                                        <p>{{$slider->small_text}}</p>
                                        <!-- .slider-btn -->
                                    </div>
                                    <!-- .carousel-caption -->
                                </div>
                                <!-- .container -->
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
            <!-- .carosoul-inner -->
            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    <!-- .slider-option -->

</section>