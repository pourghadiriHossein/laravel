<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="Hossein Pourghadiri">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" href="">

    <link href="{{asset('private-side-files')}}/css/bootstrap-slider.css" rel="stylesheet">
    <link href="{{asset('private-side-files')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('private-side-files')}}/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{asset('private-side-files')}}/js/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--external css-->
    <link href="{{asset('private-side-files')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{asset('private-side-files')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{asset('private-side-files')}}/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('private-side-files')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('private-side-files')}}/css/style-responsive.css" rel="stylesheet" />
    <script src="{{asset('private-side-files')}}/js/jquery.js"></script>
    <script src="{{asset('private-side-files')}}/js/jquery-1.8.3.min.js"></script>
    @yield('css')
</head>
<body>
<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="برای باز و بسته شدن منو کلیک کنید" data-placement="left" class="icon-reorder tooltips"></div>
        </div>
        <!--logo start-->
        <a href="" class="logo">  مدیریت <span> SHOP</span></a>
        <!--logo end-->
        <div class="top-nav ">
            <ul class="nav pull-left top-menu">
                <li id="header_notification_bar" class="dropdown">
                    <a href="">خانه</a>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username">
                            حسین پورقدیری
                            <b class="caret"></b>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <p></p>
                                <li><a href=""><i class="icon-eject"></i> خروج</a></li>
                            </ul>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="sub-menu active">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>کاربرها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست کاربران</a></li>
                        <li><a href="" style="color: #f2f2f2">افزودن کاربر</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-ban-circle"></i>
                        <span>سطوح دسترسی</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li> <a href="" style="color: #f2f2f2">مدیریت سطوح دسترسی</a></li>
                        <li> <a href="" style="color: #f2f2f2">افزودن سطح دسترسی</a></li>
                        <li> <a href="" style="color: #f2f2f2">مدیریت نقش</a></li>
                        <li> <a href="" style="color: #f2f2f2">افزودن نقش</a></li>
                    </ul>
                </li>

                <li class="sub-menu" >
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>دسته بندی ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست دسته ها</a></li>
                        <li><a href="" style="color: #f2f2f2">افزودن دسته</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-archive"></i>
                        <span>تگ ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست تگ ها</a></li>
                        <li><a href="" style="color: #f2f2f2">افزودن تگ</a></li>
                    </ul>
                </li>



                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>مدیریت تخفیف</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست تخفیف ها</a></li>
                        <li><a href="" style="color: #f2f2f2">افزودن تخفیف</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>محصولات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست محصولات</a></li>
                        <li><a href="" style="color: #f2f2f2">افزودن محصولات</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>نظر ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست نظر ها</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>مدیریت شهر و استان</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست استان ها</a></li>
                        <li><a href="" style="color: #f2f2f2">افزودن استان</a></li>
                        <li><a href="" style="color: #f2f2f2">لیست شهر</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>آدرس ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست آدرس ها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>فاکتور ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست فاکتور ها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>تراکنش ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست تراکنش ها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>تماس با ما</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="" style="color: #f2f2f2">لیست تماس ها</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    @yield('content')

</section>

</body>

<script src="{{asset('private-side-files')}}/js/bootstrap.min.js"></script>
<script src="{{asset('private-side-files')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('private-side-files')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('private-side-files')}}/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{asset('private-side-files')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{asset('private-side-files')}}/js/owl.carousel.js" ></script>
<script src="{{asset('private-side-files')}}/js/jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="{{asset('private-side-files')}}/js/common-scripts.js"></script>
<!--script for this page-->
<script src="{{asset('private-side-files')}}/js/sparkline-chart.js"></script>
<script src="{{asset('private-side-files')}}/js/easy-pie-chart.js"></script>
<script src="{{asset('private-side-files')}}/js/bootstrap-select.js"></script>
@yield('js')
</html>
