<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background:#1d1d1d;">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="ulogo">
                <a href="{{ url('/admin-dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <span style="color:#fff;"><b>Brit </b>Option</span>
                </a>
            </div>
            <div class="image">
                <img src="{{asset('public/images/user.png')}}" class="rounded-circle" alt="User Image">
            </div>

        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="nav-devider"></li>
            <!-- <li class="header nav-small-cap">PERSONAL</li> -->
            <li class="active" style="color:#fff;">
                <a href="{{ url('/admin-dashboard')}}">
                    <i class="icon-home"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog fa-spin" style="color:#fff;"></i>
                    <span style="color:#fff;">Package Requests</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/packages/requests')}}" style="color:#fff;">Pending Requests</a></li>
                    <li><a href="{{url('admin/packages/approved_requests')}}" style="color:#fff;">Approved Requests</a>
                    </li>
                    <li><a href="{{url('admin/packages/rejected_requests')}}" style="color:#fff;">Rejected Requests</a>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="icon-people" style="color:#fff;"></i>
                    <span style="color:#fff;">Users</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/paid_users')}}" style="color:#fff;">Paid Users</a></li>
                    <li><a href="{{url('/free_users')}}" style="color:#fff;">Free Users</a></li>
                    <li><a href="{{url('/banned_users')}}" style="color:#fff;">Banned Users</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="{{route('admin/fund-withdraw')}}">
                    <i class="icon-people" style="color:#fff;"></i>
                    <span style="color:#fff;">Withdraw</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/withdraw_request')}}" style="color:#fff;">Withdraw Request</a></li>
                    <li>
                        <a href="{{url('admin/withdraw_request_approved')}}" style="color:#fff;">

                            Withdraw Approved
                        </a>
                    </li>
                    <li><a href="{{url('admin/withdraw_request_rejected')}}" style="color:#fff;">Withdraw Rejected</a>
                    </li>

                    <li><a href="{{url('/')}}" style="color:#fff;">View Log</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{route('admin/fund-withdraw')}}">
                    <i class="icon-envelope" style="color:#fff;"></i>
                    <span style="color:#fff;">Mailbox</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/send_marketing_email')}}" style="color:#fff;">Send Mail</a></li>
                    <li><a href="{{url('/')}}" style="color:#fff;">View Log</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="##">
                    <i class="icon-envelope" style="color:#fff;"></i> <span style="color:#fff;">Packages Plan</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('packagesplan/create')}}" style="color:#fff;">Add Package</a></li>
                    <li><a href="{{url('packagesplan/')}}" style="color:#fff;">List Packages</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="##">
                    <i class="icon-envelope" style="color:#fff;"></i> <span style="color:#fff;">Payment Method</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('paymentmethods/create')}}" style="color:#fff;">Add Method</a></li>
                    <li><a href="{{url('paymentmethods/')}}" style="color:#fff;">List Methods</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-support" style="color:#fff;"></i> <span style="color:#fff;">Support Desk</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/support_ticket')}}" style="color:#fff;">List Tickets</a></li>
                </ul>

            </li>

            <!--Setting-->
            <li class="">
                <a href="{{url('admin/setting')}}">
                    <i class="fa fa-cog fa-spin" style="color:#fff;"></i> <span style="color:#fff;">Setting</span>
                    <span class="pull-right-container" style="color:#fff;">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            <!--Setting/-->

        </ul>
    </section>
</aside>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
