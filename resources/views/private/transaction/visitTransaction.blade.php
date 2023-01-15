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
