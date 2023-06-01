@extends('public.publicLayout')

@section('title')
تماس با ما
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Contact.css">
@endsection

@section('content')
<div class="mainBox contact">
    <h1>تماس با ما</h1>
    <hr>
    <div class="contactBox">
        <form action="" method="" autocomplete="on">
            <input type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید">
            <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
            <textarea name="message" placeholder="متن مورد نظر خود را بنویسید"></textarea>
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
