@extends('users.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Referral Tree
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Referral Tree </li>
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
                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">My Referral Tree</h3></div>
            </div>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
                {!! $tree !!}

                       
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
      <!--  <h4 class="modal-title">Modal Header</h4>-->
      <!--</div>-->
      <div class="modal-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <td><span id="name"></span></td>
            </tr>
            <tr>
                <th>User Type</th>
                <td><span id="userType"></span></td>
            </tr>
            <tr>
                <th>Total Deposit Amount</th>
                <td><span id="depositAmount"></span></td>
            </tr>
            <tr>
                <th>Total Level Amount</th>
                <td><span id="levelAmount"></span></td>
            </tr>
            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>

function getUserDetail(id)
{  
      var _token = $('input[name="_token"]').val();
      var userID = id;
    $.ajax({
    url:"{{ url('/users/getTreeUserDetail') }}",
    method:"POST",
    data:{userID:userID, _token:_token},
        success:function(result)
        {    
                $("#name").html(result.user.name);
                $("#userType").html(result.user.user_type);
                $("#depositAmount").html('$' +result.deposit);
                $("#levelAmount").html('$' +result.level_amount);

             $('.modal').modal({show: true}); 
        }
   });
   
    
}

</script>
@endsection

