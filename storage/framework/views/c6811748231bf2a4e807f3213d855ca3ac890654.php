  <header class="main-header" style="background:#fd961a;">
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '5dae7ea0c09a0877b88827722e91c97f15e4f763';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>


    <!-- Logo -->
    <a href="<?php echo e(url('users-dashboard')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <b class="logo-mini">
          <span class="light-logo">Brit Option</span>
          <span class="dark-logo">Brit Option</span>
      </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        Brit Option
           <img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="logo" class="light-logo">
          <!-- <img src="<?php echo e(asset('public/images/logo-dark-text.png')); ?>" alt="logo" class="dark-logo"> -->
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" style="background:#fd961a;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="search-box">
            <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
            <form class="app-search" style="display: none;">
                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
            </form>
          </li>




          <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(isset(Auth::user()->profile_image)): ?>
              <img src="<?php echo e(asset('public/images/profile_pictures/'.Auth::user()->profile_image)); ?>" class="user-image rounded-circle" alt="User Image">

              <?php else: ?>
<img src="<?php echo e(asset('public/images/avatar-png-1.png')); ?>" class="user-image rounded-circle" alt="User Image">              <?php endif; ?>
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <?php if(isset(Auth::user()->profile_image)): ?>
                <img src="<?php echo e(asset('public/images/profile_pictures/'.Auth::user()->profile_image)); ?>" class="float-left rounded-circle" alt="User Image" style="width:70px; height:70px;">
                <?php else: ?>
                    <img src="<?php echo e(asset('public/images/avatar-png-1.png')); ?>" class="float-left rounded-circle" alt="User Image">
                <?php endif; ?>
                <p>
                  <?php echo e(Auth::user()->name); ?>

                  <small class="mb-5"><?php echo e(Auth::user()->email); ?></small>

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="<?php echo e(url('users/user-profile/'.Auth::user()->id)); ?>"><i class="ion ion-person"></i> My Profile</a>
                  </div>
                  <!--<div class="col-12 text-left">-->
                  <!--  <a href="#"><i class="ion ion-email-unread"></i> Inbox</a>-->
                  <!--</div>-->
                  <div class="col-12 text-left">
                    <a href="<?php echo e(url('users/edit-user-profile')); ?>"><i class="ion ion-settings"></i> Edit Profile</a>
                  </div>
                <!--<div role="separator" class="divider col-12"></div>-->
                <!--  <div class="col-12 text-left">-->
                <!--    <a href="#"><i class="ti-settings"></i> Account Setting</a>-->
                <!--  </div>-->
                <div role="separator" class="divider col-12"></div>
                  <div class="col-12 text-left">
                    <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="Logout" href="<?php echo e(route('logout')); ?>"><i class="fa fa-power-off"></i> Logout</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>-->
          <!--  <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>-->
          <!--</li>-->
        </ul>
      </div>
    </nav>
  </header>

   <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
          </form><?php /**PATH /home/profitearn/public_html/resources/views/users/layouts/_partials/_header.blade.php ENDPATH**/ ?>
