# CRUD Mechanism For Product In laravel

## Create ProductAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class ProductAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add three query in ProductAction
- ### get all products query
```bash
public static function getAllProducts(){
    $products = Product::all();
    $products->load('productImages');
    return $products;
}
```
- ### get product query
```bash
public static function getProduct($product_id){
    $product = Product::find($product_id);
    $product->load('productImages');
    return $product;
}
```
- ### get product image query
```bash
public static function getProductImage($image_id){
    $image = ProductImage::find($image_id);
    return $image;
}
```

## Add one query in TagAction
- ### get selected tag query
```bash
public static function getSelectedTag($product){
    $selectedTag = $product->tags->pluck('label')->toArray();
    return $selectedTag;
}
```

## in PrivateController, Update visitProduct function
```bash
public function visitProduct() {
    $products = ProductAction::getAllProducts();
    return view('private.product.visitProduct', compact('products'));
}
```
## Update tbody tag  in visitProduct.blade.php File
```bash
@foreach ($products as $product)
<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->label }}</td>
    <td>{{ $product->count }}</td>
    <td>
        @if ($product->discount_id)
            @if ($product->discount->price)
            {{ $product->discount->price }} ﷼
            @else
            {{ $product->discount->percent }} درصد
            @endif
        @else
        تخفیف ندارد
        @endif
    </td>
    <td>
        @if ($product->tags)
        <ol>
        @foreach ($product->tags as $tag)
            <li>{{ $tag->label }}</li>
        @endforeach
        </ol>
        @else
        تگ ندارد
        @endif
    </td>
    <td>{{ $product->category->label }}</td>
    <td>{{ $product->price }} ريال</td>
    <td>{{ $product->description }}</td>
    <td>
        @foreach ($product->productImages as $image)
        <a data-toggle="modal" href="#myModal{{$image->id}}">
            <img height="100" width="80" alt="{{ $product->label }}"
                src="{{ asset($image->path) }}">
        </a>
        <div class="modal fade" id="myModal{{$image->id}}" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;
                        </button>
                        <h4 class="modal-title">حذف عکس {{ $product->label }}</h4>
                    </div>
                    <div class="modal-body">
                        <img height="500" width="500" alt="hoodie1"
                            src="{{ asset($image->path) }}">
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-warning"
                                type="button">خیر
                        </button>
                        <a href="{{ route('deleteProductImage',$image->id) }}"
                        class="btn btn-danger" type="button">آری</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </td>
    <td>
        @if ($product->status == 0)
        <p class="label label-danger" style="width: 250px">غیر فعال</p>
        @else
        <p class="label label-success" style="width: 250px">فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-warning" href="{{ route('updateProduct',$product) }}">ویرایش</a>
    </td>
</tr>
@endforeach
```
## in PrivateController, Update addProduct function
```bash
public function addProduct() {
    $discounts = DiscountAction::getAllDiscounts();
    $categories = CategoryAction::getAllCategories();
    $tags = TagAction::getAllTags();
    return view('private.product.addProduct', compact('discounts','categories','tags'));
}
```
## Update form tag in addProduct.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postAddProduct') }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
    <div class="form-group">
        <label class="col-lg-2 control-label">عنوان محصول</label>
        <div class="col-lg-10">
            <input value="{{ old('label') }}" type="text" name="label" class="form-control" placeholder="عنوان محصول">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">مبلغ محصول</label>
        <div class="col-lg-10">
            <input value="{{ old('price') }}" type="text" name="price" class="form-control" placeholder="مبلغ محصول">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">تعدا موجودی محصول</label>
        <div class="col-lg-10">
            <input value="{{ old('count') }}" type="text" name="count" class="form-control" placeholder="تعداد موجودی محصول">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">شرح محصول</label>
        <div class="col-lg-10">
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">وضعیت محصول</label>
        <div class="col-lg-10">
            <select name="status" class="form-control" style="height: 40px">
                <option value="0" selected>غیر فعال</option>
                <option value="1">فعال</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">وضعیت تخفیف</label>
        <div class="col-lg-10">
            <select name="discount_id" class="form-control" style="height: 40px">
                <option value="">تخفیف ندارد</option>
                @foreach ($discounts as $discount)
                <option value="{{ $discount->id }}">{{ $discount->label }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">وضعیت دسته بندی</label>
        <div class="col-lg-10">
            <select name="category_id" class="form-control" style="height: 40px">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->label }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">تگ ها</label>
        <div class="col-lg-10">
            <label class="access_lvl">
                @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->label }} <br>
                @endforeach
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">تصاویر</label>
        <div class="col-lg-10">
            <input type="file" id="images" name="images[]" multiple>
        </div>
    </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in ProductAction, Write imagePath static function
