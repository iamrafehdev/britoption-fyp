<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo e(asset('public/frontend-theme/images/favicon.png')); ?>">

	<title>Brit Option</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/vendor_components/bootstrap/dist/css/bootstrap.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/vendor_components/bootstrap-switch/switch.css')); ?>">


    <!--amcharts -->
    <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap-extend -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap-extend.css')); ?>">

    <!-- theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/master_style.css')); ?>">

    <!-- Crypto_Admin skins -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/skins/_all-skins.css')); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">


    <link rel="stylesheet" href="<?php echo e(asset('public/css/treeview.css')); ?>">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

<body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">
                  <?php echo $__env->make('admin.layouts._partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.layouts._partials._nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->yieldContent('content'); ?>
                  <?php echo $__env->make('admin.layouts._partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</body>


    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('public/assets/vendor_components/jquery/dist/jquery.js')); ?>"></script>

    <!-- popper -->
    <script src="<?php echo e(asset('public/assets/vendor_components/popper/dist/popper.min.js')); ?>"></script>

    <!-- Bootstrap 4.0-->
    <script src="<?php echo e(asset('public/assets/vendor_components/bootstrap/dist/js/bootstrap.js')); ?>"></script>

    <!-- Slimscroll -->
    <script src="<?php echo e(asset('public/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>

    <!-- FastClick -->
    <script src="<?php echo e(asset('public/assets/vendor_components/fastclick/lib/fastclick.js')); ?>"></script>

    <!--amcharts charts -->
    <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/gauge.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>

    <!-- webticker -->
    <script src="<?php echo e(asset('public/assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js')); ?>"></script>

    <!-- EChartJS JavaScript -->
    <script src="<?php echo e(asset('public/assets/vendor_components/echarts-master/dist/echarts-en.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/vendor_components/echarts-liquidfill-master/dist/echarts-liquidfill.min.js')); ?>"></script>

    <!-- This is data table -->
    <script src="<?php echo e(asset('public/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo e(asset('public/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>

    <!-- Crypto_Admin App -->
    <script src="<?php echo e(asset('public/js/template.js')); ?>"></script>

    <!-- Crypto_Admin dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('public/js/pages/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/pages/dashboard-chart.js')); ?>"></script>

    <!-- Crypto_Admin for demo purposes -->
    <script src="<?php echo e(asset('public/js/demo.js')); ?>"></script>
   <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        <?php echo Toastr::message(); ?>


<script src="<?php echo e(asset('public/js/treeview.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/treeview_demo.js')); ?>"></script>

<script>
    $(function () {
    "use strict";

    $('#example1').DataTable();
    //  $('#example2').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('#example5').DataTable();
    $('#example6').DataTable();

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });


	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );

	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': false,
	  'searching'   : false,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});

	$('#employeelist').DataTable({
	  'paging'      : true,
	  'lengthChange': false,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});

  }); // End of use strict

</script>


</body>
</html>
<?php /**PATH /home/profitearn/public_html/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>
