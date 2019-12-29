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
                <div class="portlet-body text-center">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center"> Serial</th>
                                <th class="text-center">Gateway Name</th>
                                <th class="text-center">Deposit Amount</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($depo as $dep)
                                @if  ($dep->status == 0)
                                <tr class="gateway_list">
                                    <td>{{$i}}</td>
                                    <td>
                                        {{$dep->gateway->name}}
                                    </td>
                                    <td>{{$dep->amount}} {{$gset->currency_symbol}}</td>
                                    <td>
                                            <b style="color: #e67e22"> Pending </b>
                                    </td>
                                    <td>
                                        {{$dep->created_at->diffForHumans()}}
                                    </td>
                                <td>
                                    <a href="{{route('pendingDeposite.details', $dep->id)}}" class="btn green"><i class="fa fa-eye"></i></a>
                                </td>
                                </tr>
                                @php($i++)
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$depo->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection