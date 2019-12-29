@extends('backend.master')
@section('addNewButon')
    <button class="btn green btn-outline btn-lg sbold pull-right topModalbtn" data-toggle="modal"
            data-target="#creategetway"> Add Bank Info
    </button>
@endsection
@section('title', 'GateWay List')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>GateWay List
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
                                <th class="text-center"> Serial</th>
                                <th class="text-center"> Image</th>
                                <th class="text-center"> Name</th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($items as $item)
                                <tr class="gateway_list">
                                    <td>{{$i}}</td>
                                    <td><img src="{{asset('assets/backend/upload/images/payment/')}}/{{$item->gateimg}}" height="40px"
                                             width="120px" alt="{{$item->name}}"></td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <p class="gt-active">Active</p>
                                        @else
                                            <p class="gt-inactive">Inactive</p>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn purple gateway_item_edit_btn"
                                                data-toggle="modal" data-target="#editgetway"
                                                data-id="{{$item->id}}"
                                                data-name="{{$item->name}}"
                                                data-minamo="{{$item->min_amo}}"
                                                data-maxamo="{{$item->max_amo}}"
                                                data-fix="{{$item->fix_charge}}"
                                                data-per="{{$item->percent_charge}}"
                                                data-rate="{{$item->rate}}"
                                                data-val1="{{$item->val1}}"
                                                data-val2="{{$item->val2}}"
                                                data-val3="{{$item->val3}}"
                                                data-cur="{{$item->currency}}"
                                                data-status="{{$item->status}}"><i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin Modal create Getway -->
        <div class="modal fade" id="creategetway" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4><b>Create Gateway</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="portlet light bordered">
                            <div class="portlet-body form">
                                <form role="form" action="{{route('gateway.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Name</b></label>
                                            <input type="text" name="name" class="form-control">
                                            <span class="help-block">Gateway Name goes here...</span>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Fixed Charge Per Transaction</b></label>
                                            <input type="text" name="fix_charge" class="form-control">
                                            <span class="help-block">Fixed Charge Per Transaction Ammount goes here...</span>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Percentage Charge Per Transaction (%)</b></label>
                                            <input type="text" name="per_charge" class="form-control">
                                            <span class="help-block">Vat Charge Per Transaction Ammount goes here...</span>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Currency Name</b></label>
                                            <input type="text" id="currency" name="currency" class="form-control">
                                            <span class="help-block">Currency Name goes here...</span>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Currency Rate</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">1 USD =</span>
                                                <input id="conversion_rate" type="text" class="form-control input-lg"
                                                       name="rate" >
                                                <span class="input-group-addon" id="base_cur"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Payment Address</b></label>
                                            <textarea name="val1" class="form-control" rows="5">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for=""><b>Logo</b></label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="input-group input-large select_image">
                                                    <div class="form-control uneditable-input input-fixed input-medium"
                                                         data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"> </span>
                                                    </div>
                                                    <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input type="file" name="gate_logo"> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""><b>Status</b></label>
                                            <input type="checkbox"
                                                   class="make-switch" name="status" data-on-text="Enable"
                                                   data-off-text="Disable">
                                        </div>
                                    </div>
                            <div class="form-actions noborder">
                                <button type="submit" class="btn btn-block btn-lg green"><i
                                            class="fa fa-check"></i>Submit
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </div>
        <!-- End Modal Create Getway -->
        <!-- Begin Modal edit Getway -->
        <div class="modal fade" id="editgetway" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4><b>Edit Gateway Details</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="portlet light bordered">
                            <div class="portlet-body form">
                                <form role="form" action="{{route('gateway.update')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <input type="hidden" name="egtid" id="egtid">
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Name</b></label>
                                            <input type="text" name="name" class="form-control"
                                                   id="egtname">
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Fixed Charge Per Transaction</b></label>
                                            <input type="text" name="fix_charge" class="form-control"
                                                   id="egtfix">
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Percentage Charge Per Transaction</b></label>
                                            <input type="text" name="per_charge" class="form-control"
                                                   id="egtper">
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Currency Name</b></label>
                                            <input type="text" id="ecurrency" name="currency" class="form-control">
                                            <span class="help-block">Currency Name goes here...</span>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b>Currency Rate</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">1 USD =</span>
                                                <input id="econversion_rate" type="text" class="form-control input-lg"
                                                       name="rate" >
                                                <span class="input-group-addon" id="ebase_cur"></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label for=""><b id="egval1"></b></label>
                                            <input type="text" name="val1" class="form-control"
                                                   id="egtval1">
                                        </div>
                                        <div class="form-group form-md-line-input" id="dval2">
                                            <label for=""><b id="egval2"></b></label>
                                            <input type="text" name="val2" class="form-control"
                                                   id="egtval2">
                                        </div>
                                        <div class="form-group form-md-line-input" id="dval3">
                                            <label for=""><b id="egval3"></b></label>
                                            <input type="text" name="val3" class="form-control"
                                                   id="egtval3">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for=""><b>Logo</b></label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="input-group input-large select_image">
                                                        <div class="form-control uneditable-input input-fixed input-medium"
                                                             data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                            <span class="fileinput-filename"> </span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input type="file"
                                                                       name="gate_logo"> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""><b>Status</b></label>
                                                <input type="checkbox"
                                                       class="make-switch" name="status" data-on-text="Enable"
                                                       data-off-text="Disable" id="egtstatus">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions noborder">
                                        <button type="submit" class="btn btn-block btn-lg green"><i
                                                    class="fa fa-check"></i>Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn red" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- End Modal edit Gateway-->
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.gateway_item_edit_btn', function () {
                $('#egtid').val($(this).data('id'));
                $('#egtname').val($(this).data('name'));
                $('#econversion_rate').val($(this).data('rate'));
                $('#egtminamo').val($(this).data('minamo'));
                $('#egtmaxamo').val($(this).data('maxamo'));
                $('#egtfix').val($(this).data('fix'));
                $('#egtper').val($(this).data('per'));
                $('#ecurrency').val($(this).data('cur'));
                if ($(this).data('id') == 1){
                    $('#egval1').text("Paypal Business Email");
                    $('#egtval1').val($(this).data('val1'));
                    $('#dval2').hide();
                    $('#dval3').hide();
                }else if ($(this).data('id') == 2){
                    $('#egval1').text("Pm USD Account");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("Alternate PassPhrase");
                    $('#egtval2').val($(this).data('val2'));
                    $('#dval3').hide();
                } else if ($(this).data('id') == 3){
                    $('#egval1').text("API Key");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("XPUB Code");
                    $('#egtval2').val($(this).data('val2'));
                    $('#dval3').hide();
                } else if ($(this).data('id') == 4) {
                    $('#egval1').text("Secret Key");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("Publishable Key");
                    $('#egtval2').val($(this).data('val2'));
                    $('#dval3').hide();
                } else if ($(this).data('id') == 5) {
                    $('#egval1').text("Marchant Email");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("Secret KEY");
                    $('#egtval2').val($(this).data('val2'));
                    $('#dval3').hide();
                } else if ($(this).data('id') == 6) {
                    $('#egval1').text("API ID");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("API KEY");
                    $('#egtval2').val($(this).data('val2'));
                    $('#egval3').text("API Secret");
                    $('#egtval3').val($(this).data('val3'));
                } else if ($(this).data('id') == 7) {
                    $('#egval1').text("API ID");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("API KEY");
                    $('#egtval2').val($(this).data('val2'));
                    $('#dval3').hide();
                } else if ($(this).data('id') == 8) {
                    $('#egval1').text("API Key");
                    $('#egtval1').val($(this).data('val1'));
                    $('#egval2').text("API PIN");
                    $('#egtval2').val($(this).data('val2'));
                    $('#dval3').hide();
                } else {
                    $('#egval1').text("Payment Address");
                    $('#egtval1').val($(this).data('val1'));
                    $('#dval2').hide();
                    $('#dval3').hide();
                }


                if ($(this).data('status') == 1) {
                    $('#egtstatus').bootstrapSwitch('state', true);
                } else {
                    $('#egtstatus').bootstrapSwitch('state', false);
                }

            });

            $('#currency').on("keyup blur",function () {
                $('#base_cur').text($(this).val().toUpperCase());
            });
            $('#ecurrency').on("keyup blur",function () {
                $('#ebase_cur').text($(this).val().toUpperCase());
            });
        });
    </script>
@endsection