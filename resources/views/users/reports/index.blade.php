@extends('users.layouts.master')
@section('content')
@php
$total_roi  = \App\UserPayments::where('user_id',Auth::user()->id)->sum('total_amount');
$level_amount = \App\UnilevelTransaction::where('user_id',Auth::user()->id)->where('type','L')->sum('amount');
$total_deposits = \App\UserDepositFunds::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
  
  <!-- Withdraw Info Ends Here -->
    <!-- History -->
   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border"style="background-color:#864ca8;">
          <h3 class="box-title">Report</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Order Number</th>
                    <!--<th>Date</th>-->
                    <th>Amount Paid</th>
                    <th>Maximum Return</th>
                    <th>Package Percentage</th>
                    <!--<th>Team Bonus</th>-->
                    <th>Date </th>
                    <th>Status</th>
                    <!--<th>Total</th>-->
                    <!--<th>Total Payable</th>-->
                    <!--<th>PDF</th>-->
                  </tr>
                </thead>
                <tbody>
                    @foreach($mypackages as $key => $data)
                    <tr>
                    <td>{{++$key}}</td>
                    <td>{{$data->trx}}</td>
                    <td style="color:blue">$ {{round($data->amount,2)}}</td>
                    <td style="color:blue">$ {{round($data->amount*2,2)}}</td>
                    <td>
                         @if($data->status ==1)
                            @php $total_investment = $data->amount*2; @endphp
                            {{round(($total_roi+$level_amount)*100/$total_investment,2)}}%
                        @endif

                    </td>
                    <td>{{$data->date}}</td>
                    <td>
                        @if($data->status ==1)
                        <span class="label label-success">Active</span>
                        @endif
                        @if($data->status ==2)
                        <span class="label label-warning">Pending</span>
                        @endif
                        @if($data->status ==3)
                        <span class="label label-danger">Rejected</span>
                        @endif
                        @if($data->status ==4)
                        <span class="label label-info">Expired</span>
                        @endif
                    </td>
                    <!--<td></td>-->
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

