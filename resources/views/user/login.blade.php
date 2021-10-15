<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../site/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../site/assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Đăng nhập </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="../site/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../site/assets/css/gaia.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="../site/assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
</head>

<body>
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <div>
                <div class="alert-icon">
                    <i class="material-icons">check</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <h3>{{ $message }}</h3>
            </div>
        </div>
    @endif
    <div class="section section-white section-signup">
        <div class="static-image">
            <div class="image" style="background-image: url('../site/assets/img/banner-2.jpg')">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <h2 class="text-white">Đăng nhập</h2>

                        <div class="separator separator-danger">✻</div>
                        <form method="post" action="{{ route('login-process-customer') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" placeholder="Enter email"
                                    class="form-control input-no-border">
                                @error('emial')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password"
                                    class="form-control input-no-border">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="button-signin">
                                <button type="submit" class="btn btn-danger btn-round btn-fill btn-wd">
                                    Đăng nhập
                                </button>
                                <button style="border-radius: 15px;"><a href="{{ url('/') }}">Back</a></button>
                            </div>
                            <div class="forgot">
                                <a href="{{ route('register.index') }}" style="color: red;">Đăng ký tài khoản?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<!--   core js files    -->
<script src="../site/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../site/assets/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="../site/assets/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="../site/assets/js/gaia.js"></script>

</html>
