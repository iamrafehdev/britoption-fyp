<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List Setting
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">List Setting</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border" style="background-color:#864ca8;">
                            <h3 class="box-title">List Setting</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Nav tabs -->
                            <div class="vtabs">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#home9"
                                                            role="tab" aria-selected="true"><span><i
                                                    class="ion-home"></i></span> &nbsp Commission</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#withdraw"
                                                            role="tab" aria-selected="false"><span><i
                                                    class="ion-person"></i></span>&nbsp Withdraw</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#roi" role="tab"
                                                            aria-selected="false"><span><i
                                                    class="ion-person"></i></span>&nbsp Roi</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#maintenance"
                                                            role="tab" aria-selected="false"><span><i
                                                    class="ion-person"></i></span>&nbsp Maintenance</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#withdraw_limit"
                                                            role="tab" aria-selected="false"><span><i
                                                    class="ion-person"></i></span>&nbsp Withdraw Limit</a></li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content" style="width:80%">
                                    <div class="tab-pane active show" id="home9" role="tabpanel">
                                        <div class="pad">
                                            <!-- /.box-header -->
                                            <form id="demo-form2" data-parsley-validate
                                                  class="form-horizontal form-label-left"
                                                  action="<?php echo e(url('admin/commission')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">

                                                            <!--<div class="form-group">-->
                                                            <!--  <label>Direct Commission</label>-->
                                                            <!--  <div class="input-group">-->
                                                        <!--  <input type="number" id="package-name" required="required" name="direct_refferal" required="" class="form-control" value="<?php echo e($commission->direct_refferal ? $commission->direct_refferal : ''); ?>">-->
                                                            <!--  <span class="input-group-addon bg-secondary"> % </span>-->
                                                            <!--  </div>-->
                                                            <!--</div>-->

                                                            <div class="form-group">
                                                                <label>Withdraw Commission</label>
                                                                <div class="input-group">
                                                                    <input type="number" id="package-name"
                                                                           required="required"
                                                                           name="withdraw_commission" required=""
                                                                           class="form-control"
                                                                           value="<?php echo e($commission->withdraw_commission); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> % </span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Level 1</label>
                                                                <div class="input-group">
                                                                    <input type="text" id="package-name"
                                                                           required="required" name="level_1"
                                                                           required="" class="form-control"
                                                                           value="<?php echo e($commission ? $commission->level_1 : ''); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> % </span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Level 2</label>
                                                                <div class="input-group">
                                                                    <input type="text" id="package-name"
                                                                           required="required" name="level_2"
                                                                           required="" class="form-control"
                                                                           value="<?php echo e($commission ? $commission->level_2 : ''); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> % </span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Level 3</label>
                                                                <div class="input-group">
                                                                    <input type="text" id="package-name"
                                                                           required="required" name="level_3"
                                                                           required="" class="form-control"
                                                                           value="<?php echo e($commission ? $commission->level_3 : ''); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> % </span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Level 4</label>
                                                                <div class="input-group">
                                                                    <input type="text" id="package-name"
                                                                           required="required" name="level_4"
                                                                           required="" class="form-control"
                                                                           value="<?php echo e($commission ? $commission->level_4 : ''); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> % </span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Level 5</label>
                                                                <div class="input-group">
                                                                    <input type="text" id="package-name"
                                                                           required="required" name="level_5"
                                                                           required="" class="form-control"
                                                                           value="<?php echo e($commission ? $commission->level_5 : ''); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> % </span>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <!--<button class="btn btn-primary" type="button">Cancel</button>-->
                                                            <!--<button class="btn btn-primary" type="reset">Reset</button>-->
                                                            <button type="submit" class="btn btn-success">Save Changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->

                                                </div>
                                            </form>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                    <div class="tab-pane pad" id="withdraw" role="tabpanel">
                                        <div class="col-sm-6 col-12">
                                            <h4>Withdraw Status</h4>
                                        </div>
                                        <div class="col-sm-2 col-6 text-center">

                                        <?php
                                            $data = DB::table('settings')->first();
                                        ?>
                                        <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox"
                                                       class="toggle-class withdraw"<?php if ($data->withdraw_status == 1) {
                                                    echo 'checked';
                                                } ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="tab-pane pad" id="roi" role="tabpanel">
                                        <div class="col-sm-6 col-12">
                                            <h4>Roi Status</h4>
                                        </div>
                                        <div class="col-sm-2 col-6 text-center">

                                        <?php
                                            $data = DB::table('settings')->first();
                                        ?>
                                        <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox"
                                                       class="toggle-class roi"<?php if ($data->roi_status == 1) {
                                                    echo 'checked';
                                                } ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <!--maintenance mode start-->
                                    <div class="tab-pane pad" id="maintenance" role="tabpanel">
                                        <div class="col-sm-6 col-12">
                                            <h4>Maintenance Status</h4>
                                        </div>
                                        <div class="col-sm-2 col-6 text-center">

                                        <?php
                                            $data = DB::table('settings')->first();
                                        ?>
                                        <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox"
                                                       class="toggle-class maintenance"<?php if ($data->maintenance_status == 1) {
                                                    echo 'checked';
                                                } ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <!--maintenance mode end-->


                                    <!--withdraw limit start-->
                                    <div class="tab-pane pad" id="withdraw_limit" role="tabpanel">
                                        <div class="col-sm-6 col-12">
                                            <h4>Withdraw Limit</h4>
                                        </div>
                                        <div class="col-sm-4 col-6 text-center">

                                            <form id="demo-form2" data-parsley-validate
                                                  class="form-horizontal form-label-left"
                                                  action="<?php echo e(url('admin/withdarw_limit')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">

                                                            <div class="form-group">
                                                                <label>Withdraw Limit</label>
                                                                <div class="input-group">
                                                                    <input type="number" id="withdraw-limit"
                                                                           required="required" name="withdraw_limit"
                                                                           required="" class="form-control"
                                                                           value="<?php echo e($data->withdraw_limit); ?>">
                                                                    <span
                                                                        class="input-group-addon bg-secondary"> $ </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <!--<button class="btn btn-primary" type="button">Cancel</button>-->
                                                            <!--<button class="btn btn-primary" type="reset">Reset</button>-->
                                                            <button type="submit" class="btn btn-success">Save Changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->

                                                </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>

                                <!--withdraw limit end-->

                            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        $(function () {
            $('.withdraw').change(function () {
                // alert('dd');
                var status = $(this).prop('checked') == true ? 1 : 0;

                $.ajax({
                    type: "post",
                    url: 'ChangeWithdrawStatus',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "status": status
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
            })

            // maintenance status

            $('.maintenance').change(function () {
                // alert('dd');
                var status = $(this).prop('checked') == true ? 1 : 0;

                $.ajax({
                    type: "post",
                    url: 'ChangeMaintenanceStatus',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "status": status
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
            })

            // roi status
            $('.roi').change(function () {
                // alert('dd');
                var status = $(this).prop('checked') == true ? 1 : 0;

                $.ajax({
                    type: "post",
                    url: 'ChangeRoiStatus',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "status": status
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>