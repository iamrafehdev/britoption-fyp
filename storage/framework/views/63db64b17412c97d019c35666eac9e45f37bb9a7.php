<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Packages Plan
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Add Packages Plan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-6">
        <!-- SELECT2 EXAMPLE -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add Packages Plan</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>


          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo e(url('packagesplan')); ?>" method="post">
          <?php echo csrf_field(); ?>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-12">

                  <div class="form-group">
                    <label>Package Name</label>
                    <input type="text" id="package-name" required="required" name="package_name" required="" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Package Min Price</label>
                          <input type="text" id="last-name" required="required" required="" name="package_price" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Package Max Price</label>
                          <input type="text" id="last-name" required="required" required="" name="package_max_price" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Daily Profit</label>
                      <input id="middle-name" name="daily_profit" required="" class="form-control" type="text" name="middle-name">
                  </div>

                  <div class="form-group">
                    <label>Activation Charges</label>
                      <input id="middle-name" name="activation_charge" required="" class="form-control" type="text" name="middle-name">
                  </div>
                  
                   <div class="form-group">
                    <label>Duration</label>
                      <input id="middle-name" name="duration" required="" placeholder="Days" class="form-control" type="text" name="middle-name">
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/profitearn/public_html/resources/views/admin/packages_plan/create.blade.php ENDPATH**/ ?>