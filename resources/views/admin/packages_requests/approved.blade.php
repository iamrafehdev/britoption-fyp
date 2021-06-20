@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Approved Requests
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Approved Requests</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border" style="background-color:#864ca8;">
                            <h3 class="box-title">Approved Requests</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Order Number</th>
                                        <th>User's Name</th>
                                        <th>Amount ( $ )</th>
                                        <th>Trx ID#</th>
                                        <th>Package</th>
                                        <th>Date / Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_requests as $key=> $data)
                                        @php
                                            $user = \App\User::where('id',$data->userid)->first();
                                            $pkg = \App\PackagesPlan::where('id',$data->pkg_id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->order_number}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$data->dollaramount}}</td>
                                            <td>{{$data->trx}}</td>
                                            <td>{{$pkg->package_name}}</td>
                                            <td>{{$data->udate}}</td>
                                            <td><span class="label label-success">Active</span></td>
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

@endsection


