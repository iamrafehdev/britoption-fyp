<?php $__env->startSection('content'); ?>
<?php
$total_deposits = \App\UserDepositFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
$total_roi  = \App\UserPayments::where('user_id',$users->id)->sum('total_amount');
$total_withdraws = \App\UserWithdrawFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
$withdrawable_balance = $users->balance;
$active_pkgs = \App\UserPackagesPlan::where('user_id',$users->id)->where('payment_status','1')->get();
$direct_referral_amount = \App\UnilevelTransaction::where('ref_id',Auth::user()->id)->where('type','D')->sum('amount');
$total_ref = \App\User::where('ref_id',Auth::user()->id)->count();
$level_amount = \App\UnilevelTransaction::where('user_id',Auth::user()->id)->where('type','L')->sum('amount');

$sponser = \App\User::where('id',Auth::user()->id)->first();
$sponser_user='';
if($sponser->ref_id)
{
$sponser_user = \App\User::where('id',$sponser->ref_id)->first();
}

?>


<div class="content-wrapper" style="min-height: 1923.5px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-sm-3">
              <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200">$ <?php echo e(round($total_deposits,2)); ?></div>
                  <div>Deposit</div>
              </div>
            </div>
            
             <div class="col-sm-3">
              <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200">$ <?php echo e(round($total_roi,2)); ?></div>
                  <div>ROI</div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200"><?php echo e(round($total_ref)); ?></div>
                  <div>Direct Referral</div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200">$ <?php echo e(round($total_withdraws,2)); ?></div>
                  <div>Withdrawal</div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200">$ <?php echo e(round($level_amount,2)); ?></div>
                  <div>Level Income</div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200">$ <?php echo e(round($withdrawable_balance,2)); ?></div>
                  <div>Withdrawable Balance</div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                  <div class="font-size-40 font-weight-200"><?php echo e(count($active_pkgs)); ?></div>
                  <div>My Packages</div>
              </div>
            </div>
            
        </div>

      <div class="row">
        <div class="col-lg-3 col-12">

          <!-- Profile Image -->
          <div class="box bg-inverse bg-dark bg-hexagons-white">
            <div class="box-body box-profile">
              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="https://profitearn.io/public/images/profile-image.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo e($users->name); ?></h3>
              <p class="text-center"><?php echo e($users->account); ?></p>
              <?php 
              if($sponser_user)
              {
              ?>
            <p class="text-center">Sponser : <?php echo e($sponser_user->name); ?></p>
            <?php
            }
            ?>
			  <p><i class="fa fa-envelope pr-15"></i><?php echo e($users->email); ?> </p>
              <p><i class="fa fa-phone pr-15"></i><?php echo e($users->phone); ?></p>
              <p><i class="fa fa-flag pr-15"></i><?php echo e($users->country); ?></p>

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
              <li><a href="#unilevel_funds" data-toggle="tab" class="">Unilevel Funds</a></li>
            </ul>
                        
            <div class="tab-content">
             
             <div class="tab-pane active show" id="packages_plan">
                <!-- packages plan -->
				 <table id="example" class="table table-striped no-margin table-bordered">
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


              </div>    
              <!-- /.packages plan -->
              
             <!-- depsit funds -->

              <div class="tab-pane" id="deposit_funds">
                
                    <table id="example6" class="table table-striped no-margin table-bordered" style="background-color:white;color:black;padding:15px;">
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
                          <td class="hidden-phone">$<?php echo e(round($deposit_fund->amount,2)); ?></td>
                          <td><?php echo e($deposit_fund->created_date); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                
              </div>
              <!-- /.depsit funds -->
              
              
            <!-- withdraw funds -->

              <div class="tab-pane" id="withdraw_funds">
                
                 <table id="example3" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
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
                        <span class="badge badge-danger">In Processing</span>
                        <?php endif; ?>
                        
                        <?php if($withdraw->status==3): ?>               
                        <span class="badge badge-danger">Rejected</span>
                        <?php endif; ?>
                                                
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
        </table>
                
              </div>
            <!-- /.withdraw-funds -->
            
            
             <!-- daily earning -->

              <div class="tab-pane" id="daily_earning">
                 <table id="example4" class="table table-striped no-margin table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tx ID</th>
                      <th>Package Name</th>
                      <!--<th>Package Price</th>-->
                      <th>Profit Amount</th>
                      <th>Profit Percentage</th>
                      <th> Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $user_daily_earning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $daily_profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $package = \App\PackagesPlan::find($daily_profit->package_plan_id);
                    $deposit_fund =   \App\UserDepositFunds::where('user_id',$daily_profit->user_id)->where('package_plan_id',$daily_profit->package_plan_id)->first();

                    ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td>Tx #<?php echo e($daily_profit->id); ?></td></td>
                      <td><?php echo e($package->package_name); ?></td>
                      <!--<td>$<?php echo e($deposit_fund->amount); ?></td>-->
                      <td>$<?php echo e(round($daily_profit->total_amount,2)); ?></td>
                      <td class="hidden-phone"><?php echo e($daily_profit->amount); ?>%</td>
                      <td><?php echo e($daily_profit->created_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            <!-- /.dailyearning -->
            
            <!--unilevel funds-->
            <div class="tab-pane" id="unilevel_funds">
                 <table id="example5" class="table table-striped no-margin table-bordered">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>From</th>
                        <th>Level Commission</th>
                        <th>Amount</th>
                        <th>Level</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $bonus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $usr = \App\User::find($data->ref_id);
                    $commission = \App\Commission::first();
                    if($data->level==1)
                    {
                        $refferal_comm = $commission->level_1;
                    }
                    
                    if($data->level==2)
                    {
                        $refferal_comm = $commission->level_2;
                    }
                    
                    if($data->level==3)
                    {
                        $refferal_comm = $commission->level_3;
                    }
                    
                    if($data->level==4)
                    {
                        $refferal_comm = $commission->level_4;
                    }
                    
                    if($data->level==5)
                    {
                        $refferal_comm = $commission->level_5;
                    }
                    
                    ?>
                    <tr>
                        <td><?php echo e(++$key); ?></td>
                        <td><?php echo e($usr->name); ?></td>
                        <td><?php echo e($refferal_comm); ?>%</td>
                        <td>$<?php echo e(round($data->amount,2)); ?></td>
                        <td>Lvl. <?php echo e($data->level); ?></td>
                        <td><?php echo e($data->date); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
                </table>
              </div>
            <!--/.unilevel funds-->

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
<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/users/user_profile.blade.php ENDPATH**/ ?>