<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS System</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{!! asset('assets/font-awesome/css/font-awesome.min.css')  !!}">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}
            <!-- Styles -->
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dist/css/skins/_all-skins.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dist/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/plugins/validator/css/bootstrapValidator.min.css') !!}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
            <!-- JavaScripts -->
    <script src="{!! asset('assets/plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
    <script src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>
</head>
<body class="hold-transition login-page">

<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
            <a href="../../index2.html">POS System</a>
        </div>
        <hr>
        {{--<p class="login-box-msg">Sign in to start your session</p>--}}
        {{--<form action="" method="post">--}}
        {!! Form::open(['url'=>'/login','method'=>'post']) !!}
        <div class="form-group has-feedback">
            {{--<input type="email" class="form-control" placeholder="Email">--}}
            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'abc@gmail.com']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {{--<input type="password" class="form-control" placeholder="Password">--}}
            {!! Form::password('password',['class'=>'form-control']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>--}}
            {!! Form::submit('Sign In',['class'=>'btn btn-primary btn-block btn-flat']) !!}
            </div>
            <!-- /.col -->
        </div>
        {{--</form>--}}
        {!! Form::close() !!}
        <hr>
        <div class="text-center" style="text-align: center;font-family: cursive;font-size: 19px;">
            Power By
        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="{!! asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/fastclick/fastclick.js') !!}"></script>
<script src="{!! asset('assets/dist/js/app.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/validator/js/bootstrapValidator.min.js') !!}"></script>

<script>
    $(document).ready(function () {

//        $('.form-control').attr('autocomplete', 'off');
        $('.form-control').val('');
        $('form').bootstrapValidator({
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The Username is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        }
                    }
                }

            }
        });
    });
</script>
</body>
</html>
