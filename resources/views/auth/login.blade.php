<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
        Login Admin
        </title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/css/font-awesome.css')}}" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="{{ asset('/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/pages/signin.css')}}" rel="stylesheet" type="text/css">
    </link>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                </a>
                <a class="brand" href="{{ url('/') }}">
                    SPKTM
                </a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="">
                            <a class="" href="#">
                                STMIK YMI Tegal
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="account-container">
        <div class="content clearfix">
            {!! Form::open(['url'=>'login']) !!}
            <h1 class="text-center">
            Admin Login
            </h1>
            <div class="login-fields">
                <p class="text-center">
                    Please provide your details
                </p>
                <div class="field">
                    <label for="username">
                        Username
                    </label>
                    <input class="login username-field" id="username" name="username" placeholder="Username" type="text" value=""/>
                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- /field -->
                <div class="field">
                    <label for="password">
                        Password:
                    </label>
                    <input class="login password-field" id="password" name="password" placeholder="Password" type="password" value=""/>
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="login-actions">
                <span class="login-checkbox">
                    <input class="field login-checkbox" id="Field" name="Field" tabindex="4" type="checkbox" value="First Choice"/>
                    <label class="choice" for="Field">
                        Keep me signed in
                    </label>
                </span>
                <button class="button btn btn-success btn-large">
                Masuk
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script src="{{ asset('/js/jquery-1.7.2.min.js')}}">
    </script>
    <script src="{{ asset('/js/bootstrap.js')}}">
    </script>
    <script src="{{ asset('/js/signin.js')}}">
    </script>
</body>
</html>