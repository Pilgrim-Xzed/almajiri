@extends('backend.master')
@section('title', 'Pending deposit List')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Pending Deposit List
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>Gateway Name</th>
                                <th>{{$item->gateway->name}}</th>
                            </tr>
                            <tr>
                                <th>Deposit Amount</th>
                                <th>{{$item->amount}} {{$gset->currency_symbol}}</th>
                            </tr>
                            <tr>
                                <th>Transation Prove</th>
                                <th>
                                    <a id="pending-prove"
                                       href="{{asset('assets/backend/upload/images/bank-prove')}}/{{$item->prove}}"
                                       data-rel="lightcase">
                                         <span id="text"></span>
                                        <img id="prove-img"
                                             src="{{asset('assets/backend/upload/images/bank-prove')}}/{{$item->prove}}"
                                             height="40px" width="80px"/>
                                    </a>
                                </th>
                            <tr>
                                <th>Message</th>
                                <th>{{$item->note}}</th>
                            </tr>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="form-actions noborder text-center">
                        <form action="{{route('deposit.Approve')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="depid" value="{{$item->id}}">
                            <input type="hidden" name="uid" value="{{$item->user_id}}">
                            <button type="submit" class="btn btn-lg green" name="accept" value="1">Accept
                            </button>
                            <button type="submit" class="btn btn-lg red" name="reject" value="2">Reject
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('a[data-rel^=lightcase]').lightcase();
            $(document).on('mouseenter', '#pending-prove', function () {
                $('#prove-img').css('opacity', '.09');
                $('#text').text('Click');
            });
            $(document).on('mouseleave', '#pending-prove', function () {
                $('#prove-img').css('opacity', '1');
                $('#text').text('');
            });
        });
    </script>
@endsection