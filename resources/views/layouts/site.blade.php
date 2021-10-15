<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('site/assets') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('site/assets') }}/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>eDoctor</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="{{ asset('site/assets') }}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{ asset('site/assets') }}/css/gaia.css" rel="stylesheet" />
    <link href="{{ asset('site/assets') }}/css/documentation.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('site/assets') }}/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="40">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('site/assets') }}/img/logo-1.png" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <li class="dropdown">
                        <a href="/list-specialist" class="dropdown-toggle">Chuyên khoa</a>
                    </li>
                    <li>
                        <a href="/list-doctor" class="dropdown-toggle">Bác sĩ</a>
                    </li>
                    <li>
                        @if (Session::has('user'))
                            <a href="/list-appointment" class="dropdown-toggle">Lịch hẹn</a>
                        @else
                        @endif
                    </li>
                    <li>
                        <a href="/list-news">Tin tức</a>
                    </li>
                    <li>
                        @if (Session::has('user'))
                            <a href="#" class="dropdown-toggle"
                                data-toggle="dropdown">{{ Session::get('user.full_name') }}</a>
                            <ul class="dropdown-menu dropdown-danger">
                                <li>
                                    <a href="/user/customer/{{ Session::get('user.id_customer') }}">Sửa hồ sơ</a>
                                </li>
                                <li>
                                    <a href="/user/change-password">Đổi mật khẩu</a>
                                </li>
                            </ul>
                    <li>
                        <a href="{{ route('logout-customer') }}" class="btn btn-danger btn-fill">
                            Đăng xuất
                        </a>
                    </li>
                @else
                    <a href="{{ route('login-customer') }}" class="btn btn-danger btn-fill">
                        Đăng nhập
                    </a>
                    @endif
                    </li>
                    <li class="dropdown">
                        <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt"></i> Share
                        </a>
                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    @yield('content')

    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="info">
                        <h5 class="title"><img src="{{ asset('site/assets') }}/img/logo-1.png" alt="logo">
                        </h5>
                        <nav>
                            <ul>
                                <li>
                                    <p style="color: dimgray; font-weight: 600;padding-top: 20px;"> Công ty Cổ phần Công nghệ BookingCare</p>
                                   Đc : 28 Thành Thái, Dịch Vọng, Cầu Giấy, Hà Nội

                                    ĐKKD số: 0106790291. Sở KHĐT Hà Nội cấp ngày 16/03/2015
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="info">
                        <h5 class="title"></h5>
                        <nav>
                            <ul>
                                <li>
                                    <p style="color: dimgray; font-weight: 600;"> Trụ sở tại Hà Nội

                                    </p>
                                    <p> 28 Thành Thái, Dịch Vọng, Cầu Giấy, Hà Nội</p>
                                </li>
                                <li>
                                    <p style="color: dimgray; font-weight: 600;"> Văn phòng tại TP Hồ Chí Minh </p>
                                    6/6 Cách Mạch Tháng Tám, P. Bến Thành, Quận 1
                                </li>
                                <li>
                                    <p style="color: dimgray; font-weight: 600;"> Hỗ trợ khách hàng </p>
                                    support@edoctor.vn (7h - 18h)
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="info">
                        <p style="color: dimgray; font-weight: 600;"> Theo dỗi chúng tôi </p>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#" class="btn btn-social btn-facebook btn-simple">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-dribbble btn-simple">
                                        <i class="fa fa-dribbble"></i> Dribbble
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-twitter btn-simple">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-reddit btn-simple">
                                        <i class="fa fa-google-plus-square"></i> Google+
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                <script>
                    document.write(new Date().getFullYear())
                </script> @Trung tâm chăm sóc sức khỏe
            </div>
        </div>
    </footer>
</body>

<!--   core js files    -->
<script src="{{ asset('site/assets') }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('site/assets') }}/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{ asset('site/assets') }}/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{ asset('site/assets') }}/js/gaia.js"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>


<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>

</html>
