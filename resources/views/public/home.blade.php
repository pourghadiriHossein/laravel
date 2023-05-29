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
        @foreach ($lestProducts as $product)
        <div class="imageBox">
            @if ($product->discount_id)
            <span class="discount"></span>
            @endif
            <a href=""><img src="{{ asset($product->productImages[0]->path) }}" alt="bag1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset($product->productImages[1]->path) }}" alt="bag1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>{{ $product->label }}</p></a>
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
    <div class="partition">
        <h1>آخرین محصولات مردانه</h1>
        <hr>
    </div>
    <div class="menProduct">
        @foreach ($menProducts as $product)
        <div class="imageBox">
            @if ($product->discount_id)
            <span class="discount"></span>
            @endif
            <a href=""><img src="{{ asset($product->productImages[0]->path) }}" alt="bag1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset($product->productImages[1]->path) }}" alt="bag1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>{{ $product->label }}</p></a>
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
    <div class="partition">
        <h1>آخرین محصولات زنانه</h1>
        <hr>
    </div>
    <div class="womenProduct">
        @foreach ($womenProducts as $product)
        <div class="imageBox">
            @if ($product->discount_id)
            <span class="discount"></span>
            @endif
            <a href=""><img src="{{ asset($product->productImages[0]->path) }}" alt="bag1"></a>
            <div class="secondImageBox">
                <a href=""><img src="{{ asset($product->productImages[1]->path) }}" alt="bag1"></a>
                <a href=""><div>جزئیات</div></a>
            </div>
            <div class="productName">
                <a href=""><p>{{ $product->label }}</p></a>
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

@endsection
