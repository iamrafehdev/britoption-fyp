@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Fund Deposit History
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Fund Deposit History</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">Fund Deposit History</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Package Name</th>
                    <th>Sender</th>
                    <th>Reciever</th>
                    <th>BTC</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($user_deposit_funds as $key=> $deposit_fund)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>${{$deposit_fund->dollar_amount}}</td>
                    <td>{{$deposit_fund->package_name}}</td>
                    <td>{{$deposit_fund->sender_address}}</td>
                    <td>{{$deposit_fund->reciever_address}}</td>
                    <td>{{round($deposit_fund->btc_amount,2)}}</td>
                    <td>{{$deposit_fund->btc_rate}}</td>
                    <td>
                    @if($deposit_fund->status == 1)
                    <span class="badge badge-success">Confirmed</span>
                    @elseif($deposit_fund->status == 2)
                    <span class="badge badge-warning">Pending</span>
                    @elseif($deposit_fund->status == 3)
                    <span class="badge badge-danger">Rejected</span>
                    @endif
                    </td>
                    <td>{{$deposit_fund->createddate}}</td>
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

