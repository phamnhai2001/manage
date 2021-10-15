<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ad/assets') }}/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('ad/assets') }}/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Đăng ký tài khoản</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <!-- Bootstrap core CSS     -->
    <link href="{{ asset('ad/assets') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('ad/assets') }}/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('ad/assets') }}/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('ad/assets') }}/css/themify-icons.css" rel="stylesheet">
</head>

<body>
    <div class="section section-white section-signup">
        <div class="static-image">
            <div class="image" style="background-image: url('../site/assets/img/banner-2.jpg')">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <h2 class="text-white">Đăng ký tài khoản</h2>

                        <form action="{{ route('register.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Họ và tên <star>*</star></label>
                                <input type="text" name="full_name" placeholder="Họ và tên"
                                    class="form-control input-no-border"
                                    class="@error('full_name') is-invalid @enderror">
                                @error('full_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Ngày sinh<star>*</star></label>
                                <input type="date" name="date_birth" placeholder="Ngày sinh"
                                    class="form-control input-no-border">
                                @error('date_birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ<star>*</star></label>
                                <input type="text" name="address" placeholder="Địa chỉ"
                                    class="form-control input-no-border">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại<star>*</star></label>
                                <input type="number" name="phone" placeholder="Số điện thoại"
                                    class="form-control input-no-border">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <input type="radio" name="gender" value="0" checked> Nam
                                <input type="radio" name="gender" value="1"> Nữ
                                <!-- <input type="number" required name="phone" placeholder="số điện thoại" class="form-control input-no-border"> -->
                            </div>
                            <div class="form-group">
                                <label>Email<star>*</star></label>
                                <input type="email" name="email" placeholder="Email"
                                    class="form-control input-no-border">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu<star>*</star></label>
                                <input type="password" name="password" placeholder="Password"
                                    class="form-control input-no-border">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="button-signin">
                                <button type="submit" class="btn btn-danger btn-round btn-fill btn-wd">
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="{{ asset('ad/assets') }}/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="{{ asset('ad/assets') }}/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ asset('ad/assets') }}/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="{{ asset('ad/assets') }}/js/bootstrap.min.js" type="text/javascript"></script>



<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{ asset('ad/assets') }}/js/es6-promise-auto.min.js"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('ad/assets') }}/js/bootstrap-selectpicker.js"></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{ asset('ad/assets') }}/js/bootstrap-switch-tags.js"></script>

<!-- Circle Percentage-chart -->
<script src="{{ asset('ad/assets') }}/js/jquery.easypiechart.min.js"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('ad/assets') }}/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('ad/assets') }}/js/sweetalert2.js"></script>

<!-- Wizard Plugin    -->
<script src="{{ asset('ad/assets') }}/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('ad/assets') }}/js/bootstrap-table.js"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ asset('ad/assets') }}/js/paper-dashboard.js"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ asset('ad/assets') }}/js/demo.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        demo.initOverviewDashboard();
        demo.initCirclePercentage();

    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>

</html>
