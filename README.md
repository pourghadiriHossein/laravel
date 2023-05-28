# Update Home Page

## Add One Query to CategoryAction
```bash
public static function getAllCategoriesIDWithNode($category_id){
    $categories = Category::where('id',$category_id)->with(['subCategories'])->get();
    $IDs = [];
    foreach ($categories as $category){
        $IDs[] = $category->id;
        foreach ($category->subCategories as $subCategory){
            $IDs[] = $subCategory->id;
        }
    }
    return $IDs;
}
```

## Add Two Query to ProductAction
```bash
public static function getAtLeastProducts($count){
    $products = Product::orderBy('id','desc')->take($count)->get();
    $products->load('productImages');
    return $products;
}
```
```bash
public static function getProductWithSelectedCategory($category_id, $count){
    $IDs = CategoryAction::getAllCategoriesIDWithNode($category_id);
    $products = Product::whereIn('category_id',$IDs)->take($count)->orderBy('id','desc')->get();
    $products->load('productImages');
    return $products;
}
```
## in PublicController, Update home function
```bash
public function home() {
    $atLeastProducts = ProductAction::getAtLeastProducts(4);
    $menProducts = ProductAction::getProductWithSelectedCategory(1,6);
    $womenProducts = ProductAction::getProductWithSelectedCategory(2,6);
    return view('public.home' , compact('atLeastProducts','menProducts','womenProducts'));
}
```

## Update home.blade.php File
- ### Update last Product
```bash
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
        <span><a href="">{{ $tag->label }}</a></span>,
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
        <span><a href="">{{ $tag->label }}</a></span>,
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
        <span><a href="">{{ $tag->label }}</a></span>,
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


