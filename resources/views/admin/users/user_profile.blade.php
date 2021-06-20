@extends('admin.layouts.master')
@section('content')
    @php
        $total_deposits = \App\UserDepositFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
        $total_roi  = \App\UserPayments::where('user_id',$users->id)->sum('total_amount');
        $total_withdraws = \App\UserWithdrawFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
        $withdrawable_balance = $users->balance;
        $active_pkgs = \App\UserPackagesPlan::where('user_id',$users->id)->where('payment_status','1')->get();
        $direct_referral_amount = \App\UnilevelTransaction::where('ref_id',$users->id)->where('type','D')->sum('amount');
        $level_amount = \App\UnilevelTransaction::where('user_id',$users->id)->where('type','L')->sum('amount');
        $total_ref = \App\User::where('ref_id',$users->id)->count();
        $sponser = \App\User::where('id',$users->id)->first();
        $sponser_user='';
        if($sponser->ref_id)
        {
        $sponser_user = \App\User::where('id',$sponser->ref_id)->first();
        }

    @endphp

    <div class="content-wrapper" style="min-height: 1923.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active">User profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">$ {{round($total_deposits,2)}}</div>
                        <div>Deposit</div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">$ {{round($total_roi,2)}}</div>
                        <div>ROI</div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">{{$total_ref}}</div>
                        <div>Direct Referral</div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">$ {{round($total_withdraws,2)}}</div>
                        <div>Withdrawal</div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-pink bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">$ {{round($level_amount,2)}}</div>
                        <div>Level Income</div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-info bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">$ {{round($withdrawable_balance,2)}}</div>
                        <div>Withdrawable Balance</div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="box box-body pull-up bg-success bg-hexagons-white text-center">
                        <div class="font-size-40 font-weight-200">{{count($active_pkgs)}}</div>
                        <div>My Packages</div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <a href="{{url('admin/unilevel-tree/'.$users->id)}}">
                        <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                            <div class="font-size-40 font-weight-200">Unilevel</div>
                            <div>Tree</div>
                        </div>
                    </a>
                </div>
                @php
                    $total_investment = $total_deposits*2;

                @endphp
                <?php
                if($total_investment > 0)
                {
                ?>
                <div class="col-sm-3">
                    <a href="#">
                        <div class="box box-body pull-up bg-danger bg-hexagons-white text-center">
                            <div
                                class="font-size-40 font-weight-200">{{round(($total_roi+$level_amount)*100/$total_investment,2)}}
                                %
                            </div>

                            <div>Package Percentage</div>
                        </div>
                    </a>
                </div>
                <?php } ?>


            </div>

            <div class="row">
                <div class="col-lg-3 col-12">

                    <!-- Profile Image -->
                    <div class="box bg-inverse bg-dark bg-hexagons-white">
                        <div class="box-body box-profile">
                            {{--              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="https://profitearn.io/public/images/profile-image.png" alt="User profile picture">--}}

                            <h3 class="profile-username text-center">{{$users->name}}</h3>

                            <p class="text-center">{{$users->account}}</p>
                            @php
                                if($sponser_user)
                                {
                            @endphp
                            <p class="text-center">Sponser : {{$sponser_user->name}}</p>
                            @php
                                }
                            @endphp
                            <p><i class="fa fa-envelope pr-15"></i>{{$users->email}} </p>
                            <p><i class="fa fa-phone pr-15"></i>{{$users->phone}}</p>
                            <p><i class="fa fa-flag pr-15"></i>{{$users->country}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-lg-9 col-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">

                            <li><a class="active show" href="#packages_plan" data-toggle="tab">Packages Plan</a></li>
                            <li><a href="#deposit_funds" data-toggle="tab" class="">Deposit Funds</a></li>
                            <li><a href="#withdraw_funds" data-toggle="tab" class="">Withdraw Funds</a></li>
                            <li><a href="#daily_earning" data-toggle="tab" class="">Daily Profit</a></li>
                            <li><a href="#unilevel_funds" data-toggle="tab" class="">Unilevel Funds</a></li>

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active show" id="packages_plan">
                                <!-- packages plan -->
                                <table id="example" class="table table-striped no-margin table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Order No#</th>
                                        <th>Daily Profit</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_packagesplan as $key=> $latest_packages)

                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$latest_packages->upackage->package_name}}</td>
                                            <td>{{$latest_packages->trx_id}}</td>
                                            <td>{{$latest_packages->daily_profit}} %</td>
                                            <td>

                                                @if(empty($latest_packages->package_status))


                                                    @if($latest_packages->payment_status == 1)
                                                        <span class="label label-success">Active</span>
                                                    @endif
                                                    @if($latest_packages->payment_status == 2)
                                                        <span class="label label-warning">Pending</span>
                                                    @endif
                                                    @if($latest_packages->payment_status == 3)
                                                        <span class="label label-danger">Rejected</span>
                                                    @endif
                                                    <span class="label label-danger"><a
                                                            onclick="loadModal({{$latest_packages->id}})">Action</a></span>
                                                @else
                                                    <span class="label label-success">Expired</span>
                                                @endif


                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <form action="{{url('admin/change_user_package_status')}}"
                                                      method="post">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title">Change Package Status</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="userpackageID"
                                                                   id="userpackageID">
                                                            <input type="hidden" name="user_id" value="{{$users->id}}">
                                                            <p>Are you sure want to expire this package ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">No
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end modal-->
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $user_packagesplan->links() }}

                            </div>
                            <!-- /.packages plan -->

                            <!-- depsit funds -->

                            <div class="tab-pane" id="deposit_funds">

                                <table id="example6" class="table table-striped no-margin table-bordered"
                                       style="background-color:white;color:black;padding:15px;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        <th>Deposit Amount</th>
                                        <th>Deposit Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_deposit_funds as $key=> $deposit_fund)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$deposit_fund->package_name}}</td>
                                            <td>${{$deposit_fund->package_price}}</td>
                                            <td class="hidden-phone">${{round($deposit_fund->amount,2)}}</td>
                                            <td>{{$deposit_fund->created_date}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $user_deposit_funds->links() }}

                            </div>
                            <!-- /.depsit funds -->


                            <!-- withdraw funds -->

                            <div class="tab-pane" id="withdraw_funds">

                                <table id="example3"
                                       class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Merchant</th>
                                        <th>Wallet Address</th>
                                        <th>Withdraw Amount</th>
                                        <th>Charge</th>
                                        <th>Total Amount</th>
                                        <th>Date Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_withdraw_funds as $key=> $withdraw)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$withdraw->payment_method}}</td>
                                            <td>{{$withdraw->wallet_address}}</td>
                                            <td><span style="color:blue;">${{round($withdraw->amount,2)}}</span></td>
                                            <td>{{$withdraw->charge}}%</td>
                                            <td><span
                                                    style="color:blue;">${{round($withdraw->amount-$withdraw->comm_amount,2)}}</span>
                                            </td>

                                            <td>{{$withdraw->created_at}}</td>
                                            <td>
                                                @if($withdraw->status==1)
                                                    <span class="badge badge-success">Processed</span>
                                                @endif

                                                @if($withdraw->status==0)
                                                    <span class="badge badge-primary">In Processing</span>
                                                @endif

                                                @if($withdraw->status==3)
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $user_withdraw_funds->links() }}

                            </div>
                            <!-- /.withdraw-funds -->


                            <!-- daily earning -->
                            <div class="tab-pane" id="daily_earning">
                                <table id="example4" class="table table-striped no-margin table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TX #</th>
                                        <th>Package Name</th>
                                        <!--<th>Package Price</th>-->
                                        <th>Profit Amount</th>
                                        <th>Profit Percentage</th>
                                        <th> Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_daily_earning as $key=> $daily_profit)
                                        @php
                                            $package = \App\PackagesPlan::find($daily_profit->package_plan_id);
                                            $deposit_fund =   \App\UserDepositFunds::where('user_id',$daily_profit->user_id)->where('package_plan_id',$daily_profit->package_plan_id)->first();

                                        @endphp
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>Tx #{{$daily_profit->id}}</td>
                                            </td>
                                            <td>{{$package->package_name}}</td>
                                            <td>${{$daily_profit->total_amount}}</td>
                                            <td class="hidden-phone">{{round($daily_profit->amount,2)}}%</td>
                                            <td>{{$daily_profit->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $user_daily_earning->links() }}
                            </div>
                            <!-- /.dailyearning -->

                            <!--unilevel funds-->
                            <div class="tab-pane" id="unilevel_funds">
                                <table id="example5" class="table table-striped no-margin table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>Level Commission</th>
                                        <th>Amount</th>
                                        <th>Level</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bonus as $key => $data)
                                        @php
                                            $usr = \App\User::find($data->ref_id);
                                            $commission = \App\Commission::first();
                                            if($data->level==1)
                                            {
                                                $refferal_comm = $commission->level_1;
                                            }

                                            if($data->level==2)
                                            {
                                                $refferal_comm = $commission->level_2;
                                            }

                                            if($data->level==3)
                                            {
                                                $refferal_comm = $commission->level_3;
                                            }

                                            if($data->level==4)
                                            {
                                                $refferal_comm = $commission->level_4;
                                            }

                                            if($data->level==5)
                                            {
                                                $refferal_comm = $commission->level_5;
                                            }

                                        @endphp
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$usr->name}}</td>
                                            <td>{{$refferal_comm}}%</td>
                                            <td>${{round($data->amount,2)}}</td>
                                            <td>Lvl. {{$data->level}}</td>
                                            <td>{{$data->date}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!--/.unilevel funds-->

                        </div>


                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

    <script>
        function loadModal(UserPackageID) {

            $("#userpackageID").val(UserPackageID);
            $('#myModal').modal('show');
        }
    </script>
@endsection

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd5u1kK4p4BfLGg6HGweOHeG44ex40cgw&libraries=places,drawing&callback=initAutocomplete" async="" defer=""></script> -->
