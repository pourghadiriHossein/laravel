<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="developed for Poulstar HTML, CSS, JS, education">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Poulstar">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('public-side-files') }}/IMAGE/logo/TopBarLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Main.css">
    @yield('css')
</head>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top">&uArr;</button>
    <div class="mainBox topHeader">
        @if (Auth::user())
        <a class="link" href="{{ route('visitUser') }}"><button class="inlineLogin">داشبورد</button></a>
        <a class="link" href="{{ route('logout') }}"><button class="inlineLogin">خروج</button></a>
        @else
        <a class="link" href="{{ route('login') }}"><button class="inlineLogin">ورود</button></a>
        <a class="link" href="{{ route('register') }}"><button class="inlineLogin">ثبت نام</button></a>
        @endif
        <p id="customizeDate" class="inlineDate"></p>
    </div>
    <div class="mainBox topBarLogo">
        <img src="{{ asset('public-side-files') }}/IMAGE/logo/TopBarLogo.png" alt="TopBarLogo">
    </div>
    <div class="mainBox menu">
        <ul>
            <a class="linkMenu" href="{{ route('home') }}"><li>خانه</li></a>
            @foreach (\App\Actions\CategoryAction::getAllCategoriesForMenu() as $category)
            <li class="dropdown">
                <a href="{{ route('filterProductByCategory', $category->id) }}">
                    <button class="dropbtn">{{ $category->label }}</button>
                </a>
                <div class="dropdown-content">
                    @foreach ($category->subCategories as $subCategory)
                    <a class="linkMenu" href="{{ route('filterProductByCategory', $subCategory->id) }}">{{ $subCategory->label }}</a>
                    @endforeach
                </div>
            </li>
            @endforeach
            <a class="linkMenu" href="{{ route('contact') }}"><li>تماس با ما</li></a>
            <a class="linkMenu" href="{{ route('faq') }}"><li>سوالات متداول</li></a>
            <a class="linkMenu" href="{{ route('tac') }}"><li>قوانین و مقررات</li></a>
            @if (empty(\Illuminate\Support\Facades\Session::get('basket')))
            <li class="ShopingCartLogo dropdown">
                <span class="ShopingCartCounter center dropbtn">0</span>
            </li>
            @else
            @php($baskets = \App\Actions\SessionAction::getBasket())
            <li class="ShopingCartLogo dropdown">
                <span class="ShopingCartCounter center dropbtn">{{ count($baskets) }}</span>
                <div class="dropdown-content">
                    <a class="btn" href="{{ route('cart') }}">فاکتور کن</a>
                    @foreach ($baskets as $basket)
                    <a class="linkMenu" href="{{ route('singleProduct',$basket[0]->id) }}">
                        <img class="cart" src="{{ asset($basket[0]->productImages[0]->path) }}" alt="dress1-1">
                        <div class="box">
                            <div class="detail">
                                <span>{{ $basket[0]->label }}</span>
                                @if ($basket[0]->discount_id)
                                    <del>{{ $basket[0]->price }} ريال</del>
                                    @if ($basket[0]->discount->price)
                                        <ins>{{ $basket[0]->price - $basket[0]->discount->price }} ريال</ins>
                                        <span>تعداد: {{ $basket[1] }}</span>
                                        <ins> {{ ($basket[0]->price - $basket[0]->discount->price) * $basket[1] }} ريال</ins>
                                    @else
                                        <ins>{{ $basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100) }} ريال</ins>
                                        <span>تعداد: {{ $basket[1] }}</span>
                                        <ins> {{ ($basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100)) * $basket[1] }} ريال</ins>
                                    @endif
                                @else
                                    <ins>{{ $basket[0]->price }} ريال</ins>
                                    <span>تعداد: {{ $basket[1] }}</span>
                                    <ins> {{ $basket[0]->price * $basket[1] }} ريال</ins>
                                @endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </li>
            @endif

        </ul>
    </div>
    <div class="whiteSpace"></div>
    @yield('content')
    <div class="whiteSpace"></div>
    <div class="mainBox footer">
        <div class="box">
            <label class="footerFont" for="contact">تماس با ما</label>
            <p>شماره تماس: 34911-013</p>
            <p>آدرس: گیلان - رشت - گلسار - چهار راه اصفهان</p>
            <p>پست الکترونیک: info@poulstar.com</p>
        </div>
        <div class="box">
            <label class="footerFont" for="about">درباره ما</label>
            <p>
                سایت آموزشی فروشگاه آنلاین صرفا جهت آموزش بوده و استفاده از آن بلا مانع است.
            </p>
        </div>
        <div class="box">
            <label class="footerFont" for="tag">تگ</label>
            @foreach (\App\Actions\TagAction::getAllTags() as $tag)
            <button class="footerBTN"><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label }}</a></button>
            @endforeach
        </div>
        <div class="box">
            <label class="footerFont" for="payment">پرداخت</label>
            <p>کلیه تراکنش های موجود در این سایت از طریق ID Pay صورت می گیرد و به صورت آزمایشی می باشد.</p>
        </div>
    </div>
    <script src="{{ asset('public-side-files') }}/JS/Layout.js"></script>
    @yield('js')
</body>
</html>
