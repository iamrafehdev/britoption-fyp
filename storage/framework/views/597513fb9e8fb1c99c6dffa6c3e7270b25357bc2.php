<?php $__env->startSection('content'); ?>

 <?php
$status = \App\UserPackagesPlan::where('user_id',Auth::user()->id)->where('payment_status','2')->get();
?>
                
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     My Packages List
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">My Packages List</li>
    </ol>
  </section>
  <br>
  <?php if(count($status)>3): ?>
  <div class="row">
      <div class="col-3"></div>
       <div class="col-6">
<div class="alert alert-danger">
         Your Payment for 3 Packages Request is still Pending. Due to Which Your Account has Blocked.
      </div>
      </div>
      <div class="col-3"></div>
      </div>
      <?php endif; ?>
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
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">My Packages</h3></div>
                <div class="col-md-4 col-sm-4 col-xs-4"></div>
               
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <?php if(count($status)<4): ?>
                    <a href="<?php echo e(route('users/buy-package')); ?>" class="btn btn-success btn-lg">
                    Buy Packages
                    </a>
                    <?php endif; ?>
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
                  <?php $__currentLoopData = $mypackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $packages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($packages->package_name); ?></td>
                    <td><?php echo e($packages->trx_id); ?></td>
                    <td>$<?php echo e($packages->deposit_amount); ?></td>
                    <td><?php echo e($packages->daily_profit); ?>% </td>
                    
                    <td>$<?php echo e($packages->activation_charge); ?></td>
                    <td>
                        <?php if($packages->paystatus==1): ?> 
                        <span class="badge badge-pill badge-success">Active </span>
                     <?php elseif($packages->paystatus==2): ?>
                        <span class="badge badge-pill badge-info">Pending </span>

                     <?php else: ?> 
                       <span class="badge badge-pill badge-danger">Rejected </span>
                      <?php endif; ?></td>
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


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/packages_plan/my_packages.blade.php ENDPATH**/ ?>