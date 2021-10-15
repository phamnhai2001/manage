<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ad/assets') }}/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('ad/assets') }}/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin</title>

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
<div class="wrapper">
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
			<div class="logo">
				<a href="#" class="simple-text logo-mini">
					AD
				</a>

				<a href="#" class="simple-text logo-normal">
					Hi ADMIN
				</a>
			</div>
	    	<div class="sidebar-wrapper">
				<div class="user">
	                <div class="photo">
	                    <img src="{{ asset('ad/assets') }}/img/faces/face-2.jpg" />
	                </div>
	                <div class="info">
						<a data-toggle="collapse" href="#" class="collapsed">
	                        <span>
								ADMIN

							</span>
	                    </a>
	                </div>
	        </div>
	        <ul class="nav">
					<li>
	                    <a href="{{ route('time.index')}}">
	                        <i class="ti-time"></i>
	                        <p>Giờ làm việc</p>
	                    </a>
	                </li>
					<li>
	                    <a href="{{ route('news.index')}}">
	                        <i class="ti-pencil-alt"></i>
	                        <p>Tin tức</p>
	                    </a>
	                </li>
					<li>
	                    <a href="{{ route('specialist.index')}}">
	                        <i class="ti-info-alt"></i>
	                        <p>Chuyên khoa</p>
	                    </a>
	                </li>
					<li>
	                    <a href="{{ route('doctor.index') }}">
	                        <i class="ti-info-alt"></i>
	                        <p>Thông tin bác sĩ</p>
	                    </a>
	                </li>
					<li>
	                    <a href="{{ route('customer.index') }}">
	                        <i class="ti-info-alt"></i>
	                        <p>Thông tin bệnh nhân</p>
	                    </a>
	                </li>
					<li>
	                    <a href="{{ route('rest.index') }}">
	                        <i class="ti-calendar"></i>
	                        <p>Lịch nghỉ bác sĩ</p>
	                    </a>
	                </li>
					<li>
	                    <a href="{{ route('appointment.index') }}">
	                        <i class="ti-calendar"></i>
	                        <p>Lịch hẹn bệnh nhân</p>
	                    </a>
	                </li>

					<li>
	                    <a href="{{ route('statistical.index') }}">
	                        <i class="ti-bar-chart"></i>
	                        <p>Thống kê</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="{{ route('logout') }}">
	                        <i class="ti-export"></i>
	                        <p>Đăng xuất</p>
	                    </a>
	                </li>
	        </ul>
	    	</div>
        </div>

	    <div class="main-panel">
			<nav class="navbar navbar-default">
	            <div class="container-fluid">
					<div class="navbar-minimize">
						<button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
					</div>
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar bar1"></span>
	                        <span class="icon-bar bar2"></span>
	                        <span class="icon-bar bar3"></span>
	                    </button>
	                    <a class="navbar-brand" href="/admin/dashboard">
							QUẢN LÝ
						</a>
	                </div>
	                <div class="collapse navbar-collapse">

	                    <ul class="nav navbar-nav navbar-right">
	                        <li>
	                            <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
	                                <i class="ti-panel"></i>
									<p>Stats</p>
	                            </a>
	                        </li>
	                        <li class="dropdown">
	                            <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
	                                <i class="ti-bell"></i>
	                                <span class="notification">5</span>
									<p class="hidden-md hidden-lg">
										Notifications
										<b class="caret"></b>
									</p>
	                            </a>
	                            <ul class="dropdown-menu">
	                                <li><a href="#not1">Notification 1</a></li>
	                                <li><a href="#not2">Notification 2</a></li>
	                                <li><a href="#not3">Notification 3</a></li>
	                                <li><a href="#not4">Notification 4</a></li>
	                                <li><a href="#another">Another notification</a></li>
	                            </ul>
	                        </li>
							<li>
	                            <a href="#settings" class="btn-rotate">
									<i class="ti-settings"></i>
									<p class="hidden-md hidden-lg">
										Settings
									</p>
	                            </a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </nav>

	        <div class="content">
                <div class="container-fluid">
					<div class="row">
	                	<div class="col-md-12">
	                    	<div class="card">
								<div class="card-header">
	                            </div>
                    			@yield('content')
							</div>
						</div>
					</div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                   eDoctor
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                   Blog
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">me</a>
                    </div>
                </div>
            </footer>
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