```bash
public static function imagePath(){
    return 'public/images';
}
```
## in ProductAction, Write addProduct static function
```bash
public static function addProduct($request){
    $newProduct = new Product();
    $newProduct->discount_id = $request->input('discount_id');
    $newProduct->category_id = $request->input('category_id');
    $newProduct->label = $request->input('label');
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->count = $request->input('count');
    $newProduct->status = $request->input('status');
    $newProduct->save();
    $newProduct->tags()->sync($request->input('tags'));
    $paths = [];
    foreach ($request->file('images') as $image)
    {
        $paths[] = $image->storePubliclyAs(self::imagePath(),'image'.time().rand(1,10000).'.'.$image->extension());
    }
    foreach ($paths as $path)
    {
        $newProductImage = new ProductImage();
        $newProductImage->product_id = $newProduct->id;
        $newProductImage->path = str_replace('public', 'storage', $path);
        $newProductImage->save();
    }
}
```
## Create AddProductRequest
- ### Command
```bash
php artisan make:request AddProductRequest
```
- ### Update AddProductRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    return [
        'label' => 'required|min:3|max:100',
        'price' => 'numeric',
        'count' => 'digits_between:0,500',
        'description' => 'required|min:3|max:10000',
        'status' => 'digits_between:0,1',
        'category_id' => 'numeric',
        'tags' => 'required|array',
        'tags.*' => 'numeric',
        'images' => 'required|array',
        'images.*' => 'image',
    ];
}
```

## in PrivateController, Update postAddProduct function
```bash
public function postAddProduct(AddProductRequest $request) {
    ProductAction::addProduct($request);
    return redirect(route('visitProduct'));
}
```
## in PrivateController, Update updateProduct function
```bash
public function updateProduct(Product $product) {
    $discounts = DiscountAction::getAllDiscounts();
    $categories = CategoryAction::getAllCategories();
    $tags = TagAction::getAllTags();
    $selectedTag = TagAction::getSelectedTag($product);
    return view('private.product.updateProduct',compact('product', 'discounts','categories','tags','selectedTag'));
}
```
## Update form tag in updateProduct.blade.php File  
```bash
<form class="form-horizontal" action="{{ route('postUpdateProduct',$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">عنوان محصول</label>
            <div class="col-lg-10">
                <input value="{{ $product->label }}" type="text" name="label" class="form-control" placeholder="عنوان محصول">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">مبلغ محصول</label>
            <div class="col-lg-10">
                <input value="{{ $product->price }}" type="text" name="price" class="form-control" placeholder="مبلغ محصول">
            </div>
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">تعداد موجودی محصول</label>
        <div class="col-lg-10">
            <input value="{{ $product->count }}" type="text" name="count" class="form-control" placeholder="تعداد موجودی محصول">
        </div>
    </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">شرح محصول</label>
            <div class="col-lg-10">
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت محصول</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if($product->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if($product->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت تخفیف</label>
            <div class="col-lg-10">
                <select name="discount_id" class="form-control" style="height: 40px">
                    <option value="">تخفیف ندارد</option>
                    @foreach ($discounts as $discount)
                    <option value="{{ $discount->id }}" @if ($discount->id == $product->discount_id)
                    selected @endif>{{ $discount->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت دسته بندی</label>
            <div class="col-lg-10">
                <select name="category_id" class="form-control" style="height: 40px">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                    selected
                @endif>{{ $category->label }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">تگ ها</label>
            <div class="col-lg-10">
                <label class="access_lvl">
                    @foreach ($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    @if(in_array($tag->label,$selectedTag)) checked @endif> {{ $tag->label }} <br>
                    @endforeach
                </label>
                <br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">افزورن تصویر</label>
            <div class="col-lg-10">
                <input type="file" id="images" name="images[]" multiple>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in ProductAction, Write updateProduct static function
```bash
public static function updateProduct($request, $product_id){
    $updateProduct = self::getProduct($product_id);
    $updateProduct->discount_id = $request->input('discount_id');
    $updateProduct->category_id = $request->input('category_id');
    $updateProduct->label = $request->input('label');
    $updateProduct->description = $request->input('description');
    $updateProduct->price = $request->input('price');
    $updateProduct->count = $request->input('count');
    $updateProduct->status = $request->input('status');
    $updateProduct->save();
    $updateProduct->tags()->sync($request->input('tags'));
    if ($request->hasFile('images'))
    {
        $paths = [];
        foreach ($request->file('images') as $image)
        {
            $paths[] = $image->storePubliclyAs(self::imagePath(),'image'.time().rand(1,10000).'.'.$image->extension());
        }
        foreach ($paths as $path)
        {
            $newProductImage = new ProductImage();
            $newProductImage->product_id = $updateProduct->id;
            $newProductImage->path = str_replace('public', 'storage', $path);
            $newProductImage->save();
        }
    }
}
```
## Create UpdateProductRequest
- ### Command
```bash
php artisan make:request UpdateProductRequest
```
- ### Update UpdateProductRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    if ($this->file('images')){
        return [
            'label' => 'required|min:3|max:100',
            'price' => 'numeric',
            'count' => 'digits_between:0,500',
            'description' => 'required|min:3|max:10000',
            'status' => 'digits_between:0,1',
            'category_id' => 'numeric',
            'tags' => 'required|array',
            'tags.*' => 'numeric',
            'images' => 'required|array',
            'images.*' => 'image',
        ];
    }else{
        return [
            'label' => 'required|min:3|max:100',
            'price' => 'numeric',
            'count' => 'digits_between:0,500',
            'description' => 'required|min:3|max:10000',
            'status' => 'digits_between:0,1',
            'category_id' => 'numeric',
            'tags' => 'required|array',
            'tags.*' => 'numeric',
        ];
    }
}
```
## in PrivateController, Update postUpdateProduct function
```bash
public function postUpdateProduct(UpdateProductRequest $request, $product_id) {
    ProductAction::updateProduct($request, $product_id);
    return redirect(route('visitProduct'));
}
```
## in PrivateController, Update deleteProductImage function
```bash
public function deleteProductImage($image_id) {
    ProductAction::deleteProductImage($image_id);
    return redirect(route('visitProduct'));
}
```

