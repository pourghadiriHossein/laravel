# Active Filter for Product by Category or Tag 

## Add One Query to CategoryAction
```bash
public static function getAllCategoriesWithNode($category_id){
    $categories = Category::where('id',$category_id)->with(['subCategories'])->get();
    return $categories;
}
```

## Add One Query to ProductAction
```bash
public static function getAllProductsWithTagID($tag_id)
{
    $query = DB::table('product_tag')->where('tag_id',$tag_id)->get();
    $IDs = [];
    foreach($query as $object)
    {
        $IDs [] = $object->product_id;
    }
    $allProducts = Product::whereIn('id',$IDs)->get();
    $allProducts->load('productImages');
    return $allProducts;
}
```

## Write two Route for Product filter and Category
```bash
Route::get('product/category/{category_id}',[PublicController::class, 'filterProductByCategory'])->name('filterProductByCategory');
Route::get('product/tag/{tag_id}',[PublicController::class, 'filterProductByTag'])->name('filterProductByTag');
```

## in PublicController, Update product function
```bash
public function product() {
    $tag = null;
    $categories = null;
    $products = ProductAction::getAllProducts();
    $newestMenProducts = ProductAction::getProductWithSelectedCategory(1,3);
    $newestWomenProducts = ProductAction::getProductWithSelectedCategory(2,3);
    return view('public.product',compact('tag','categories','products','newestMenProducts','newestWomenProducts'));
}
```
## in PublicController, Update filterProductByCategory function
```bash
public function filterProductByCategory($category_id) {
    $tag = null;
    $checkCategory = CategoryAction::getCategory($category_id);
    if (!$checkCategory) {
        return redirect(route('product'));
    }else
    {
        $categories = CategoryAction::getAllCategoriesWithNode($category_id);
        $products = ProductAction::getProductWithSelectedCategory($category_id,null);
        $newestMenProducts = ProductAction::getProductWithSelectedCategory(1,3);
        $newestWomenProducts = ProductAction::getProductWithSelectedCategory(2,3);
        return view('public.product',compact('tag','categories','products','newestMenProducts','newestWomenProducts'));
    }
}
```
## in PublicController, Update filterProductByTag function
```bash
public function filterProductByTag($tag_id) {
    $tag = TagAction::getTag($tag_id);
    if ($tag)
    {
        $categories = null;
        $products = ProductAction::getAllProductsWithTagID($tag_id);
        $newestMenProducts = ProductAction::getProductWithSelectedCategory(1,3);
        $newestWomenProducts = ProductAction::getProductWithSelectedCategory(2,3);
        return view('public.product',compact('tag','categories','products','newestMenProducts','newestWomenProducts'));
    }else
        return redirect(route('home'));
}
```

## Update product.blade.php File
- ### Update horizontalPart
```bash
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
```
- ### Update contectBox
```bash
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
```

## Update publicLayout.blade.php File
- ### Update Product in Menu
```bash
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
```
- ### Update Tag in Footer
```bash
@foreach (\App\Actions\TagAction::getAllTags() as $tag)
<button class="footerBTN"><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label }}</a></button>
@endforeach
```
## Update home.blade.php File
- ### Update tag part in last Product and Men Product and Women Product
```bash
@foreach ($product->tags as $tag)
<span><a href="{{ route('filterProductByTag', $tag->id) }}">{{ $tag->label }}</a></span>,
@endforeach
```

