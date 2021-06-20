<?php
    $total_deposits = \App\UserDepositFunds::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $total_roi  = \App\UserPayments::where('user_id',Auth::user()->id)->sum('total_amount');
    $total_withdraws = \App\UserWithdrawFunds::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $withdrawable_balance = Auth::user()->balance;
    $active_pkgs = \App\UserPackagesPlan::where('user_id',Auth::user()->id)->where('payment_status','1')->get();
    $total_ref = \App\User::where('ref_id',Auth::user()->id)->count();
    $direct_referral_amount = \App\UnilevelTransaction::where('ref_id',Auth::user()->id)->where('type','D')->sum('amount');
    $level_amount = \App\UnilevelTransaction::where('user_id',Auth::user()->id)->where('type','L')->sum('amount');
?>

<?php $usertype = Auth::user()->user_type; ?>

<?php $__env->startSection('content'); ?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <?php
    $pending_pkg = \App\UserPackagesPlan::where('user_id', Auth::user()->id)->where('payment_status', '2')->get();

    if ($pending_pkg == NULL) {
        echo '
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="alert alert-warning" role="alert">
      <h5>Your Request for Buying the Package is is process.
      Please Wait for the Admin Confirmation.
      If You do not Recieve any Email within 45 Minutes
      then Please Contact the Support.</h5>
    </div>
    </div>
    <div class="col-md-1"></div>
</div>';
    }
    ?>
    <?php
        $sponsor = \App\User::where('id',Auth::user()->ref_id)->first();
    ?>
    <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                Dashboard
                <small>User panel </small>
            </h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-item" style="width: 500px; margin-right: 120px;margin-top: -10px;"></li>
                <li class="breadcrumb-item"><a href="/users-dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-6">
                    <span>Referral Link : </span><input type="text" class="form-control" readonly
                                                        value=https://britoption.github.io/register?ref=<?php echo e(Auth::user()->username); ?>>
                    <span style="float:left">Sponsor : </span> <strong><?php echo e($sponsor->username); ?></strong>
                </div>
            </div>
            <?php if($usertype=="free"): ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="alert alert-info">
                            <strong>Notice!</strong> Please upgrade your package and enjoy your profit.
                        </div>
                    </div>
                <?php endif; ?>



                <?php if($usertype!="free"): ?>
                    <!--tiles-->
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/fund_deposit_history')); ?>">
                                    <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200">$ <?php echo e(round($total_deposits,2)); ?></div>
                                        <div>Deposit</div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/daily_earning_history')); ?>">
                                    <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200">$ <?php echo e(round($total_roi,2)); ?></div>
                                        <div>ROI</div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-sm-3">
                            <!--<a href="<?php echo e(url('/users/referral_bonus')); ?>">-->
                                <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                                    <div class="font-size-40 font-weight-200"><?php echo e($total_ref); ?></div>
                                    <div>Direct Referrals</div>
                                </div>
                                <!--</a>-->
                            </div>

                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/fund_withdraw_history')); ?>">
                                    <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200">$ <?php echo e(round($total_withdraws,2)); ?></div>
                                        <div>Withdrawal</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/unilevel-profit')); ?>">
                                    <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200">$ <?php echo e(round($level_amount,2)); ?></div>
                                        <div>Level Income</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/fund_withdraw_history')); ?>">
                                    <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200">
                                            $ <?php echo e(round($withdrawable_balance,2)); ?></div>
                                        <div>Withdrawable Balance</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/my-package')); ?>">
                                    <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200"><?php echo e(count($active_pkgs)); ?></div>
                                        <div>My Packages</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="<?php echo e(url('/users/fund_withdraw_history')); ?>">
                                    <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                                        <div class="font-size-40 font-weight-200">
                                            $ <?php echo e(round(Auth::user()->balance,2)); ?></div>
                                        <div>Balance</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="#">
                                    <?php
                                        $total_investment = $total_deposits*2;
                                    ?>
                                    <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                                        <div
                                            class="font-size-40 font-weight-200"><?php echo e(round(($total_roi+$level_amount)*100/$total_investment,2)); ?>

                                            %
                                        </div>

                                        <div>Package Percentage</div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <!--\tiles-->
                <?php endif; ?>


                <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span
                                    class="blue-text"></span></a></div>
                        <script type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                            {
                                "symbols"
                            :
                                [
                                    {
                                        "proName": "OANDA:SPX500USD",
                                        "title": "S&P 500"
                                    },
                                    {
                                        "proName": "OANDA:NAS100USD",
                                        "title": "Nasdaq 100"
                                    },
                                    {
                                        "proName": "FX_IDC:EURUSD",
                                        "title": "EUR/USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:BTCUSD",
                                        "title": "BTC/USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:ETHUSD",
                                        "title": "ETH/USD"
                                    }
                                ],
                                    "colorTheme"
                            :
                                "light",
                                    "isTransparent"
                            :
                                false,
                                    "displayMode"
                            :
                                "adaptive",
                                    "locale"
                            :
                                "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->

                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Market Overview</h4>

                                </div>
                                <div class="box-body">
                                    <div class="chart">
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container">
                                            <div class="tradingview-widget-container__widget"></div>
                                            <div class="tradingview-widget-copyright"><a href="#" rel="noopener"
                                                                                         target="_blank"><span
                                                        class="blue-text">Forex Rates</span></a> by Brit Option
                                            </div>
                                            <script type="text/javascript"
                                                    src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js"
                                                    async>
                                                {
                                                    "width"
                                                :
                                                    770,
                                                        "height"
                                                :
                                                    400,
                                                        "currencies"
                                                :
                                                    [
                                                        "EUR",
                                                        "USD",
                                                        "JPY",
                                                        "GBP",
                                                        "CHF",
                                                        "AUD",
                                                        "CAD",
                                                        "NZD",
                                                        "CNY"
                                                    ],
                                                        "isTransparent"
                                                :
                                                    false,
                                                        "colorTheme"
                                                :
                                                    "light",
                                                        "locale"
                                                :
                                                    "en"
                                                }
                                            </script>
                                        </div>
                                        <!-- TradingView Widget END -->
                                        <!--<div id="chartdiv1" style="height: 500px;"></div>-->
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="#" rel="noopener"
                                                                             target="_blank"><span class="blue-text">Technical Analysis for EURUSD</span></a>
                                    by Brit Option
                                </div>
                                <script type="text/javascript"
                                        src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js"
                                        async>
                                    {
                                        "interval"
                                    :
                                        "1m",
                                            "width"
                                    :
                                        "100%",
                                            "isTransparent"
                                    :
                                        false,
                                            "height"
                                    :
                                        "100%",
                                            "symbol"
                                    :
                                        "FX_IDC:EURUSD",
                                            "showIntervalTabs"
                                    :
                                        true,
                                            "locale"
                                    :
                                        "en",
                                            "colorTheme"
                                    :
                                        "light"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>

                        <div class="col-lg-4 col-12">
                            <html>
                            <head>
                                <!--Load the AJAX API-->
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">

                                    // Load the Visualization API and the corechart package.
                                    google.charts.load('current', {'packages': ['corechart']});

                                    // Set a callback to run when the Google Visualization API is loaded.
                                    google.charts.setOnLoadCallback(drawChart);

                                    // Callback that creates and populates a data table,
                                    // instantiates the pie chart, passes in the data and
                                    // draws it.
                                    function drawChart() {

                                        // Create the data table.
                                        var data = new google.visualization.DataTable();
                                        data.addColumn('string', 'Topping');
                                        data.addColumn('number', 'Slices');
                                        data.addRows([
                                            ['RIO', 3],
                                            [' Referral', 1],
                                            ['Level', 1],
                                            ['Packages', 2]
                                        ]);

                                        // Set chart options
                                        var options = {
                                            'title': 'Account Overview',
                                            'width': 600,
                                            'height': 400
                                        };

                                        // Instantiate and draw our chart, passing in some options.
                                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                        chart.draw(data, options);
                                    }
                                </script>
                            </head>

                            <body>
                            <!--Div that will hold the pie chart-->
                            <div id="chart_div"></div>
                            </body>
                            </html>
                        </div>


                    </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--select mail type model -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Welcome to Brit Option</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <strong>Notice!</strong> Please upgrade your package and enjoy your profit.
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <?php if($usertype=="free"): ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#myModal").modal('show');
            });
        </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profitearn\resources\views/users/dashboard/index.blade.php ENDPATH**/ ?>