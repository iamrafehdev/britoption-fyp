@extends('admin.layouts.master')
@section('content')
    @php
        $total_deposits = \App\UserDepositFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
        $total_roi  = \App\UserPayments::where('user_id',$users->id)->sum('amount');
        $total_withdraws = \App\UserWithdrawFunds::where('user_id',$users->id)->where('status','1')->sum('amount');
        $withdrawable_balance = $users->balance;
        $active_pkgs = \App\UserPackagesPlan::where('user_id',$users->id)->where('payment_status','1')->get();
    @endphp

    <div class="content-wrapper" style="min-height: 1923.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Withdraw Request Detail
            </h1>

            <!--transaction detail-->
            <table class="table table-striped no-margin table-bordered">

                <tbody>

                <tr>
                    <th>#</th>
                    <td>{{$withdraw_detail->id}}</td>
                </tr>

                <tr>
                    <th>Merchant</th>
                    <td>{{$withdraw_detail->payment_method}}</td>
                </tr>

                <tr>
                    <th>Wallet Address</th>
                    <td>{{$withdraw_detail->wallet_address}}</td>
                </tr>

                <tr>
                    <th>Comment</th>
                    <td>{{$withdraw_detail->comment}}</td>
                </tr>


                <tr>
                    <th>Withdraw Amount</th>
                    <td>${{$withdraw_detail->amount}}</td>
                </tr>

                <tr>
                    <th>Charge</th>
                    <td>{{$withdraw_detail->charge}}%</td>
                </tr>

                <tr>
                    <th>Total Amount</th>
                    <td>${{round($withdraw_detail->amount-$withdraw_detail->comm_amount,3)}}</td>
                </tr>

                <tr>
                    <th>Date Time</th>
                    <td>{{$withdraw_detail->created_at}}</td>
                </tr>


                <tr>
                    <th>Status</th>
                    <td>
                        @if($withdraw_detail->status==1)
                            <span class="badge badge-success">Processed</span>
                        @endif

                        @if($withdraw_detail->status==0)
                            <span class="badge badge-danger">In Processing</span>
                        @endif

                        @if($withdraw_detail->status==3)
                            <span class="badge badge-danger">Rejected</span>
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>

                        @if($withdraw_detail->status==0)
                            <form method="post" action="{{route('withdraw.process', $withdraw_detail->id)}}">
                                {{csrf_field()}}
                                <button type="submit" name="status" value="1" class="btn btn-success btn-sm">Process
                                </button>
                            </form>
                            <br>
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm">Reject
                            </button>

                        @endif
                    </td>
                </tr>


                </tbody>
            </table>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Withdraw Request Rejection</h4>
                        </div>
                        <form action="{{route('withdraw.reject', $withdraw_detail->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <lable>Message</lable>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>

                                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>


                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-lg-3 col-12">


                    <!-- Profile Image -->
                    <div class="box bg-inverse bg-dark bg-hexagons-white">
                        <div class="box-body box-profile">
                            {{--              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="https://profitearn.io/public/images/profile-image.png" alt="User profile picture">--}}

                            <h3 class="profile-username text-center">{{$users->name}}</h3>

                            <p class="text-center">{{$users->account}}</p>
                            <p><i class="fa fa-envelope pr-15"></i>{{$users->email}} </p>
                            <p><i class="fa fa-phone pr-15"></i>{{$users->phone}}</p>
                            <p><i class="fa fa-flag pr-15"></i>{{$users->country}}</p>

                            <!--         <div class="row">-->
                            <!--         	<div class="col-12">-->
                            <!--         		<div class="profile-user-info">-->

                            <!--	<p><i class="fa fa-map-marker pr-15"></i>123, Lorem Ipsum, Florida, USA</p>-->
                            <!--	<p class="mt-25">Social Profile</p>-->
                            <!--	<div class="user-social-acount">-->
                            <!--		<button class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Facebook</button>-->
                            <!--		<button class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i> Twitter</button>-->
                            <!--		<button class="btn btn-block btn-social btn-instagram"><i class="fa fa-instagram"></i> Instagram</button>-->
                            <!--		<button class="btn btn-block btn-social btn-google"><i class="fa fa-google-plus"></i> Google</button>-->
                            <!--	</div>-->
                            <!--	<div class="map-box mt-25 mb-0">-->
                            <!--		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" height="150" class="w-p100 b-0" allowfullscreen=""></iframe>-->
                            <!--	</div>-->
                            <!--</div>-->
                            <!--        	</div>-->
                            <!--         </div>-->
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

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active show" id="packages_plan">
                                <!-- packages plan -->
                                <table class="table table-striped no-margin table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        <th>Daily Profit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_packagesplan as $key=> $latest_packages)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$latest_packages->package_name}}</td>
                                            <td>${{$latest_packages->package_price}}</td>
                                            <td>{{$latest_packages->daily_profit}} %</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $user_packagesplan->links() }}

                            </div>
                            <!-- /.packages plan -->

                            <!-- depsit funds -->

                            <div class="tab-pane" id="deposit_funds">

                                <table class="table table-striped no-margin table-bordered"
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
                                            <td class="hidden-phone">${{$deposit_fund->amount}}</td>
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

                                <table id="example"
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
                                            <td><span style="color:blue;">${{$withdraw->amount}}</span></td>
                                            <td>{{$withdraw->charge}}%</td>

                                            <td><span
                                                    style="color:blue;">${{round($withdraw->amount-$withdraw->comm_amount,3)}}</span>
                                            </td>

                                            <td>{{$withdraw->created_at}}</td>
                                            <td>
                                                @if($withdraw->status==1)
                                                    <span class="badge badge-success">Processed</span>
                                                @endif

                                                @if($withdraw->status==0)
                                                    <span class="badge badge-danger">In Processing</span>
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
                                <table class="table table-striped no-margin table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TX #</th>
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        <th>Profit Amount</th>
                                        <th> Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_daily_earning as $key=> $daily_profit)
                                        @php
                                            $package = \App\PackagesPlan::find($daily_profit->package_plan_id);
                                        @endphp
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>Tx #{{$daily_profit->id}}</td>
                                            </td>
                                            <td>{{$package->package_name}}</td>
                                            <td>${{$package->package_price}}</td>
                                            <td class="hidden-phone">${{$daily_profit->amount}}</td>
                                            <td>{{$daily_profit->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $user_daily_earning->links() }}
                            </div>
                            <!-- /.dailyearning -->

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
@endsection

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd5u1kK4p4BfLGg6HGweOHeG44ex40cgw&libraries=places,drawing&callback=initAutocomplete" async="" defer=""></script> -->
