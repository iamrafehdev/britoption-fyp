@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Daily Investment Profit
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Daily Investment Profit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">Daily Investment Profit</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Tx ID</th>
                    <th>Package Name</th>
                    <th>Profit Amount</th>
                    <th>Profit Percentage</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user_daily_earning as $key=> $daily_profit)
                  
                  <?php
                  //echo $daily_profit->package_plan_id;
                    //  $deposit_fund =   \App\UserDepositFunds::where('user_id',$daily_profit->user_id)->where('package_plan_id',$daily_profit->package_plan_id)->first();

                  ?>
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>Tx #{{$daily_profit->paymentid}}</td>
                    <td>{{$daily_profit->package_name}}</td>
                      <td>${{round($daily_profit->total_amount,2)}}</td>
                    <td>{{$daily_profit->amount}}%</td>
                    <td>{{$daily_profit->payment_date}}</td>
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

