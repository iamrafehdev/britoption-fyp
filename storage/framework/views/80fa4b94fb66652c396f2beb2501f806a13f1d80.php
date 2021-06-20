<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Brit Option - Way to higher financial attitude</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/frontend-theme/images/favicon.png">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend-theme/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend-theme/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend-theme/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend-theme/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend-theme/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend-theme/css/skins/orange.css')); ?>">
    <!-- new css -->
    <script src="<?php echo e(asset('public/frontend-theme/js/modernizr.js')); ?>"></script>

</head>

<body>

<!-- Wrapper Starts -->

<div class="wrapper">
    <div class="container-fluid user-auth">
        <div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
            <!-- Logo Starts -->
            <a class="logo" href="#">
                <img class="img-responsive" src="public/frontend-theme/images/logo.png" alt="logo">
            </a>
            <!-- Logo Ends -->
            <!-- Slider Starts -->
            <div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators Starts -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-testimonials" data-slide-to="1"></li>
                    <li data-target="#carousel-testimonials" data-slide-to="2"></li>
                </ol>
                <!-- Indicators Ends -->
                <!-- Carousel Inner Starts -->
                <div class="carousel-inner">
                    <!-- Carousel Item Starts -->
                    <div class="item active item-1">
                        <div>
                            <blockquote>
                                <p>The name of the first service we provide for you is Forex Trading. With Forex trading
                                    you can earn great profit after investment. Forex trading can be explained as a
                                    network of buyers and sellers,
                                    who transfer currency between each other at an agreed price. Our Services that make
                                    up 80% of global forex trading include EUR/USD, USD/JPY, GBP/USD, USD/CHF, USD/CAD,
                                    and AUD/USD.</p>
                                <footer><span>Forex </span>, Trading</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Carousel Item Ends -->
                    <!-- Carousel Item Starts -->
                    <div class="item item-2">
                        <div>
                            <blockquote>
                                <p>The name of the Second service we provide for you is Cryptocurrency. With
                                    cryptocurrency, you can earn great profit after investment. Brit Option
                                    cryptocurrency trading enables users to gain high profits
                                    with small investments. Users are in a position to make a profit whether the
                                    cryptocurrency price rises or falls. </p>
                                <footer><span>Cryptocurrency </span>, Trading</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Carousel Item Ends -->
                    <!-- Carousel Item Starts -->
                    <div class="item item-3">
                        <div>
                            <blockquote>
                                <p>The last one service we provide for you is Gaming Zone. With Gaming Zone, you can
                                    earn great profit after investment. There are different types of gaming zones like
                                    Arcade Gaming, PC Gaming/Console Gaming, Non-Virtual Gaming Zone (Club based).
                                    Our Client invest their money and get a maximum profit in this platform.</p>
                                <footer><span>Gaming </span>, Zone</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Carousel Item Ends -->
                </div>
                <!-- Carousel Inner Ends -->
            </div>
            <!-- Slider Ends -->
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <!-- Logo Starts -->
            <a class="visible-xs" href="#">
                <img class="img-responsive mobile-logo" src="public/frontend-theme/images/logo.png" alt="logo">
            </a>
            <!-- Logo Ends -->
            <div class="form-container">
                <div>
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <h2 class="title-head hidden-xs">member <span>login</span></h2>
                        <p class="info-form">Send, receive and securely store your coins in your wallet</p>
                    </div>

                    <div class="row">
                        <div class="col-sm-8" style="margin-left:150px">
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('message')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(session('warning')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e(session('warning')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                    </div>


                    <!-- Section Title Ends -->
                    <!-- Form Starts -->
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Input Field Starts -->
                        <div class="form-group">
                            <input type="email" class="<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> form-control" name="email"
                                   value="<?php echo e(old('email')); ?>" placeholder="Your Email *">
                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group">
                            <input type="password" name="password"
                                   class="input_pass <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> form-control" value=""
                                   placeholder="Enter Password">
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                    
                    
                    
                    <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">login</button>
                            <p class="text-center"><a href="<?php echo e(url('password/reset')); ?>">Forgot Password ? </a>
                            <p class="text-center">don't have an account ? <a href="/register">register now</a>
                        </div>
                        <!-- Submit Form Button Ends -->
                    </form>
                    <!-- Form Ends -->
                </div>
            </div>
            <!-- Copyright Text Starts -->
            <p class="text-center copyright-text">Copyright © <?php echo date('Y'); ?> Brit Option All Rights
                Reserved</p>
            <!-- Copyright Text Ends -->
        </div>
    </div>
    <!-- Template JS Files -->

</div>


<!-- Template JS Files -->
<script src="<?php echo e(asset('public/frontend-theme/js/jquery-2.2.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/custom.js')); ?>"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- Wrapper Ends -->
</body>

</html>
<?php /**PATH C:\xampp\htdocs\britoption-fyp\resources\views/auth/login.blade.php ENDPATH**/ ?>