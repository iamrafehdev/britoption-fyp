@extends('admin.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Referral Tree
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Referral Tree</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6"><h3 class="box-title">Referral Tree</h3></div>
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            {!! $tree !!}


                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

