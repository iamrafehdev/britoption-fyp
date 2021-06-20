<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Brit Option - Way to Higher Financial Attitude</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('public/frontend-theme/images/favicon.png')); ?>">

    <title>Brit Option</title>
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



            <div class="wrapper">
            <!-- Preloader -->
            <!-- <div class="preloader"></div> -->
            <!--  -->
            <?php echo $__env->make('frontend.layouts._partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>

            <?php echo $__env->make('frontend.layouts._partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </body>
</html>


 <!-- Template JS Files -->
<script src="<?php echo e(asset('public/frontend-theme/js/jquery-2.2.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend-theme/js/custom.js')); ?>"></script>


<?php /**PATH /home/profitearn/public_html/resources/views/frontend/layouts/master.blade.php ENDPATH**/ ?>
