# CRUD Mechanism For Discount In laravel

## Add one query in DiscountAction
- ### get discount query
```bash
public static function getDiscount($discount_id){
    $discount = Discount::find($discount_id);
    return $discount;
}
```

## in PrivateController, Update visitDiscount function
```bash
public function visitDiscount() {
    $discounts = DiscountAction::getAllDiscounts();
    return view('private.discount.visitDiscount', compact('discounts'));
}
```
## Update tbody tag  in visitDiscount.blade.php File
```bash
@foreach ($discounts as $discount)
<tr>
    <td>{{ $discount->id }}</td>
    <td>{{ $discount->label }}</td>
    <td>
        @if ($discount->price)
            {{ $discount->price }} ريال
        @else
            فاقد تخفیف نقدی
        @endif
    </td>
    <td>
        @if ($discount->percent)
            {{ $discount->percent }} درصدی
        @else
            فاقد تخفیف درصدی
        @endif
    </td>
    <td>
        @if ($discount->gift_code)
            {{ $discount->gift_code }}
        @else
            فاقد توکن
        @endif
    </td>
    <td>
        @if ($discount->status == 0)
        <p class="label label-danger" style="width: 250px">غیر فعال</p>
        @else
        <p class="label label-success" style="width: 250px">فعال</p>
        @endif
    </td>
    <td>
        <a href="{{ route('updateDiscount',$discount) }}" class="label label-warning">ویرایش</a>
    </td>
</tr>
@endforeach
```
## Update form tag in addDiscount.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postAddDiscount') }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">عنوان تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ old('label') }}" type="text" name="label" class="form-control" placeholder="عنوان تخفیف">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">مبلغ تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ old('price') }}" type="text" name="price" class="form-control" placeholder="مبلغ تخفیف">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">درصد تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ old('percent') }}" type="text" name="percent" class="form-control" placeholder="درصد تخفیف">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">توکن تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ old('gift_code') }}" type="text" name="gift_code" class="form-control" placeholder="توکن تخفیف">
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
## in DiscountAction, Write addDiscount static function
```bash
public static function addDiscount($request)
{
    $newDiscount = new Discount();
    $newDiscount->label = $request->input('label');
    $newDiscount->price = $request->input('price');
    $newDiscount->percent = $request->input('percent');
    $newDiscount->gift_code = $request->input('gift_code');
    $newDiscount->status = $request->input('status');
    $newDiscount->save();
    return back();
}
```
## Create AddDiscountRequest
- ### Command
```bash
php artisan make:request AddDiscountRequest
```
- ### Update AddDiscountRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    if($this->input('price') and $this->input('percent') and $this->input('gift_code')){
        return [
            'label' => 'required|min:3|max:100',
            'price' => 'numeric',
            'percent' => 'digits_between:0,100',
            'gift_code' => 'max:100',
            'status' => 'digits_between:0,1',
        ];
    }
    else {
        return [
            'label' => 'required|min:3|max:100',
            'percent' => 'digits_between:0,100',
            'gift_code' => 'max:100',
            'status' => 'digits_between:0,1',
        ];
    }
}
```

## in PrivateController, Update postAddDiscount function
```bash
public function postAddDiscount(AddDiscountRequest $request) {
    DiscountAction::addDiscount($request);
    return redirect(route('visitDiscount'));
}
```
## in PrivateController, Update updateDiscount function
```bash
public function updateDiscount(Discount $discount) {
    return view('private.discount.updateDiscount', compact('discount'));
}
```
## Update form tag in updateDiscount.blade.php File  
```bash
<form class="form-horizontal" action="{{ route('postUpdateDiscount',$discount->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">عنوان تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ $discount->label }}" type="text" name="label" class="form-control" placeholder="عنوان تخفیف">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">مبلغ تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ $discount->price }}" type="text" name="price" class="form-control" placeholder="مبلغ تخفیف">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">درصد تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ $discount->percent }}" type="text" name="percent" class="form-control" placeholder="درصد تخفیف">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">توکن تخفیف</label>
            <div class="col-lg-10">
                <input value="{{ $discount->gift_code }}" class="form-control" type="text" name="gift_code" class="form-control" placeholder="توکن تخفیف">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت دسته</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if ($discount->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if ($discount->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in DiscountAction, Write updateDiscount static function
```bash
public static function updateDiscount($request, $discount_id)
{
    $updateDiscount = self::getDiscount($discount_id);
    $updateDiscount->label = $request->input('label');
    $updateDiscount->price = $request->input('price');
    $updateDiscount->percent = $request->input('percent');
    $updateDiscount->gift_code = $request->input('gift_code');
    $updateDiscount->status = $request->input('status');
    $updateDiscount->save();
    return back();
}
```
## Create UpdateDiscountRequest
- ### Command
```bash
php artisan make:request UpdateDiscountRequest
```
- ### Update UpdateDiscountRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    if($this->input('price') and $this->input('percent') and $this->input('gift_code')){
        return [
            'label' => 'required|min:3|max:100',
            'price' => 'numeric',
            'percent' => 'digits_between:0,100',
            'gift_code' => 'max:100',
            'status' => 'digits_between:0,1',
        ];
    }
    else {
        return [
            'label' => 'required|min:3|max:100',
            'percent' => 'digits_between:0,100',
            'gift_code' => 'max:100',
            'status' => 'digits_between:0,1',
        ];
    }
}
```
## in PrivateController, Update postUpdateDiscount function
```bash
public function postUpdateDiscount(UpdateDiscountRequest $request, $discount_id){
    DiscountAction::updateDiscount($request, $discount_id);
    return redirect(route('visitDiscount'));
}
```


