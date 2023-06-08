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
            @if (\App\Actions\SessionAction::getBasket())
                @foreach (\App\Actions\SessionAction::getBasket() as $basket)
                    <tr>
                        <td>
                            <a href="{{ route('session', [$basket[0]->id, $basket[1], 'remove']) }}"><img class="removeImage" src="{{ asset('public-side-files') }}/IMAGE/logo/removeIcon.png" alt="removeIcon"></a>
                        </td>
                        <td>
                            <a href="{{ route('singleProduct', $basket[0]->id) }}"><img class="productImage" src="{{ asset($basket[0]->productImages[0]->path) }}" alt="dress1"></a>
                        </td>
                        <td>{{ $basket[0]->label }}</td>
                        <td>
                            @if ($basket[0]->discount_id)
                                @if ($basket[0]->discount->price)
                                    {{ $basket[0]->price - $basket[0]->discount->price }} ريال
                                @else
                                    {{ $basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100) }} ريال
                                @endif
                            @else
                                {{ $basket[0]->price }} ريال
                            @endif
                        </td>
                        <td>
                            <a href="{{  route('session', [$basket[0]->id, 1, 'add'])  }}">
                                <input type="button" value="+">
                            </a>
                            <input type="text" value="{{ $basket[1] }}">
                            <a href="{{ route('session', [$basket[0]->id, -1, 'add']) }}">
                                <input type="button" value="-">
                            </a>
                        </td>
                        <td>
                            @if ($basket[0]->discount_id)
                                @if ($basket[0]->discount->price)
                                    {{ ($basket[0]->price - $basket[0]->discount->price) * $basket[1] }} ريال
                                @else
                                    {{ ($basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100)) * $basket[1] }} ريال
                                @endif
                            @else
                                {{ $basket[0]->price * $basket[1] }} ريال
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="underTable">
        <div class="rightPart">
            <a href="{{ route('checkout') }}"><button>تایید نهایی</button></a>
        </div>
        <div class="leftPart">
            <form action="{{ route('session', ['token', 'token', 'addTokenDiscount']) }}" method="get">
                <input type="text" name="giftCode" placeholder="کد تخفیف خود را وارد کنید">
                <input type="submit" value="ثبت کد تخفیف">
            </form>
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
                    <td>
                        @if (\App\Actions\SessionAction::calculateCart())
                        {{ \App\Actions\SessionAction::calculateCart() }} ریال
                        @else
                        سبد خالی است
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>هزینه ارسال</td>
                    <td>رایگان</td>
                </tr>
                <tr>
                    <td>کد تخفیف</td>
                    <td>
                        @if (!empty(\App\Actions\SessionAction::getTokenDiscount()))
                            @foreach (\App\Actions\SessionAction::getTokenDiscount() as $dis)
                                @if ($dis->price)
                                    کسر {{ (int) $dis->price }} ريال
                                @else
                                    کسر {{ (int) $dis->percent }} درصد
                                @endif
                            @endforeach
                        @else
                        سبد خالی است
                        @endif
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>جمع کل </th>
                    <th>
                        @if (\App\Actions\SessionAction::calculateCart())
                        {{ \App\Actions\SessionAction::calculateCart() - \App\Actions\SessionAction::calculateDiscountSession() }} ریال
                        @else
                        سبد خالی است
                        @endif
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('js')

@endsection

