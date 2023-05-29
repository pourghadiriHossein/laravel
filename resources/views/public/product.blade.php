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
                @if ($tag)
                <li><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label}}</a></li>/
                @else
                    @if (!$categories)
                    <li><a href="{{ route('product') }}">تمام محصولات</a></li>
                    @else
                        @foreach ($categories as $category)
                            @if ($category->parent_id != null)
                            <li><a href="{{ route('filterProductByCategory', $category->parent_id) }}">{{ $category->parent->label }}</a></li>/
                            @endif
                            <li><a href="{{ route('filterProductByCategory', $category->id) }}">{{ $category->label }}</a></li>/
                        @endforeach
                    @endif
                @endif
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
                @foreach ($newestMenProducts as $product)
                <div class="smallShowProduct">
                    <div class="smallImage">
                        <a href=""><img src="{{ asset($product->productImages[0]->path) }}" alt="hoodie1"></a>
                    </div>
                    <div class="smallDetail">
                        <a href=""><p>{{$product->label}}</p></a>
                        @if ($product->discount_id)
                        <del>{{ $product->price }} ريال</del>
                            @if ($product->discount->price)
                            <ins>{{ $product->price - $product->discount->price }} ريال</ins>
                            @else
                            <ins>{{ $product->price - ($product->price * $product->discount->percent/100) }} ريال</ins>
                            @endif
                        @else
                        <ins>{{ $product->price }} ريال</ins>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="latestWomenProduct">
                <h1>آخرین محصولات زنانه</h1>
                @foreach ($newestWomenProducts as $product)
                <div class="smallShowProduct">
                    <div class="smallImage">
                        <a href=""><img src="{{ asset($product->productImages[0]->path) }}" alt="hoodie1"></a>
                    </div>
                    <div class="smallDetail">
                        <a href=""><p>{{$product->label}}</p></a>
                        @if ($product->discount_id)
                        <del>{{ $product->price }} ريال</del>
                            @if ($product->discount->price)
                            <ins>{{ $product->price - $product->discount->price }} ريال</ins>
                            @else
                            <ins>{{ $product->price - ($product->price * $product->discount->percent/100) }} ريال</ins>
                            @endif
                        @else
                        <ins>{{ $product->price }} ريال</ins>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="allTags">
                <h1>تگ ها</h1>
                @foreach (\App\Actions\TagAction::getAllTags() as $tag)
                <button><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label }}</a></button>
                @endforeach
            </div>
        </div>
        <div id="productBox" class="showProduct">
            @foreach ($products as $product)
            <div id="{{ $product->id }}" data-price="@if ($product->discount_id)
                    @if ($product->discount->price)
                            {{ $product->price - $product->discount->price }}
                        @else
                            {{ $product->price - ($product->price * $product->discount->percent/100) }}
                        @endif
                    @else
                    {{ $product->price }}
                    @endif" data-name="{{ $product->label }}" class="imageBox">
                @if ($product->dicsount_id)
                <span class="discount"></span>
                @endif
                <a href=""><img src="{{ asset($product->productImages[0]->path) }}" alt="{{ $product->label }}"></a>
                <div class="secondImageBox">
                    <a href=""><img src="{{ asset($product->productimages[1]->path) }}" alt="{{ $product->label }}"></a>
                    <a href=""><div>جزئیات</div></a>
                </div>
                <div class="productName">
                    <a href=""><p>{{ $product->label }}</p></a>
                    <a href=""><img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
                </div>
                <div class="tag">
                    @foreach ($product->tags as $tag)
                    <span><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label }}</a></span>,
                    @endforeach
                </div>
                <div class="price">
                    @if ($product->discount_id)
                    <del>{{ $product->price }} ريال</del>
                        @if ($product->discount->price)
                        <ins id="{{ $product->price - $product->discount->price }}">
                            {{ $product->price - $product->discount->price }} ريال</ins>
                        @else
                        <ins id="{{ $product->price - ($product->price * $product->discount->percent/100) }}">
                            {{ $product->price - ($product->price * $product->discount->percent/100) }} ريال</ins>
                        @endif
                    @else
                    <ins id="{{ $product->price }}">{{ $product->price }} ريال</ins>
                    @endif
                </div>
            </div>
            @endforeach
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
