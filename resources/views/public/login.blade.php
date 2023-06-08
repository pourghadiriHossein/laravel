@extends('public.publicLayout')

@section('title')
ورود
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Login.css">
@endsection

@section('content')
<div class="mainBox login">
    @include('include.showError')
    @include('include.validationError')
    <h1>ورود</h1>
    <hr>
    <div class="loginBox">
        <form action="{{ route('postLogin') }}" method="post" autocomplete="on">
            @csrf
            <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
            <input type="text" name="password" placeholder="رمز عبور خود را وارد کنید">
            <input type="submit" value="ارسال کن">
        </form>
    </div>
    <div class="guideBox">
        <p>فرم آزمایشی پروژه پل استار جهت آموزش بهتر و کاردبری تر با ضاهر مناسب جهت ارتباط گیری بیشتر با مبحث تحصیلی می باشد</p>
        <p>شماره تماس: 34911-013</p>
        <p>آدرس: گیلان - رشت - گلسار - چهار راه اصفهان</p>
        <p>پست الکترونیک: info@poulstar.com</p>
    </div>
</div>
@endsection

@section('js')

@endsection
