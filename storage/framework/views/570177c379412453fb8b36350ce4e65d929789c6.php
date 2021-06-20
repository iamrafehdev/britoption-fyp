
<?php $__env->startSection('content'); ?>
<?php
$total_deposits = \App\UserDepositFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
$total_roi  = \App\UserPayments::where('user_id',$users->id)->sum('amount');
$total_withdraws = \App\UserWithdrawFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
$withdrawable_balance = $users->balance;
$active_pkgs = \App\UserPackagesPlan::where('user_id',$users->id)->where('payment_status','1')->get();
?>

<div class="content-wrapper" style="min-height: 1923.5px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Withdraw Request Detail
      </h1>
      
       <!--transaction detail-->
            <table class="table table-striped no-margin table-bordered">
                 
                  <tbody>
                    
                    <tr>
                        <th>#</th>
                        <td><?php echo e($withdraw_detail->id); ?></td>
                    </tr>
                    
                    <tr>
                        <th>Merchant</th>
                        <td><?php echo e($withdraw_detail->payment_method); ?></td>
                    </tr>
                    
                    <tr>
                        <th>Wallet Address</th>
                        <td><?php echo e($withdraw_detail->wallet_address); ?></td>
                    </tr>
                    
                    <tr>
                        <th>Comment</th>
                        <td><?php echo e($withdraw_detail->comment); ?></td>
                    </tr>
                    
                   
                    
                    <tr>
                        <th>Withdraw Amount</th>
                        <td>$<?php echo e($withdraw_detail->amount); ?></td>
                    </tr>
                    
                     <tr>
                        <th>Charge</th>
                        <td><?php echo e($withdraw_detail->charge); ?>%</td>
                    </tr>
                    
                    <tr>
                        <th>Total Amount</th>
                        <td>$<?php echo e(round($withdraw_detail->amount-$withdraw_detail->comm_amount,3)); ?></td>
                    </tr>
                    
                    <tr>
                        <th>Date Time</th>
                        <td><?php echo e($withdraw_detail->created_at); ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php if($withdraw_detail->status==1): ?>               
                        <span class="badge badge-success">Processed</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw_detail->status==0): ?>               
                        <span class="badge badge-danger">In Processing</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw_detail->status==3): ?>               
                        <span class="badge badge-danger">Rejected</span>
                        <?php endif; ?>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                    
                    <?php if($withdraw_detail->status==0): ?>
                        <form method="post" action="<?php echo e(route('withdraw.process', $withdraw_detail->id)); ?>">
                                            <?php echo e(csrf_field()); ?>

	                    <button type="submit" name="status" value="1" class="btn btn-success btn-sm">Process</button>
	                </form>
	                <br>
	               <button  data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm">Reject</button>

	                <?php endif; ?>
	                </td>
	                </tr>
                
                    
                  </tbody>
            </table>
            
            <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Withdraw Request Rejection</h4>
                      </div>
                     <form action="<?php echo e(route('withdraw.reject', $withdraw_detail->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                      <div class="modal-body">
                            <lable>Message</lable>
                            <textarea class="form-control" name="message"></textarea>
                      </div>
                      <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" >Submit</button>

                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    </form>

                
                  </div>
                </div>
    </section>

    <!-- Main content -->
    <section class="content">
        

      <div class="row">
        <div class="col-lg-3 col-12">
            
           
                    
                        

          <!-- Profile Image -->
          <div class="box bg-inverse bg-dark bg-hexagons-white">
            <div class="box-body box-profile">
              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="https://profitearn.io/public/images/profile-image.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo e($users->name); ?></h3>

              <p class="text-center"><?php echo e($users->account); ?></p>
			  <p><i class="fa fa-envelope pr-15"></i><?php echo e($users->email); ?> </p>
              <p><i class="fa fa-phone pr-15"></i><?php echo e($users->phone); ?></p>
              <p><i class="fa fa-flag pr-15"></i><?php echo e($users->country); ?></p>

     <!--         <div class="row">-->
     <!--         	<div class="col-12">-->
     <!--         		<div class="profile-user-info">-->
						
					<!--	<p><i class="fa fa-map-marker pr-15"></i>123, Lorem Ipsum, Florida, USA</p>-->
					<!--	<p class="mt-25">Social Profile</p>-->
					<!--	<div class="user-social-acount">-->
					<!--		<button class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Facebook</button>-->
					<!--		<button class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i> Twitter</button>-->
					<!--		<button class="btn btn-block btn-social btn-instagram"><i class="fa fa-instagram"></i> Instagram</button>-->
					<!--		<button class="btn btn-block btn-social btn-google"><i class="fa fa-google-plus"></i> Google</button>-->
					<!--	</div>-->
					<!--	<div class="map-box mt-25 mb-0">-->
					<!--		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" height="150" class="w-p100 b-0" allowfullscreen=""></iframe>-->
					<!--	</div>-->
					<!--</div>-->
     <!--        	</div>-->
     <!--         </div>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-9 col-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li><a class="active show" href="#packages_plan" data-toggle="tab">Packages Plan</a></li>
              <li><a href="#deposit_funds" data-toggle="tab" class="">Deposit Funds</a></li>
              <li><a href="#withdraw_funds" data-toggle="tab" class="">Withdraw Funds</a></li>
              <li><a href="#daily_earning" data-toggle="tab" class="">Daily Profit</a></li>

            </ul>
                        
            <div class="tab-content">
             
             <div class="tab-pane active show" id="packages_plan">
                <!-- packages plan -->
				 <table class="table table-striped no-margin table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Package Name</th>
                      <th>Package Price</th>
                      <th>Daily Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $user_packagesplan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $latest_packages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th scope="row"><?php echo e($key+1); ?></th>
                      <td><?php echo e($latest_packages->package_name); ?></td>
                      <td>$<?php echo e($latest_packages->package_price); ?></td>
                      <td><?php echo e($latest_packages->daily_profit); ?> %</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>

                <?php echo e($user_packagesplan->links()); ?>

                
              </div>    
              <!-- /.packages plan -->
              
             <!-- depsit funds -->

              <div class="tab-pane" id="deposit_funds">
                
                    <table class="table table-striped no-margin table-bordered" style="background-color:white;color:black;padding:15px;">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Package Name</th>
                                  <th>Package Price</th>
                                  <th>Deposit Amount</th>
                                  <th>Deposit Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $__currentLoopData = $user_deposit_funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $deposit_fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($key+1); ?></td>
                                  <td><?php echo e($deposit_fund->package_name); ?></td>
                                  <td>$<?php echo e($deposit_fund->package_price); ?></td>
                                  <td class="hidden-phone">$<?php echo e($deposit_fund->amount); ?></td>
                                  <td><?php echo e($deposit_fund->created_date); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                    <?php echo e($user_deposit_funds->links()); ?>

                
              </div>
              <!-- /.depsit funds -->
              
              
            <!-- withdraw funds -->

              <div class="tab-pane" id="withdraw_funds">
                
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
                    <td><span style="color:blue;">$<?php echo e($withdraw->amount); ?></span></td>
                    <td><?php echo e($withdraw->charge); ?>%</td>

                    <td><span style="color:blue;">$<?php echo e(round($withdraw->amount-$withdraw->comm_amount,3)); ?></span></td>

                    <td><?php echo e($withdraw->created_at); ?></td>
                    <td>
                        <?php if($withdraw->status==1): ?>               
                        <span class="badge badge-success">Processed</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw->status==0): ?>               
                        <span class="badge badge-danger">In Processing</span>
                        <?php endif; ?>
                                                
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
        </table>
                <?php echo e($user_withdraw_funds->links()); ?>

                
              </div>
            <!-- /.withdraw-funds -->
            
            
             <!-- daily earning -->

              <div class="tab-pane" id="daily_earning">
                 <table class="table table-striped no-margin table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>TX #</th>
                      <th>Package Name</th>
                      <th>Package Price</th>
                      <th>Profit Amount</th>
                      <th> Date</th>
                    </tr>
                  </thead>
                 <tbody>
                    <?php $__currentLoopData = $user_daily_earning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $daily_profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $package = \App\PackagesPlan::find($daily_profit->package_plan_id);
                    ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td>Tx #<?php echo e($daily_profit->id); ?></td></td>
                      <td><?php echo e($package->package_name); ?></td>
                      <td>$<?php echo e($package->package_price); ?></td>
                      <td class="hidden-phone">$<?php echo e($daily_profit->amount); ?></td>
                      <td><?php echo e($daily_profit->created_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <?php echo e($user_daily_earning->links()); ?>

              </div>
            <!-- /.dailyearning -->

            </div>
            
            
            
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd5u1kK4p4BfLGg6HGweOHeG44ex40cgw&libraries=places,drawing&callback=initAutocomplete" async="" defer=""></script> -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/admin/withdraw_funds/withdraw_request_detail.blade.php ENDPATH**/ ?>