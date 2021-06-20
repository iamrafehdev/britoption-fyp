@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Referral Bonus
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Referral Bonus </li>
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
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">My Referral</h3></div>
            </div>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
            <!--tabs-->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li><a class="active show" href="#free_user" data-toggle="tab">Free User Refferal</a></li>
                  <li><a href="#paid_user" data-toggle="tab" class="">Paid User Refferal</a></li>
                </ul>
                <div class="tab-content">
                   <!--free user tab-->
                    <div class="tab-pane active show" id="free_user">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Member Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($users_free as $key => $data)
                                   
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$data->name}}</td>
                                        <td><span class="badge badge-warning">Free User</span></td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                              </table>
                          </div> 
                    </div>
                   <!--free user tab end-->
                   
                   <!--paid user tab-->
                    <div class="tab-pane show" id="paid_user">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Member Name</th>
                                    <!--<th>Amount</th>-->
                                    <th>Status</th>
                                    <th>Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($paid_free as $key => $data)
                                    
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <!--<td>1</td>-->
                                        <td>{{$data->name}}</td>
                                        <!--<td>$ {{$data->amount}}</td>-->
                                        
                                        <td><span class="badge badge-success">Paid User</span></td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                              </table>
                          </div> 
                    </div>
                   <!--paid user tab end-->
                </div>    
            </div>
            <!--tabs end-->
            
                       
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

