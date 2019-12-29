@extends('backend.master')
@section('title', 'Pending Volunteers List')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Pending Volunteers List
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
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone No.</th>
                                <th class="text-center">Profession</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($volunteers as $volunteer)
                                @if  ($volunteer->status == 0)
                                    <tr class="gateway_list">
                                        <td>
                                            {{$volunteer->fname}} {{$volunteer->lname}}
                                        </td>
                                        <td>
                                            {{$volunteer->email}}
                                        </td>
                                        <td>
                                            {{$volunteer->phone}}
                                        </td>
                                        <td>
                                            {{$volunteer->profession}}
                                        </td>
                                        <td>
                                            <b style="color: #e67e22"> Pending </b>
                                        </td>
                                        <td>
                                            <a href="{{route('voluteer.pendingdetails', $volunteer->id)}}" class="btn green"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$volunteers->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection