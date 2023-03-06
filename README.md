# Create Public Side In Laravel

## Create public-side-files and public folder
- ### In public folder
- ### In resources/views folder

## Copy and Paste to public/public-side-files
- ### css folder
- ### font folder
- ### image folder
- ### js folder

## Make PublicController
```bash
php artisan make:controller PublicController
```
## Create layout Process
- ### Create publicLayout.blade.php file for public side layout in resources/views folder
```bash
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
        <a class="link" href="{{ route('login') }}"><button class="inlineLogin">ورود</button></a>
        <a class="link" href="{{ route('register') }}"><button class="inlineLogin">ثبت نام</button></a>
        <p id="customizeDate" class="inlineDate"></p>
    </div>
    <div class="mainBox topBarLogo">
        <img src="{{ asset('public-side-files') }}/IMAGE/logo/TopBarLogo.png" alt="TopBarLogo">
    </div>
    <div class="mainBox menu">
        <ul>
            <a class="linkMenu" href="{{ route('home') }}"><li>خانه</li></a>
            <li class="dropdown">
                <button class="dropbtn">محصولات</button>
                <div class="dropdown-content">
                    <a class="linkMenu" href="{{ route('product') }}">مردانه</a>
                    <a class="linkMenu" href="{{ route('product') }}">زنانه</a>
                    <a class="linkMenu" href="{{ route('product') }}">کودکانه</a>
                </div>
            </li>
            <a class="linkMenu" href="{{ route('contact') }}"><li>تماس با ما</li></a>
            <a class="linkMenu" href="{{ route('faq') }}"><li>سوالات متداول</li></a>
            <a class="linkMenu" href="{{ route('tac') }}"><li>قوانین و مقررات</li></a>
            <li class="ShopingCartLogo dropdown">
                <span class="ShopingCartCounter center dropbtn">3</span>
                <div class="dropdown-content">
                    <a class="btn" href="{{ route('cart') }}">فاکتور کن</a>
                    <a class="linkMenu" href="{{ route('singleProduct') }}">
                        <img class="cart" src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1-1">
                        <div class="box">
                            <div class="detail">
                                <span>لباس مجلسی</span>
                                <del>700000 ريال</del>
                                <ins> 600000 ريال</ins>
                                <span>تعداد: 1</span>
                                <ins> 600000 ريال</ins>
                            </div>
                        </div>
                    </a>
                    <a class="linkMenu" href="{{ route('singleProduct') }}">
                        <img class="cart" src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg" alt="hoodie1-1">
                        <div class="box">
                            <div class="detail">
                                <span>هودی</span>
                                <del>700000 ريال</del>
                                <ins> 600000 ريال</ins>
                                <span>تعداد: 2</span>
                                <ins> 1200000 ريال</ins>
                            </div>
                        </div>
                    </a>
                    <a class="linkMenu" href="{{ route('singleProduct') }}">
                        <img class="cart" src="{{ asset('public-side-files') }}/IMAGE/product/jeans1-1-700x893.jpg" alt="jeans1-1">
                        <div class="box">
                            <div class="detail">
                                <span>شلوار لی</span>
                                <del>500000 ريال</del>
                                <ins> 400000 ريال</ins>
                                <span>تعداد: 3</span>
                                <ins> 1200000 ريال</ins>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
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
            <button class="footerBTN">راحتی</button>
            <button class="footerBTN">مقاوم</button>
            <button class="footerBTN">اسپرت</button>
            <button class="footerBTN">مجلسی</button>
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
```
- ### Create public function index in PublicController
```bash
public function index() {
   return redirect()->route('home');
}
```
- ### Create get method route for index in routes/web.php
```bash
Route::get('', [PublicController::class, 'index']);
```

## Create cart Process
- ### Create cart.blade.php file for public side in resources/views folder
```bash
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
```
- ### Create public function cart in PublicController
```bash
public function cart() {
   return view('public.cart');
}
```
- ### Create get method route for cart in routes/web.php
```bash
Route::get('cart',[PublicController::class, 'cart'])->name('cart');
```

## Create checkout Process
- ### Create checkout.blade.php file for public side in resources/views folder
```bash
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
```
- ### Create public function checkout in PublicController
```bash
public function checkout() {
   return view('public.checkout');
}
```
- ### Create get method route for checkout in routes/web.php
```bash
Route::get('checkout',[PublicController::class, 'checkout'])->name('checkout');
```

## Create contact Process
- ### Create contact.blade.php file for public side in resources/views folder
```bash
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
```
- ### Create public function contact in PublicController
```bash
public function contact() {
   return view('public.contact');
}
```
- ### Create get method route for contact in routes/web.php
```bash
Route::get('contact',[PublicController::class, 'contact'])->name('contact');
```
     
## Create faq Process
- ### Create faq.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
پرسش و پاسخ متداول
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/FrequencyAndAnswer.css">
@endsection

@section('content')
<div class="mainBox frequencyAndAnswer">
    <h1>پرسش و پاسخ متداول</h1>
    <div class="halfWidth">
        <div class="tabBox">
            <h2>درگاه پرداخت</h2>
            <p>به طور موثر اطلاعات متقابل رسانه ای را بدون ارزش رسانه ای آزاد کنید. به سرعت تحویل به موقع را برای طرحواره های بلادرنگ به حداکثر برسانید. به طور چشمگیری راه حل های کلیک را بدون راه حل های کاربردی حفظ کنید.</p>
            <!-- ****************************** -->
            <div class="headTab">
                <p>چه زمانی پرداخت کنیم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>اگر سفارش شما تا تاریخ تحویل تخمینی نرسیده است، ما اینجا هستیم تا کمک کنیم، اما ارزش بررسی چند چیز را قبل از تماس گرفتن دارد.</p>
                <p>بین 3 تا 5 روز طول می کشد تا سفارش شما از انبار ما ارسال شود، به محض اینکه سفارش شما در راه است، ایمیلی برای تایید ارسال می کنیم. اگر شما انتخاب کرده ایدتحویل استاندارد یا روز بعد برای مشاهده اطلاعات به روز ردیابی، پیوند ردیابی را که در ایمیل ارسال ارسال کرده ایم، بررسی کنید.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>چطوری تخفیف بگیرم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>اکثر تبلیغات به صورت خودکار هنگام تسویه حساب اعمال می شوند.</p>
                <p>اگر کد تخفیف یا کوپن دارید باید در کادری که عبارت «کد کوپن» را دارد وارد کنید، کد تبلیغاتی خود را وارد کنید و روی دکمه اعمال کوپن کلیک کنید.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>چه مقدار بپردازم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>در مواقعی نمی‌توانیم همه اقلامی را که سفارش داده‌اید ارسال کنیم. اگر بخواهید موارد گم شده ای از سفارش خود داشته باشید، ایمیلی برای شما ارسال خواهیم کرد، بنابراین لطفاً صندوق پستی خود را بررسی کنید. برخی از جزئیات نیز ممکن است روی یادداشت اعزام شما چاپ شود.</p>
                <p>ما هر گونه پرداختی را که برای مواردی که ارسال نشده اند بازپرداخت می کنیم. اگر ایمیلی از ما دریافت نکرده‌اید یا اطلاعاتی در مورد یادداشت ارسال شما وجود ندارد، لطفاً از صفحه تماس با ما دیدن کنید و ما مشکل را حل می‌کنیم. برای شما در سریع ترین زمان ممکن</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>آیا میتوانم سفارشم را رهیابی کنم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>سفارش‌های جمع‌آوری شده از فروشگاه به صورت داخلی پیگیری می‌شوند، اما در حال حاضر نمی‌توان آن را به مشتری ارائه کرد. به محض اینکه سفارش شما در فروشگاه ثبت شد، برای شما ایمیل ارسال می کنیم.</p>
                <p>ردیابی ممکن است در برخی از سفارشات بین المللی در دسترس نباشد. لطفاً قبل از تماس، زمان تحویل کامل را در نظر بگیرید.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>آیا باید یک حساب کاربری برای خرید ایجاد کنم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>بله، اما ایجاد یک حساب کاربری واقعاً ساده است و پس از راه‌اندازی می‌توانید سریع‌تر بررسی کنید، آدرس‌های مکرر را ذخیره کنید، سفارش‌های خود را پیگیری کنید و اولین کسی باشید که در مورد مسابقات، پیشنهادات می‌شنوید. و تخفیف.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>سفارشات فروشگاه</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>در صورتی که درخواست ارسال مجموعه از فروشگاه را داشته باشید، پس از تحویل گرفتن سفارش شما به فروشگاه، یک ایمیل و پیامک برای شما ارسال می کنیم و به شما اطلاع می دهیم که سفارش شما آماده تحویل است.</p>
                <p>زمان تحویل از فروشگاهی به فروشگاه دیگر متفاوت است اما معمولاً در عرض 3 تا 5 روز خواهد بود.</p>
            </div>
            <!-- ******************************* -->
        </div>
        <div class="tabBox">
            <h2>خرید</h2>
            <p>بازارهای قدرتمند را از طریق شبکه‌های plug-and-play مدیریت کنید. به طور پویا کاربران B2C را پس از مزایای پایه نصب شده به تعویق بیندازید. به طور چشمگیری همگرایی مشتری محور را تجسم کنید.</p>
            <!-- ****************************** -->
            <div class="headTab">
                <p>سفارش من چیست</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>اگر سفارش شما تا تاریخ تحویل تخمینی نرسیده است، ما اینجا هستیم تا کمک کنیم، اما ارزش بررسی چند چیز را قبل از تماس گرفتن دارد.</p>
                <p>بین 3 تا 5 روز طول می کشد تا سفارش شما از انبار ما ارسال شود، به محض اینکه سفارش شما در راه است، ایمیلی برای تایید ارسال می کنیم. اگر شما انتخاب کرده ایدتحویل استاندارد یا روز بعد برای مشاهده اطلاعات به روز ردیابی، پیوند ردیابی را که در ایمیل ارسال ارسال کرده ایم، بررسی کنید.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>چگونه از کد تبلیغاتی استفاده کنم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>اکثر تبلیغات به صورت خودکار هنگام تسویه حساب اعمال می شوند.</p>
                <p>اگر کد تخفیف یا کوپن دارید باید در کادری که عبارت «کد کوپن» را دارد وارد کنید، کد تبلیغاتی خود را وارد کنید و روی دکمه اعمال کوپن کلیک کنید.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>بخشی از سفارش من گم شده است</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>در مواقعی نمی‌توانیم همه اقلامی را که سفارش داده‌اید ارسال کنیم. اگر بخواهید موارد گم شده ای از سفارش خود داشته باشید، ایمیلی برای شما ارسال خواهیم کرد، بنابراین لطفاً صندوق پستی خود را بررسی کنید. برخی از جزئیات نیز ممکن است روی یادداشت اعزام شما چاپ شود.</p>
                <p>ما هر گونه پرداختی را که برای مواردی که ارسال نشده اند بازپرداخت می کنیم. اگر ایمیلی از ما دریافت نکرده‌اید یا اطلاعاتی در مورد یادداشت ارسال شما وجود ندارد، لطفاً از صفحه تماس با ما دیدن کنید و ما مشکل را حل می‌کنیم. برای شما در سریع ترین زمان ممکن</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>آیا میتوانم سفارشم را رهیابی کنم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>سفارش‌های جمع‌آوری شده از فروشگاه به صورت داخلی پیگیری می‌شوند، اما در حال حاضر نمی‌توان آن را به مشتری ارائه کرد. به محض اینکه سفارش شما در فروشگاه ثبت شد، برای شما ایمیل ارسال می کنیم.</p>
                <p>ردیابی ممکن است در برخی از سفارشات بین المللی در دسترس نباشد. لطفاً قبل از تماس، زمان تحویل کامل را در نظر بگیرید.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>آیا باید یک حساب کاربری برای خرید ایجاد کنم</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>بله، اما ایجاد یک حساب کاربری واقعاً ساده است و پس از راه‌اندازی می‌توانید سریع‌تر بررسی کنید، آدرس‌های مکرر را ذخیره کنید، سفارش‌های خود را پیگیری کنید و اولین کسی باشید که در مورد مسابقات، پیشنهادات می‌شنوید. و تخفیف.</p>
            </div>
            <!-- ******************************* -->
            <!-- ****************************** -->
            <div class="headTab">
                <p>سفارشات فروشگاه</p>
                <span>&#8658;</span>
            </div>
            <div class="bodyTab">
                <p>در صورتی که درخواست ارسال مجموعه از فروشگاه را داشته باشید، پس از تحویل گرفتن سفارش شما به فروشگاه، یک ایمیل و پیامک برای شما ارسال می کنیم و به شما اطلاع می دهیم که سفارش شما آماده تحویل است.</p>
                <p>زمان تحویل از فروشگاهی به فروشگاه دیگر متفاوت است اما معمولاً در عرض 3 تا 5 روز خواهد بود.</p>
            </div>
            <!-- ******************************* -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public-side-files') }}/JS/FAQ.js"></script>
@endsection
```
- ### Create public function faq in PublicController
```bash
public function faq() {
   return view('public.faq');
}
```
- ### Create get method route for faq in routes/web.php
```bash
Route::get('faq',[PublicController::class, 'faq'])->name('faq');
```

## Create home Process
- ### Create home.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
خانه
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Home.css">
@endsection

@section('content')
<div class="mainBox">
    <div class="headerImage">
        <div class="rightHeader">
            <img class="imgRightTop" src="{{ asset('public-side-files') }}/IMAGE/home/home-header-right-top.jpg" alt="headerRightTop">
            <img class="imgRightBottom" src="{{ asset('public-side-files') }}/IMAGE/home/home-header-right-bottom.jpg" alt="headerRightBottom">
        </div>
        <div class="leftHeader">
            <img class="imgleft" src="{{ asset('public-side-files') }}/IMAGE/home/home-header-left.jpg" alt="hedareLeft">
        </div>

    </div>
    <div class="partition">
        <h1>آخرین محصولات</h1>
        <hr>
    </div>
    <div class="lastProduct">
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag1-1-700x893.jpg" alt="bag1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag1-2-700x893.jpg" alt="bag1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>کیف کروئلا</p></a>
               <a href=""> <img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag3-1-700x893.jpg" alt="bag3"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag3-2-700x893.jpg" alt="bag"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>کیف قرمز مخملی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag4-1-700x893.jpg" alt="bag4"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag4-2-700x893.jpg" alt="bag"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>کیف چرمی درجه یک</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress1-2-700x893.jpg" alt="bag"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>لباس مجلسی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
    </div>
    <div class="partition">
        <h1>آخرین محصولات مردانه</h1>
        <hr>
    </div>
    <div class="menProduct">
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg" alt="hoodie1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-2-700x893.jpg" alt="hoodie1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>هودی اسپرت</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie2-1-700x893.jpg" alt="hoodie2"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie2-2-700x893.jpg" alt="hoodie2"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>هودی زرشکی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket1-1-700x893.jpg" alt="jacket1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket1-2-700x893.jpg" alt="jacket1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>ژاکت طرح دار</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket2-1-700x893.jpg" alt="jacket2"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket2-2-700x893.jpg" alt="jacket2"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href="" ><p>ژاکت نیوجرسی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt1-1-700x893.jpg" alt="shirt1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt1-2-700x893.jpg" alt="shirt1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>پیراهن لی اسپرت</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt2-1-700x893.jpg" alt="shirt2"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt2-2-700x893.jpg" alt="shirt2"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href="" ><p>پیراهن سیاه اسپرت</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
    </div>
    <div class="partition">
        <h1>آخرین محصولات زنانه</h1>
        <hr>
    </div>
    <div class="womenProduct">
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress2-1-700x893.jpg" alt="dress2"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress2-2-700x893.jpg" alt="dress2"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>لباس مجلسی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans1-1-700x893.jpg" alt="jeans1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans1-2-700x893.jpg" alt="jeans1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>شلوار لی طرح دار</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans2-1-700x893.jpg" alt="jeans2"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans2-2-700x893.jpg" alt="jeans2"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>شلوار لی ساده</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt1-1-700x893.jpg" alt="skirt1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt1-2-700x893.jpg" alt="skirt1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>دامن سفید</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt4-1-700x893.jpg" alt="skirt4"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt4-2-700x893.jpg" alt="skirt4"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>دامن آر آر</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/top1-1-700x893.jpg" alt="top1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/top1-2-700x893.jpg" alt="top1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>تاپ مجلسی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
```
- ### Create public function home in PublicController
```bash
public function home() {
   return view('public.home');
}
```
- ### Create get method route for home in routes/web.php
```bash
Route::get('home',[PublicController::class, 'home'])->name('home');
```

## Create login Process
- ### Create login.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
ورود
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Login.css">
@endsection

@section('content')
<div class="mainBox login">
    <h1>ورود</h1>
    <hr>
    <div class="loginBox">
        <form action="" method="" autocomplete="on">
            <input type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید">
            <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
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
```
- ### Create public function login in PublicController
```bash
public function login() {
   return view('public.login');
}
```
- ### Create get method route for login in routes/web.php
```bash
Route::get('login',[PublicController::class, 'login'])->name('login');
```

## Create product Process
- ### Create product.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
محصولات
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Product.css">
@endsection

@section('content')
<div class="mainBox customizeLayout">
    <div class="horizontalPart">
        <div class="horizontalRightPart">
            <ul>
                <li><a href="">خانه</a></li>/
                <li><a href="">مردانه</a></li>/
                <li><a href="">لباس</a></li>
            </ul>
        </div>
        <div class="horizontalLeftPart">
            <div class="productAmount">
                <p>مجموع محصولات در حال نمایش: </p>
                <span id="counter">17</span>
            </div>
            <div class="sortProduct">
                <select name="sorting" id="sort" oninput="selectMode()">
                    <option value="1">قدیمی ترین</option>
                    <option value="2">جدید ترین</option>
                    <option value="3">ارزان ترین</option>
                    <option value="4">گران ترین</option>
                </select>
            </div>
            <div class="searchProduct">
                <input type="search" name="searchBox" id="searchBox" placeholder="محصول مورد نظر خود را وارد کنید">
                <button id="search" onclick="searchProduct()">&#9935;</button>
            </div>
        </div>
    </div>
    <div class="contectBox">
        <div class="helpPart">
            <div class="latestMenProduct">
                <h1>آخرین محصولات مردانه</h1>
                <div class="smallShowProduct">
                    <div class="smallImage">
                        <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg" alt="hoodie1"></a>
                    </div>
                    <div class="smallDetail">
                        <a href=""><p>هودی</p></a>
                        <del>700000 ريال</del>
                        <ins>600000 ريال</ins>
                    </div>
                </div>
            </div>
            <hr>
            <div class="latestWomenProduct">
                <h1>آخرین محصولات زنانه</h1>
                <div class="smallShowProduct">
                    <div class="smallImage">
                        <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1"></a>
                    </div>
                    <div class="smallDetail">
                        <a href=""><p>لباس مجلسی</p></a>
                        <del>700000 ريال</del>
                        <ins>600000 ريال</ins>
                    </div>
                </div>
            </div>
            <hr>
            <div class="allTags">
                <h1>تگ ها</h1>
                <button><a href="">راحتی</a></button>
                <button><a href="">مقاوم</a></button>
                <button><a href="">اسپرت</a></button>
                <button><a href="">مجلسی</a></button>
            </div>
        </div>
        <div id="productBox" class="showProduct">
            <div id="1" data-price="745000" data-name="کیف کروئلا" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag1-1-700x893.jpg" alt="bag1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag1-2-700x893.jpg" alt="bag1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>کیف کروئلا</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>850000 ريال</del>
                    <ins id="745000">745000 ريال</ins>
                </div>
            </div>
            <div id="2" data-price="632000" data-name="کیف قرمز مخملی" class="imageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag3-1-700x893.jpg" alt="bag3"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag3-2-700x893.jpg" alt="bag"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>کیف قرمز مخملی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>925000 ريال</del>
                    <ins id="632000">632000 ريال</ins>
                </div>
            </div>
            <div id="3" data-price="725000" data-name="کیف چرمی درجه یک" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag4-1-700x893.jpg" alt="bag4"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag4-2-700x893.jpg" alt="bag"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>کیف چرمی درجه یک</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>987000 ريال</del>
                    <ins id="725000">725000 ريال</ins>
                </div>
            </div>
            <div id="4" data-price="563000" data-name="لباس مجلسی" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress1-2-700x893.jpg" alt="dress1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>لباس مجلسی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="563000">563000 ريال</ins>
                </div>
            </div>
            <div id="5" data-price="481000" data-name="لباس مجلسی" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress2-1-700x893.jpg" alt="dress2"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/dress2-2-700x893.jpg" alt="dress2"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>لباس مجلسی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="481000">481000 ريال</ins>
                </div>
            </div>
            <div id="6" data-price="661000" data-name="هودی اسپرت" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-1-700x893.jpg" alt="hoodie1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie1-2-700x893.jpg" alt="hoodie1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>هودی اسپرت</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="661000">661000 ريال</ins>
                </div>
            </div>
            <div id="7" data-price="550000" data-name="هودی زرشکی" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie2-1-700x893.jpg" alt="hoodie2"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/hoodie2-2-700x893.jpg" alt="hoodie2"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>هودی زرشکی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="550000">550000 ريال</ins>
                </div>
            </div>
            <div id="8" data-price="601000" data-name="ژاکت طرح دار" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket1-1-700x893.jpg" alt="jacket1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket1-2-700x893.jpg" alt="jacket1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>ژاکت طرح دار</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="601000">601000 ريال</ins>
                </div>
            </div>
            <div id="9" data-price="690000" data-name="ژاکت نیوجرسی" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket2-1-700x893.jpg" alt="jacket2"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jacket2-2-700x893.jpg" alt="jacket2"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>ژاکت نیوجرسی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="690000">690000 ريال</ins>
                </div>
            </div>
            <div id="10" data-price="680000" data-name="شلوار لی طرح دار" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans1-1-700x893.jpg" alt="jeans1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans1-2-700x893.jpg" alt="jeans1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>شلوار لی طرح دار</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="680000">680000 ريال</ins>
                </div>
            </div>
            <div id="11" data-price="670000" data-name="شلوار لی ساده" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans2-1-700x893.jpg" alt="jeans2"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/jeans2-2-700x893.jpg" alt="jeans2"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>شلوار لی ساده</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="670000">670000 ريال</ins>
                </div>
            </div>
            <div id="12" data-price="660000" data-name="پیراهن لی اسپرت" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt1-1-700x893.jpg" alt="shirt1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt1-2-700x893.jpg" alt="shirt1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>پیراهن لی اسپرت</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="660000">660000 ريال</ins>
                </div>
            </div>
            <div id="13" data-price="650000" data-name="پیراهن سیاه اسپرت" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt2-1-700x893.jpg" alt="shirt2"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/shirt2-2-700x893.jpg" alt="shirt2"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>پیراهن سیاه اسپرت</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="650000">650000 ريال</ins>
                </div>
            </div>
            <div id="14" data-price="640000" data-name="دامن سفید" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt1-1-700x893.jpg" alt="skirt1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt1-2-700x893.jpg" alt="skirt1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>دامن سفید</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="640000">640000 ريال</ins>
                </div>
            </div>
            <div id="15" data-price="630000" data-name="دامن آر آر" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt4-1-700x893.jpg" alt="skirt4"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/skirt4-2-700x893.jpg" alt="skirt4"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>دامن آر آر</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="630000">630000 ريال</ins>
                </div>
            </div>
            <div id="16" data-price="620000" data-name="تاپ مجلسی" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/top1-1-700x893.jpg" alt="top1"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/top1-2-700x893.jpg" alt="top1"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>تاپ مجلسی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="620000">620000 ريال</ins>
                </div>
            </div>
            <div id="17" data-price="610000" data-name="تاپ مشکی" class="imageBox">
                <span class="discount"></span>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/top2-1-700x893.jpg" alt="top2"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/top2-2-700x893.jpg" alt="top2"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>تاپ مشکی</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    <span><a href="">راحتی</a></span>,
                    <span><a href="">مقاوم</a></span>,
                    <span><a href="">اسپرت</a></span>,
                </div>
                <div class="price">
                    <del>700000 ريال</del>
                    <ins id="610000">610000 ريال</ins>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontalPart">
        <div id="pagination" class="pagination"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public-side-files') }}/JS/Product.js"></script>
@endsection
```
- ### Create public function product in PublicController
```bash
public function product() {
   return view('public.product');
}
```
- ### Create get method route for product in routes/web.php
```bash
Route::get('product',[PublicController::class, 'product'])->name('product');
```

