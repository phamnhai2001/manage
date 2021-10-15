
<!DOCTYPE html>
<html lang="en">
<hesite>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <!-- Bootstrap core CSS     -->
    <link href="../../ad/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="../../ad/assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../../ad/assets/css/themify-icons.css" rel="stylesheet">
</hesite>
<body >
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
<div class="wrapper wrapper-full-page">
        <div class="full-page login-page" data-color="" data-image="../../ad/assets/img/background.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
							<form method="post" action="{{ route('login-process')}}">
								@csrf
                                <div class="card" data-background="color" data-color="blue">
                                    <div class="card-header">
                                        <h3 class="card-title">Login</h3>
                                    </div>
                                    <div class="card-content">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" name="email"  placeholder="Enter email" class="form-control input-no-border">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
											<input type="password" name="password"  placeholder="Password" class="form-control input-no-border">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-fill btn-wd ">Log in</button>
                                    </div>
                                    <div class="forgot">
                                       <a href="/login-doctor">Đăng nhập với tư cách khác ?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
	<script src="../../ad/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="../../ad/assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="../../ad/assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
	<script src="../../ad/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Forms Validations Plugin -->
	<script src="../../ad/assets/js/jquery.validate.min.js"></script>

	<!--  Plugin for DataTables.net  -->
	<script src="../../ad/assets/js/jquery.datatables.js"></script>

	<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
	<script src="../../ad/assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
	<script src="../../ad/assets/js/demo.js"></script>

	<script type="text/javascript">
        $().ready(function(){
            demo.checkFullPageBackgroundImage();

            setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
	</script>
</html>
