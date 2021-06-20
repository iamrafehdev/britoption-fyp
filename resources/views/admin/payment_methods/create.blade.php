@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Payment Method
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Add Payment Method</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Payment Method</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-remove"></i></button>
                            </div>
                        </div>


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                              action="{{url('paymentmethods')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">

                                        <div class="form-group">
                                            <label>Payment Method Name</label>
                                            <input type="text" id="package-name" required="required"
                                                   name="payment_method_name" required="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Payment Method Fee</label>
                                            <input type="text" id="last-name" required="required" required=""
                                                   name="fee_percentage" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Payment Method Logo</label>
                                            <input id="middle-name" name="payment_method_logo" class="form-control"
                                                   type="file" name="middle-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </form>

                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