## Create register Process
- ### Create register.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
ثبت نام
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/Register.css">
@endsection

@section('content')
<div class="mainBox register">
    <h1>ثبت نام</h1>
    <hr>
    <div class="registerBox">
        <form action="" method="" autocomplete="on">
            <input type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید">
            <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
            <input type="text" name="email" placeholder="پست الکترونیک خود را وارد کنید">
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
```
- ### Create public function register in PublicController
```bash
public function register() {
   return view('public.register');
}
```
- ### Create get method route for register in routes/web.php
```bash
Route::get('register',[PublicController::class, 'register'])->name('register');
```

## Create singleProduct Process
- ### Create singleProduct.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
نمایش محصول
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/SingleProduct.css">
@endsection

@section('content')
<div class="mainBox singleProduct">
    <div class="verticalPart">
        <div class="productRoute">
            <ul>
                <li><a href="">خانه</a></li>/
                <li><a href="">زنانه</a></li>/
                <li><a href="">لباس</a></li>
            </ul>
        </div>
        <div class="productDescription">
            <h1>لباس مجلسی</h1>
            <h2>لباس بسیار مرغوب و با کیفت عالی برای خاص پوش ها</h2>
            <del>700000 ريال</del>
            <ins>600000 ريال</ins>
        </div>
        <div class="productCounter">
            <form action="">
                <input type="button" value="+" onclick="increment()">
                <input type="number" name="quantity" value="1" id="productQuantity">
                <input type="button" value="-" onclick="decrement()">
                <input type="submit" value="افزودن به سبد خرید">
            </form>
        </div>
        <div class="productDetail">
            <div class="productCategory">
                <span>دسته بندی: </span>
                <p><a href="">لباس</a></p>
            </div>
            <div class="productTag">
                <span>تگ ها: </span>
                <p><a href="">مجلسی</a></p>،
                <p><a href="">راحتی</a></p>
            </div>
        </div>
    </div>
    <div class="verticalPart">
        <div class="productImage">
            <img id="show" src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1">
        </div>
        <div class="allImage">
            <img onclick="selectFirstImage()" id="first" src="{{ asset('public-side-files') }}/IMAGE/product/dress1-1-700x893.jpg" alt="dress1">
            <img onclick="selectSecondImage()" id="second" src="{{ asset('public-side-files') }}/IMAGE/product/dress1-2-700x893.jpg" alt="dress1">
        </div>
    </div>
    <div class="horizontalPart">
        <div class="tab">
            <button onclick="descriptionTab()">توضیحات</button>
            <button onclick="commentTab()">نظر ها (0)</button>
        </div>
        <div id="description" class="tabcontent">
            <p>لباس مجلسی</p>
            <p>لباس بسیار مرغوب و با کیفت عالی برای خاص پوش ها</p>
        </div>
        <div id="comment" class="tabcontent">
            <div class="user">
                <p>حسین پورقدیری</p>
            </div>
            <div class="userComment">
                <p>لباس بسیار مناسبی است.</p>
            </div>
            <hr>
            <div class="newComment">
                <form action="">
                    <textarea name="comment" placeholder="نظر خود را بنویسید ..."></textarea>
                    <input type="submit" value="ثبت نظر">
                </form>
            </div>
        </div>
    </div>
    <div class="partition">
        <h1>آخرین محصولات</h1>
        <hr>
    </div>
    <div class="relatedProduct">
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag1-1-700x893.jpg" alt="bag1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag1-2-700x893.jpg" alt="bag1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>کیف کروئلا</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag3-1-700x893.jpg" alt="bag3"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag3-2-700x893.jpg" alt="bag"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>کیف قرمز مخملی</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
        <div class="imageBox">
            <span class="discount"></span>
            <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag4-1-700x893.jpg" alt="bag4"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/product/bag4-2-700x893.jpg" alt="bag"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>کیف چرمی درجه یک</p></a>
                <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
            </div>
            <div class="tag">
                <span><a href="">راحتی</a></span>,
                <span><a href="">مقاوم</a></span>,
                <span><a href="">اسپرت</a></span>,
            </div>
            <div class="price">
                <del>700000 ريال</del>
                <ins>600000 ريال</ins>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public-side-files') }}/JS/SingleProduct.js"></script>
@endsection
```
- ### Create public function singleProduct in PublicController
```bash
public function singleProduct() {
   return view('public.singleProduct');
}
```
- ### Create get method route for singleProduct in routes/web.php
```bash
Route::get('singleProduct',[PublicController::class, 'singleProduct'])->name('singleProduct');
```
     
