
<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">

    <div class="row">
        
        
         <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
            <!-- SELECT2 EXAMPLE -->
            <div class="box">
                <div class="box-header with-border">
                    <!--<h3 class="box-title">All Steps are Necessary for the successfull Payment</h3>-->

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            
                                              <p>
                                                  <h3 style="color:red;">All Steps are Necessary for the successfull Payment</h3>
                                                  
                                                  <hr>
                                                  <h4>1. Please click the Button Proceed to Pay.</h4><br><button class="btn btn-success" disabled>Proceed Payment</button>  Button in the Bottom</h4>
                                                  <h4>2. Scan QR Code or copy wallet address </h4><br>
                                                  <h4>3. After "Payment Successfull"   View the Reciept and copy the "Tx ID".</h4>
                                                  <br>
                                                  <span>Like    "Tx ID"  Type the whole Tx ID in the field.</span><br><br>
                                                  <h4>4. Paste it into the Deposit Form and Click the <br> <button class="btn btn-success" disabled>Confirm Payment</button>Button in the Right Panel </h4>
                                              </p>
                                          
                                              <form id="demo-form" action="<?php echo e(url('users/add_payment')); ?>" method="post" target="_blank">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="payment_method" value="<?php echo e($payment_method->id); ?>">
                                                <input type="hidden" name="package_plan_id" value="<?php echo e($packages_plan_id); ?>">
                                                <input type="hidden" name="guid" value="<?php echo e($w_add); ?>">
                                                <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
                                                <input type="hidden" name="btc_amount" value="<?php echo e(round($amount/5570,8)); ?>">
                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                <br>
                                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i>&emsp;Proceed Payment</button>
                                            </form>
                              <!--<script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">-->
                              <!--</script>-->
                                          
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
        </div>
        
        
        
        <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
            <!-- SELECT2 EXAMPLE -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Deposit Form</h3>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <!--withdraw preview-->
                            <table class="data table table-striped no-margin">

                                <tr>
                                    <th>Payment Method</th>
                                    <td><?php echo e($payment_method->payment_method_name); ?></td>
                                </tr>

                                <tr>
                                    <th>Deposit Amount</th>
                                    <td><strong style="font-size:18px;font-weight:bolder;">$  &nbsp; <?php echo e($amount); ?> </strong>
                                        <br>
                                        <!--<strong style="font-size:18px;font-weight:bolder;">BTC  &nbsp;&nbsp;  <?php echo e(round($amount/5570,8)); ?></strong>-->
                                    </td>
                                </tr>
                                <!--<tr>-->
                                <!--  <th>Wallet</th>-->
                                <!--  <td><?php echo e($w_add); ?></td>-->
                                <!--</tr>-->
                                <tr>
                                    <th>Currency</th>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <th>"Tx ID"</th>
                                    <td>
                                        <form id="demo-form" action="<?php echo e(url('users/deposit-funds')); ?>" method="post" target="_blank">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="payment_method" value="<?php echo e($payment_method->id); ?>">
                                            <input type="hidden" name="package_plan_id" value="<?php echo e($packages_plan_id); ?>">
                                            <input type="hidden" name="guid" value="<?php echo e($w_add); ?>">
                                            <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
                                            <input type="hidden" name="btc_amount" value="<?php echo e(round($amount/5570,8)); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <input type="text" class="form-control" name="order_number" placeholder="Reciept's TX ID" autofocus required>
                                            <br>
                                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i>&emsp;Confirm Payment</button>
                                    </td>
                                </tr>
                                </form>
                                <tfoot>
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
        </div>
        
        
        
        
    </div>
</section>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/deposit_funds/preview_gateway_deposit_amount.blade.php ENDPATH**/ ?>