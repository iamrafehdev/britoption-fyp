<?php $__env->startSection('content'); ?>
 <?php 
  $setting = DB::table('settings')->first(); 
  //print_r($setting); die;
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Withdraw Fund
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Withdraw Fund</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-12 col-sm-6 col-lg-6">
        <!-- SELECT2 EXAMPLE -->
        <div class="box">
          <div class="box-header with-border" style="background-color:#864ca8;color:#fff;">
            <h3 class="box-title">Withdraw Fund</h3>

            
          </div>


          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo e(url('users/withdraw-preview')); ?>" method="post">
          <?php echo csrf_field(); ?>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-12">

                  <div class="form-group">
                    <label>Payment Method</label>
                    <select class="form-control select2" required="" name="payment_method">
                      <option value="">Select Method</option>
                      <option value="btc">BTC</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Wallet Address</label>
                          <input type="text" id="last-name" required="required" required="" name="wallet_address" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label>Available Balance</label>
                          <input type="text" id="last-name" readonly required="required"  required="" class="form-control" value="<?php echo e(Auth::user()->balance); ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Amount (Note : Minimum withdraw limit is $<?php echo e($setting->withdraw_limit); ?>)</label>
                          <input type="number" id="last-name" required="required" required="" name="withdraw_amount" min="<?php echo e($setting->withdraw_limit); ?>" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label>Comment</label>
                          <input type="text" id="last-name"  name="comment" class="form-control">
                  </div>

                </div>
              </div>
              <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-default btn-lg" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                      </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </form>

        </div>
        <!-- /.box -->  
      </div>    
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/withdraw_funds/index.blade.php ENDPATH**/ ?>