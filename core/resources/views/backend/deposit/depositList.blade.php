@extends('backend.master')
@section('title', 'Deposit List')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Depositor List
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">Gateway Name</th>
                                <th class="text-center">Deposit Amount</th>
                                <th class="text-center">status</th>
                                <th class="text-center">date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                    <tr class="gateway_list">
                                        <td>
                                            {{$item->gateway->name}}
                                        </td>
                                        <td>
                                            {{$item->amount}} {{$gset->currency_symbol}}
                                        </td>
                                        <td>
                                            @if ($item->status == 0)
                                               <b style="color: #e67e22"> Pending </b>
                                                @elseif ($item->status == 1)
                                                <b style="color: #27ae60"> Accepted </b>
                                                @elseif ($item->status == 2)
                                                <b style="color: #e74c3c"> Rejected </b>
                                                @endif
                                        </td>
                                        <td>
                                       {{($item->created_at->diffForHumans())}}
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$items->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection