
<?php $usertype = Auth::user()->user_type; ?>
 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color:#1d1d1d;">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="ulogo">
             <a href="<?php echo e(url('/users-dashboard')); ?>">
              <!-- logo for regular state and mobile devices -->
              <span style="color:white"><b>Profit</b>Earn</span>
            </a>
        </div>
        <div class="image">
            <?php if(isset(Auth::user()->profile_image)): ?>
              <img src="<?php echo e(asset('public/images/profile_pictures/'.Auth::user()->profile_image)); ?>" class="rounded-circle" alt="User Image">

            <?php else: ?>
                <img src="<?php echo e(asset('public/images/avatar-png-1.png')); ?>" class="rounded-circle" alt="User Image">
            <?php endif; ?>
        </div>
        <div class="info">
          <span> <?php echo e(Auth::user()->name); ?></span>
                
                <br>
                <br>
        <?php if(Auth::user()->verified==1): ?>
        <span class="badge badge-pill badge-success">Approved</span>
        <?php else: ?>
        <span class="badge badge-pill badge-danger">Not Approved</span>
        <?php endif; ?>
        <br>
         <br>
        <?php if(Auth::user()->user_type=='paid'): ?>
        <span class="badge badge-pill badge-success">Paid User</span>
        <?php else: ?>
        <span class="badge badge-pill badge-danger">Free User</span>
        <?php endif; ?>
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="nav-devider"></li>
        <!-- <li class="header nav-small-cap">PERSONAL</li> -->
        <li class="<?php if(isset($page)) { if($page == 'dashboard') echo "active"; } ?>" style="color:#fff;" >
          <a href="<?php echo e(url('/users-dashboard')); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
       
       
        <li class="treeview <?php if(isset($page)) { if($page == 'packages') echo "active"; } ?>">
          <a href="#">
            <i class="fa fa-dollar" style="color:#fff;"></i> <span style="color:#fff;">Packages</span>
            <span class="pull-right-container"style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo e(url('/users/buy-package')); ?>" style="color:#fff;">Buy Packages</a></li>
            <li><a href="<?php echo e(url('/users/my-package')); ?>" style="color:#fff;">My Packages</a></li>
          </ul>
        </li>
        
       
        <li class="<?php if(isset($page)) { if($page == 'deposit') echo "active"; } ?>">
          <a href="<?php echo e(url('/users/fund_deposit_history')); ?>">
              
            <i class="fa fa-money" style="color:#fff;"></i> <span style="color:#fff;">Deposits</span>
            <span class="pull-right-container" style="color:#fff;">
              
            </span>
          </a>
          
        </li>
        <li class="<?php if(isset($page)) { if($page == 'investment') echo "active"; } ?>">
          <a href="<?php echo e(url('/users/daily_earning_history')); ?>">
            <i class="fa fa-exchange" style="color:#fff;"></i> <span style="color:#fff;">Daily Profit</span>
            <span class="pull-right-container" style="color:#fff;">
              
            </span>
          </a>
          
        </li>
        <li class="treeview <?php echo ($page == "unilevel-tree" ? "active" : "")?>">
          <a href="#">
            <i class="fa fa-dollar" style="color:#fff;"></i> <span style="color:#fff;">Unilevel</span>
            <span class="pull-right-container"style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('/users/unilevel-tree')); ?>" style="color:#fff;">Tree</a></li>
            <li><a href="<?php echo e(url('/users/unilevel-profit')); ?>" style="color:#fff;">My Level Profit</a></li>
          </ul>
          
        </li>
        <!--<li class="<?php if(isset($page)) { if($page == 'referral') echo "active"; } ?>">-->
        <!--  <a href="<?php echo e(url('/users/referral_bonus')); ?>">-->
        <!--    <i class="fa fa-user-plus" style="color:#fff;"></i> <span style="color:#fff;">Referral Bonus</span>-->
        <!--    <span class="pull-right-container" style="color:#fff;">-->
              
        <!--    </span>-->
        <!--  </a>-->
          
        <!--</li>-->
        <li class="<?php if(isset($page)) { if($page == 'withdraw') echo "active"; } ?>">
          <a href="<?php echo e(url('/users/fund_withdraw_history')); ?>">
            <i class="fa fa-usd" style="color:#fff;"></i> <span style="color:#fff;">Withdrawal</span>
            <span class="pull-right-container" style="color:#fff;">
              
            </span>
          </a>
          
        </li>
        
        <li class="treeview <?php echo ($page == "reports" ? "active" : "")?>">
          <a href="<?php echo e(route('/users/reports')); ?>">
            <i class="fa fa-exchange" style="color:#fff;"></i> <span style="color:#fff;">Reports</span>
            <span class="pull-right-container"style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('/users/reports')); ?>" style="color:#fff;">My Smart Contract</a></li>
            
          </ul>
          
        </li>
        
        <li class="<?php if(isset($page)) { if($page == 'profile') echo "active"; } ?>">
          <a href="<?php echo e(url('/users/user-profile/'.Auth::user()->id)); ?>">
            <i class="fa fa-address-book-o" style="color:#fff;"></i> <span style="color:#fff;">Personal Details</span>
            <span class="pull-right-container" style="color:#fff;">
              
            </span>
          </a>
          
        </li>
        
        
        <li class="treeview <?php echo ($page == "support" ? "active" : "")?>">
          <a href="#">
            <i class="fa fa-support" style="color:#fff;"></i> <span style="color:#fff;">Support Desk</span>
            <span class="pull-right-container"style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('/users/support_ticket/create')); ?>" style="color:#fff;">Add New Ticket</a></li>
            <li><a href="<?php echo e(url('/users/support_ticket')); ?>" style="color:#fff;">List Tickets</a></li>
          </ul>
          
        </li>
       
        <li>
          <a href="<?php echo e(route('logout')); ?>">
              
            <i class="fa fa-sign-out" style="font-size: 14px; style="color:#fff;"></i> <span style="color:#fff;">Logout</span>
            <span class="pull-right-container" style="color:#fff;">
              
            </span>
          </a>
          
        </li>

      </ul>
    </section>
  </aside>
  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
  </form><?php /**PATH /home/profitearn/public_html/resources/views/users/layouts/_partials/_nav.blade.php ENDPATH**/ ?>