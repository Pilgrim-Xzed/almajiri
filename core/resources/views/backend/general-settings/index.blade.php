@extends('backend.master')
@section('title', 'General Settings')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light form-fit">
                <div class="portlet-body">
                    <form action="{{route('general.store')}}" class="form-horizontal form-bordered" method="post">
                        {{csrf_field()}}
                        <div class="form-body">
                            @foreach($items as $item)
                                <div class="form-group">
                                    <div class="row general-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title"><b>Site Title</b></label>
                                            </div>
                                            <input type="text" name="title" class="form-control input-lg"
                                                   value="{{$item->title}}">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="baseColor"><b>Base Color</b></label>
                                            </div>
                                            <input type='text' class="form-control input-lg" id="base_color"
                                                   value="{{$item->color}}"/>
                                            <input type="text" readonly name="color" class="form-control input-lg"
                                                   id="base_color_value"
                                                   value="{{$item->color}}">
                                        </div>
                                    </div>
                                    <div class="row general-form">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="baseCurrencyText"><b>Base Currency Text</b></label>
                                            </div>
                                            <input type="text" name="currency_text" class="form-control input-lg"
                                                   id="baseCurrencey"     value="{{$item->currency_text}}">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="baseCurrencySymbol"><b>Currency Symbol</b></label>
                                            </div>
                                            <input type="text" name="currency_symbol" class="form-control input-lg"
                                                   value="{{$item->currency_symbol}}">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="conversionRate"><b>Conversion Rate</b></label>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">1 USD =</span>
                                                <input id="conversion_rate" type="text" class="form-control input-lg"
                                                       name="conversion_rate" value="{{$item->conversion_rate}}">
                                                <span class="input-group-addon" id="base_cur">{{$item->currency_text}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn green btn-block btn-lg">
                                            <i class="fa fa-check"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#base_color').spectrum({
                color: $('#base_color').val(),
                change: function (color) {
                    $('#base_color_value').val(color.toHexString().slice(1));
                }
            });

            $('#baseCurrencey').on("keyup blur",function () {
                $('#base_cur').text($(this).val());
            });
        });
    </script>
@endsection