## Create tac Process
- ### Create tac.blade.php file for public side in resources/views folder
```bash
@extends('public.publicLayout')

@section('title')
قوانین و مقررات
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('public-side-files') }}/CSS/TermAndCondition.css">
@endsection

@section('content')
<div class="mainBox termAndCondition">
    <h1>قوانین و مقررات</h1>
    <h2>عمومی</h2>
    <hr>
    <div>
        <p>
            دسترسی و استفاده از این وب سایت و محصولات و خدمات قابل ارائه از طریق این وب سایت مشمول شرایط، شرایط و تذکرات زیر است.
            با استفاده از خدمات، شما با تمام شرایط خدمات موافقت می کنید، همانطور که ممکن است هر از گاهی توسط ما به روز شود.
            شما باید این صفحه را مرتباً بررسی کنید تا از تغییراتی که ممکن است در شرایط خدمات ایجاد کرده باشیم مطلع شوید.
        </p>
        <p>
            دسترسی به این وب سایت به صورت موقت مجاز است و ما این حق را برای خود محفوظ می داریم که خدمات را بدون اطلاع قبلی لغو یا اصلاح کنیم.
            اگر به هر دلیلی این وب سایت در هر زمان و یا برای هر دوره ای در دسترس نباشد، ما مسئولیتی نخواهیم داشت.
            گاهی اوقات، ممکن است دسترسی به برخی از بخش ها یا تمام این وب سایت را محدود کنیم.
        </p>
        <p>
            این وب سایت همچنین حاوی پیوندهایی به وب سایت های دیگر است که توسط پل استار اداره نمی شوند.
            لامبدا هیچ کنترلی بر سایت های لینک شده ندارد و هیچ مسئولیتی در قبال آن ها یا هر گونه ضرر یا آسیبی که ممکن است در اثر استفاده شما از آنها ایجاد شود، نمی پذیرد.
            استفاده شما از سایت های لینک شده تابع شرایط استفاده و خدمات مندرج در هر یک از این سایت ها خواهد بود.
        </p>
    </div>
    <h2>حریم خصوصی</h2>
    <hr>
    <div>
        <p>
            دسترسی و استفاده از این وب سایت و محصولات و خدمات قابل ارائه از طریق این وب سایت مشمول شرایط، شرایط و تذکرات زیر است.
            با استفاده از خدمات، شما با تمام شرایط خدمات موافقت می کنید، همانطور که ممکن است هر از گاهی توسط ما به روز شود.
            شما باید این صفحه را مرتباً بررسی کنید تا از تغییراتی که ممکن است در شرایط خدمات ایجاد کرده باشیم مطلع شوید.
        </p>
        <p>
            دسترسی به این وب سایت به صورت موقت مجاز است و ما این حق را برای خود محفوظ می داریم که خدمات را بدون اطلاع قبلی لغو یا اصلاح کنیم.
            اگر به هر دلیلی این وب سایت در هر زمان و یا برای هر دوره ای در دسترس نباشد، ما مسئولیتی نخواهیم داشت.
            گاهی اوقات، ممکن است دسترسی به برخی از بخش ها یا تمام این وب سایت را محدود کنیم.
        </p>
        <p>
            این وب سایت همچنین حاوی پیوندهایی به وب سایت های دیگر است که توسط پل استار اداره نمی شوند.
            لامبدا هیچ کنترلی بر سایت های لینک شده ندارد و هیچ مسئولیتی در قبال آن ها یا هر گونه ضرر یا آسیبی که ممکن است در اثر استفاده شما از آنها ایجاد شود، نمی پذیرد.
            استفاده شما از سایت های لینک شده تابع شرایط استفاده و خدمات مندرج در هر یک از این سایت ها خواهد بود.
        </p>
    </div>
    <h2>ثبت نام</h2>
    <hr>
    <div>
        <p>
            دسترسی و استفاده از این وب سایت و محصولات و خدمات قابل ارائه از طریق این وب سایت مشمول شرایط، شرایط و تذکرات زیر است.
            با استفاده از خدمات، شما با تمام شرایط خدمات موافقت می کنید، همانطور که ممکن است هر از گاهی توسط ما به روز شود.
            شما باید این صفحه را مرتباً بررسی کنید تا از تغییراتی که ممکن است در شرایط خدمات ایجاد کرده باشیم مطلع شوید.
        </p>
        <p>
            دسترسی به این وب سایت به صورت موقت مجاز است و ما این حق را برای خود محفوظ می داریم که خدمات را بدون اطلاع قبلی لغو یا اصلاح کنیم.
            اگر به هر دلیلی این وب سایت در هر زمان و یا برای هر دوره ای در دسترس نباشد، ما مسئولیتی نخواهیم داشت.
            گاهی اوقات، ممکن است دسترسی به برخی از بخش ها یا تمام این وب سایت را محدود کنیم.
        </p>
        <p>
            این وب سایت همچنین حاوی پیوندهایی به وب سایت های دیگر است که توسط پل استار اداره نمی شوند.
            لامبدا هیچ کنترلی بر سایت های لینک شده ندارد و هیچ مسئولیتی در قبال آن ها یا هر گونه ضرر یا آسیبی که ممکن است در اثر استفاده شما از آنها ایجاد شود، نمی پذیرد.
            استفاده شما از سایت های لینک شده تابع شرایط استفاده و خدمات مندرج در هر یک از این سایت ها خواهد بود.
        </p>
    </div>
</div>
@endsection

@section('js')

@endsection
```
- ### Create public function tac in PublicController
```bash
public function tac() {
   return view('public.tac');
}
```
- ### Create get method route for tac in routes/web.php
```bash
Route::get('tac',[PublicController::class, 'tac'])->name('tac');
```
