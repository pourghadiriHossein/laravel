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
                                                src="{{ asset('public') }}/IMAGE/product/hoodie1-1-700x893.jpg">
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
                                                            src="{{ asset('public') }}/IMAGE/product/hoodie1-1-700x893.jpg">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                                type="button">خیر
                                                        </button>
                                                        <a href=""
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
                                        <a class="label label-warning" href="">ویرایش</a>
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
                                                src="{{ asset('public') }}/IMAGE/product/hoodie1-1-700x893.jpg">
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
                                                            src="{{ asset('public') }}/IMAGE/product/hoodie1-1-700x893.jpg">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                                type="button">خیر
                                                        </button>
                                                        <a href=""
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
                                        <a class="label label-warning" href="">ویرایش</a>
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
