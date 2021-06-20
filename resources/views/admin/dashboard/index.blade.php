@extends('admin.layouts.master')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="row gutters-tiny">

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
             <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                <p class="font-weight-600">Active Packages</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>{{$activated_packages_total}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                <p class="font-weight-600">Total Packages</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>{{$packages_total}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="{{url('free_users')}}">
              <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                <p class="font-weight-600">Free Users</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>{{$pending_users_total}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="{{url('paid_users')}}">
              <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                <p class="font-weight-600">Active Users</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>{{$active_users_total}}</strong>
                </p>
              </div>
            </a>
          </div>


          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="{{url('banned_users')}}">
              <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                <p class="font-weight-600">Banned Users</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>{{\App\User::where('status',2)->count()}}</strong>
                </p>
              </div>
            </a>
          </div>


          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                <p class="font-weight-600">Withdraw Requests</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>{{$total_withdraw_request}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                <p class="font-weight-600">All Users Balance</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>${{round($total_users_balance,2)}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                <p class="font-weight-600">Total Deposits</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>${{round($total_deposit,2)}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                <p class="font-weight-600">Total Withdraws</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>${{round($total_withdraw_funds,2)}}</strong>
                </p>
              </div>
            </a>
          </div>



            <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                <p class="font-weight-600">Total Referrals Amount</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>$0</strong>
                </p>
              </div>
            </a>
          </div>

            <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                <p class="font-weight-600">Total Level Amount</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>${{round($total_unilevel_funds,2)}}</strong>
                </p>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                <p class="font-weight-600">Failed Transactions</p>
              </div>
              <div class="box-body">
                <p class="font-size-40">
                  <strong>$0</strong>
                </p>
              </div>
            </a>
          </div>


          <div class="col-6 col-md-4 col-xl-3">
            <a class="box box-link-pop text-center" href="javascript:void(0)">
              <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                <p class="font-weight-600">Admin Earning</p>
              </div>
              <div class="box-body">
{{--                <p class="font-size-40">--}}
{{--                    <?$total_earning = \App\AdminPayments::sum('total_amount');?>--}}

{{--                  <strong>${{round($total_earning,2)}}</strong>--}}
                </p>
              </div>
            </a>
          </div>


        </div>


          <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
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
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
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
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text">Forex Rates</span></a> by Brit Option</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
  {
  "width": 770,
  "height": 400,
  "currencies": [
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
  "isTransparent": false,
  "colorTheme": "light",
  "locale": "en"
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
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/FX_IDC-EURUSD/technicals/" rel="noopener" target="_blank"><span class="blue-text">Technical Analysis for EURUSD</span></a> by Brit Option</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
  {
  "interval": "1m",
  "width": "100%",
  "isTransparent": false,
  "height": "100%",
  "symbol": "FX_IDC:EURUSD",
  "showIntervalTabs": true,
  "locale": "en",
  "colorTheme": "light"
}
  </script>
</div>
<!-- TradingView Widget END -->




        </div>
            </div>

            <!--expiry packages start-->

                <div class="col-sm-6 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h4 class="box-title">Expiry Packages</h4>

                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <!--<th>Package Name</th>-->
                                    <th>Percentage</th>
                                    <th>Action</th>
                                </tr>
                                @php
                                    $user = \App\User::all();
                                @endphp
                                @foreach($user as $users)

                                @php
                                    $total_deposits = \App\UserDepositFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
                                    $total_roi  = \App\UserPayments::where('user_id',$users->id)->sum('total_amount');
                                    $level_amount = \App\UnilevelTransaction::where('user_id',$users->id)->where('type','L')->sum('amount');
                                    $total_investment = $total_deposits*2;

                                 if($total_investment>0)
                                 {
                                    $package_percentage = round(($total_roi+$level_amount)*100/$total_investment,2);
                                    if($package_percentage > 90)
                                    {

                                @endphp
                                <tr>
                                    <td>{{$users->id}}</td>
                                    <td>{{$users->name}}</td>
                                     <td>{{$package_percentage}}%</td>
                                     <td><a href="{{url('admin/user-profile/'.$users->id)}}">Detail</a></td>

                                </tr>
                                @php
                                }
                                }
                                @endphp
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            <!--expiry packages end-->



        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
