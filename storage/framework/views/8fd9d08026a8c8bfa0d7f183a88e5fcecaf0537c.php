<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Support Ticket
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Add Support Ticket</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-6">
        <!-- SELECT2 EXAMPLE -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add New Ticket</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>


          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo e(url('users/support_ticket/store')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-12">

                  <div class="form-group">
                    <label>Title/Subject</label>
                    <input type="text" id="subject" required="required" name="subject" required="" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Department</label>
                         <select name="department" class="form-control">
                             <option value="0">Select Department</option>
                             <option value="Support">Support</option>
                         </select>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                          <textarea name="description" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Attach Screenshot</label>
                      <input id="middle-name" name="screenshot_image" required="" class="form-control" type="file" name="middle-name">
                  </div>
                  

                </div>
              </div>
              <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </form>

        </div>
        <!-- /.box -->  
      </div>    
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/support_tickets/create.blade.php ENDPATH**/ ?>