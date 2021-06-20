<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Withdraw Info -->
    

  <!-- Withdraw Info Ends Here -->
    <!-- History -->
   <div class="row">
    <div class="col-12">
        
        <!--filter-->
                <div class="box box-solid bg-dark">
            <div class="box-header with-border"style="background-color:#864ca8;">
              <h3 class="box-title">Filter Withdraw Requests</h3>
            </div>
            <div class="box-body">
                <form class="form" action="<?php echo e(url('admin/withdraw_request_approved_filter')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Start Date:</label>
                                <input type="date" class="form-control" id="email" required name="start_date">
                            </div>
                        </div>
                      <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">End Date:</label>
                                <input type="date" class="form-control" id="email"required  name="end_date">
                            </div>
                        </div>
                        
                        <div class="col-sm-2">
                            <div class="form-group" style="margin-top:25px;">
                                                      
                            <button type="submit" class="btn btn-default">Filter</button>

                            </div>
                        </div>
                      
                    </div>
                  
                </form>
            </div>
        </div>

        <!--filter-->

      <div class="box box-solid bg-dark">
        <div class="box-header with-border"style="background-color:#864ca8;">
          <h3 class="box-title">Fund Withdraw Approved Requests</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Merchant</th>
                    <th>Wallet Address</th>
                    <th>Charge %</th>
                    <th>Amount</th>
                    <!--<th>Total Payable</th>-->
                    <th>Date Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user_withdraw_funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($withdraw->user->name); ?></td>
                    <td><?php echo e($withdraw->user->username); ?></td>
                    <td><?php echo e($withdraw->payment_method); ?></td>
                    <td><?php echo e($withdraw->wallet_address); ?></td>
                    <td><?php echo e($withdraw->charge); ?> %</td>
                    <td><span style="color:blue;">$ <?php echo e($withdraw->amount); ?></span></td>
                    <td><?php echo e($withdraw->created_at); ?></td>
                    <td>
                        <?php if($withdraw->status==1): ?>               
                        <span class="badge badge-success">Processed</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw->status==0): ?>               
                        <span class="badge badge-warning">In Processing</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw->status==3): ?>               
                        <span class="badge badge-danger">Rejected</span>
                        <?php endif; ?>
                                                
                    </td>
                    <td>
                        
                         <a href="<?php echo e(url('admin/withdraw_request/'.$withdraw->id)); ?>"><span class="badge badge-danger">View</span></a>
                        
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
  <!-- History Ends Here -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/admin/withdraw_funds/withdraw_request_approved.blade.php ENDPATH**/ ?>