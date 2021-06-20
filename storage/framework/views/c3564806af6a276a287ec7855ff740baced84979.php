<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">

		<?php if(session()->has('message')): ?>
		<div class="alert alert-success">
			<?php echo e(session()->get('message')); ?>

		</div>
		<?php endif; ?>
		<style>
		button:hover{
			cursor:pointer;
		}
	</style>
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			
			<div class="portlet box dark">
				
				<div class="portlet-body bitcoin">
					<div class="row">

						<div class="col-md-12 text-center">
							<h3>
								Please Send EXACTLY <span style="color:red"><?php echo e($btc); ?> </span>BTC <br>
								TO 
								<span><img src="<?php echo e(asset('public/images/logo.png')); ?>" style="height:60px;"></span>
							</h3>
							<br>
							<button onclick="myFunction()" style="border:none;background-color:transparent;">
								<input type="text" value="135gg3fGATXRNwrs6W4tkHKZmjsCrDLPY" id="myInput" style="width:270px;border:none;" readonly>
								<!-- The button used to copy the text -->
								
								<i class="fa fa-copy" style="color:blue;font-size:16px;" id="ico"></i></button>
								<br>
								<h2>SCAN TO SEND</h2>
								<img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=135gg3fGATXRNwrs6W4tkHKZmjsCrDLPY">


								<br>
								<h2 id="demo"></h2>
								<div id="websocket">Monitoring</div>
								<script>
            // Set the date we're counting down to
            var countDownDate = new Date().getTime() + 15 * 60 * 1000;
            
            // Update the count down every 1 second
            var x = setInterval(function() {
            
            // Get today's date and time
            var now = new Date().getTime();
            
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            
            // Time calculations for hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML =   minutes + ":" + seconds;
            
            // If the count down is finished, write some text
            if (distance < 0) {
            	clearInterval(x);
            	document.getElementById("demo").innerHTML = "EXPIRED";
            }
            }, 1000);
        </script>
<br>
<p>Scan QR Code or Copy Address to send payment.
	Send <?php echo e($btc); ?> BTC in One Payment.
Dont include transaction fee in this amount.</p>

</div>
</div>
</div>
</div>
</div>
<div class="col-2">
	
</div>
</div>
</section>
</div>
<script>


	var btcs= new WebSocket("wss://ws.blockchain.info/inv");
	btcs.onopen = function(){
		btcs.send(JSON.stringify({"op":"addr_unsub", "addr":"135gg3fGATXRNwrs6W4tkHKZmjsCrDLPY"}));

	};135gg3fGATXRNwrs6W4tkHKZmjsCrDLPY
	btcs.onmessage = function(onmsg){
		var response = JSON.parse(onmsg.data);
		var getOuts = response.x.out;
		var countOuts = getOuts.length;
		for(i=1; i<countOuts; i++)
		{
			var outAdd = response.x.out[i].addr;
			var address = "135gg3fGATXRNwrs6W4tkHKZmjsCrDLPY";
			if(outAdd==address){
				var amount = response.x.out[i].value;
				var calAmount = amount/1000000000;
				document.getElementById("websocket").innerHTML ="Payment Received: " + calAmount + "BTC";
			};
		};
	};


	function myFunction() {
		/* Get the text field */
		var copyText = document.getElementById("myInput");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		/* Copy the text inside the text field */
		document.execCommand("copy");

		/* Alert the copied text */
//alert("Copied the text: " + copyText.value);
}
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/payment_gateways/bitcoin.blade.php ENDPATH**/ ?>