<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Approved Requests
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Approved Requests</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border" style="background-color:#864ca8;">
          <h3 class="box-title">Approved Requests</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> Order Number</th>
                      <th>User's Name</th>
                      <th>Amount ( $ )</th>
                      <th>Trx ID#</th>
                      <th>Package</th>
                      <th>Date / Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $all_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $user = \App\User::where('id',$data->userid)->first();
                    $pkg = \App\PackagesPlan::where('id',$data->pkg_id)->first();
                    ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td><?php echo e($data->order_number); ?></td>
                      <td><?php echo e($user->name); ?></td>
                      <td><?php echo e($data->dollaramount); ?></td>
                      <td><?php echo e($data->trx); ?></td>
                      <td><?php echo e($pkg->package_name); ?></td>
                      <td><?php echo e($data->udate); ?></td>
                      <td><span class="label label-success">Active</span></td>
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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/admin/packages_requests/approved.blade.php ENDPATH**/ ?>