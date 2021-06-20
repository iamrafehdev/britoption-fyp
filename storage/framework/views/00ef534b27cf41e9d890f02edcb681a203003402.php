<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Fund Deposit History
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Fund Deposit History</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">Fund Deposit History</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Package Name</th>
                    <th>Sender</th>
                    <th>Reciever</th>
                    <th>BTC</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $user_deposit_funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $deposit_fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>$<?php echo e($deposit_fund->dollar_amount); ?></td>
                    <td><?php echo e($deposit_fund->package_name); ?></td>
                    <td><?php echo e($deposit_fund->sender_address); ?></td>
                    <td><?php echo e($deposit_fund->reciever_address); ?></td>
                    <td><?php echo e(round($deposit_fund->btc_amount,2)); ?></td>
                    <td><?php echo e($deposit_fund->btc_rate); ?></td>
                    <td>
                    <?php if($deposit_fund->status == 1): ?>
                    <span class="badge badge-success">Confirmed</span>
                    <?php elseif($deposit_fund->status == 2): ?>
                    <span class="badge badge-warning">Pending</span>
                    <?php elseif($deposit_fund->status == 3): ?>
                    <span class="badge badge-danger">Rejected</span>
                    <?php endif; ?>
                    </td>
                    <td><?php echo e($deposit_fund->createddate); ?></td>
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


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/account_history/fund_deposit_history.blade.php ENDPATH**/ ?>