<?php $__env->startSection('content'); ?>

<style>
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Banned Users
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">List Banned Users</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">List Banned Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th> Name</th>
                      <th> Email</th>
                      <th>Phone</th>
                      <th>Country</th>
                      <th>Balance</th>
                      <th>Blocked</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td><?php echo e($user->name); ?></td>
                      <td><?php echo e($user->email); ?></td>
                      <td><?php echo e($user->phone); ?></td>
                      <td><?php echo e($user->country); ?></td>
                      <td><?php echo e($user->balance); ?></td>
                      <td>
                       <label class="switch">
                                      <input type="checkbox" onchange="userBannedStatus(<?php echo e($user->id); ?>)" class="toggle-class status<?php echo e($user->id); ?> "<?php if($user->status==2){echo 'checked';} ?>>
                                      <span class="slider round"></span>
                                    </label>
                      </td>
                      <td>
                        <a href="<?php echo e(url('/admin/user-profile/'.$user->id)); ?>" class="btn btn-warning">View Details</a>
                          
                      </td>
                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>



function userBannedStatus(userID)
{
     var userID = userID;
        var status =0; 

        $.ajax({
            type: "post",
            url: 'admin/BannedUserStatus',
            data: {
        "_token": "<?php echo e(csrf_token()); ?>",
        "status": status,
        "userID":userID
        },
            success: function(data){
             //location.reload();
            }
        });
}


// user detail
function getUserDetail(id)
{  
   
       var ID=  $(".userID").val(id);
        
    $('.modal').modal({show: true});
}

</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/admin/users/banned_users.blade.php ENDPATH**/ ?>