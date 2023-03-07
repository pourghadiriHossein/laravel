# Create Public Side In Laravel

## Create private-side-files and private folder
- ### In public folder
- ### In resources/views folder

## Copy and Paste to public/private-side-files
- ### assets folder
- ### css folder
- ### fonts folder
- ### img folder
- ### js folder

## Make PrivateController
```bash
php artisan make:controller PrivateController
```

## Create Layout Process
- ### Create privateLayout.blade.php file for private side layout in resources/views/private folder
```bash
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
                        <li><a href="{{ route('addUser') }}" style="color: #f2f2f2">افزودن کاربر</a></li>
                    </ul>
                </li>

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
```
- ### Create public function index in PrivateController
```bash
 public function index() {
    return redirect(route('visitUser'));
}
```
- ### Create get method route for index in routes/web.php
```bash
Route::get('',[PrivateController::class, 'index']);
```


## Create User Process
- ### Create blade.php files for Users process in resources/views/private folder
- ### Visit User
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت کاربران</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام و نام خانوادگی</th>
                                <th style="text-align: right">تلفن</th>
                                <th style="text-align: right">پست اکترونیک</th>
                                <th style="text-align: right">نقش</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام و نام خانوادگی</th>
                                <th style="text-align: right">تلفن</th>
                                <th style="text-align: right">پست اکترونیک</th>
                                <th style="text-align: right">نقش</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>حسین پورقدیری</td>
                                    <td>09398932183</td>
                                    <td>hossein.654321@yahoo.com</td>
                                    <td>
                                        <p class="label label-default" style="background-color: gold">مدیر</p>
                                    </td>
                                    <td>
                                        <p class="label label-success" style="width: 250px">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateUser',1) }}">ویرایش</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>حسین پورقدیری</td>
                                    <td>09398932183</td>
                                    <td>hossein.654321@yahoo.com</td>
                                    <td>
                                        <p class="label label-default" style="background-color: gold">مدیر</p>
                                    </td>
                                    <td>
                                        <p class="label label-danger" style="width: 250px">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateUser',2) }}">ویرایش</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add User
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن کاربر</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postAddUser') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام و نام خانوادگی</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شماره تماس</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="phone" class="form-control" placeholder="شماره تماس خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">پست الکترونیک</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="email" class="form-control" placeholder="پست الکترونیک خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">رمز عبور</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="password" class="form-control" placeholder="رمز عبور خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت کاربر</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نقش کاربر</label>
                                        <div class="col-lg-10">
                                            <select name="role" class="form-control" style="height: 40px">
                                                <option value="">مدیر</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update User
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش کاربر</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postUpdateUser',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام و نام خانوادگی</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شماره تماس</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="phone" class="form-control" placeholder="شماره تماس خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">پست الکترونیک</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="email" class="form-control" placeholder="پست الکترونیک خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">رمز عبور</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="password" class="form-control" placeholder="رمز عبور خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت کاربر</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نقش کاربر</label>
                                        <div class="col-lg-10">
                                            <select name="role" class="form-control" style="height: 40px">
                                                <option value="">مدیر</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for User process in PrivateController
```bash
public function visitUser() {
    return view('private.user.visitUser');
}

public function addUser() {
    return view('private.user.addUser');
}

public function postAddUser() {
    return redirect()->route('visitUser');
}

public function updateUser() {
    return view('private.user.updateUser');
}

public function postUpdateUser() {
    return redirect(route('visitUser'));
}
```
- ### Create get/post method routes for User process in routes/web.php
```bash
Route::get('visit-user',[PrivateController::class, 'visitUser'])->name('visitUser');
Route::get('add-user',[PrivateController::class, 'addUser'])->name('addUser');
Route::post('add-user',[PrivateController::class, 'postAddUser'])->name('postAddUser');
Route::get('update-user/{user}',[PrivateController::class, 'updateUser'])->name('updateUser');
Route::post('update-user/{user}',[PrivateController::class, 'postUpdateUser'])->name('postUpdateUser');
```


## Create permission Process
- ### Create blade.php files for Permissions process in resources/views/private folder
- ### Visit Permissions
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت سطوح دسترسی</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام دسترسی</th>
                                <th class="hidden-phone" style="text-align: right">شرح دسترسی</th>
                                <th class="hidden-phone" style="text-align: right">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام دسترسی</th>
                                <th class="hidden-phone" style="text-align: right">شرح دسترسی</th>
                                <th class="hidden-phone" style="text-align: right">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="hidden-phone">free access</td>
                                    <td class="hidden-phone">دسترسی آزاد</td>
                                    <td>
                                        <a class="label label-danger" data-toggle="modal" href="#myModal1">حذف</a>
                                        <a class="label label-success" href="{{ route('updatePermission',1) }}">ویرایش</a>
                                    </td>

                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title">حذف دسترسی آزاد</h4>
                                            </div>
                                            <div class="modal-body">
                                                ایا از این عمل اطمینان دارید؟
                                            </div>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-warning" type="button">
                                                    خیر
                                                </button>
                                                <a href="{{ route('deletePermission',1) }}" class="btn btn-danger" type="button">آری</a>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Permissions
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن سطح دسترسی</header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-horizontal" action="{{ route('postAddPermission') }}" method="post" data-toggle="validator" id="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسترسی</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="name" class="form-control" placeholder="نام دسترسی">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نوع دسترسی</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="guard_name" class="form-control" placeholder="عنوان دسترسی">
                                        </div>
                                    </div>
                                    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>

@endsection
```
- ### Update Permissions
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش سطح دسترسی</header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-horizontal" action="{{ route('postUpdatePermission',1) }}" method="post" data-toggle="validator" id="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسترسی</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="name" class="form-control" placeholder="نام دسترسی">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">عنوان دسترسی</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="guard_name" class="form-control" placeholder="عنوان دسترسی">
                                        </div>
                                    </div>
                                    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>

@endsection
```
- ### Create public functions for permission process in PrivateController
```bash
public function visitPermission() {
    return view('private.permission.visitPermission');
}

public function addPermission() {
    return view('private.permission.addPermission');
}

public function postAddPermission() {
    return redirect(route('visitPermission'));
}

public function updatePermission() {
    return view('private.permission.updatePermission');
}

public function postUpdatePermission() {
    return redirect(route('visitPermission'));
}

public function deletePermission() {
    return redirect(route('visitPermission'));
}
```
- ### Create get/post method routes for permission process in routes/web.php
```bash
Route::get('visit-permission',[PrivateController::class, 'visitPermission'])->name('visitPermission');
Route::get('add-permission',[PrivateController::class, 'addPermission'])->name('addPermission');
Route::post('add-permission',[PrivateController::class, 'postAddPermission'])->name('postAddPermission');
Route::get('update-permission/{id}',[PrivateController::class, 'updatePermission'])->name('updatePermission');
Route::post('update-permission/{id}',[PrivateController::class, 'postUpdatePermission'])->name('postUpdatePermission');
Route::get('delete-permission/{id}',[PrivateController::class, 'deletePermission'])->name('deletePermission');
```


## Create role Process
- ### Create blade.php files for roles process in resources/views/private folder
- ### Visit Role
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت نقش</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام</th>
                                <th style="text-align: right">تعداد فعالیت های مجاز</th>
                                <th style="text-align: right;">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام</th>
                                <th style="text-align: right">تعداد فعالیت های مجاز</th>
                                <th style="text-align: right;">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>مدیر</td>
                                    <td>دسترسی آزاد</td>
                                    <td>
                                        <a class="label label-danger" data-toggle="modal" href="#myModal1">حذف</a>
                                        <a class="label label-success" href="{{ route('updateRole',1) }}">ویرایش</a>
                                    </td>

                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;
                                                    </button>
                                                    <h4 class="modal-title">حذف مدیر</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ایا از این عمل اطمینان دارید؟
                                                </div>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-warning" type="button">
                                                        خیر
                                                    </button>
                                                    <a href="{{ route('deleteRole',1) }}" class="btn btn-danger" type="button">آری</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>

@endsection
```
- ### Add Role
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن نقش</header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-horizontal" action="{{ route('postAddRole') }}" method="post" data-toggle="validator" id="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام نقش</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="name" class="form-control" placeholder="نام نقش">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شرح نقش</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="guard_name" class="form-control" placeholder="شرح نقش">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">سطوح دسترسی</label>
                                        <div class="col-lg-10">
                                            <label class="access_lvl">
                                                <input type="checkbox" name="permissions[]" value="">دسترسی آزاد
                                            </label><br/>
                                        </div>
                                    </div>
                                    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>

@endsection
```
- ### Update Role
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش نقش</header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-horizontal" action="{{ route('postUpdateRole',1) }}" method="post" data-toggle="validator" id="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام نقش</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="name" class="form-control" placeholder="نام نقش">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شرح نقش</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="guard_name" class="form-control" placeholder="شرح نقش">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">سطوح دسترسی</label>
                                        <div class="col-lg-10">
                                            <label class="access_lvl">
                                                <input type="checkbox" name="permissions[]" value="">دسترسی آزاد
                                            </label>
                                            <br/>
                                        </div>
                                    </div>
                                    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>

@endsection
```
- ### Create public functions for role process in PrivateController
```bash
public function visitRole() {
    return view('private.role.visitRole');
}

public function addRole() {
    return view('private.role.addRole');
}

public function postAddRole() {
    return redirect(route('visitRole'));
}

public function updateRole() {
    return view('private.role.updateRole');
}

public function postUpdateRole() {
    return redirect(route('visitRole'));
}

public function deleteRole() {
    return redirect(route('visitRole'));
}
```
- ### Create get/post method routes for role process in routes/web.php
```bash
Route::get('visit-role',[PrivateController::class, 'visitRole'])->name('visitRole');
Route::get('add-role',[PrivateController::class, 'addRole'])->name('addRole');
Route::post('add-role',[PrivateController::class, 'postAddRole'])->name('postAddRole');
Route::get('update-role/{id}',[PrivateController::class, 'updateRole'])->name('updateRole');
Route::post('update-role/{id}',[PrivateController::class, 'postUpdateRole'])->name('postUpdateRole');
Route::get('delete-role/{id}',[PrivateController::class, 'deleteRole'])->name('deleteRole');
```


## Create Category Process
- ### Create blade.php files for categories process in resources/views/private folder
- ### Visit Category
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت دسته بندی ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">دسته پدر</th>
                                <th style="text-align: right">نام دسته</th>
                                <th style="text-align: right">تخفیف</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">دسته پدر</th>
                                <th style="text-align: right">نام دسته</th>
                                <th style="text-align: right">تخفیف</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>دسته اصلی</td>
                                    <td>مردانه</td>
                                    <td>تخفیف ندارد</td>
                                    <td>
                                            <p class="label label-danger" style="width: 250px">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateCategory',1) }}">ویرایش</a>
                                        <a class="label label-info" href="{{ route('addParentCategory',1) }}">افزودن +</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>دسته اصلی</td>
                                    <td>مردانه</td>
                                    <td>تخفیف ندارد</td>
                                    <td>
                                            <p class="label label-success" style="width: 250px">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateCategory',2) }}">ویرایش</a>
                                        <a class="label label-info" href="{{ route('addParentCategory',2) }}">افزودن +</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Category
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن دسته بندی

                        </header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')

                            <form class="form-horizontal" action="{{ route('postAddCategory') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <legend></legend>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسته</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="label" class="form-control" placeholder="نام دسته">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نوع تخفیف</label>
                                        <div class="col-lg-10">
                                            <select name="discount_id" class="form-control" style="height: 40px">
                                                <option value="">بدون تخفیف</option>
                                                <option value="">بدون تخفیف</option>
                                                <option value="">بدون تخفیف</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت دسته</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('private-side-files')}}/js/jquery.js"></script>
    <script src="{{asset('private-side-files')}}/js/jquery.scrollTo.min.js"></script>
    <script src="{{asset('private-side-files')}}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{asset('private-side-files')}}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{asset('private-side-files')}}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{asset('private-side-files')}}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{asset('private-side-files')}}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('private-side-files')}}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{asset('private-side-files')}}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Parent Category
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن زیر دسته به مردانه</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postAddParentCategory', 1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسته والد</label>
                                        <div class="col-lg-10">
                                            <input disabled type="text" name="firstName" class="form-control" placeholder="والد">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">کد تخفیف</label>
                                        <div class="col-lg-10">
                                            <select name="discount_id" class="form-control" style="height: 40px">
                                                <option value="" selected>بدون کد تخفیف</option>
                                                <option value="" selected>بدون کد تخفیف</option>
                                                <option value="" selected>بدون کد تخفیف</option>
                                                <option value="" selected>بدون کد تخفیف</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسته</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="label" class="form-control" placeholder="نام دسته">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت دسته</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('private-side-files')}}/js/jquery.js"></script>
    <script src="{{asset('private-side-files')}}/js/jquery.scrollTo.min.js"></script>
    <script src="{{asset('private-side-files')}}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{asset('private-side-files')}}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{asset('private-side-files')}}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{asset('private-side-files')}}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{asset('private-side-files')}}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('private-side-files')}}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{asset('private-side-files')}}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update Category
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش دسته بندی</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postUpdateCategory',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسته والد</label>
                                        <div class="col-lg-10">
                                            <select name="parent_id" class="form-control" style="height: 40px">
                                                <option value="">دسته اصلی</option>
                                                <option value="">دسته اصلی</option>
                                                <option value="">دسته اصلی</option>
                                                <option value="">دسته اصلی</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">کد تخفیف</label>
                                        <div class="col-lg-10">
                                            <select name="discount_id" class="form-control" style="height: 40px">
                                                <option value="">بدون تخفیف</option>
                                                <option value="">بدون تخفیف</option>
                                                <option value="">بدون تخفیف</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام دسته</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="label" class="form-control" placeholder="نام دسته">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت دسته</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0">غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for category process in PrivateController
```bash
public function visitCategory() {
    return view('private.category.visitCategory');
}

public function addCategory() {
    return view('private.category.addCategory');
}

public function postAddCategory() {
    return redirect()->route('visitCategory');
}

public function addParentCategory() {
    return view('private.category.addParentCategory');
}

public function postAddParentCategory() {
    return redirect(route('visitCategory'));
}

public function updateCategory() {
    return view('private.category.updateCategory');
}

public function postUpdateCategory() {
    return redirect(route('visitCategory'));
}

```
- ### Create get/post method routes for category process in routes/web.php
```bash
Route::get('visit-category',[PrivateController::class, 'visitCategory'])->name('visitCategory');
Route::get('add-category',[PrivateController::class, 'addCategory'])->name('addCategory');
Route::post('add-category',[PrivateController::class, 'postAddCategory'])->name('postAddCategory');
Route::get('add-parent-category/{id}',[PrivateController::class, 'addParentCategory'])->name('addParentCategory');
Route::post('add-parent-category/{id}',[PrivateController::class, 'postAddParentCategory'])->name('postAddParentCategory');
Route::get('update-category/{id}',[PrivateController::class, 'updateCategory'])->name('updateCategory');
Route::post('update-category/{id}', [PrivateController::class, 'postUpdateCategory'])->name('postUpdateCategory');
```
 
## Create tag Process
- ### Create blade.php files for tags process in resources/views/private folder
- ### Visit Tag
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت تگ ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">عنوان</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">عنوان</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>مجلسی</td>
                                    <td>
                                        <p class="label label-danger" style="width: 250px">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateTag',1) }}">ویرایش</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>مجلسی</td>
                                    <td>
                                        <p class="label label-success" style="width: 250px">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateTag',2) }}">ویرایش</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Tag
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن کاربر</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postAddUser') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام و نام خانوادگی</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شماره تماس</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="phone" class="form-control" placeholder="شماره تماس خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">پست الکترونیک</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="email" class="form-control" placeholder="پست الکترونیک خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">رمز عبور</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="password" class="form-control" placeholder="رمز عبور خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت کاربر</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نقش کاربر</label>
                                        <div class="col-lg-10">
                                            <select name="role" class="form-control" style="height: 40px">
                                                <option value="">مدیر</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update Tag
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش تگ</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postUpdateTag',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام تگ</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="label" class="form-control" placeholder="نام تگ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت تگ</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0">غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for tag process in PrivateController
```bash
public function visitTag() {
    return view('private.tag.visitTag');
}

public function addTag() {
    return view('private.tag.addTag');
}

public function postAddTag() {
    return redirect(route('visitTag'));
}

public function updateTag() {
    return view('private.tag.updateTag');
}

public function postUpdateTag() {
    return redirect(route('visitTag'));
}
```
- ### Create get/post method routes for tag process in routes/web.php
```bash
Route::get('visit-tag',[PrivateController::class, 'visitTag'])->name('visitTag');
Route::get('add-tag',[PrivateController::class, 'addTag'])->name('addTag');
Route::post('add-tag', [PrivateController::class, 'postAddTag'])->name('postAddTag');
Route::get('update-tag/{tag}',[PrivateController::class, 'updateTag'])->name('updateTag');
Route::post('update-tag/{id}',[PrivateController::class, 'postUpdateTag'])->name('postUpdateTag');
```

## Create discount Process
- ### Create blade.php files for discounts process in resources/views/private folder
- ### Visit Discount
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت تخفیف ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">عنوان</th>
                                <th style="text-align: right">مبلغ تخفیف</th>
                                <th style="text-align: right">درصد تخفیف</th>
                                <th style="text-align: right">توکن تخفیف</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">عنوان</th>
                                <th style="text-align: right">مبلغ تخفیف</th>
                                <th style="text-align: right">درصد تخفیف</th>
                                <th style="text-align: right">توکن تخفیف</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>تخفیف نقدی</td>
                                    <td>فاقد تخفیف نقدی</td>
                                    <td>فاقد تخفیف درصدی</td>
                                    <td>فاقد کد تخفیف</td>
                                    <td>
                                        <p class="label label-success" style="width: 250px">فعال</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('updateDiscount',1) }}" class="label label-warning">ویرایش</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>تخفیف نقدی</td>
                                    <td>فاقد تخفیف نقدی</td>
                                    <td>فاقد تخفیف درصدی</td>
                                    <td>فاقد کد تخفیف</td>
                                    <td>
                                        <p class="label label-danger" style="width: 250px">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('updateDiscount',2) }}" class="label label-warning">ویرایش</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Discount
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن تخفیف</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postAddDiscount') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">عنوان تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="label" class="form-control" placeholder="عنوان تخفیف">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">مبلغ تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="price" class="form-control" placeholder="مبلغ تخفیف">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">درصد تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="percent" class="form-control" placeholder="درصد تخفیف">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">توکن تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="gift_code" class="form-control" placeholder="توکن تخفیف">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت دسته</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update Discount
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش تخفیف</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postUpdateDiscount',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">عنوان تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="label" class="form-control" placeholder="عنوان تخفیف">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">مبلغ تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="price" class="form-control" placeholder="مبلغ تخفیف">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">درصد تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="percent" class="form-control" placeholder="درصد تخفیف">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">توکن تخفیف</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="gift_code" class="form-control" placeholder="توکن تخفیف">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت دسته</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for discount process in PrivateController
```bash
public function visitDiscount() {
    return view('private.discount.visitDiscount');
}

public function addDiscount() {
    return view('private.discount.addDiscount');
}

public function postAddDiscount() {
    return redirect(route('visitDiscount'));
}

public function updateDiscount() {
    return view('private.discount.updateDiscount');
}

public function postUpdateDiscount() {
    return redirect(route('visitDiscount'));
}
```
- ### Create get/post method routes for discount process in routes/web.php
```bash
Route::get('visit-discount',[PrivateController::class, 'visitDiscount'])->name('visitDiscount');
Route::get('add-discount',[PrivateController::class, 'addDiscount'])->name('addDiscount');
Route::post('add-discount', [PrivateController::class, 'postAddDiscount'])->name('postAddDiscount');
Route::get('update-discount/{discount}',[PrivateController::class, 'updateDiscount'])->name('updateDiscount');
Route::post('update-discount/{id}', [PrivateController::class, 'postUpdateDiscount'])->name('postUpdateDiscount');
```
  
## Create Product Process
- ### Create blade.php files for Products process in resources/views/private folder
- ### Visit Product
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت محصولات</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: right">شناسه</th>
                                    <th style="text-align: right">عنوان</th>
                                    <th style="text-align: right">تعداد</th>
                                    <th style="text-align: right">تخفیف</th>
                                    <th style="text-align: right">تگ</th>
                                    <th style="text-align: right">دسته</th>
                                    <th style="text-align: right">مبلغ</th>
                                    <th style="text-align: right">توضیحات</th>
                                    <th style="text-align: right">عکس</th>
                                    <th style="text-align: right">وضعیت</th>
                                    <th style="text-align: right;width: 15%">امکانات</th>
                                </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                                <tr>
                                    <th style="text-align: right">شناسه</th>
                                    <th style="text-align: right">عنوان</th>
                                    <th style="text-align: right">تعداد</th>
                                    <th style="text-align: right">تخفیف</th>
                                    <th style="text-align: right">تگ</th>
                                    <th style="text-align: right">دسته</th>
                                    <th style="text-align: right">مبلغ</th>
                                    <th style="text-align: right">توضیحات</th>
                                    <th style="text-align: right">عکس</th>
                                    <th style="text-align: right">وضعیت</th>
                                    <th style="text-align: right;width: 15%">امکانات</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>لباس مجلسی</td>
                                    <td>20</td>
                                    <td>تخفیف ندارد</td>
                                    <td>تگ ندارد</td>
                                    <td>مجلسی</td>
                                    <td>5000000 ريال</td>
                                    <td>لباس بسیار عالی</td>
                                    <td>
                                        <a data-toggle="modal" href="#myModal1">
                                            <img height="100" width="80" alt="hoodie1"
                                                src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg">
                                        </a>
                                        <div class="modal fade" id="myModal1" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">حذف عکس لباس مجلسی</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img height="500" width="500" alt="hoodie1"
                                                            src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                                type="button">خیر
                                                        </button>
                                                        <a href="{{ route('deleteProductImage',1) }}"
                                                        class="btn btn-danger" type="button">آری</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="label label-danger" style="width: 250px">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateProduct',1) }}">ویرایش</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>لباس مجلسی</td>
                                    <td>20</td>
                                    <td>تخفیف ندارد</td>
                                    <td>تگ ندارد</td>
                                    <td>مجلسی</td>
                                    <td>5000000 ريال</td>
                                    <td>لباس بسیار عالی</td>
                                    <td>
                                        <a data-toggle="modal" href="#myModal2">
                                            <img height="100" width="80" alt="hoodie1"
                                                src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg">
                                        </a>
                                        <div class="modal fade" id="myModal2" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">حذف عکس لباس مجلسی</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img height="500" width="500" alt="hoodie1"
                                                            src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                                type="button">خیر
                                                        </button>
                                                        <a href="{{ route('deleteProductImage',2) }}"
                                                        class="btn btn-danger" type="button">آری</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="label label-success" style="width: 250px">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateProduct',2) }}">ویرایش</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Product
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن محصول</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postAddProduct') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">عنوان محصول</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="label" class="form-control" placeholder="عنوان محصول">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">مبلغ محصول</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="price" class="form-control" placeholder="مبلغ محصول">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">تعدا موجودی محصول</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="count" class="form-control" placeholder="تعداد موجودی محصول">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">شرح محصول</label>
                                    <div class="col-lg-10">
                                        <textarea name="description" class="form-control"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">وضعیت محصول</label>
                                    <div class="col-lg-10">
                                        <select name="status" class="form-control" style="height: 40px">
                                            <option value="0" selected>غیر فعال</option>
                                            <option value="1">فعال</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">وضعیت تخفیف</label>
                                    <div class="col-lg-10">
                                        <select name="discount_id" class="form-control" style="height: 40px">
                                            <option value="">تخفیف ندارد</option>
                                            <option value="">تخفیف ندارد</option>
                                            <option value="">تخفیف ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">وضعیت دسته بندی</label>
                                    <div class="col-lg-10">
                                        <select name="category_id" class="form-control" style="height: 40px">
                                            <option value="">مردانه</option>
                                            <option value="">زنانه</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">تگ ها</label>
                                    <div class="col-lg-10">
                                        <label class="access_lvl">
                                            <input type="checkbox" name="tags[]" value=""> مجلسی <br>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">تصاویر</label>
                                    <div class="col-lg-10">
                                        <input type="file" id="images" name="images[]" multiple>
                                    </div>
                                </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update Product
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش محصول</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postUpdateProduct',1) }}" method="post" enctype="multipart/form-data">
                              @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">عنوان محصول</label>
                                      <div class="col-lg-10">
                                          <input value="" type="text" name="label" class="form-control" placeholder="عنوان محصول">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">مبلغ محصول</label>
                                      <div class="col-lg-10">
                                          <input value="" type="text" name="price" class="form-control" placeholder="مبلغ محصول">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label">تعداد موجودی محصول</label>
                                    <div class="col-lg-10">
                                        <input value="" type="text" name="count" class="form-control" placeholder="تعداد موجودی محصول">
                                    </div>
                                </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">شرح محصول</label>
                                      <div class="col-lg-10">
                                          <textarea name="description" class="form-control">لباس بسیار عالی</textarea>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">وضعیت محصول</label>
                                      <div class="col-lg-10">
                                          <select name="status" class="form-control" style="height: 40px">
                                              <option value="0">غیر فعال</option>
                                              <option value="1">فعال</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">وضعیت تخفیف</label>
                                      <div class="col-lg-10">
                                          <select name="discount_id" class="form-control" style="height: 40px">
                                              <option value="">تخفیف ندارد</option>
                                              <option value="">تخفیف ندارد</option>
                                              <option value="">تخفیف ندارد</option>
                                              <option value="">تخفیف ندارد</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">وضعیت دسته بندی</label>
                                      <div class="col-lg-10">
                                          <select name="category_id" class="form-control" style="height: 40px">
                                            <option value="">مجلسی</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">تگ ها</label>
                                      <div class="col-lg-10">
                                            <label class="access_lvl">
                                                <input type="checkbox" name="tags[]" value=""> مجلسی
                                            </label>
                                            <br/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">افزورن تصویر</label>
                                      <div class="col-lg-10">
                                          <input type="file" id="images" name="images[]" multiple>
                                      </div>
                                  </div>
                              </fieldset>
                              <input type="submit" class="finish btn btn-danger" value="تایید"/>
                          </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for product process in PrivateController
```bash
 public function visitProduct() {
    return view('private.product.visitProduct');
}

public function addProduct() {
    return view('private.product.addProduct');
}

public function postAddProduct() {
    return redirect(route('visitProduct'));
}

public function updateProduct() {
    return view('private.product.updateProduct');
}

public function postUpdateProduct() {
    return redirect(route('visitProduct'));
}

public function deleteProductImage() {
    return redirect(route('visitProduct'));
}
```
- ### Create get/post method routes for product process in routes/web.php
```bash
Route::get('visit-product', [PrivateController::class, 'visitProduct'])->name('visitProduct');
Route::get('add-product', [PrivateController::class, 'addProduct'])->name('addProduct');
Route::post('add-product',[PrivateController::class, 'postAddProduct'])->name('postAddProduct');
Route::get('update-product/{product}', [PrivateController::class, 'updateProduct'])->name('updateProduct');
Route::post('update-product/{id}',[PrivateController::class, 'postUpdateProduct'])->name('postUpdateProduct');
Route::get('delete-product-image/{id}',[PrivateController::class, 'deleteProductImage'])->name('deleteProductImage');
```

## Create Comment Process
- ### Create blade.php files for Comments process in resources/views/private folder
- ### Visit Comment
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت نظر ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام و نام خانوادگی</th>
                                <th style="text-align: right">نام محصول</th>
                                <th style="text-align: right">نظر کاربر</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام و نام خانوادگی</th>
                                <th style="text-align: right">نام محصول</th>
                                <th style="text-align: right">نظر کاربر</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>حسین پورقدیری</td>
                                        <td>لباس مجلسی</td>
                                        <td> لباس بسیار عا...</td>
                                        <td>
                                                <p class="label label-danger">غیر فعال</p>
                                                <p class="label label-danger">مشاهده نشده</p>
                                        </td>
                                        <td><a class="label label-warning" href="{{ route('updateComment',1) }}">ویرایش</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>حسین پورقدیری</td>
                                        <td>لباس مجلسی</td>
                                        <td> لباس بسیار عا...</td>
                                        <td>
                                                <p class="label label-success">فعال</p>
                                                <p class="label label-success">مشاهده شده</p>
                                        </td>
                                        <td><a class="label label-warning" href="{{ route('updateComment',2) }}">ویرایش</a></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update Comment
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش نظر</header>
                        <div class="panel-body">
                            @include('include.showError')
                            @include('include.validationError')
                            <form class="form-horizontal" action="{{ route('postUpdateComment',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نظر کاربر</label>
                                        <div class="col-lg-10">
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت نظر</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0">غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for comment process in PrivateController
```bash
public function visitComment() {
    return view('private.comment.visitComment');
}

public function updateComment() {
    return view('private.comment.updateComment');
}

public function postUpdateComment() {
    return redirect(route('visitComment'));
}
```
- ### Create get/post method routes for comment process in routes/web.php
```bash
Route::get('visit-comment', [PrivateController::class, 'visitComment'])->name('visitComment');
Route::get('update-comment/{comment}', [PrivateController::class, 'updateComment'])->name('updateComment');
Route::post('update-comment/{id}',[PrivateController::class, 'postUpdateComment'])->name('postUpdateComment');
```

## Create Region Process
- ### Create blade.php files for Region process in resources/views/private folder
- ### Visit Region
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت استان ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>گیلان</td>
                                    <td>
                                        <p class="label label-success">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateRegion',1) }}">ویرایش</a>
                                        <a class="label label-info" href="{{ route('addCity',1) }}">افزودن شهر +</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>گیلان</td>
                                    <td>
                                        <p class="label label-warning">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateRegion',1) }}">ویرایش</a>
                                        <a class="label label-info" href="{{ route('addCity',2) }}">افزودن شهر +</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add Region
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن استان</header>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('postAddRegion') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام استان</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="label" class="form-control" placeholder="نام استان">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت استان</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update Region
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش استان</header>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('postUpdateRegion',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام استان</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="label" class="form-control" placeholder="نام استان">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت استان</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0">غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for Region process in PrivateController
```bash
public function visitRegion() {
    return view('private.RC.visitRegion');
}

public function addRegion() {
    return view('private.RC.addRegion');
}

public function postAddRegion() {
    return redirect(route('visitRegion'));
}

public function updateRegion() {
    return view('private.RC.updateRegion');
}

public function postUpdateRegion() {
    return redirect(route('visitRegion'));
}
```
- ### Create get/post method routes for Region process in routes/web.php
```bash
Route::get('visit-region',[PrivateController::class, 'visitRegion'])->name('visitRegion');
Route::get('add-region',[PrivateController::class, 'addRegion'])->name('addRegion');
Route::post('add-region',[PrivateController::class, 'postAddRegion'])->name('postAddRegion');
Route::get('update-region/{region}',[PrivateController::class, 'updateRegion'])->name('updateRegion');
Route::post('update-region/{id}',[PrivateController::class, 'postUpdateRegion'])->name('postUpdateRegion');
```
   
## Create City Process
- ### Create blade.php files for Cities process in resources/views/private folder
- ### Visit City
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت شهر ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>رشت</td>
                                    <td>
                                        <p class="label label-warning">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateCity',1) }}">ویرایش</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>رشت</td>
                                    <td>
                                        <p class="label label-success">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateCity',2) }}">ویرایش</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Add City
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">افزودن شهر</header>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('postAddCity',1) }}"method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام شهر</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="label" class="form-control" placeholder="نام شهر">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت شهر</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0" selected>غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Update City
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">ویرایش شهر</header>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('postUpdateCity',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام شهر</label>
                                        <div class="col-lg-10">
                                            <input value="" type="text" name="label" class="form-control" placeholder="نام شهر">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت شهر</label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control" style="height: 40px">
                                                <option value="0">غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>

                                </fieldset>
                                <input type="submit" class="finish btn btn-danger" value="تایید"/>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for City process in PrivateController
```bash
public function visitCity() {
    return view('private.RC.visitCity');
}

public function addCity() {
    return view('private.RC.addCity');
}

public function postAddCity() {
    return redirect(route('visitCity'));
}

public function updateCity() {
    return view('private.RC.updateCity');
}

public function postUpdateCity() {
    return redirect(route('visitCity'));
}
```
- ### Create get/post method routes for City process in routes/web.php
```bash
Route::get('visit-city',[PrivateController::class, 'visitCity'])->name('visitCity');
Route::get('add-city/{id}',[PrivateController::class, 'addCity'])->name('addCity');
Route::post('add-city/{id}',[PrivateController::class,'postAddCity'])->name('postAddCity');
Route::get('update-city/{city}',[PrivateController::class, 'updateCity'])->name('updateCity');
Route::post('update-city/{id}',[PrivateController::class,'postUpdateCity'])->name('postUpdateCity');
```

## Create address Process
- ### Create blade.php files for addresses process in resources/views/private folder
- ### Visit Address
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت آدرس ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام کاربر</th>
                                <th style="text-align: right">نام استان</th>
                                <th style="text-align: right">نام شهر</th>
                                <th style="text-align: right">جزئیات آدرس</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام کاربر</th>
                                <th style="text-align: right">نام استان</th>
                                <th style="text-align: right">نام شهر</th>
                                <th style="text-align: right">جزئیات آدرس</th>
                                <th style="text-align: right">وضعیت</th>
                                <th style="text-align: right;width: 15%">امکانات</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>حسین پورقدیری</td>
                                    <td>گیلان</td>
                                    <td>رشت</td>
                                    <td>گلسار</td>
                                    <td>
                                            <p class="label label-warning" style="width: 250px">غیر فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-danger" data-toggle="modal" href="#myModal1">حذف</a>
                                    </td>

                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;
                                                    </button>
                                                    <h4 class="modal-title">حذف آدرس</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ایا از این عمل اطمینان دارید؟

                                                </div>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-warning" type="button">
                                                        خیر
                                                    </button>
                                                    <a href="{{ route('deleteAddress',1) }}" class="btn btn-danger" type="button">آری</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>حسین پورقدیری</td>
                                    <td>گیلان</td>
                                    <td>رشت</td>
                                    <td>گلسار</td>
                                    <td>
                                            <p class="label label-success" style="width: 250px">فعال</p>
                                    </td>
                                    <td>
                                        <a class="label label-danger" data-toggle="modal" href="#myModal1">حذف</a>
                                    </td>

                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;
                                                    </button>
                                                    <h4 class="modal-title">حذف آدرس</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ایا از این عمل اطمینان دارید؟

                                                </div>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-warning" type="button">
                                                        خیر
                                                    </button>
                                                    <a href="{{ route('deleteAddress',2) }}" class="btn btn-danger" type="button">آری</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for address process in PrivateController
```bash
public function visitAddress() {
    return view('private.address.visitAddress');
}

public function deleteAddress() {
    return redirect(route('visitAddress'));
}
```
- ### Create get/post method routes for address process in routes/web.php
```bash
Route::get('visit-address',[PrivateController::class, 'visitAddress'])->name('visitAddress');
Route::get('delete-address/{address}',[PrivateController::class,'deleteAddress'])->name('deleteAddress');
```

## Create Order Process
- ### Create blade.php files for Orders process in resources/views/private folder
- ### Visit Order
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
    <script type="text/javascript" language="javascript" src="{{ asset('private-side-files') }}/js/jq.dataTable.min.js"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('private-side-files') }}/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title +
                    '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });

            // Apply the search
            table.columns().every(function() {
                var that = this;

                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت فاکتور ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br />
                        <table id="orderTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: right">شناسه</th>
                                    <th style="text-align: right">نام کاربر</th>
                                    <th style="text-align: right">نام استان</th>
                                    <th style="text-align: right">نام شهر</th>
                                    <th style="text-align: right">جزئیات آدرس</th>
                                    <th style="text-align: right">کد تخفیف</th>
                                    <th style="text-align: right">مبلغ کل</th>
                                    <th style="text-align: right">مبلغ پرداخت شده</th>
                                    <th style="text-align: right">وضعیت</th>
                                    <th style="text-align: right">امکانات</th>
                                </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                                <tr>
                                    <th style="text-align: right">شناسه</th>
                                    <th style="text-align: right">نام کاربر</th>
                                    <th style="text-align: right">نام استان</th>
                                    <th style="text-align: right">نام شهر</th>
                                    <th style="text-align: right">جزئیات آدرس</th>
                                    <th style="text-align: right">کد تخفیف</th>
                                    <th style="text-align: right">مبلغ کل</th>
                                    <th style="text-align: right">مبلغ پرداخت شده</th>
                                    <th style="text-align: right">وضعیت</th>
                                    <th style="text-align: right">امکانات</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>حسین پورقدیری</td>
                                    <td>گیلان</td>
                                    <td>رشت</td>
                                    <td>گلسار</td>
                                    <td>تخفیف ندارد</td>
                                    <td>5000000 ریال</td>
                                    <td>4000000 ریال</td>
                                    <td>
                                            <p class="label label-warning" style="width: 250px">پرداخت نشده</p>
                                    </td>
                                    <td>
                                        <a class="label label-danger" href="">پرداخت</a>
                                        <a class="label label-info" data-toggle="modal" href="#myModal1">محصولات</a>
                                        <div class="modal fade" id="myModal1" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">محصولات ثبت شده در این سفارش</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="orderTable" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: right">شناسه</th>
                                                                    <th style="text-align: right">تصویر محصول</th>
                                                                    <th style="text-align: right">نام محصول</th>
                                                                    <th style="text-align: right">تعداد محصول</th>
                                                                    <th style="text-align: right">قیمت محصول</th>
                                                                    <th style="text-align: right">قیمت پرداختی</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg"
                                                                            height="50" width="40">
                                                                    </td>
                                                                    <td>هودی</td>
                                                                    <td>1</td>
                                                                    <td>5000000 ريال</td>
                                                                    <td>4000000 ريال</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                            type="button">بستن
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>حسین پورقدیری</td>
                                    <td>گیلان</td>
                                    <td>رشت</td>
                                    <td>گلسار</td>
                                    <td>تخفیف ندارد</td>
                                    <td>5000000 ریال</td>
                                    <td>4000000 ریال</td>
                                    <td>
                                            <p class="label label-success" style="width: 250px">پرداخت شده</p>
                                    </td>
                                    <td>
                                        <a class="label label-danger" href="">پرداخت</a>
                                        <a class="label label-info" data-toggle="modal" href="#myModal2">محصولات</a>
                                        <div class="modal fade" id="myModal2" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">محصولات ثبت شده در این سفارش</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="orderTable" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: right">شناسه</th>
                                                                    <th style="text-align: right">تصویر محصول</th>
                                                                    <th style="text-align: right">نام محصول</th>
                                                                    <th style="text-align: right">تعداد محصول</th>
                                                                    <th style="text-align: right">قیمت محصول</th>
                                                                    <th style="text-align: right">قیمت پرداختی</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg"
                                                                            height="50" width="40">
                                                                    </td>
                                                                    <td>هودی</td>
                                                                    <td>1</td>
                                                                    <td>5000000 ريال</td>
                                                                    <td>4000000 ريال</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                            type="button">بستن
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>
        //owl carousel

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });
    </script>
@endsection
```
- ### Create public functions for order process in PrivateController
```bash
public function visitOrder() {
    return view('private.order.visitOrder');
}
```
- ### Create get/post method routes for order process in routes/web.php
```bash
Route::get('visit-order',[PrivateController::class, 'visitOrder'])->name('visitOrder');
```

## Create transaction Process
- ### Create blade.php files for transactions process in resources/views/private folder
- ### Visit Transaction
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت تراکنش ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">شناسه فاکتور</th>
                                <th style="text-align: right">مبلغ پرداخت شده</th>
                                <th style="text-align: right">کد رهگیری</th>
                                <th style="text-align: right">شناسه IDPay</th>
                                <th style="text-align: right">شماره کارت</th>
                                <th style="text-align: right">زمان پرداخت</th>
                                <th style="text-align: right">زمان تایید پرداخت</th>
                                <th style="text-align: right">وضعیت</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">شناسه فاکتور</th>
                                <th style="text-align: right">مبلغ پرداخت شده</th>
                                <th style="text-align: right">کد رهگیری</th>
                                <th style="text-align: right">شناسه IDPay</th>
                                <th style="text-align: right">شماره کارت</th>
                                <th style="text-align: right">زمان پرداخت</th>
                                <th style="text-align: right">زمان تایید پرداخت</th>
                                <th style="text-align: right">وضعیت</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>5000000 ریال</td>
                                    <td>vjnrvrjvut4859tg</td>
                                    <td>785795</td>
                                    <td>5892-****-****-1604</td>
                                    <td>1401/10/25 22:40:31</td>
                                    <td>1401/10/25 22:40:55</td>
                                    <td>
                                        <p class="label label-warning" style="width: 250px">به دریافت کننده واریز شد</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for transaction process in PrivateController
```bash
public function visitTransaction() {
    return view('private.transaction.visitTransaction');
}
```
- ### Create get/post method routes for transaction process in routes/web.php
```bash
Route::get('visit-transaction', [PrivateController::class, 'visitTransaction'])->name('visitTransaction');
```

   
## Create Contact Process
- ### Create blade.php files for Contacts process in resources/views/private folder
- ### Visit Contact
```bash
@extends('private.layout.privateLayout')

@section('content')
    <style type="text/css" class="init">

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

    </style>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/jq.dataTable.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="{{asset('private-side-files')}}/js/dataTables.bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#orderTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#orderTable').DataTable({
                "order": [[0, "desc"]]
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">مدیریت تراکنش ها</header>
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                        <br/>
                        <table id="orderTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام و نام خانوادگی</th>
                                <th style="text-align: right">شماره تماس</th>
                                <th style="text-align: right">متن پیام</th>
                                <th style="text-align: right">وضعیت</th>
                            </tr>
                            </thead>
                            <tfoot style="direction: rtl;">
                            <tr>
                                <th style="text-align: right">شناسه</th>
                                <th style="text-align: right">نام و نام خانوادگی</th>
                                <th style="text-align: right">شماره تماس</th>
                                <th style="text-align: right">متن پیام</th>
                                <th style="text-align: right">وضعیت</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>حسین پورقدیری</td>
                                        <td>09398932183</td>
                                        <td>لباس بسیار عال...</td>
                                        <td>
                                                <a href="{{ route('seeContactDetail',1) }}"><p class="label label-danger">مشاهده نشده</p></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>حسین پورقدیری</td>
                                        <td>09398932183</td>
                                        <td>لباس بسیار عال...</td>
                                        <td>
                                                <a href="{{ route('seeContactDetail',1) }}"><p class="label label-success">مشاهده شده</p></a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### See Visit Contact
```bash
@extends('private.layout.privateLayout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">مشاهده جزئیات تماس با ماه</header>
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام و نام خانوادگی</label>
                                        <div class="col-lg-10">
                                            <input value="حسین پورقدیری" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شماره تماس</label>
                                        <div class="col-lg-10">
                                            <input value="09398932183" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">پست الکترونیک</label>
                                        <div class="col-lg-10">
                                            <input value="hossein.654321@yahoo.com" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">وضعیت نظر</label>
                                        <div class="col-lg-10">
                                            <select disabled name="status" class="form-control" style="height: 40px">
                                                <option value="0">غیر فعال</option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">متن ارسالی کاربر</label>
                                        <div class="col-lg-10">
                                            <textarea disabled name="description" class="form-control">سلام با من تماس بگیرید</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('private-side-files') }}/js/jquery.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="{{ asset('private-side-files') }}/js/jquery.stepy.js"></script>

    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.js"></script>
    <script type="text/javascript" src="{{ asset('private-side-files') }}/js/multiselect.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search1').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#search2').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{ asset('private-side-files') }}/js/upload-image.js"></script>

    <script>
        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'قبلی',
                block: true,
                nextLabel: 'بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab'
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#datepicker0").datepicker();

            $("#datepicker_captive").datepicker();
            $("#datepicker_captivebtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive").focus();
            })
            $("#datepicker_captive2").datepicker();
            $("#datepicker_captive2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_captive2").focus();
            })

            $("#datepicker_war").datepicker();
            $("#datepicker_warbtn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war").focus();
            })
            $("#datepicker_war2").datepicker();
            $("#datepicker_war2btn").click(function (event) {
                event.preventDefault();
                $("#datepicker_war2").focus();
            })

            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("#datepicker3").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#datepicker5").datepicker({
                minDate: 0,
                maxDate: "+14D"
            });

            $("#datepicker6").datepicker({
                isRTL: true,
                dateFormat: "d/m/yy"
            });
        });


    </script>

    <script>
        function showCity(element) {

            var id = document.getElementById("region_id").options[document.getElementById("region_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/cities/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("city_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function showZone(element) {

            var id = document.getElementById("city_id").options[document.getElementById("city_id").selectedIndex].value;
            var link = "http://localhost/jabo/public/zones/" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                document.getElementById("zone_id").innerHTML = xmlhttp.responseText;
            }
            xmlhttp.open("GET", link, true);
            xmlhttp.send();
        }
    </script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>
@endsection
```
- ### Create public functions for Contacts process in PrivateController
```bash
public function visitContact() {
    return view('private.contact.visitContact');
}

public function seeContactDetail() {
    return view('private.contact.seeContactDetail');
}
```
- ### Create get/post method routes for Contacts process in routes/web.php
```bash
Route::get('visit-contact', [PrivateController::class, 'visitContact'])->name('visitContact');
Route::get('visit-contact-detail/{contact}', [PrivateController::class, 'seeContactDetail'])->name('seeContactDetail');
```
