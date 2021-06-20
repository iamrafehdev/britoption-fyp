<?php $__env->startSection('content'); ?>
<?php
$total_roi  = \App\UserPayments::where('user_id',Auth::user()->id)->sum('total_amount');
$level_amount = \App\UnilevelTransaction::where('user_id',Auth::user()->id)->where('type','L')->sum('amount');
$total_deposits = \App\UserDepositFunds::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
  
  <!-- Withdraw Info Ends Here -->
    <!-- History -->
   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border"style="background-color:#864ca8;">
          <h3 class="box-title">Report</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Order Number</th>
                    <!--<th>Date</th>-->
                    <th>Amount Paid</th>
                    <th>Maximum Return</th>
                    <th>Package Percentage</th>
                    <!--<th>Team Bonus</th>-->
                    <th>Date </th>
                    <th>Status</th>
                    <!--<th>Total</th>-->
                    <!--<th>Total Payable</th>-->
                    <!--<th>PDF</th>-->
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $mypackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e(++$key); ?></td>
                    <td><?php echo e($data->trx); ?></td>
                    <td style="color:blue">$ <?php echo e(round($data->amount,2)); ?></td>
                    <td style="color:blue">$ <?php echo e(round($data->amount*2,2)); ?></td>
                    <td>
                         <?php if($data->status ==1): ?>
                            <?php $total_investment = $data->amount*2; ?>
                            <?php echo e(round(($total_roi+$level_amount)*100/$total_investment,2)); ?>%
                        <?php endif; ?>

                    </td>
                    <td><?php echo e($data->date); ?></td>
                    <td>
                        <?php if($data->status ==1): ?>
                        <span class="label label-success">Active</span>
                        <?php endif; ?>
                        <?php if($data->status ==2): ?>
                        <span class="label label-warning">Pending</span>
                        <?php endif; ?>
                        <?php if($data->status ==3): ?>
                        <span class="label label-danger">Rejected</span>
                        <?php endif; ?>
                        <?php if($data->status ==4): ?>
                        <span class="label label-info">Expired</span>
                        <?php endif; ?>
                    </td>
                    <!--<td></td>-->
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
  <!-- History Ends Here -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/reports/index.blade.php ENDPATH**/ ?>