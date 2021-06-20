<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Select Payment Methods
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Select Payment Methods</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
      <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-6 col-md-4 col-xl-4">
        <a class="box box-link-shadow text-center pull-up" data-toggle="modal" data-target="#buyModal<?php echo e($method->id); ?>">
          <div class="box-body py-25 bg-light">
            <p class="font-weight-600"><?php echo e($method->payment_method_name); ?>s</p>
          </div>
          <div class="box-body">
            <img  src="<?php echo e(asset('public/payment_method_logo/'.$method->payment_method_logo)); ?>" alt="Lights">
          </div>
        </a>
      </div>
       <!-- payment modal -->

       <div class="modal fade" id="buyModal<?php echo e($method->id); ?>">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add Fund via <strong><?php echo e($method->payment_method_name); ?></strong></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            
              <form method="post" action="<?php echo e(url('users/preview-gateway-deposit-amount')); ?>">
                  <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div id="resu"></div>
                        <input type="hidden" name="paymentmethod" value="<?php echo e($method->id); ?>">
                        <input type="hidden" name="package_id" value="<?php echo e($package_detail->id); ?>">
                        <div class="form-group">
                            <strong class="col-md-12"> Deposit Amount</strong>
                            <br>
                            <br>
                            
                            <div class="input-group">
                                <input type="number" name="amount" class="form-control amount" id="inputAmountAdd" value="" min="<?php echo e($package_detail->package_price); ?>" max="<?php echo e($package_detail->package_max_price); ?>"  placeholder="Amount" required>
                                <span class="input-group-addon"> USD </span>
                            </div>
                            
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <strong class="col-md-12"> Enter your BTC Wallet Address</strong>-->
                        <!--    <br>-->
                        <!--    <br>-->
                        <!--    <div class="input-group">-->
                        <!--        <input type="text" name="w_address" class="form-control amount" id="inputAmountAdd" value=""  placeholder="BTC Wallet Address" required>-->
                                
                        <!--    </div>-->
                            
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right">Preview</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
           
          </div>
          <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        
      <!-- /payment modal -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/deposit_funds/index.blade.php ENDPATH**/ ?>