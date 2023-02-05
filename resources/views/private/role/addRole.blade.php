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
