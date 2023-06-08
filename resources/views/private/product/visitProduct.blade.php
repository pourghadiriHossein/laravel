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
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->label }}</td>
                                    <td>{{ $product->count }}</td>
                                    <td>
                                        @if ($product->discount_id)
                                            @if ($product->discount->price)
                                            {{ $product->discount->price }} ﷼
                                            @else
                                            {{ $product->discount->percent }} درصد
                                            @endif
                                        @else
                                        تخفیف ندارد
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->tags)
                                        <ol>
                                        @foreach ($product->tags as $tag)
                                            <li>{{ $tag->label }}</li>
                                        @endforeach
                                        </ol>
                                        @else
                                        تگ ندارد
                                        @endif
                                    </td>
                                    <td>{{ $product->category->label }}</td>
                                    <td>{{ $product->price }} ريال</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @foreach ($product->productImages as $image)
                                        <a data-toggle="modal" href="#myModal{{$image->id}}">
                                            <img height="100" width="80" alt="{{ $product->label }}"
                                                src="{{ asset($image->path) }}">
                                        </a>
                                        <div class="modal fade" id="myModal{{$image->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title">حذف عکس {{ $product->label }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img height="500" width="500" alt="hoodie1"
                                                            src="{{ asset($image->path) }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-warning"
                                                                type="button">خیر
                                                        </button>
                                                        <a href="{{ route('deleteProductImage',$image->id) }}"
                                                        class="btn btn-danger" type="button">آری</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($product->status == 0)
                                        <p class="label label-danger" style="width: 250px">غیر فعال</p>
                                        @else
                                        <p class="label label-success" style="width: 250px">فعال</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="label label-warning" href="{{ route('updateProduct',$product) }}">ویرایش</a>
                                    </td>
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
