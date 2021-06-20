@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Withdraw Info -->
    <div class="row">
    <div class="col-12">

      <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="alert alert-info" role="alert">
                  Note : You can withdraw your money on the 15th and 30th of each month. Thank Your!
            </div>
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100 bg-dark">
               <thead>
                  <tr>
                    <th style="font-weight:bold;color:#fff;font-size:17px;">Total Available Balance</th>
                    <th style="font-weight:bold;color:#fff;font-size:17px;">Withdrawable Balance</th>
                    <th style="font-weight:bold;color:#fff;font-size:17px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td><strong style="font-weight:bold;color:#fff;font-size:17px;">$ {{number_format((float)Auth::user()->balance, 2, '.', '')}}</strong></td>
                      <td><strong style="font-weight:bold;color:#fff;font-size:17px;">$ {{number_format((float)Auth::user()->balance, 2, '.', '')}}</strong></td>
                      <td><strong style="font-weight:bold;color:#fff;font-size:17px;">
                          @php 
                          $setting = DB::table('settings')->first(); 
                          //print_r($setting); die;
                          @endphp
                          @if($setting->withdraw_status=='1')
                          <a class ="btn btn-warning" href="{{url('users/fund-withdraw')}}">Withdraw Amount</a>
                          @endif
                          </td>
                  </tr>
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
  
  <!-- Withdraw Info Ends Here -->
    <!-- History -->
   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border ">
          <h3 class="box-title">Withdraw History</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Merchant</th>
                    <th>Wallet Address</th>
                    <th>Withdraw Amount</th>
                    <th>Charge</th>
                    <th>Total Amount</th>
                    <th>Date Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($user_withdraw_funds as $key=> $withdraw)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$withdraw->payment_method}}</td>
                    <td>{{$withdraw->wallet_address}}</td>
                    <td><span style="color:blue;">${{round($withdraw->amount,2)}}</span></td>
                    <td>{{$withdraw->charge}}%</td>
                    <td><span style="color:blue;">${{round($withdraw->amount-$withdraw->comm_amount,2)}}</span></td>
                    <td>{{$withdraw->created_at}}</td>
                    <td>
                        @if($withdraw->status==1)               
                        <span class="badge badge-success">Processed</span>
                        @endif
                        
                        @if($withdraw->status==0)               
                        <span class="badge badge-primary">In Processing</span>
                        @endif
                        
                        @if($withdraw->status==3)               
                        <span class="badge badge-danger">Rejected</span>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
        </table>
         {{ $user_withdraw_funds->links() }}
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

