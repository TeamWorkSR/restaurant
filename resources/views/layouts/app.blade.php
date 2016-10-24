<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Restaurant System</title>
    <link rel="shortcut icon" href="{!! asset('assets/favicon.png')!!}" type="image/ico" />
    <!-- Fonts -->
    {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/dist/css/skins/_all-skins.min.css') !!}
    {!! Html::style('assets/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/plugins/validator/css/bootstrapValidator.min.css') !!}
    {!! Html::style('assets/ionicons/css/ionicons.min.css') !!}
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/bootstrap/css/jquery-confirm.min.css') !!}

    {{--    {!! Html::style('assets/plugins/datatables/jquery.dataTables_themeroller.css') !!}--}}

</head>
<?php $current_url = Route::getFacadeRoot()->current()->uri();?>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <input type="hidden" id="url" value="{!! $current_url !!}">
    <header class="main-header">
        <!-- Logo -->
        <a href="{!! url('/') !!}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>OS
            {{--<img src="assets/favicon.png" class="img-responsive">--}}
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Restaurant </b>POS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{!! Auth::getUser()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {!! Auth::getUser()->name !!} - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{!! Auth::getUser()->name !!}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header"><i class="fa fa-dashboard"></i><span> MAIN NAVIGATION</span></li>
                <li class="treeview user">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Employees</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="user"><a href="{!! route('user.index') !!}"><i class="fa fa-circle-o"></i>Employees
                                Group</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-circle-o"></i>Permission Group</a></li>
                    </ul>
                </li>
                <li class="treeview order">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Orders</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="order"><a href="{!! route('order.index') !!}"><i class="fa fa-circle-o"></i> Order
                                List</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> New Order</a></li>
                    </ul>
                </li>
                <li class="treeview purchase">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Purchase</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="purchase"><a href="{!! route('purchase.index') !!}"><i class="fa fa-circle-o"></i>
                                Purchase List</a></li>
                        <li><a href="{!!  url('purchase/addnew')!!}"><i class="fa fa-circle-o"></i> New Purchase</a>
                        </li>
                    </ul>
                </li>
                <li class="table"><a href="{!! route('table.index') !!}"><i class="fa fa-circle-o"></i>
                        <span>Tables</span></a></li>
                <li class="customer"><a href="{!! route('customer.index') !!}"><i class="fa fa-circle-o"></i> <span>Customers</span></a>
                </li>
                <li class="supplier"><a href="{!! route('supplier.index') !!}"><i class="fa fa-circle-o"></i> <span>Suppliers</span></a>
                </li>
                <li class="promotion"><a href="{!! route('promotion.index') !!}"><i class="fa fa-circle-o"></i>
                        <span>Promotions</span></a></li>
                <li class="exchange"><a href="{!! route('exchange.index') !!}"><i class="fa fa-circle-o"></i> <span>Exchanges</span></a>
                </li>
                <li class="category"><a href="{!! route('category.index') !!}"><i class="fa fa-circle-o"></i> <span>Categories</span></a>
                </li>
                <li class="item"><a href="{!! route('item.index') !!}"><i class="fa fa-circle-o"></i> <span>Items</span></a>
                </li>

                <li class="header"><i class="fa fa-recycle"></i><span> Recycle Bin</span></li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="uppercase" style="text-transform: uppercase">
                <i class="fa fa-align-justify"></i>


                @if($current_url=='/' )
                    Home
                @elseif($current_url!='/')
                    {!! $current_url !!}
                @endif

            </h1>
            {{--              <ol class="breadcrumb">
                              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                              <li><a href="#">Examples</a></li>
                              <li class="active">Blank page</li>
                          </ol>--}}

            @yield('breadcrumb')
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="text-transform: uppercase">
                        <i class="fa fa-plus"></i>
                        @if($current_url=='/'  )
                            Home
                        @else
                            {!! $current_url !!}
                        @endif</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="content">
                        @yield('content')
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1
        </div>
        <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->
{!! Html::script('assets/plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! Html::script('assets/plugins/vue.js') !!}
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/plugins/fastclick/fastclick.js') !!}
{!! Html::script('assets/dist/js/app.min.js') !!}
{!! Html::script('assets/plugins/validator/js/bootstrapValidator.min.js') !!}
{!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! Html::script('assets/plugins/jquery.form.min.js') !!}
{!! Html::script('assets/plugins/jquery.number.min.js') !!}
{!! Html::script('assets/plugins/jquery-confirm.min.js') !!}


@stack('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.data').dataTable();

        var url = $('#url').val();
        $('.' + url).addClass('active');
        $('input:reset').click(function () {
            $("form").bootstrapValidator('resetForm', true);
        });
    });
</script>
</body>
</html>
