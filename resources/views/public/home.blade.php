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
