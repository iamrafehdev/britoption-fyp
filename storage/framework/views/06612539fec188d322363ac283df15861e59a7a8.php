<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Packages Plan
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Packages Plan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  
  <?php if(session()->has('message')): ?>
      <div class="alert alert-success">
          <?php echo e(session()->get('message')); ?>

      </div>
  <?php endif; ?>
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
                  <?php $__currentLoopData = $packages_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $packages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($packages->package_name); ?></td>
                    <td>$<?php echo e($packages->package_price); ?></td>
                    <td>$<?php echo e($packages->package_max_price); ?></td>
                    <td><?php echo e($packages->daily_profit); ?> %</td>
                    
                    <td>$<?php echo e($packages->activation_charge); ?></td>
                    <td><?php if($packages->status==1): ?> Active <?php else: ?> Disable <?php endif; ?></td>
                    
                    <td>
                      <a class="btn btn-bold btn-block btn-success" href="<?php echo e(url('users/fund-deposit/'.$packages->id)); ?>">Select plan</a>
                    </td>
                    
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/packages_plan/packages_plan.blade.php ENDPATH**/ ?>