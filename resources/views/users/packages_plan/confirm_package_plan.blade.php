@extends('users.layouts.master')
@section('content')

  <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <!-- packages plan -->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="height:600px;">
              <div class="x_title">
                <h2>Packages Plan</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <!-- <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul> -->
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="pricing ui-ribbon-container">
                        <div class="ui-ribbon-wrapper">
                          <div class="ui-ribbon">
                            30% Off
                          </div>
                        </div>
                        <div class="title">
                          <h2>{{$package->package_name}}</h2>
                          <h1>${{$package->package_price}}</h1>
                          <span>Investment Plan</span>
                        </div>
                        <div class="x_content">
                          <div class="">
                            <div class="pricing_features">
                              <ul class="list-unstyled text-left">
                                <li><i class="fa fa-check text-success"></i> Daily Profit <strong>{{$package->daily_profit}}</strong></li>
                                <li><i class="fa fa-check text-success"></i> Monthly Profit <strong>{{$package->daily_profit}}</strong></li>
                                <li><i class="fa fa-check text-success"></i> 6 Month Profit <strong>{{$package->daily_profit}}</strong></li>
                              </ul>
                            </div>
                          </div>
                          <div class="pricing_footer">
                            <a href="{{url('users/buypackage/'.$package->id)}}" class="btn btn-primary btn-block" role="button">Confirm <span> Buy now!</span></a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /packages plan -->

          
        <!-- /page content -->

@endsection


    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd5u1kK4p4BfLGg6HGweOHeG44ex40cgw&libraries=places,drawing&callback=initAutocomplete" async="" defer=""></script> -->