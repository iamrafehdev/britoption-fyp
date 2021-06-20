@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Packages Plan
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Packages Plan</li>
    </ol>
  </section>

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
          <h3 class="box-title">List Packages Plan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Package Name</th>
                    <th>Package Min Price</th>
                    <th>Package Max Price</th>
                    <th>Daily Profit Upto</th>
                    <th>Activation Charges</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($packages_plan as $key=> $packages)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$packages->package_name}}</td>
                    <td>${{$packages->package_price}}</td>
                    <td>${{$packages->package_max_price}}</td>
                    <td>{{$packages->daily_profit}} %</td>
                    
                    <td>${{$packages->activation_charge}}</td>
                    <td>@if($packages->status==1) Active @else Disable @endif</td>
                    
                    <td>
                      <a class="btn btn-bold btn-block btn-success" href="{{url('users/fund-deposit/'.$packages->id)}}">Select plan</a>
                    </td>
                    
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

