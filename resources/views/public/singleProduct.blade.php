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
