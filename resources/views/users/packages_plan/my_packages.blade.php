@extends('users.layouts.master')
@section('content')

 @php
$status = \App\UserPackagesPlan::where('user_id',Auth::user()->id)->where('payment_status','2')->get();
@endphp
                
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     My Packages List
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">My Packages List</li>
    </ol>
  </section>
  <br>
  @if(count($status)>3)
  <div class="row">
      <div class="col-3"></div>
       <div class="col-6">
<div class="alert alert-danger">
         Your Payment for 3 Packages Request is still Pending. Due to Which Your Account has Blocked.
      </div>
      </div>
      <div class="col-3"></div>
      </div>
      @endif
  <!-- Main content -->
  <section class="content">
  
   
  @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
   <div class="row">
       <div class="col-12">
       <div class="box box-solid bg-dark">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">My Packages</h3></div>
                <div class="col-md-4 col-sm-4 col-xs-4"></div>
               
                <div class="col-md-2 col-sm-2 col-xs-2">
                    @if(count($status)<4)
                    <a href="{{route('users/buy-package')}}" class="btn btn-success btn-lg">
                    Buy Packages
                    </a>
                    @endif
                    </div>
            </div>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Order No#</th>
                    <!--<th>Min Price</th>-->
                    <th>Price</th>
                    <th>Daily Profit Upto</th>
                    <th>Activation Charges</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($mypackages as $key=> $packages)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$packages->package_name}}</td>
                    <td>{{$packages->trx_id}}</td>
                    <td>${{$packages->deposit_amount}}</td>
                    <td>{{$packages->daily_profit}}% </td>
                    
                    <td>${{$packages->activation_charge}}</td>
                    <td>
                        @if($packages->paystatus==1) 
                        <span class="badge badge-pill badge-success">Active </span>
                     @elseif($packages->paystatus==2)
                        <span class="badge badge-pill badge-info">Pending </span>

                     @else 
                       <span class="badge badge-pill badge-danger">Rejected </span>
                      @endif</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>              
        </div>
        <!-- /.box-body -->
      </div>
       </div>
    <!-- /.col -->
  </div>

  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

