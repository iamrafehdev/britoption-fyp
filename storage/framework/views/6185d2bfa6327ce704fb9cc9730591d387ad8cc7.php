<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List Payment Method
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">List Payment Method</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">List Payment Method</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
               <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Payment Method Name</th>
                      <th>Payment Method Fee</th>
                      <th>Logo</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td><?php echo e($methods->payment_method_name); ?></td>
                      <td>$<?php echo e($methods->fee_percentage); ?></td>
                      <td><img width="50" src="<?php echo e(asset('public/payment_method_logo/'.$methods->payment_method_logo)); ?>"></td>
                      <td><?php echo e($methods->status); ?></td>
                      <td>
                        <!-- <form action="<?php echo e(route('paymentmethods.destroy', $methods->id)); ?>" method="POST">
                          <?php echo method_field('DELETE'); ?>
                          <?php echo csrf_field(); ?>
                          <button class="btn btn-danger">Delete</button>
                        </form> -->
                         
                      </td>
                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
          </div>              
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->   

    </div>
    <!-- /.col -->
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/admin/payment_methods/index.blade.php ENDPATH**/ ?>