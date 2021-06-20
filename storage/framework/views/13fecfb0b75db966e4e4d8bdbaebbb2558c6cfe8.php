<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List Packages Plan
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">List Packages Plan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">List Packages Plan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Package Name</th>
                    <th>Package Min Price</th>
                    <th>Package Max Price</th>
                    <th>Daily Profit</th>
                    <th>Activation Charges</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $packages_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $packages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($packages->package_name); ?></td>
                    <td>$<?php echo e($packages->package_price); ?></td>
                    <td>$<?php echo e($packages->package_max_price); ?></td>
                    <td><?php echo e($packages->daily_profit); ?> %</td>
                    
                    <td>$<?php echo e($packages->activation_charge); ?></td>
                    <td><?php echo e($packages->duration); ?></td>
                    <td><?php if($packages->status==1): ?> Active <?php else: ?> Disable <?php endif; ?></td>
                    
                    <td>
                      <!-- <form action="<?php echo e(route('packagesplan.destroy', $packages->id)); ?>" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger">Delete</button>
                      </form> -->
                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                        <a href="<?php echo e(URL::to('packagesplan/' . $packages->id . '/edit')); ?>"><i class="fa fa-edit"></i></a>
                        <!-- <a href="<?php echo e(URL::to('packagesplan/' . $packages->id . '/edit')); ?>"><i class="fa fa-trash-o"></i></a> -->
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/admin/packages_plan/index.blade.php ENDPATH**/ ?>