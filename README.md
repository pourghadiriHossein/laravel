# Complate Show Single Product and Use in Application

## Update Single Product Route in web.php File
```bash
Route::get('singleProduct/{product_id}',[PublicController::class, 'singleProduct'])->name('singleProduct');
```

## in PublicController, Update singleProduct function
```bash
public function singleProduct($product_id) {
    $product = ProductAction::getProduct($product_id);
    $lestProducts = ProductAction::getLastProducts(3);
    return view('public.singleProduct', compact('product','lestProducts'));
}
```

## Update singleProduct.blade.php File
- ### Update productRoute
```bash
<div class="productRoute">
    <ul>
        <li><a href="">خانه</a></li>/
        @if ($product->category->parent_id != null)
        <li><a href="{{ route('filterProductByCategory', $product->category->parent_id) }}">{{ $product->category->parent->label }}</a></li>/
        @endif
        <li><a href="{{ route('filterProductByCategory', $product->category->id) }}">{{ $product->category->label }}</a></li>/
    </ul>
</div>
```
- ### Update productDescription
```bash
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
```
- ### Update productDetail
```bash
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
```
- ### Update verticalPart
```bash
<div class="verticalPart">
    <div class="productImage">
        <img id="show" src="{{ asset($product->productImages[0]->path) }}" alt="dress1">
    </div>
    <div class="allImage">
        <img onclick="selectFirstImage()" id="first" src="{{ asset($product->productImages[0]->path) }}" alt="dress1">
        <img onclick="selectSecondImage()" id="second" src="{{ asset($product->productImages[1]->path) }}" alt="dress1">
    </div>
</div>
```
- ### Update horizontalPart
```bash
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
        <div class="user">
            <p>{{ $comment->user->name }}</p>
        </div>
        <div class="userComment">
            <p>{{ $comment->description }}</p>
        </div>
        @endforeach
        <hr>
        <div class="newComment">
            <form action="">
                <textarea name="comment" placeholder="نظر خود را بنویسید ..."></textarea>
                <input type="submit" value="ثبت نظر">
            </form>
        </div>
    </div>
</div>
```
- ### Update relatedProduct
```bash
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
```

## Update publicLayout.blade.php File
- ### Update cart in Menu
```bash
<div class="dropdown-content">
    <a class="btn" href="{{ route('cart') }}">فاکتور کن</a>
    <a class="linkMenu" href="{{ route('singleProduct',1) }}">
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
    <a class="linkMenu" href="{{ route('singleProduct',2) }}">
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
    <a class="linkMenu" href="{{ route('singleProduct',3) }}">
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
```

## Update product.blade.php File
- ### Update Newest Men Products
```bash
@foreach ($newestMenProducts as $product)
<div class="smallShowProduct">
    <div class="smallImage">
        <a href="{{ route('singleProduct', $product->id) }}"><img src="{{ asset($product->productImages[0]->path) }}" alt="hoodie1"></a>
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
```
- ### Update Newest Women Products
```bash
@foreach ($newestWomenProducts as $product)
<div class="smallShowProduct">
    <div class="smallImage">
        <a href="{{ route('singleProduct', $product->id) }}"><img src="{{ asset($product->productImages[0]->path) }}" alt="hoodie1"></a>
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
```
- ### Update Show Product
```bash
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
    <a href="{{ route('singleProduct', $product->id) }}"><img src="{{ asset($product->productImages[0]->path) }}" alt="{{ $product->label }}"></a>
    <div class="secondImageBox">
        <a href="{{ route('singleProduct', $product->id) }}"><img src="{{ asset($product->productimages[1]->path) }}" alt="{{ $product->label }}"></a>
        <a href="{{ route('singleProduct', $product->id) }}"><div>جزئیات</div></a>
    </div>
    <div class="productName">
        <a href="{{ route('singleProduct', $product->id) }}"><p>{{ $product->label }}</p></a>
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
```
## Update home.blade.php File
- ### Update Last Product
```bash
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
```
- ### Update Men Product
```bash
@foreach ($menProducts as $product)
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
```
- ### Update Women Product
```bash
@foreach ($womenProducts as $product)
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
```
