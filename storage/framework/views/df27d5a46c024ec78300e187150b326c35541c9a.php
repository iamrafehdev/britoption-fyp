
<header class="header">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160410463-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-160410463-1');
    </script>

    <div class="container">
        <div class="row">
            <!-- Logo Starts -->
            <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                <a href="/">
                    <img class="img-responsive" src="public/frontend-theme/images/logo.png" alt="logo">
                </a>
            </div>
            <!-- Logo Ends -->
            <!-- Statistics Starts -->
            <div class="col-md-7 col-lg-7">
                <ul class="unstyled bitcoin-stats text-center">
                    <li>
                        <h6>9,450 USD</h6><span>Last trade price</span></li>
                    <li>
                        <h6>+5.26%</h6><span>24 hour price</span></li>
                    <li>
                        <h6>12.820 BTC</h6><span>24 hour volume</span></li>
                    <li>
                        <h6>2,231,775</h6><span>active traders</span></li>
                    <li>
                        <div class="btcwdgt-price" data-bw-theme="light" data-bw-cur="usd"></div>
                        <span>Live Bitcoin price</span>
                    </li>
                </ul>
            </div>
            <!-- Statistics Ends -->
            <!-- User Sign In/Sign Up Starts -->
            <div class="col-md-3 col-lg-3">
                <ul class="unstyled user">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="sign-in"><a href="<?php echo e(url('login')); ?>" class="btn btn-primary"><i class="fa fa-user"></i> sign in</a></li>
                        <li class="sign-up"><a href="<?php echo e(url('register')); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> register</a></li>
                    <?php else: ?>
                        <?php if(Auth::user()->role==1): ?>
                            <li class="sign-in"><a href="<?php echo e(url('/admin-dashboard')); ?>" class="btn btn-primary"> Dashboard <i class="fa fa-home"></i></a></li>
                        <?php else: ?>
                            <li class="sign-in"><a href="<?php echo e(url('/users-dashboard')); ?>" class="btn btn-primary"> Dashboard <i class="fa fa-home"></i></a></li>
                        <?php endif; ?>

                    <?php endif; ?>
                </ul>
            </div>
            <!-- User Sign In/Sign Up Ends -->
        </div>
    </div>
    <!-- Navigation Menu Starts -->
    <nav class="site-navigation navigation" id="site-navigation">
        <div class="container">
            <div class="site-nav-inner">
                <!-- Logo For ONLY Mobile display Starts -->
                <a class="logo-mobile" href="index.html">
                    <img class="img-responsive" src="public/frontend-theme/images/logo.png" alt="">
                </a>
                <!-- Logo For ONLY Mobile display Ends -->
                <!-- Toggle Icon for Mobile Starts -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Toggle Icon for Mobile Ends -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <!-- Main Menu Starts -->
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="<?php echo e(url('about-us')); ?>">About us</a></li>
                        <li><a href="<?php echo e(url('our-services')); ?>">Services</a></li>
                        <li><a href="<?php echo e(url('packages')); ?>">Packages</a></li>
                        <li><a href="<?php echo e(url('terms')); ?>">Terms</a></li>

                        <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                        <li><a href="<?php echo e(url('contact-us')); ?>">Contact</a></li>
                        <?php if(auth()->guard()->guest()): ?>
                            <li>
                                <a href="<?php echo e(url('register')); ?>">Register</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('login')); ?>">Sign in</a>
                            </li>
                        <?php else: ?>
                            <?php if(Auth::user()->role==1): ?>
                                <li><a href="<?php echo e(url('/admin-dashboard')); ?>"> Dashboard</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e(url('/users-dashboard')); ?>"> Dashboard</a></li>

                            <?php endif; ?>
                        <?php endif; ?>

                    </ul>
                    <!-- Main Menu Ends -->
                </div>
            </div>
        </div>
        <!-- Search Input Starts -->
        <div class="site-search">
            <div class="container">
                <input type="text" placeholder="type your keyword and hit enter ...">
                <span class="close">×</span>
            </div>
        </div>
        <!-- Search Input Ends -->
    </nav>
    <!-- Navigation Menu Ends -->
</header>
<?php /**PATH C:\xampp\htdocs\profitearn\resources\views/frontend/layouts/_partials/_header.blade.php ENDPATH**/ ?>