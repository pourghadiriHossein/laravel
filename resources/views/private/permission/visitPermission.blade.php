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
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td class="hidden-phone">{{ $permission->name }}</td>
                                        <td class="hidden-phone">{{ $permission->guard_name }}</td>
                                        <td>
                                            <a class="label label-danger" data-toggle="modal"
                                            href="#myModal{{ $permission->id }}">حذف</a>
                                            <a class="label label-success"
                                            href="{{ route('updatePermission',$permission->id) }}">ویرایش</a>
                                        </td>

                                        <div class="modal fade" id="myModal{{ $permission->id }}" tabindex="-1" role="dialog"
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
                                                    <a href="{{ route('deletePermission',$permission->id) }}" class="btn btn-danger" type="button">آری</a>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
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
