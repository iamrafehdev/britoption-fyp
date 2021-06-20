<?php $__env->startSection('content'); ?>
 <!-- == Color schemes == -->
    <div class="color-schemes">

       <div class="color-plate">
      		     <h5>Chose color</h5>
    		       <a href="<?php echo e(asset('public/oldtheme/css/colors/defaults-color.css')); ?>" class="single-color defaults-color">Defaults</a>
               <a href="<?php echo e(asset('public/oldtheme/css/colors/red-color.css')); ?>" class="single-color red-color">Red</a>
               <a href="<?php echo e(asset('public/oldtheme/css/colors/purple-color.css')); ?>" class="single-color purple-color">Purple</a>
               <a href="<?php echo e(asset('public/oldtheme/css/colors/sky-color.css')); ?>" class="single-color sky-color">sky</a>
               <a href="<?php echo e(asset('public/oldtheme/css/colors/green-color.css')); ?>" class="single-color green-color">Green</a>
               <a href="<?php echo e(asset('public/oldtheme/css/colors/blue-color.css')); ?>" class="single-color pink-color">Pink</a>
    	  	  </div>
    </div>
     <!-- == /Color schemes == -->
    <section class="page-title page-bg bg-opacity section-padding"style="background-image:url(<?php echo e(asset('public/images/steps.jpg')); ?>);>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<h2>Direct Referral</h2>
    				<div class="breadcrumb">
    					<ul>
    						<li><a href="#">Home</a></li>
    						<li>Referral</li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


<section class="portfolio section-padding">
	<div class="container">
		<div class="section-title">
			<h2>Direct<span> Referral</span></h2>
			<span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
			<p><h7>Imagine, getting paid every time a friend buys an investment package on your recommendation. It is known as Direct Referral Earning.
Spread the word “Brit Option” by sharing your unique register links through your blogs, articles, emails, Facebook posts, tweets and many more. You will get paid for every new client that invests to buy any package through your referral link.
So, what are you waiting for? Grab this opportunity to start your Direct Referral Earning using your referral network.</h7></p>

            <h2>Direct Referral<span>  8% </span></h2>
		</div>

		<div class="row">

		</div>
	</div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/frontend/referral/index.blade.php ENDPATH**/ ?>
