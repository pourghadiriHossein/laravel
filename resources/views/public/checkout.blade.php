@extends('public.publicLayout')

@section('title')
فاکتور
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Checkout.css">
@endsection

@section('content')
<div class="mainBox checkout">
    <form action="" method="" autocomplete="on">
        <div class="partition">
            <div class="previousAddress">
                <label><input type="checkbox" value="1" name="previousAddress">&nbsp; آردس پیش فرض &nbsp;</label>
                <label><input type="radio" value="1" name="selectedPreviousAddress"> گیلان - رشت - گلسار </label>
                <label><input type="radio" value="1" name="selectedPreviousAddress"> گیلان - رشت - منظریه </label>
                <label><input type="radio" value="1" name="selectedPreviousAddress"> گیلان - رشت - شهریاران </label>
            </div>
            <div class="newAddress">
                <label><input type="checkbox" value="1" name="newAddress">&nbsp; آردس پیش فرض &nbsp;</label>
                <input list="region" name="newAddress" placeholder="کد شهر خود را انتخاب کنید">
                <datalist id="region">
                    <option value="1">گیلان - رشت - گلسار</option>
                    <option value="2">گیلان - رشت - رازی </option>
                    <option value="3">گیلان - رشت - گاز</option>
                    <option value="4">گیلان - رشت - معلم</option>
                </datalist>
                <input type="text" name="detail" placeholder="جزئیات آدرس: مثال گلسار - چهار راه اصفهان" maxlength="100">
            </div>
        </div>
        <div class="partition">
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
            <div class="personalData">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">مشخصات فردی</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">مجموعه پل استار</td>
                            <td>013-34911</td>
                        </tr>
                        <tr>
                            <td>info@poulstar.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="partition">
            <label>
                <input type="checkbox" value="1" name="acceptTerm">
                &nbsp; <a href="{{ route('tac') }}">قوانین و مقررات</a> سایت را مطالعه کرده و با آگاهی کامل شرایط خرید آنلاین را می پذیرم. &nbsp;
            </label>
            <input type="submit" value="تایید و پرداخت">
        </div>
    </form>
</div>
@endsection

@section('js')

@endsection
