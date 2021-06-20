@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Withdraw Payment Preview
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Withdraw Preview</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Withdraw Preview</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-remove"></i></button>
                            </div>
                        </div>

                        <table class="data table table-striped no-margin">

                            <tr>
                                <th>User Name</th>
                                <td>{{$user->name}}</td>
                            </tr>

                            <tr>
                                <th>User Account</th>
                                <td>{{$user->account}}</td>
                            </tr>

                            <tr>
                                <th>Payment Method</th>
                                <td>{{$payment_method->payment_method_name}}</td>
                            </tr>

                            <tr>
                                <th>Withdraw Amount</th>
                                <td>{{$withdraw_amount}}</td>
                            </tr>

                            <tr>
                                <th>Withdraw Date</th>
                                <td>{{$withdraw_date}}</td>
                            </tr>

                        </table>


                        <form id="demo-form" action="{{url('admin/withdraw-preview-save')}}" method="post">
                            @csrf
                            <input type="hidden" name="user" value="{{$user->id}}">
                            <input type="hidden" name="payment_method" value="{{$payment_method->id}}">
                            <input type="hidden" name="withdraw_amount" value="{{$withdraw_amount}}">
                            <input type="hidden" name="withdraw_date" value="{{$withdraw_date}}">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

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

