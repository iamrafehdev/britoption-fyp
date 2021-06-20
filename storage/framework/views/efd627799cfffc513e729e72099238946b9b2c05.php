
<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Withdraw Fund Preview
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Withdraw Fund Preview</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-12">
          <div class="alert alert-info">
                Note : Please check your email to verify OTP
            </div>
        <!-- SELECT2 EXAMPLE -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Withdraw Fund Preview</h3>
          </div>


          

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-12">
                    
                    <!--withdraw preview-->
            <table class="data table table-striped no-margin">

            <tr>
              <th>User Name</th>
              <td><?php echo e(Auth::user()->name); ?></td>
            </tr>

            <tr>
              <th>User Account</th>
              <td><?php echo e(Auth::user()->account); ?></td>
            </tr>

            <tr>
              <th>Payment Method</th>
              <td><?php echo e($payment_method); ?></td>
            </tr>
            
            <tr>
              <th>Wallet Address</th>
              <td><?php echo e($wallet_address); ?></td>
            </tr>

            <tr>
              <th>Withdraw Amount</th>
              <td>$<?php echo e($withdraw_amount); ?></td>
            </tr>
            
            <tr>
              <th>Withdraw Comment</th>
              <td><?php echo e($comment); ?></td>
            </tr>
            
            <?php
            
            $getcharges = DB::table('commissions')->first();
            
            ?>
            <tr>
              <th>Withdraw Charges</th>
              <td><?php echo e($getcharges->withdraw_commission); ?> %</td>
            </tr>
            <?php
             $amount_ded = ($withdraw_amount / 100) * $getcharges->withdraw_commission;
            ?>
             <tr>
              <th>Total Withdraw Amount</th>
              <td style="font-wight:bold">$<?php echo e($withdraw_amount - $amount_ded); ?></td>
            </tr>
            
          </table>
          

                 
                    <form id="demo-form" action="<?php echo e(url('users/withdraw_balance')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="payment_method" value="<?php echo e($payment_method); ?>">
            <input type="hidden" name="withdraw_amount" value="<?php echo e($withdraw_amount); ?>">
            <input type="hidden" name="wallet_address" value="<?php echo e($wallet_address); ?>">
            <input type="hidden" name="comment" value="<?php echo e($comment); ?>">
            
            <div class="col-sm-4">
                 <div class="form-group">
                <lable>OTP</lable>
                <input type="text" name="otp" id="otp" class="form-control" onkeyup="verify_otp()"> <a  onclick="send_new_otp()">Send New OTP Code</a>
                <span id="otp_matched"></span>
                <div id="countdown"></div>
                
            </div>
            </div>
            
            
            <input type="hidden" name="withdraw_date" value="">
            


            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" style="margin-top:10px;">
                <button type="submit" id="btn" disabled class="btn btn-success btn-lg">Submit</button>
              </div>
            </div>

          </form>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
        

        </div>
        <!-- /.box -->  
      </div>    
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo e(asset('public/frontend-theme/js/jquery-2.2.4.min.js')); ?>"></script>

<script>


    function verify_otp()
    {
      var otp = $('#otp').val();
      var _token = $('input[name="_token"]').val();
      
      $.ajax({
        url:"<?php echo e(route('verify_otp.check')); ?>",
        method:"POST",
        data:{otp:otp, _token:_token},
        success:function(result)
        {
              if(result==1)
              {
                
                $('#otp_matched').html('<label class="text-success" style="color:green">OTP Verified</label>');
                $('#btn').attr('disabled', false);
                
              }
              else{
                $('#otp_matched').html('<label class="text-error" style="color:red">OTP Not Verified</label>');
                      $('#btn').attr('disabled', 'disabled');
              }
        
        }
      });
    }
    
    // send new otp code
    function send_new_otp()
    {
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"<?php echo e(route('send_otp.resend')); ?>",
        method:"POST",
        data:{_token:_token},
        success:function(result)
        {
            $('#otp_matched').html('<br><label class="text-success" style="color:green">OTP code sent to your email</label>');
        }
      });
    }
    
    // count down timer
 // Set the date we're counting down to
            var countDownDate = new Date().getTime() + 05 * 60 * 1000;
            
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
            document.getElementById("countdown").innerHTML =   minutes + ":" + seconds;
            
            // If the count down is finished, write some text
            if (distance < 0) {
            	clearInterval(x);
            	document.getElementById("countdown").innerHTML = "OTP CODE EXPIRED";
            }
            }, 1000);
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/withdraw_funds/withdraw_preview.blade.php ENDPATH**/ ?>