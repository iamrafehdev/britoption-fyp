@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List Support Tickets
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active"> List Support Tickets</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">Support Tickets</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Ticket #</th>
                    <th>Subject/Title</th>
                    <th>Department</th>
                    <th>Description</th>
                    <!--<th>Image</th>-->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($support_tickets as $key=> $ticket)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$ticket->ticket_no}}</td>
                    <td>{{$ticket->subject}}</td>
                    <td>{{$ticket->department}}</td>
                    <td>{{$ticket->description}}</td>
                    <td>@if($ticket->status=="open")
                        <span class="badge badge-pill badge-success">Open</span>
                        @else
                        <span class="badge badge-pill badge-danger">Close</span>
                        @endif
                        
                    </td>
                    <td>
                        <a href=""><span class="badge badge-pill badge-success">View Detail</span></a>
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

