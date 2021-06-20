<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Daily Investment Profit
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Daily Investment Profit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">Daily Investment Profit</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Tx ID</th>
                    <th>Package Name</th>
                    <th>Profit Amount</th>
                    <th>Profit Percentage</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $user_daily_earning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $daily_profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <?php
                  //echo $daily_profit->package_plan_id;
                    //  $deposit_fund =   \App\UserDepositFunds::where('user_id',$daily_profit->user_id)->where('package_plan_id',$daily_profit->package_plan_id)->first();

                  ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>Tx #<?php echo e($daily_profit->paymentid); ?></td>
                    <td><?php echo e($daily_profit->package_name); ?></td>
                      <td>$<?php echo e(round($daily_profit->total_amount,2)); ?></td>
                    <td><?php echo e($daily_profit->amount); ?>%</td>
                    <td><?php echo e($daily_profit->payment_date); ?></td>
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


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/account_history/daily_earning_history.blade.php ENDPATH**/ ?>