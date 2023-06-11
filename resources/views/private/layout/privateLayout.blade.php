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
        <a href="{{ route('visitUser') }}" class="logo">  مدیریت <span> SHOP</span></a>
        <!--logo end-->
        <div class="top-nav ">
            <ul class="nav pull-left top-menu">
                <li id="header_notification_bar" class="dropdown">
                    <a href="{{ route('home') }}">خانه</a>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username">
                            @if (Auth::user())
                            {{ Auth::user()->name }}
                            @endif
                            <b class="caret"></b>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <p></p>
                                <li><a href="{{ route('logout') }}"><i class="icon-eject"></i> خروج</a></li>
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
                <li @if(Route::currentRouteName() == 'visitUser')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addUser')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateUser')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>کاربرها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitUser') }}" style="color: #f2f2f2">لیست کاربران</a></li>
                        @if(Auth::user()->hasRole('admin'))
                        <li><a href="{{ route('addUser') }}" style="color: #f2f2f2">افزودن کاربر</a></li>
                        @endif
                    </ul>
                </li>
                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitPermission')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addPermission')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updatePermission')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'visitRole')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addRole')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateRole')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-ban-circle"></i>
                        <span>سطوح دسترسی</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li> <a href="{{ route('visitPermission') }}" style="color: #f2f2f2">مدیریت سطوح دسترسی</a></li>
                        <li> <a href="{{ route('addPermission') }}" style="color: #f2f2f2">افزودن سطح دسترسی</a></li>
                        <li> <a href="{{ route('visitRole') }}" style="color: #f2f2f2">مدیریت نقش</a></li>
                        <li> <a href="{{ route('addRole') }}" style="color: #f2f2f2">افزودن نقش</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitCategory')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addCategory')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateCategory')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addParentCategory')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>دسته بندی ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitCategory') }}" style="color: #f2f2f2">لیست دسته ها</a></li>
                        <li><a href="{{ route('addCategory') }}" style="color: #f2f2f2">افزودن دسته</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitTag')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addTag')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateTag')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-archive"></i>
                        <span>تگ ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitTag') }}" style="color: #f2f2f2">لیست تگ ها</a></li>
                        <li><a href="{{ route('addTag') }}" style="color: #f2f2f2">افزودن تگ</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitDiscount')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addDiscount')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateDiscount')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>مدیریت تخفیف</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitDiscount') }}" style="color: #f2f2f2">لیست تخفیف ها</a></li>
                        <li><a href="{{ route('addDiscount') }}" style="color: #f2f2f2">افزودن تخفیف</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitProduct')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addProduct')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateProduct')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>محصولات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitProduct') }}" style="color: #f2f2f2">لیست محصولات</a></li>
                        <li><a href="{{ route('addProduct') }}" style="color: #f2f2f2">افزودن محصولات</a></li>
                    </ul>
                </li>
                @endif

                <li @if(Route::currentRouteName() == 'visitComment')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateComment')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>نظر ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitComment') }}" style="color: #f2f2f2">لیست نظر ها</a></li>
                    </ul>
                </li>

                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitRegion')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addRegion')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateRegion')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'visitCity')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'addCity')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'updateCity')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>مدیریت شهر و استان</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitRegion') }}" style="color: #f2f2f2">لیست استان ها</a></li>
                        <li><a href="{{ route('addRegion') }}" style="color: #f2f2f2">افزودن استان</a></li>
                        <li><a href="{{ route('visitCity') }}" style="color: #f2f2f2">لیست شهر</a></li>
                    </ul>
                </li>
                @endif

                <li @if(Route::currentRouteName() == 'visitAddress')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>آدرس ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitAddress') }}" style="color: #f2f2f2">لیست آدرس ها</a></li>
                    </ul>
                </li>

                <li @if(Route::currentRouteName() == 'visitOrder')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>فاکتور ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitOrder') }}" style="color: #f2f2f2">لیست فاکتور ها</a></li>
                    </ul>
                </li>

                <li @if(Route::currentRouteName() == 'visitTransaction')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>تراکنش ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitTransaction') }}" style="color: #f2f2f2">لیست تراکنش ها</a></li>
                    </ul>
                </li>
                @if(Auth::user()->hasRole('admin'))
                <li @if(Route::currentRouteName() == 'visitContact')
                        class="sub-menu active"
                    @elseif(Route::currentRouteName() == 'seeContactDetail')
                        class="sub-menu active"
                    @else
                        class="sub-menu"
                    @endif>
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>تماس با ما</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('visitContact') }}" style="color: #f2f2f2">لیست تماس ها</a></li>
                    </ul>
                </li>
                @endif
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
