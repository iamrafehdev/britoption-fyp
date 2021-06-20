@extends('admin.layouts.master')
@section('content')

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Free Users
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">List Free Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">List Free Users</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered">
                                    <!--<div id="example_wrapper" class="dataTables_wrapper">-->
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th> Name</th>
                                        <th>Sponser name</th>
                                        <th> Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Joined</th>

                                        <th>Balance</th>
                                        <th>User Free</th>
                                        <th>User Block</th>
                                        <th>Status</th>
                                        <th>Mail</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key=> $user)
                                        @php
                                            $sponser = \App\User::where('id',$user->id)->first();

                                            $sponser_user='';
                                            if($sponser->ref_id)
                                            {
                                            $sponser_user = \App\User::where('id',$sponser->ref_id)->first();
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->id}}</td>

                                            <td>{{$user->name}}</td>
                                            <th>{{isset($sponser_user->name) ? $sponser_user->name : ''}}</th>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->country}}</td>
                                            <td>{{$user->created_at->format('Y-m-d')}}</td>

                                            <td>${{round($user->balance,3)}}</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" onchange="userStatus({{$user->id}})"
                                                           class="toggle-class status{{$user->id}} "<?php if ($user->user_type == "paid") {
                                                        echo 'checked';
                                                    } ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" onchange="userBannedStatus({{$user->id}})"
                                                           class="toggle-class status{{$user->id}} "<?php if ($user->status == "1") {
                                                        echo 'checked';
                                                    } ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>

                                            <td>

                                                @if($user->status==1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @elseif($user->status==2)
                                                    <span class="badge badge-pill badge-danger">Blocked</span>

                                                @else
                                                    <span class="badge badge-pill badge-danger">Not Approved</span>
                                                @endif
                                            </td>


                                            <td>
                                            <!--<form id="demo-form2" class="form-horizontal form-label-left" action="{{url('admin/send_conditional_email_free')}}" method="post">-->
                                                <!--@csrf-->
                                                <button class="btn btn-success btn-sm"
                                                        onclick="getUserDetail({{$user->id}})">Send Mail
                                                </button>
                                                <!--</form>-->
                                            </td>
                                            <td>
                                                <a href="{{url('/admin/user-profile/'.$user->id)}}"
                                                   class="btn btn-warning">View Details</a>

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--select mail type model -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Send Mail</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding:10px; ">
                        <form id="demo-form2" class="form-horizontal form-label-left"
                              action="{{url('admin/send_conditional_email_free')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" id="userID">
                            <button style="width:100%" class="btn btn-primary">Default</button>
                        </form>

                        &nbsp &nbsp &nbsp

                        <form id="demo-form2" class="form-horizontal form-label-left"
                              action="{{url('admin/send_conditional_email_paid')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" id="userID">
                            <button style="width:100%" class="btn btn-danger">Conditional</button>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>

        function userStatus(userID) {
            var userID = userID;
            var status = $(".status" + userID).prop('checked') == true ? 1 : 0;

            $.ajax({
                type: "post",
                url: 'admin/ChangeUserStatus',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": status,
                    "userID": userID
                },
                success: function (data) {
                    //  location.reload();
                }
            });
        }


        // user detail
        function getUserDetail(id) {
            $('.modal').modal({show: true});
            $("#userID").val(id);
        }

    </script>


@endsection


