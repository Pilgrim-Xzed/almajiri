@extends('backend.master')
@section('addNewButon')
    <a class="btn green btn-outline btn-lg sbold pull-right topModalbtn" href="{{route('volunteer.email')}}"> Send EMail </a>
@endsection
@section('title', 'Volunteers List')
@section('body')
    @include('backend.template-parts.flash')
    @include('backend.template-parts.error')
    <div class="row page-bar-btn">
        <div class="col-md-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Volunteers Details List
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
                                <th class="text-center"> Name</th>
                                <th class="text-center"> Email</th>
                                <th class="text-center"> Phone No.</th>
                                <th class="text-center"> Image</th>
                                <th class="text-center"> Address</th>
                                <th class="text-center"> Profession</th>
                                <th class="text-center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="gateway_list">
                                    <td>{{$item->fname}} {{$item->lname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td><a class="pending-prove"
                                           href="{{asset('assets/frontend/upload/images/volunteer')}}/{{$item->image}}"
                                           data-rel="lightcase">
                                            <img class="vol-img"
                                                 src="{{asset('assets/frontend/upload/images/volunteer')}}/{{$item->image}}"
                                                 height="40px" width="80px"/>
                                        </a></td>
                                    <td style="max-width: 150px;">{{$item->address}}</td>
                                    <td style="max-width: 150px;">{{$item->profession}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editvol"
                                           data-id="{{$item->id}}"
                                           data-fname="{{$item->fname}}"
                                           data-lname="{{$item->lname}}"
                                           data-email="{{$item->email}}"
                                           data-phone="{{$item->phone}}"
                                           data-address="{{$item->address}}"
                                           data-profession="{{$item->profession}}"
                                           data-fb="{{$item->fb}}"
                                           data-tw="{{$item->tw}}"
                                           data-ln="{{$item->ln}}"
                                           data-description="{{$item->description}}"
                                           class="btn purple editvolid">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('volunteer.personalemail', $item->id)}}" class="btn green">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                        <a data-id="{{$item->id}}" data-toggle="modal" data-target="#deletevol"
                                           class="btn red deletevolid">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$items->render()}}
                </div>
            </div>

            <div class="modal fade" id="editvol" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4><b>Edit Volunteer Details</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="portlet light bordered">
                                <div class="portlet-body form">
                                    <form id="add-form" action="{{route('volunteer.edit')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""><b>First Name</b></label>
                                                <input type="text" name="fname" id="fname" class="form-control">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""><b>Last Name</b></label>
                                                <input type="text" name="lname" id="lname" class="form-control">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""><b>email</b></label>
                                                <input type="email" name="email" id="email" class="form-control">
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""><b>Phone No.</b></label>
                                                <input type="text" name="phone" id="phone" class="form-control">
                                            </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="favicon"><b>Image: (Select jpg, jpeg, png, bmp file
                                                        only)</b></label>
                                                <div class="fileinput-new" data-provides="fileinput">
                                                    <div class="input-group select_image">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                            <span class="fileinput-filename"> </span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                                <span class=""> Select file </span>
                                                                <input class="input-lg" id="image" type="file"
                                                                       name="image"> </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Address</b></label>
                                                <textarea name="address" id="address" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Profession</b></label>
                                                <input type="text" id="profession" name="profession"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Facebook</b></label>
                                                <input type="text" name="fb" id="fb" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Twitter</b></label>
                                                <input type="text" name="tw" id="tw" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Likedin</b></label>
                                                <input type="text" name="ln" id="ln" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Description</b></label>
                                                <textarea name="description" id="description"
                                                          class="form-control"></textarea>
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
                <!-- End Modal Create Getway -->
            </div>

            <div class="modal fade" id="deletevol" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
            <div class="portlet light bordered">
            <div class="portlet-body form">
            <form role="form" action="{{route('volunteer.delete')}}" method="post">
            {{csrf_field()}}
            <div class="form-body">
            <div class="form-group form-md-line-input text-center">
            <h3>Do you Want to Remove This Volunteer?</h3>
            <input type="hidden" name="id" id="vid">
            </div>
            </div>
            <div class="form-actions noborder text-center">
            <button type="submit" class="btn blue">Yes</button>
            <button type="button" class="btn red" data-dismiss="modal">Cancel</button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.editvolid', function () {
                var id = $(this).data('id');
               var fname = $(this).data('fname');
               var lname = $(this).data('lname');
               var email = $(this).data('email');
               var phone = $(this).data('phone');
               var address = $(this).data('address');
               var profession = $(this).data('profession');
               var fb = $(this).data('fb');
               var tw = $(this).data('tw');
               var ln = $(this).data('ln');
               var description = $(this).data('description');
               $('#id').val(id);
               $('#fname').val(fname);
               $('#lname').val(lname);
               $('#email').val(email);
               $('#phone').val(phone);
               $('#address').val(address);
               $('#profession').val(profession);
               $('#fb').val(fb);
               $('#tw').val(tw);
               $('#ln').val(ln);
               $('#description').val(description);
            });
            $(document).on('click', '.deletevolid', function () {
                $('#vid').val($(this).data('id'));
            });
            $(document).ready(function ($) {
                $('a[data-rel^=lightcase]').lightcase();
                $(document).on('mouseenter', '.vol-img', function () {
                });
            });
        });
    </script>
@endsection