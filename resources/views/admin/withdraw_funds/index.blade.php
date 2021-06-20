@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Withdraw Payment
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Withdraw Payment</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Withdraw Payment</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-remove"></i></button>
                            </div>
                        </div>


                        <form id="demo-form" action="{{url('admin/withdraw-preview')}}" method="post">
                        @csrf

                        <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">

                                        <div class="form-group">
                                            <label for="fullname">Select User * :</label>
                                            <select class="form-control select2" required="" name="user">
                                                <option value="">Select User</option>
                                                @foreach($all_users as $users)
                                                    <option
                                                        value="{{$users->id}}">{{$users->name .'  '. $users->account}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="fullname">Select Payment Method * :</label>
                                            <select class="form-control select2" required="" name="payment_method">
                                                <option value="">Select Method</option>
                                                @foreach($all_payment_methods as $method)
                                                    <option
                                                        value="{{$method->id}}">{{$method->payment_method_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Withdraw Amount * :</label>
                                            <input type="text" id="email" class="form-control" name="withdraw_amount"
                                                   data-parsley-trigger="change" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Withdraw Date * :</label>
                                            <input type="date" id="email" class="form-control" name="withdraw_date"
                                                   data-parsley-trigger="change" required="">

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

