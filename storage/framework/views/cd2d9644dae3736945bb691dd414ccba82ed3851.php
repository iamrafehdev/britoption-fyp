<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List Support Tickets
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active"> List Support Tickets</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-12">

      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h3 class="box-title">Support Tickets</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Ticket #</th>
                    <th>Subject/Title</th>
                    <th>Department</th>
                    <th>Description</th>
                    <!--<th>Image</th>-->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $support_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($ticket->ticket_no); ?></td>
                    <td><?php echo e($ticket->subject); ?></td>
                    <td><?php echo e($ticket->department); ?></td>
                    <td><?php echo e($ticket->description); ?></td>
                    <td><?php if($ticket->status=="open"): ?>
                        <span class="badge badge-pill badge-success">Open</span>
                        <?php else: ?>
                        <span class="badge badge-pill badge-danger">Close</span>
                        <?php endif; ?>
                        
                    </td>
                    <td>
                        <a href=""><span class="badge badge-pill badge-success">View Detail</span></a>
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


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/support_tickets/index.blade.php ENDPATH**/ ?>