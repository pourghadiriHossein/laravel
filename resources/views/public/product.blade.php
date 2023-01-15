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
