@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Withdraw Info -->


            <!-- Withdraw Info Ends Here -->
            <!-- History -->
            <div class="row">
                <div class="col-12">

                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border" style="background-color:#864ca8;">
                            <h3 class="box-title">Filter Withdraw Requests</h3>
                        </div>
                        <div class="box-body">
                            <form class="form" action="{{url('admin/withdraw_request_filter')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">Start Date:</label>
                                            <input type="date" class="form-control" id="email" required
                                                   name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">End Date:</label>
                                            <input type="date" class="form-control" id="email" required name="end_date">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group" style="margin-top:25px;">

                                            <button type="submit" class="btn btn-default">Filter</button>

                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border" style="background-color:#864ca8;">
                            <h3 class="box-title">Fund Withdraw Requests</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example"
                                       class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Merchant</th>
                                        <th>Wallet Address</th>
                                        <th>Charge %</th>
                                        <th>Amount</th>
                                        <!--<th>Total Payable</th>-->
                                        <th>Date Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_withdraw_funds as $key=> $withdraw)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$withdraw->user->name}}</td>
                                            <td>{{$withdraw->user->username}}</td>
                                            <td>{{$withdraw->payment_method}}</td>
                                            <td>{{$withdraw->wallet_address}}</td>
                                            <td>{{$withdraw->charge}} %</td>
                                            <td><span style="color:blue;">$ {{$withdraw->amount}}</span></td>
                                            <td>{{$withdraw->created_at}}</td>
                                            <td>
                                                @if($withdraw->status==1)
                                                    <span class="badge badge-success">Processed</span>
                                                @endif

                                                @if($withdraw->status==0)
                                                    <span class="badge badge-warning">In Processing</span>
                                                @endif

                                                @if($withdraw->status==3)
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif

                                            </td>
                                            <td>

                                                <a href="{{url('admin/withdraw_request/'.$withdraw->id)}}"><span
                                                        class="badge badge-danger">View</span></a>

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
            <!-- History Ends Here -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

