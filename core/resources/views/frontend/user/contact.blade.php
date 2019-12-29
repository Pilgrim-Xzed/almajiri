@extends('frontend.master')
@section('Body')
    @include('frontend.template-parts.flash')
    @include('frontend.template-parts.error')
    <!--==================================
===== Breadcrumb Section Start ===========
===================================-->
    <section class="breadcrumb-section section-bg-clr5" style="background-image: url('{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->breadcrumb}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2 class="breadcrumb-color">Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->

    <!--==================================
    ===== Contact Section Start ===========
    ===================================-->

    <section class="contact-info section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="contact-info-list">
                        <div class="contact-info-thumb"><i class="fa fa-map-o" aria-hidden="true"></i></div>
                        <div class="contact-info-content">
                            <h4>Contact info</h4>
                            <p>{{$contact->location}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-info-list">
                        <div class="contact-info-thumb"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="contact-info-content">
                            <h4>business hours</h4>
                            <p>Monday-friday:10am to 6pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-info-list">
                        <div class="contact-info-thumb"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        <div class="contact-info-content">
                            <h4>Email</h4>
                            <p>{{$contact->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================================
    ===== Contact Section End ===========
    ===================================-->

    <!--==================================
    ===== Contact Form Section Start ===========
    ===================================-->

    <section class="contact-form-section contct-form-section1 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="contact-form">
                        <h2>get in touch</h2>
                        <form action="{{route('contact.email')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" placeholder="Your Subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Write Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================================
    ===== Contact Form Section End ===========
    ===================================-->
@endsection
