@extends('backend.master')
@section('title', 'Volunteer Details')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Volunteer Details
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
                                <th>Name</th>
                                <th>{{$item->fname}} {{$item->lname}}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{$item->email}}</th>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <th>{{$item->phone}}</th>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <th>{{$item->address}}</th>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <th>
                                    <a id="pending-prove"
                                       href="{{asset('assets/frontend/upload/images/volunteer')}}/{{$item->image}}"
                                       data-rel="lightcase">
                                        <span id="text"></span>
                                        <img id="prove-img"
                                             src="{{asset('assets/frontend/upload/images/volunteer')}}/{{$item->image}}"
                                             height="40px" width="80px"/>
                                    </a>
                                </th>
                            <tr>
                            <tr>
                                <th>Profession</th>
                                <th>{{$item->profession}}</th>
                            </tr>
                            <tr>
                                <th>Facebook Profile</th>
                                <th><a href="{{$item->fb}}" target="_blank">{{$item->fb}}</a></th>
                            </tr>
                            <tr>
                                <th>Twitter Profile</th>
                                <th><a href="{{$item->tw}}" target="_blank">{{$item->tw}}</a></th>
                            </tr>
                            <tr>
                                <th>Linkedin Profile</th>
                                <th><a href="{{$item->ln}}" target="_blank">{{$item->ln}}</a></th>
                            </tr>
                                <th>Description</th>
                                <th>{{$item->description}}</th>
                            </tr>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="form-actions noborder text-center">
                        <form action="{{route('voluteer.approve', $item->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
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