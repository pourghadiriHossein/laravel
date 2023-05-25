@extends('public.publicLayout')

@section('title')
سبد خرید
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Cart.css">
@endsection

@section('content')
<div class="mainBox finalCart">
    <h1>سبد خرید</h1>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>تصویر محصول</th>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>تعداد</th>
                <th>قیمت کل</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href=""><img class="removeImage" src="{{ asset('public-side-files') }}/IMAGE/logo/removeIcon.png" alt="removeIcon"></a>
                </td>
                <td>
                    <a href=""><img class="productImage" src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1"></a>
                </td>
                <td>لباس مجلسی</td>
                <td>600000 ريال</td>
                <td>
                    <input type="button" value="+">
                    <input type="text" value="1">
                    <input type="button" value="-">
                </td>
                <td>600000 ريال</td>
            </tr>
            <tr>
                <td>
                    <a href=""><img class="removeImage" src="{{ asset('public-side-files') }}/IMAGE/logo/removeIcon.png" alt="removeIcon"></a>
                </td>
                <td>
                    <a href=""><img class="productImage" src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg" alt="hoodie1"></a>
                </td>
                <td>هودی</td>
                <td>600000 ريال</td>
                <td>
                    <input type="button" value="+">
                    <input type="text" value="2">
                    <input type="button" value="-">
                </td>
                <td>1200000 ريال</td>
            </tr>
            <tr>
                <td>
                    <a href=""><img class="removeImage" src="{{ asset('public-side-files') }}/IMAGE/logo/removeIcon.png" alt="removeIcon"></a>
                </td>
                <td>
                    <a href=""><img class="productImage" src="{{ asset('public-side-files') }}/IMAGE/product/jeans1-1-700x893.jpg" alt="jeans1"></a>
                </td>
                <td>شلوار لی</td>
                <td>400000 ريال</td>
                <td>
                    <input type="button" value="+">
                    <input type="text" value="3">
                    <input type="button" value="-">
                </td>
                <td>1200000 ريال</td>
            </tr>
        </tbody>
    </table>
    <div class="underTable">
        <div class="rightPart">
            <a href="{{ route('checkout') }}"><button>تایید نهایی</button></a>
        </div>
        <div class="leftPart">
            <input type="text" name="giftCode" placeholder="کد تخفیف خود را وارد کنید">
            <a href=""><button>ثبت کد تخفیف</button></a>
        </div>
    </div>
    <div class="factor">
        <table>
            <thead>
                <tr>
                    <th colspan="2">جمع بندی سبد خرید</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>جمع کل سبد خرید</td>
                    <td>3000000 ﷼</td>
                </tr>
                <tr>
                    <td>هزینه ارسال</td>
                    <td>رایگان</td>
                </tr>
                <tr>
                    <td>کد تخفیف</td>
                    <td>ندارد</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>جمع کل </th>
                    <th>3000000 ﷼</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('js')

@endsection

