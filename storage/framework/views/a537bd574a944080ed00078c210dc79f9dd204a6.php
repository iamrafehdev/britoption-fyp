
<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Level Bonus
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('users-dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active"> Level Bonus </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  
  <?php if(session()->has('message')): ?>
      <div class="alert alert-success">
          <?php echo e(session()->get('message')); ?>

      </div>
  <?php endif; ?>
   <div class="row">
       <div class="col-12">
       <div class="box box-solid bg-dark">
        <div class="box-header with-border" style="background-color:#864ca8;">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">Level Bonus</h3></div>
            </div>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
                <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>Amount</th>
                                    <th>Level</th>
                                    <th>Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $bonus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $usr = \App\User::find($data->ref_id);
                                    ?>
                                    <tr>
                                        <td><?php echo e(++$key); ?></td>
                                        <td><?php echo e($usr->name); ?></td>
                                        <td><?php echo e(round($data->amount,2)); ?></td>
                                        <td>Lvl. <?php echo e($data->level); ?></td>
                                        <td><?php echo e($data->date); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </tbody>
                              </table>
                          </div> 

                       
        </div>
        <!-- /.box-body -->
      </div>
       </div>
    <!-- /.col -->
  </div>

  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/users/unilevel/level_profit.blade.php ENDPATH**/ ?>