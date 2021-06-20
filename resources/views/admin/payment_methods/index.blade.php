@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List Payment Method
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">List Payment Method</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">List Payment Method</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example"
                                       class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Payment Method Name</th>
                                            <th>Payment Method Fee</th>
                                            <th>Logo</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payment_methods as $key=> $methods)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$methods->payment_method_name}}</td>
                                                <td>${{$methods->fee_percentage}}</td>
                                                <td><img width="50"
                                                         src="{{asset('public/payment_method_logo/'.$methods->payment_method_logo) }}">
                                                </td>
                                                <td>{{$methods->status}}</td>
                                                <td>
                                                <!-- <form action="{{ route('paymentmethods.destroy', $methods->id) }}" method="POST">
                          @method('DELETE')
                                                @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                  </form> -->

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

@endsection

