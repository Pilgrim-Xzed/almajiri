@extends('frontend.master')
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
@section('Body')
    <!--==================================
===== Breadcrumb Section Start ===========
===================================-->
    <section class="breadcrumb-section section-bg-clr5" style="background-image: url('{{asset('assets/frontend/upload/images/logo/')}}/{{$logo->breadcrumb}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2 class="breadcrumb-color">Cause</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->

    <!--==================================
   ===== Details Section Start ===========
   ===================================-->

    <section class="details-section section-padding section-bg-clr1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Details Content Start -->
                    <div class="details-content">
                        <!-- Details Thumb Start -->
                        <div class="details-thumb">
                            <img src="{{asset('assets/frontend/upload/images/cause')}}/{{$item->image}}" alt="blog">
                        </div>
                        <!-- Details Thumb End -->
                        <!-- Details Desc Start -->
                        <div class="details-desc">
                            <!-- Details Header Start -->
                            <div class="details-header">
                                <h3>{{$item->title}}</h3>
                            </div>
                            <!-- Details Header End -->
                            <!-- Details Social Start -->
                            <div class="details-social">
                                <span>Share:</span>
                                <span id="cause-share"></span>
                            </div>
                            <!-- Details Social End -->
                            <!-- Details Text Start -->
                            <div class="details-text">
                                <div class="details-para tab-content">
                                    <div class="details-para-list tab-pane active" role="tabpanel" id="story">
                                    {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                            <!-- Details Text End -->
                        </div>
                    </div>
                    <!-- Details Content End -->
                </div>
                <!-- Details Sidebar Start  -->
                <div class="col-md-4">
                    @php
                        $raised = App\CauseDonor::where('status', 1)->where('cause_id', $item->id)->sum('amount');
                        $people = App\CauseDonor::where('status', 1)->where('cause_id', $item->id)->count('id');
                    $rstyle = ($raised * 100)/ $item->goal;
                    @endphp
                    <aside>
                        <div class="widget widget-goal">
                            <h6><span>{{$gset->currency_symbol}}{{$raised}}</span> of {{$gset->currency_symbol}}{{$item->goal}} goal</h6>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{$rstyle}}%">
                                </div>
                            </div>
                            <p>Raised by {{number_format($people)}} people</p>
                            <button type="button" data-toggle="modal" data-target="#cause-donate">donate now</button>
                        </div>
                        <div class="widget widget-categories">
                            <h4>Our Causes</h4>
                            <ul>
                                @foreach($causes as $cause)
                                <li>
                                    <a href="{{route('single.cause', $cause->id)}}">{{$cause->title}}</a>
                                </li>
                                    @endforeach
                            </ul>

                        </div>
                        <div class="widget widget-donation">
                            <h4>Recent Donations</h4>
                            <ul>
                                @foreach($donors as $donor)
                                    @if($donor->name != '' && $donor->name != '')
                                <li>
                                    <div class="widget-donation-content">
                                        <div class="widget-donation-header">
                                            <p><span>{{$donor->currency}}</span>{{$donor->amount}}</p>
                                            <h5>{{$donor->name or 'Annonymous'}}</h5>
                                            <span> <i class="fa fa-calendar" aria-hidden="true"></i>{{date('d M Y', strtotime($donor->created_at))}}</span>
                                            <p>{!! $donor->description !!}</p>
                                        </div>
                                    </div>
                                </li>
                                    @endif
                                    @endforeach
                            </ul>
                            <div class="more-donation">
                                <a href="{{$donors->nextPageUrl()}}">+see more</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!--==================================
    ===== Details Section End ===========
    ===================================-->

    <div class="modal fade pop-box" id="cause-donate" tabindex="-1" role="dialog" aria-labelledby="donate-popup"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style=" overflow: hidden;">
                <!--Donation div-->
                <button type="button" class="btn btn-warning pull-right" id="back-btn">Back</button>
                <div class="donation-div">
                    <div class="donation-plz">
                        <form id="volunteer-form" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <!--Form Portlet-->
                            <div class="donate-popup">
                                <div id="payment-details">
                                <div id="error_vol"></div>
                                <h3>Donate Now</h3>
                                <div class="form-group">
                                    <input type="text" name="amount" id="amount" placeholder="Donate Amount" required>
                                </div>
                                        <div class="form-group">
                                            <input type="text" id="name" name="name" placeholder="Your Name (Optional)">
                                        </div>
                                    <div class="form-group">
                                        <input type="text" id="phone" name="phone" placeholder="Your Phone Number (Optional)">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" placeholder="Your Email Address (Optional)">
                                    </div>
                                        <div class="form-group">
                                            <textarea name="description" id="description" maxlength="500" placeholder="Description (Optional) (Maximum 500 Characters)"></textarea>
                                        </div>
                                <div class="form-group donate-submit">
                                    <button id="pay-next" type="button">Next</button>
                                </div>
                                </div>
                                <div id="deposit-method" style="display: none; overflow: hidden;">
                                    <div class="row">
                                    @foreach($methods as $method)
                                        @if($method->status == 1)
                                            <div class="col-md-6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                            {{$method->name}}
                                                    </div>
                                                    <div class="panel-body text-center">
                                                        <img src="{{asset('assets/backend/upload/images/payment')}}/{{$method->gateimg}}"
                                                             class="img-responsive" style="width:100%; height: 120px;"
                                                             alt="Pic">
                                                        <br>
                                                        <button type="button"
                                                                class="btn btn-success btn-block bold deposit_button"
                                                                id="btn_depo"
                                                                data-id="{{$method->id}}"
                                                                data-charge="{{$method->fix_charge}}"
                                                                data-percent="{{$method->percent_charge}}"
                                                                data_conversion="{{$gset->conversion_rate}}"
                                                                data-admincharge="{{$gset->charge}}"
                                                                data-btcrate="{{$btcrate}}"
                                                                data-val="{{$method->val1}}"
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
                                </div>
                        </form>
                    </div>
                </div>
                <div id="gt_preview" style="display: none">
                    <h4 class="text-center" id="deposit-text"></h4>
                    <form id="depo_form" method="POST" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="text-center">
                            <button type="submit" id="depo-now" class="btn btn-success btn-lg" style="outline: none">
                                <i class="fa fa-bank"></i> Donate NOW
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-8 col-md-offset-2" id="gt-form1" style="display: none; overflow: hidden;">
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
                <div id="gt-form2" style="display: none; overflow: hidden; margin-top: -90px; padding: 0 20px;">
                    <div id="accontDetails" class="text-center">
                        <h2><b id="accinfo"></b></h2>
                        <b><pre style="background-color: #b2bec3" id="bankinfo"></pre></b>
                    </div>
                    <div class="row">
                        <form id="depo_bank" method="POST" role="form" enctype="multipart/form-data" novalidate>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#cause-share").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
            });

            $(document).on('click', '#pay-next', function () {
                var amo = $('#amount').val();
                if (!isNaN(amo) && amo > 0) {
                    $('#payment-details').css('display', 'none');
                    $('#deposit-method').show();
                    $('#back-btn').show();
                    $(document).on('click', '.deposit_button', function () {
                        var gId = $(this).data('id');
                        var cur = $(this).data('currency');
                        var paymentGate = $(this).data('val');
                        var amount = parseFloat($('#amount').val());
                        var name = $('#name').val();
                        var phone = $('#phone').val();
                        var email = $('#email').val();
                        var description = $('#description').val();
                        var causeId = {{$item->id}};
                        $('#deposit-method').css('display', 'none');
                        $('#donate-popup').css('display', 'none');
                        $('#back-btn').css('display', 'none');
                        $('#gt_preview').show();
                        $('#deposit-text').text('Are You Want to Donate ' + amount + ' ' + cur + ' ?');
                        $('#accinfo').text('Please Send Total ' + amount + ' ' + cur + ' to');
                        $('#bankinfo').text(paymentGate);
                        if (gId <= 8){
                            $(document).on('submit', '#depo_form', function (e) {
                                e.preventDefault();
                                var $formData = new FormData(this);
                                $formData.append('gatewayid', gId);
                                $formData.append('amount', amount);
                                $formData.append('name', name);
                                $formData.append('phone', phone);
                                $formData.append('email', email);
                                $formData.append('description', description);
                                $formData.append('causeid', causeId);
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('deposit.store')}}",
                                    data: $formData,
                                    async: false,
                                    success: function (data) {
                                        var status = data;
                                        if (status == 0) {
                                            $("#depo_form")[0].reset();
                                            if(gId == 1){
                                                location.href = "{{route('front.paypal')}}"
                                                $('.blink').show();
                                            }
                                            else if(gId == 2){
                                                location.href = "{{route('front.perfect')}}"
                                                $('.blink').show();
                                            }
                                            else if(gId == 3){
                                                location.href = "{{route('front.bitcoin')}}"
                                                $('.blink').show();
                                            }
                                            else if (gId == 4) {
                                                $('#gt-form1').show();
                                            }
                                            else if (gId == 5) {
                                                location.href = "{{route('front.skrill')}}";
                                                $('.blink').show();
                                            }
                                            else if(gId == 6){
                                                location.href = "{{route('coingate')}}";
                                                $('.blink').show();
                                            }
                                            else if(gId == 7){
                                                location.href = "{{route('coinPay')}}";
                                                $('.blink').show();
                                            }
                                            else if(gId == 8){
                                                location.href = "{{route('blockio')}}";
                                                $('.blink').show();
                                            }
                                        } else if(status == 1){
                                            swal('Warning !!', 'An Error Occurd!', 'warning');
                                            location.reload();
                                            console.log(data);
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
                                $('#btnBack').css('display', 'none');
                                $('#gt_preview').css('display', 'none');
                                $('#depo-input').css('display', 'none');
                            });
                        }
                        else if (gId > 8) {
                            $(document).on('submit', '#depo_form', function (e) {
                                e.preventDefault();
                                $('#gt-form2').show();
                                $('#btnBack').css('display', 'none');
                                $('#gt_preview').css('display', 'none');
                                $('#depo-input').css('display', 'none');
                            });
                            $(document).on('submit', '#depo_bank', function (e) {
                                e.preventDefault();
                                var $formData = new FormData(this);
                                $formData.append('gatewayid', gId);
                                $formData.append('amount', amount);
                                $formData.append('name', name);
                                $formData.append('phone', phone);
                                $formData.append('email', email);
                                $formData.append('description', description);
                                $formData.append('causeid', causeId);
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('deposit.bank')}}",
                                    data: $formData,
                                    async: false,
                                    success: function (data) {
                                        var status = data;
                                        if (status == 0) {
                                            $("#depo_form")[0].reset();
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
                    swal("Warning!!", "Please Insert a valid Input", "warning")
                }
            });
            $(document).on('click', '#back-btn', function () {
                $('#payment-details').show();
                $('#deposit-method').css('display', 'none');
                $('#back-btn').css('display', 'none');
            });
            });
    </script>
    <script type="text/javascript" src="{{ asset('assets/user/stripe/payvalid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/user/stripe/paymin.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('assets/user/stripe/payform.js') }}"></script>
@endsection
