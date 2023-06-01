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
                @if ($product->category->parent_id != null)
                <li><a href="{{ route('filterProductByCategory', $product->category->parent_id) }}">{{ $product->category->parent->label }}</a></li>/
                @endif
                <li><a href="{{ route('filterProductByCategory', $product->category->id) }}">{{ $product->category->label }}</a></li>/
            </ul>
        </div>
        <div class="productDescription">
            <h1>{{ $product->label }}</h1>
            <h2>{{ $product->description }}</h2>
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
                <p><a href="{{ route('filterProductByCategory',$product->category->id) }}">{{ $product->category->label }}</a></p>
            </div>
            <div class="productTag">
                <span>تگ ها: </span>
                @foreach ($product->tags as $tag)
                <p><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label }}</a></p>،
                @endforeach
            </div>
        </div>
    </div>
    <div class="verticalPart">
        <div class="productImage">
            <img id="show" src="{{ asset($product->productImages[0]->path) }}" alt="dress1">
        </div>
        <div class="allImage">
            <img onclick="selectFirstImage()" id="first" src="{{ asset($product->productImages[0]->path) }}" alt="dress1">
            <img onclick="selectSecondImage()" id="second" src="{{ asset($product->productImages[1]->path) }}" alt="dress1">
        </div>
    </div>
    <div class="horizontalPart">
        <div class="tab">
            <button onclick="descriptionTab()">توضیحات</button>
            <button onclick="commentTab()">نظر ها ({{ count($product->comments) }})</button>
        </div>
        <div id="description" class="tabcontent">
            <p>{{ $product->label }}</p>
            <p>{{ $product->description }}</p>
        </div>
        <div id="comment" class="tabcontent">
            @foreach ($product->comments as $comment)
            @if ($comment->status == 1)
            <div class="user">
                <p>{{ $comment->user->name }}</p>
            </div>
            <div class="userComment">
                <p>{{ $comment->description }}</p>
            </div>
            @endif
            @endforeach
            @auth
            <hr>
            <div style="width: 79%">
                @include('include.showError')
                @include('include.validationError')
            </div>
            <div class="newComment">
                <form action="{{ route('postNewComment', $product) }}" method="post">
                    @csrf
                    <textarea name="comment" placeholder="نظر خود را بنویسید ..."></textarea>
                    <input type="submit" value="ثبت نظر">
                </form>
            </div>
            @endauth
        </div>
    </div>
    <div class="partition">
        <h1>آخرین محصولات</h1>
        <hr>
    </div>
    <div class="relatedProduct">
        @foreach ($lestProducts as $product)
        <div class="imageBox">
            @if ($product->discount_id)
            <span class="discount"></span>
            @endif
            <a href="{{ route('singleProduct', $product->id) }}"><img src="{{ asset($product->productImages[0]->path) }}" alt="bag1"></a>
            <div class="secondImageBox">
                <a href="{{ route('singleProduct', $product->id) }}"><img src="{{ asset($product->productImages[1]->path) }}" alt="bag1"></a>
                <a href="{{ route('singleProduct', $product->id) }}"><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href="{{ route('singleProduct', $product->id) }}"><p>{{ $product->label }}</p></a>
               <a href=""> <img src="{{ asset('public-side-files') }}/IMAGE/menu/ShopingCartLogo.png" alt="ShopingCartLogo"></a>
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
</div>
@endsection

@section('js')
<script src="{{ asset('public-side-files') }}/JS/SingleProduct.js"></script>
@endsection
