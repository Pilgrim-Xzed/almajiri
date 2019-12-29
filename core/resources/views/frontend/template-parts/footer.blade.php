@include('frontend.template-parts.flash')
@include('frontend.template-parts.error')
<style>
    .credit-card-box .form-control.error {
        border-color: red;
        outline: 0;
        box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
    }
    .credit-card-box label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }
</style>
<footer class="footer-section ">
    <div class="container">
        <!-- Footer Support start -->
        <div class="footer-support">
            <p><a data-toggle="modal" data-target="#be-volunteer">help by become a volunteer</a></p>
            <p><a href="{{route('cause')}}">help by donate for causes</a></p>
        </div>
        <!-- Footer Support End -->
        <div class="footer-list">
            <div class="row">
                <!-- footer-list start -->
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <!-- footer item start -->
                    <div class="footer-item">
                        <div class="footer-header">
                            <img src="{{asset('assets/frontend/upload/images/logo')}}/{{$logo->logo}}" alt="footer">
                        </div><!-- footer header-->

                        <div class=" footer-widget footer-about ">
                            <p>{!! str_limit($about->description, 60) !!}</p>
                            <a href="{{route('about')}}">read more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            <ul>
                                <li><i class="fa fa-home"></i><span>{{$contact->location}}</span></li>
                                <li><i class="fa fa-phone"></i><span>{{$contact->mobile}}</span></li>
                                <li><i class="fa fa-envelope"></i><span>{{$contact->email}}</span></li>
                            </ul>

                        </div><!-- footer list -->
                    </div>
                    <!-- footer item end -->
                </div><!-- col-md-6 -->


                <div class="col-xs-12 col-sm-6 col-md-3">
                    <!-- footer item start -->
                    <div class="footer-item">
                        <div class="footer-header">
                            <h4>pages</h4>
                        </div><!-- footer header-->

                        <div class="footer-widget footer-widget-list">
                            <ul>
                                <li>
                                    <a href="{{route('home')}}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('about')}}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <span>about us</span>
                                    </a>
                                </li>
                                @foreach($menus as $menu)
                                    <li>
                                        <a href="{{route('page', Crypt::encrypt($menu->id))}}">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            <span>{{$menu->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{route('contact')}}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <p>contact us</p>
                                    </a>

                                </li>
                            </ul>
                        </div><!-- footer list -->
                    </div>
                    <!-- footer item end -->

                </div><!-- col-md-6 -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <!-- footer item start -->
                    <div class="footer-item">
                        <div class="footer-header">
                            <h4>useful links</h4>
                        </div><!-- footer header-->
                        <!-- footer hosting start -->
                        <div class="footer-widget footer-widget-list">
                            <ul><li>
                                    <a href="{{route('cause')}}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <span>Causes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('event')}}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <span>events</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('blog')}}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <span>Blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- footer list  -->
                    </div>
                    <!-- footer item end -->
                </div><!-- col-md-6 -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <!-- footer item start -->
                    <div class="footer-item">
                        <div class="footer-header">
                            <h4>email newsletters</h4>
                        </div><!-- footer header -->
                        <p id="error_show"></p>
                        <!-- footer newsletter -->
                        <div class="footer-widget footer-newsletter">

                            <form id="subscriptionform" method="post">
                                {{csrf_field()}}
                                <div class="form-field">
                                    <input type="text" name="name" placeholder="Name">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="form-field">
                                    <input type="email" name="email" placeholder="E-mail Address">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <input type="submit" value="Subscribe Now" name="submit">
                            </form>
                        </div>
                        <!-- footer newsletter-->
                    </div>
                    <!-- footer item end -->

                </div><!-- col-md-6 -->
            </div>
            <!-- Footer list end-->
        </div>  <!-- footer-content -->
    </div>

    <div class="clearfix"></div>


    <!-- Footer copyright -->
    <div class="footer-copyright">
        <div class="footer-copyright1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{$footer->heading}}</p>
                    </div>

                </div><!-- row -->
            </div><!-- container -->
        </div>  <!-- Footer copyright1 -->
    </div><!-- Footer copyright -->
    <div id="back-to-top" class="scroll-top back-to-top" data-original-title="" title="">
        <i class="fa fa-angle-up"></i>
    </div>
</footer><!-- Footer -->
<div class="modal fade pop-box" id="be-volunteer" tabindex="-1" role="dialog" aria-labelledby="donate-popup"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Donation div-->
            <div class="donation-div">
                <div class="donation-plz">
                    <form id="volunteer-form" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <!--Form Portlet-->
                        <div class="donate-popup">
                            <div id="error_vol"></div>
                            <h3>Join With Us</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo"></label>
                                        <div class="fileinput" data-provides="fileinput">
                                            <div class="input-group select_image">
                                                <div class="form-control input-lg" data-trigger="fileinput">
                                                    <i class="fa fa-camera fileinput-exists"> Your Image</i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input id="image" type="file" name="image"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Your phone No." required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="address" placeholder="Your Address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="profession" placeholder="Your profession" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="fb" placeholder="Your Facebook Profile Link(if You have any)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="tw" placeholder="Your Twitter Profile Link(if You have any)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="ln" placeholder="Your Linkedin Profile Link(if You have any)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" placeholder="Discribe Yourself" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group donate-submit">
                                <button type="submit">Join Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade pop-box" id="donate-popup" tabindex="-1" role="dialog" aria-labelledby="donate-popup"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="overflow: hidden;">
            <!--Donation div-->
            <div class="donation-div">
                <div class="donation-plz">

                    <form method="post" id="donate-form">
                        {{csrf_field()}}
                        <!--Form Portlet-->
                        <div class="donate-popup" id="don-pop">
                            <h3>Enter your donation amount</h3>
                            <div class="form-group">
                                @foreach($donates as $donate)
                                <div class="radio-select">
                                    <input type="radio" name="sel-amount" class="amount-1" data-val="{{$donate->amount}}">
                                    <div class="radio-select-text">
                                        <label for="amount-1"><span>donate</span>{{$gset->currency_symbol}}{{$donate->amount}}</label>
                                        <p>{!! $donate->description !!}</p>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                            <div class="form-group donate-submit">
                                <h6>enter custom amount</h6>
                                <input type="text" id="damount" name="damount" placeholder="">
                                <i>{{$gset->currency_symbol}}</i>
                                <button type="button" id="donate-next">Donate Now</button>
                            </div>
                        </div>
                            <div id="deposit-meth" style="display: none; overflow: hidden;">
                                <div class="row" style="overflow: hidden; padding: 70px;">
                                    @foreach($gates as $gate)
                                        @if($gate->status == 1)
                                            <div class="col-md-6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        {{$gate->name}}
                                                    </div>
                                                    <div class="panel-body text-center">
                                                        <img src="{{asset('assets/backend/upload/images/payment')}}/{{$gate->gateimg}}"
                                                             class="img-responsive" style="width:100%; height: 120px;"
                                                             alt="Pic">
                                                        <br>
                                                        <button type="button"
                                                                class="btn btn-success btn-block bold deposit_button"
                                                                id="btn_dep"
                                                                data-id="{{$gate->id}}"
                                                                data-charge="{{$gate->fix_charge}}"
                                                                data-percent="{{$gate->percent_charge}}"
                                                                data_conversion="{{$gset->conversion_rate}}"
                                                                data-admincharge="{{$gset->charge}}"
                                                                data-btcrate="{{$btcrt}}"
                                                                data-val="{{$gate->val1}}"
                                                                data-currency="{{$gset->currency_text}}">
                                                            SELECT
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="text-center" id="dep-form" style="display: none">
                                <h4 class="text-center" id="dep-text"></h4>
                            <button type="submit" id="depo-now" class="btn btn-success btn-lg" style="outline: none; margin-bottom: 20px">
                                    <i class="fa fa-bank"></i> Donate NOW
                                </button>
                            </div>
                    </form>
                    <div class="col-xs-12 col-md-8 col-md-offset-2" id="st-form" style="padding-top: 20px; display: none; overflow: hidden;">
                        <div class="well">
                            <h1 class="text-center">Stripe Payment</h1>
                            <hr/>
                            <form role="form" id="payment-form" method="POST" action="{{route('stripe.payment')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="cardNumber">CARD NUMBER</label>
                                            <div class="input-group">
                                                <input
                                                        type="tel"
                                                        class="form-control input-lg"
                                                        name="cardNumber"
                                                        placeholder="Valid Card Number"
                                                        autocomplete="off"
                                                        required autofocus
                                                />
                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-xs-7 col-md-7">
                                        <div class="form-group">
                                            <label for="cardExpiry">EXPIRATION DATE</label>
                                            <input
                                                    type="tel"
                                                    class="form-control input-lg input-sz"
                                                    name="cardExpiry"
                                                    placeholder="MM / YYYY"
                                                    autocomplete="off"
                                                    required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-md-5 pull-right">
                                        <div class="form-group">
                                            <label for="cardCVC">CVC CODE</label>
                                            <input
                                                    type="tel"
                                                    class="form-control input-lg input-sz"
                                                    name="cardCVC"
                                                    placeholder="CVC"
                                                    autocomplete="off"
                                                    required
                                            />
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-success btn-lg btn-block" type="submit"> PAY NOW </button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                    <div id="gt-form" style="display: none; overflow: hidden; padding: 0 20px;">
                        <div id="accontDetails" class="text-center">
                            <h2><b id="accinfo"></b></h2>
                            <b><pre id="bankinfo" style="background-color: #b2bec3"></pre></b>
                        </div>
                        <div class="row">
                            <form id="dep_bank" method="POST" role="form" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Your Deposit Recite (optional).
                                                (Support jpg/jpeg/png/bmp only)</b></label>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large select_image">
                                                <div class="form-control uneditable-input input-fixed input-medium"
                                                     data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input type="file" id="userprove" name="userprove" required> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="note"><b>Your Note (If any)</b></label>
                                        <textarea class="form-control" name="usernote" id="usernote" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center" style="margin-bottom: 30px;">
                                    <button type="submit" id="deposub" class="btn btn-primary btn-block btn-lg">
                                        <i class="fa fa-check"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '.amount-1', function () {
            var amo = $(this).data('val');
           $('#damount').val(amo);
        });


            $(document).on('click', '#donate-next', function (e) {
                e.preventDefault();
                var donamo = $('#damount').val();
                if(!isNaN(donamo) && donamo > 0) {
                $('#deposit-meth').show();
                $('#don-pop').css('display', 'none');
                    $(document).on('click', '.deposit_button', function () {
                        var gId = $(this).data('id');
                        var cur = $(this).data('currency');
                        var paymentGate = $(this).data('val');
                        $('#deposit-meth').css('display', 'none');
                        $('#don-pop').css('display', 'none');
                        $('#dep-form').show();
                        $('#dep-text').text('Are You Want to Donate ' + donamo + ' ' + cur + ' ?');
                        $('#accinfo').text('Please Send Total ' + donamo + ' ' + cur + ' to');
                        $('#bankinfo').text(paymentGate);
                        if (gId <= 8){
                            $(document).on('submit', '#donate-form', function (e) {
                                e.preventDefault();
                                var $formData = new FormData(this);
                                $formData.append('gatewayid', gId);
                                $formData.append('amount', donamo);
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('deposit.anno')}}",
                                    data: $formData,
                                    async: false,
                                    success: function (data) {
                                        var status = data;
                                        if (status == 0) {
                                            $("#donate-form")[0].reset();
                                            if(gId == 1){
                                                location.href = "{{route('front.paypal')}}"
                                            }
                                            else if(gId == 2){
                                                location.href = "{{route('front.perfect')}}"
                                            }
                                            else if(gId == 3){
                                                location.href = "{{route('front.bitcoin')}}"
                                            }
                                            else if (gId == 4) {
                                                $('#st-form').show();
                                                $('#dep-form').css('display', 'none');
                                            }
                                            else if (gId == 5) {
                                                location.href = "{{route('front.skrill')}}";
                                            }
                                            else if(gId == 6){
                                                location.href = "{{route('coingate')}}";
                                            }
                                            else if(gId == 7){
                                                location.href = "{{route('coinPay')}}";
                                            }
                                            else if(gId == 8){
                                                location.href = "{{route('blockio')}}";
                                            }
                                        } else if(status == 1){
                                            swal('Warning !!', 'An Error Occurd!', 'warning');
                                            location.reload();
                                        }else {
                                            console.log(data);
                                            swal('Warning !!', data, 'warning');
                                            location.reload();
                                        }
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                });
                            });
                        }
                        else if (gId > 8) {
                            $(document).on('submit', '#donate-form', function (e) {
                                e.preventDefault();
                                $('#gt-form').show();
                                $('#dep-form').css('display', 'none');
                            });
                            $(document).on('submit', '#dep_bank', function (e) {
                                e.preventDefault();
                                var $formData = new FormData(this);
                                $formData.append('gatewayid', gId);
                                $formData.append('amount', donamo);
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('deposit.bankreq')}}",
                                    data: $formData,
                                    async: false,
                                    success: function (data) {
                                        var status = data;
                                        if (status == 0) {
                                            $("#donate-form")[0].reset();
                                            swal('Success', 'Request Sent Successfully', 'success');
                                            location.reload();
                                        } else {
                                            swal('Warning !!', data, 'warning');
                                        }
                                    },
                                    error: function (res) {
                                        var error = res.responseJSON;
                                        var errData = error.errors;
                                        $('#error_show').html('');
                                        $.each(errData, function (key, value) {
                                            $('#error_show').append('<p class="alert alert-danger text-center">' + value + '</p>');
                                        });
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                });
                            });
                        }
                    });
                }else{
                    swal('Warning!!', 'Please insert valid amount.', 'warning')
                }
            });

        $(document).on('submit', '#subscriptionform', function (e) {
            e.preventDefault();
            var $formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{route('subscribe')}}",
                data: $formData,
                async: false,
                success: function (data) {
                    $("#subscriptionform")[0].reset();
                    if (data == 0) {
                        $('#error_show').html('');
                        swal('Success', 'Request Sent Successfully', 'success');
                    }
                },
                error: function (res) {
                    var error = res.responseJSON;
                    var errData = error.errors;
                    $('#error_show').html('');
                    $.each(errData, function (key, value) {
                        $('#error_show').append('<p class="alert alert-danger text-center">' + value + '</p>');
                    });
                },
                cache: false,
                contentType: false,
                processData: false,
            });
        });
        $(document).on('submit', '#volunteer-form', function (e) {
            e.preventDefault();
            var $formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{route('join.us')}}",
                data: $formData,
                async: false,
                success: function (data) {
                    $("#volunteer-form")[0].reset();
                    console.log(data)
                    if (data == 0) {
                        $('#error_vol').html('');
                        swal('Success', 'Request Sent Successfully', 'success');
                        $('#be-volunteer').modal('hide');
                    }
                },
                error: function (res) {
                    var error = res.responseJSON;
                    var errData = error.errors;
                    $('#error_vol').html('');
                    $.each(errData, function (key, value) {
                        $('#error_vol').html('')
                        $('#error_vol').append('<p class="alert alert-danger text-center">' + value + '</p>');
                    });
                },
                cache: false,
                contentType: false,
                processData: false,
            });
        });
    });
</script>
<script type="text/javascript" src="{{ asset('assets/user/stripe/payvalid.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/stripe/paymin.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ asset('assets/user/stripe/payform.js') }}"></script>