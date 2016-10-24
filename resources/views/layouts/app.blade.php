<?php  $current_url = Route::getFacadeRoot()->current()->uri(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! $current_url=='/'?'Home':ucfirst($current_url) !!} - Restaurant System</title>
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
<body class="sidebar-mini skin-blue-light wysihtml5-supported fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <input type="hidden" id="url" value="{!! $current_url !!}">
    <input type="hidden" id="base_url" value="{!! url()->current() !!}">
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
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user fa-fw"></i>
                            {!! Auth::user()->name !!}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href=""><i class="fa fa-wrench fa-fw"></i> Change Password</a></li>
                            <li><a href="{!! url('/logout') !!}"><i class="fa fa-lock fa-fw"></i> Logout</a></li>
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
                {{--<div class="pull-left image">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{!! Auth::getUser()->name !!}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>--}}
                <div class="clearfix text-center">
                    <h4>Brand Name</h4>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header"><span> MAIN NAVIGATION</span></li>
                <li class="treeview">
                    <a href="#" class="sidebar_menu_a">
                        <i class="fa fa-user"></i>
                        <span>Employees</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{!! route('user.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i>Employees</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i>Groups & Permission
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Groups</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Permission</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#" class="sidebar_menu_a">
                        <i class="fa fa-dashboard"></i>
                        <span>Orders</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="order">
                            <a href="{!! route('order.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i> Order List</a>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> New Order</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Purchase</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="purchase">
                            <a href="{!! route('purchase.index') !!}"><i class="fa fa-circle-o"></i> Purchase List</a>
                        </li>
                        <li>
                            <a href="{!!  url('purchase/addnew')!!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i> New Purchase</a>
                        </li>
                    </ul>
                </li>
                {{--<li><a href="{!! route('table.index') !!}"><i class="fa fa-circle-o"></i>
                        <span>Tables</span></a></li>
                <li><a href="{!! route('customer.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i> <span>Customers</span></a>
                </li>
                <li><a href="{!! route('supplier.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i> <span>Suppliers</span></a>
                </li>
                <li><a href="{!! route('promotion.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i>
                        <span>Promotions</span></a></li>
                <li><a href="{!! route('exchange.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i> <span>Exchanges</span></a>
                </li>
                <li><a href="{!! route('category.index') !!}" class="sidebar_menu_a"><i class="fa fa-circle-o"></i> <span>Categories</span></a>
                </li>
                <li><a href="{!! route('item.index') !!}"><i class="fa fa-circle-o"></i> <span>Items</span></a>
                </li>--}}

                <li class="header"><i class="fa fa-recycle"></i><span> RECYCLE BIN</span></li>

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
                <i class="fa fa-tasks fa-fw"></i>
                {!! $current_url=='/'?'Home':ucfirst($current_url) !!}
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
                        @yield('icon') {!! $current_url=='/'?'Home':ucfirst($current_url) !!}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>--}}
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
        <strong>Copyright &copy; 2016 {!! date('Y')>2016?' - '.date('Y'):'' !!}.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->
{!! Html::script('assets/plugins/jQuery/jquery-2.2.3.min.js') !!}
{{--{!! Html::script('assets/plugins/vue.js') !!}--}}
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
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

        var url = $('#base_url').val();
        $('.sidebar_menu_a').each(function () {
            var sidebar_menu_link = $(this).attr('href');
            if (sidebar_menu_link === url) {
                $(this).parents('li').addClass('active');
            }
        });

        $('input:reset').click(function () {
            $("form").bootstrapValidator('resetForm', true);
        });
    });
</script>
</body>
</html>
