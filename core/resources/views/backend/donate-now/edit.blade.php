@extends('backend.master')
@section('addNewButon')
    <a class="btn blue btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('donate.index')}}"> Back </a>
@endsection
@section('title', 'Edit Donate Details')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form role="form" action="{{route('donate.update', $item->id)}}" method="post" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label for="form_control_1"><b>Amount</b></label>
                                <div class="input-group">
                                    <span class="input-group-addon">{{$gset->currency_symbol}}</span>
                                    <input type="text" name="amount" value="{{$item->amount}}" class="form-control" id="amount" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form_control_1"><b>Description (Maximum 500 Characters)</b></label>
                                <textarea name="description" class="form-control" rows="8" maxlength="500" required>{{$item->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn green btn-block btn-lg">
                                    <i class="fa fa-check"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection