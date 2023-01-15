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
                                                                        <img src="{{ asset('public') }}/IMAGE/product/hoodie1-1-700x893.jpg"
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
                                                                        <img src="{{ asset('public') }}/IMAGE/product/hoodie1-1-700x893.jpg"
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
