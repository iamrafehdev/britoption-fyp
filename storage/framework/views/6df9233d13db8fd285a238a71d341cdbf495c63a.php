<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Withdraw Info -->
    <div class="row">
    <div class="col-12">

      <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="alert alert-info" role="alert">
                  Note : You can withdraw your money on the 15th and 30th of each month. Thank Your!
            </div>
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100 bg-dark">
               <thead>
                  <tr>
                    <th style="font-weight:bold;color:#fff;font-size:17px;">Total Available Balance</th>
                    <th style="font-weight:bold;color:#fff;font-size:17px;">Withdrawable Balance</th>
                    <th style="font-weight:bold;color:#fff;font-size:17px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td><strong style="font-weight:bold;color:#fff;font-size:17px;">$ <?php echo e(number_format((float)Auth::user()->balance, 2, '.', '')); ?></strong></td>
                      <td><strong style="font-weight:bold;color:#fff;font-size:17px;">$ <?php echo e(number_format((float)Auth::user()->balance, 2, '.', '')); ?></strong></td>
                      <td><strong style="font-weight:bold;color:#fff;font-size:17px;">
                          <?php 
                          $setting = DB::table('settings')->first(); 
                          //print_r($setting); die;
                          ?>
                          <?php if($setting->withdraw_status=='1'): ?>
                          <a class ="btn btn-warning" href="<?php echo e(url('users/fund-withdraw')); ?>">Withdraw Amount</a>
                          <?php endif; ?>
                          </td>
                  </tr>
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
  
  <!-- Withdraw Info Ends Here -->
    <!-- History -->
   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border ">
          <h3 class="box-title">Withdraw History</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Merchant</th>
                    <th>Wallet Address</th>
                    <th>Withdraw Amount</th>
                    <th>Charge</th>
                    <th>Total Amount</th>
                    <th>Date Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user_withdraw_funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($withdraw->payment_method); ?></td>
                    <td><?php echo e($withdraw->wallet_address); ?></td>
                    <td><span style="color:blue;">$<?php echo e(round($withdraw->amount,2)); ?></span></td>
                    <td><?php echo e($withdraw->charge); ?>%</td>
                    <td><span style="color:blue;">$<?php echo e(round($withdraw->amount-$withdraw->comm_amount,2)); ?></span></td>
                    <td><?php echo e($withdraw->created_at); ?></td>
                    <td>
                        <?php if($withdraw->status==1): ?>               
                        <span class="badge badge-success">Processed</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw->status==0): ?>               
                        <span class="badge badge-primary">In Processing</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw->status==3): ?>               
                        <span class="badge badge-danger">Rejected</span>
                        <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
        </table>
         <?php echo e($user_withdraw_funds->links()); ?>

        </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->   

    </div>
    <!-- /.col -->
  </div>
  <!-- History Ends Here -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/account_history/fund_withdraw_history.blade.php ENDPATH**/ ?>