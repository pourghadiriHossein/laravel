# CRUD Mechanism For Categories In laravel

## Create CategoryAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class CategoryAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Create DiscountAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class DiscountAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add two query in CategoryAction
- ### get all categories query
```bash
public static function getAllCategories(){
    $categories = Category::all();
    return $categories;
}
```
- ### get category query
```bash
public static function getCategory($category_id){
    $category = Category::find($category_id);
    return $category;
}
```
## Add one query in DiscountAction
- ### get all discounts
```bash
public static function getAllDiscounts(){
    $discounts = Discount::all();
    return $discounts;
}
```

## in PrivateController, Update visitCategory function
```bash
public function visitCategory() {
    $categories = CategoryAction::getAllCategories();
    return view('private.category.visitCategory', compact('categories'));
}
```
## Update tbody tag  in visitCategory.blade.php File
```bash
@foreach ($categories as $category)
<tr>
    <td>{{ $category->id }}</td>
    <td>
        @if (!$category->parent_id)
            دسته اصلی
        @else
            {{ $category->parent->label }}
        @endif
    </td>
    <td>{{ $category->label }}</td>
    <td>
        @if ($category->discount_id)
            {{ $category->discount->label }}
        @else
            تخفیف ندارد
        @endif
    </td>
    <td>
        @if ($category->status)
        <p class="label label-success" style="width: 250px">فعال</p>
        @else
        <p class="label label-danger" style="width: 250px">غیر فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-warning" href="{{ route('updateCategory',$category->id) }}">ویرایش</a>
        <a class="label label-info" href="{{ route('addParentCategory',$category->id) }}">افزودن +</a>
    </td>
</tr>
@endforeach
```
## in PrivateController, Update addCategory function
```bash
public function addCategory() {
    $discounts = DiscountAction::getAllDiscounts();
    return view('private.category.addCategory', compact('discounts'));
}
```
## Update form tag in addCategory.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postAddCategory') }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <legend></legend>
        <div class="form-group">
            <label class="col-lg-2 control-label">نام دسته</label>
            <div class="col-lg-10">
                <input type="text" name="label" class="form-control" placeholder="نام دسته">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">نوع تخفیف</label>
            <div class="col-lg-10">
                <select name="discount_id" class="form-control" style="height: 40px">
                    <option value="">بدون تخفیف</option>
                    @foreach ($discounts as $discount)
                    <option value="{{$discount->id}}">{{$discount->label}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت دسته</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" selected>غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
            </div>
        </div>

    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in CategoryAction, Write addCategory static function
```bash
public static function addCategory($request)
{
    $newCategory = new Category();
    $newCategory->label = $request->input('label');
    $newCategory->parent_id = null;
    $newCategory->discount_id = $request->input('discount_id');
    $newCategory->status = $request->input('status');
    $newCategory->save();
    return back();
}
```

## in PrivateController, Update postAddCategory function
```bash
public function postAddCategory(Request $request) {
    CategoryAction::addCategory($request);
    return redirect()->route('visitCategory');
}
```
## in PrivateController, Update addParentCategory function
```bash
public function addParentCategory($parent_id) {
    $parent = CategoryAction::getCategory($parent_id);
    $discounts = DiscountAction::getAllDiscounts();
    return view('private.category.addParentCategory', compact('parent', 'discounts'));
}
```
## Update form tag in addParentCategory.blade.php File  
```bash
<form class="form-horizontal" action="{{ route('postAddParentCategory', $parent->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام دسته والد</label>
            <div class="col-lg-10">
                <input disabled type="text" name="firstName" class="form-control" placeholder="والد" value="{{ $parent->label }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">کد تخفیف</label>
            <div class="col-lg-10">
                <select name="discount_id" class="form-control" style="height: 40px">
                    <option value="">بدون تخفیف</option>
                    @foreach ($discounts as $discount)
                    <option value="{{$discount->id}}">{{$discount->label}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">نام دسته</label>
            <div class="col-lg-10">
                <input type="text" name="label" class="form-control" placeholder="نام دسته">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت دسته</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" selected>غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
            </div>
        </div>

    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in CategoryAction, Write addParentCategory static function
```bash
public static function addParentCategory($request, $parent_id)
{
    $newCategory = new Category();
    $newCategory->label = $request->input('label');
    $newCategory->parent_id = $parent_id;
    $newCategory->discount_id = $request->input('discount_id');
    $newCategory->status = $request->input('status');
    $newCategory->save();
    return back();
}
```

## in PrivateController, Update postAddParentCategory function
```bash
public function postAddParentCategory(Request $request, $parent_id) {
    CategoryAction::addParentCategory($request, $parent_id);
    return redirect(route('visitCategory'));
}
```
## in PrivateController, Update updateCategory function
```bash
public function updateCategory($category_id) {
    $myCategory = CategoryAction::getCategory($category_id);
    $discounts = DiscountAction::getAllDiscounts();
    $categories = CategoryAction::getAllCategories();
    return view('private.category.updateCategory', compact('myCategory', 'discounts', 'categories'));
}
```
## Update form tag in updateCategory.blade.php File  
```bash
<form class="form-horizontal" action="{{ route('postUpdateCategory', $myCategory->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام دسته والد</label>
            <div class="col-lg-10">
                <select name="parent_id" class="form-control" style="height: 40px">
                    <option value="">دسته اصلی</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($myCategory->parent_id == $category->id) selected @endif>
                        {{$category->label}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">کد تخفیف</label>
            <div class="col-lg-10">
                <select name="discount_id" class="form-control" style="height: 40px">
                    <option value="">بدون تخفیف</option>
                    @foreach ($discounts as $discount)
                    <option value="{{$discount->id}}"
                        @if ($discount->id == $myCategory->discount_id) selected @endif
                        >{{$discount->label}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">نام دسته</label>
            <div class="col-lg-10">
                <input value="{{$myCategory->label}}" type="text" name="label" class="form-control" placeholder="نام دسته">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت دسته</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if ($myCategory->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if ($myCategory->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>

    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in CategoryAction, Write updateCategory static function
```bash
public static function updateCategory($request, $category_id)
{
    $updateCategory = self::getCategory($category_id);
    $updateCategory->label = $request->input('label');
    $updateCategory->parent_id = $request->input('parent_id');
    $updateCategory->discount_id = $request->input('discount_id');
    $updateCategory->status = $request->input('status');
    $updateCategory->save();
    return back();
}
```

## in PrivateController, Update postUpdateCategory function
```bash
public function postUpdateCategory(Request $request, $category_id) {
    CategoryAction::updateCategory($request, $category_id);
    return redirect(route('visitCategory'));
}
```


