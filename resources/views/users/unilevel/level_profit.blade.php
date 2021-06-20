@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Level Bonus
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active"> Level Bonus </li>
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
        <div class="box-header with-border" style="background-color:#864ca8;">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">Level Bonus</h3></div>
            </div>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
                <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>Amount</th>
                                    <th>Level</th>
                                    <th>Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($bonus as $key => $data)
                                    @php
                                    $usr = \App\User::find($data->ref_id);
                                    @endphp
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$usr->name}}</td>
                                        <td>{{round($data->amount,2)}}</td>
                                        <td>Lvl. {{$data->level}}</td>
                                        <td>{{$data->date}}</td>
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

