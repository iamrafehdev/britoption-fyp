@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Packages Plan
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Edit Packages Plan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Packages Plan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-remove"></i></button>
                            </div>
                        </div>


                        <form action="{{url('packagesplan/'.$packagesplan->id)}}" method="post"
                              enctype="multipart/form-data" class=" demo-form2">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">

                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input type="text" id="package-name" required="required"
                                                   value="{{$packagesplan->package_name}}" name="package_name"
                                                   required="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Package Min Price</label>
                                            <input type="text" id="last-name" value="{{$packagesplan->package_price}}"
                                                   required="required" required="" name="package_price"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Package Max Price</label>
                                            <input type="text" id="last-name"
                                                   value="{{$packagesplan->package_max_price}}" required="required"
                                                   required="" name="package_max_price" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Daily Profit</label>
                                            <input id="middle-name" name="daily_profit" required="" class="form-control"
                                                   value="{{$packagesplan->daily_profit}}" type="text"
                                                   name="middle-name">
                                        </div>


                                        <div class="form-group">
                                            <label>Activation Charge</label>
                                            <input id="middle-name" name="activation_charge"
                                                   value="{{$packagesplan->activation_charge}}" required=""
                                                   class="form-control" type="text" name="middle-name">
                                        </div>


                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option value="1" <?php if ($packagesplan->status == "1") {
                                                    echo "selected";
                                                }?>>Active
                                                </option>
                                                <option value="0" <?php if ($packagesplan->status == "0") {
                                                    echo "selected";
                                                }?>>Disable
                                                </option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Home Visible</label>
                                            <select class="form-control" name="home_visible">
                                                <option value="">Select Status</option>
                                                <option value="1" <?php if ($packagesplan->home_visible == "1") {
                                                    echo "selected";
                                                }?>>Active
                                                </option>
                                                <option value="0" <?php if ($packagesplan->home_visible == "0") {
                                                    echo "selected";
                                                }?>>Disable
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Duration</label>
                                            <input id="middle-name" name="duration" required="" class="form-control"
                                                   value="{{$packagesplan->duration}}" type="text" name="middle-name">
                                        </div>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Update</button>
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

@endsection

