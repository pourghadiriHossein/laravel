# Complete Session In Project

## Add one Function to SessionAction
```bash
<?php

namespace App\Actions;

class SessionAction {

}
```
## Add 11 Function to SessionAction
```bash
public static function addProduct($productID,$quantity)
{
    if (Session::has('basket'))
    {
        $previousProduct = Session::get('basket');
        $product = Product::with('productImages')->find($productID);
        if (!$product)
            return null;
        $newProduct = $previousProduct;
        if (empty($newProduct[$productID])) //if previous product is empty, create new product
            $newProduct [$productID] = [$product,($quantity)];
        else //if previous product not empty, update the current product
        {
            if ($newProduct[$productID][1] == 1 and $quantity == -1)
            {
                self::remove($productID);
                return back();
            }
            $newProduct [$productID] = [$previousProduct[$productID][0],(($previousProduct[$productID][1])+$quantity)];
        }
        Session::put('basket',$newProduct);
    }
    else
    {
        $product = Product::with('productImages')->find($productID);
        if (!$product)
            return null;
        $newProduct = [];
        $newProduct [$productID] = [$product,$quantity];
        Session::put('basket',$newProduct);
    }
}
```
```bash
public static function remove($productID)
{
    if (Session::has('basket'))
    {
        $currentProduct = Session::get('basket');
        if (!empty($currentProduct[$productID]))
            unset($currentProduct[$productID]);
        Session::put('basket',$currentProduct);
        if (empty($currentProduct)) {
            self::cleanTokenDiscount();
        }
    }
}
```
```bash
public static function clean()
{
    Session::forget('basket');
}
```
```bash
public static function getBasket()
{
    return Session::get('basket');
}
```
```bash
public static function calculateCart()
{
    $totalPrice = 0;
    $baskets = Session::get('basket');
    if (!empty($baskets))
    {
        foreach($baskets as $basket)
        {
            if ($basket[0]->discount_id)
            {
                $price = self::calculateDiscount($basket[0]->price,$basket[0]->discount->price,$basket[0]->discount->percent);
                $totalPrice = $totalPrice + ($price * $basket[1]);
            }else
                $totalPrice = $totalPrice + ($basket[0]->price * $basket[1]);
        }
        return $totalPrice;
    }else
        return 0;
}
```
```bash
private static function calculateDiscount($price,$discountPrice,$discountPercent){
    if ($discountPrice != null)
        return ($price-$discountPrice);
    elseif($discountPercent != null)
        return ($price-($price*($discountPercent/100)));
}
```
```bash
public static function addTokenDiscount($discountToken)
{
    if (Session::has('discount'))
    {
        $previousDiscount = Session::get('discount');
        $discount = Discount::where('gift_code', $discountToken)->first();
        if (!$discount)
            return null;
        $newDiscount = $previousDiscount;
        if (empty($newDiscount[$discountToken])) //if previous product is empty, create new product
            $newDiscount [$discountToken] = $discount;
        else
        {
            self::removeTokenDiscount($discountToken);
            return back();
        }
        Session::put('discount',$newDiscount);
    }
    else
    {
        $discount = Discount::where('gift_code', $discountToken)->first();
        if (!$discount)
            return null;
        $newDiscount = [];
        $newDiscount [$discountToken] = $discount;
        Session::put('discount',$newDiscount);
    }
}
```
```bash
public static function removeTokenDiscount($discountToken)
{
    if (Session::has('discount'))
    {
        $currentDiscount = Session::get('discount');
        if (!empty($currentDiscount[$discountToken]))
            unset($currentDiscount[$discountToken]);
        Session::put('discount',$currentDiscount);
    }
}
```
```bash
public static function cleanTokenDiscount()
{
    Session::forget('discount');
}
```
```bash
public static function getTokenDiscount()
{
    return Session::get('discount');
}
```
```bash
public static function calculateDiscountSession()
{
    $totalDiscount = 0;
    $discounts = Session::get('discount');
    if (!empty($discounts))
    {
        foreach ($discounts as $discount)
            $totalDiscount = $totalDiscount + $discount->price;
    }
    return $totalDiscount;
}
```

## Add a Route in web.php File for session process
```bash
Route::get('/session/{product_id}/{quantity}/{session_task}',[Controller::class,'session'])->name('session');
```

## In Controller.php
- ### Add session function
```bash
public function session(Request $request,$ID,$quantity,$sessionTask)
{
    switch ($sessionTask)
    {
        case 'add':
            if ($request->input('quantity'))
                SessionAction::addProduct($ID,$request->input('quantity'));
            else
                SessionAction::addProduct($ID,$quantity);
            break;
        case 'remove':
            SessionAction::remove($ID);
            break;
        case 'clean':
            SessionAction::clean();
            break;
        case 'addTokenDiscount':
            if ($request->input('giftCode')) {
                SessionAction::addTokenDiscount($request->input('giftCode'));
            }
            break;
    }
    return redirect(url()->previous());
}
```
## Update publicLayout.blade.php File
- ### Change cart li
```bash
@if (empty(\Illuminate\Support\Facades\Session::get('basket')))
<li class="ShopingCartLogo dropdown">
    <span class="ShopingCartCounter center dropbtn">0</span>
</li>
@else
@php($baskets = \App\Actions\SessionAction::getBasket())
<li class="ShopingCartLogo dropdown">
    <span class="ShopingCartCounter center dropbtn">{{ count($baskets) }}</span>
    <div class="dropdown-content">
        <a class="btn" href="{{ route('cart') }}">فاکتور کن</a>
        @foreach ($baskets as $basket)
        <a class="linkMenu" href="{{ route('singleProduct',$basket[0]->id) }}">
            <img class="cart" src="{{ asset($basket[0]->productImages[0]->path) }}" alt="dress1-1">
            <div class="box">
                <div class="detail">
                    <span>{{ $basket[0]->label }}</span>
                    @if ($basket[0]->discount_id)
                        <del>{{ $basket[0]->price }} ريال</del>
                        @if ($basket[0]->discount->price)
                            <ins>{{ $basket[0]->price - $basket[0]->discount->price }} ريال</ins>
                            <span>تعداد: {{ $basket[1] }}</span>
                            <ins> {{ ($basket[0]->price - $basket[0]->discount->price) * $basket[1] }} ريال</ins>
                        @else
                            <ins>{{ $basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100) }} ريال</ins>
                            <span>تعداد: {{ $basket[1] }}</span>
                            <ins> {{ ($basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100)) * $basket[1] }} ريال</ins>
                        @endif
                    @else
                        <ins>{{ $basket[0]->price }} ريال</ins>
                        <span>تعداد: {{ $basket[1] }}</span>
                        <ins> {{ $basket[0]->price * $basket[1] }} ريال</ins>
                    @endif
                </div>
            </div>
        </a>
        @endforeach
    </div>
</li>
@endif
```
## Update home.blade.php File
- ### Add this Route to basket logo in each product, LastProduct, Men Product, Women Product
```bash
{{ route('session', [$product->id, 1, 'add']) }}
```
## Update product.blade.php File
- ### Add this Route to basket logo in each product
```bash
{{ route('session', [$product->id, 1, 'add']) }}
```
## Update singleProduct.blade.php File
- ### Change Form Action
```bash
<form action="{{route('session',[$product->id,'request','add'])}}" method="get">
    <input type="button" value="+" onclick="increment()">
    <input type="number" name="quantity" value="1" id="productQuantity">
    <input type="button" value="-" onclick="decrement()">
    <input type="submit" value="افزودن به سبد خرید">
</form>
```
- ### Add Add this Route to basket logo in each product in last product
## Update test.blade.php File
```bash
{{ route('session', [$product->id, 1, 'add']) }}
```
## Update cart.blade.php File
- ### Change tbody tag in main table
```bash
<tbody>
    @if (\App\Actions\SessionAction::getBasket())
        @foreach (\App\Actions\SessionAction::getBasket() as $basket)
            <tr>
                <td>
                    <a href="{{ route('session', [$basket[0]->id, $basket[1], 'remove']) }}"><img class="removeImage" src="{{ asset('public-side-files') }}/IMAGE/logo/removeIcon.png" alt="removeIcon"></a>
                </td>
                <td>
                    <a href="{{ route('singleProduct', $basket[0]->id) }}"><img class="productImage" src="{{ asset($basket[0]->productImages[0]->path) }}" alt="dress1"></a>
                </td>
                <td>{{ $basket[0]->label }}</td>
                <td>
                    @if ($basket[0]->discount_id)
                        @if ($basket[0]->discount->price)
                            {{ $basket[0]->price - $basket[0]->discount->price }} ريال
                        @else
                            {{ $basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100) }} ريال
                        @endif
                    @else
                        {{ $basket[0]->price }} ريال
                    @endif
                </td>
                <td>
                    <a href="{{  route('session', [$basket[0]->id, 1, 'add'])  }}">
                        <input type="button" value="+">
                    </a>
                    <input type="text" value="{{ $basket[1] }}">
                    <a href="{{ route('session', [$basket[0]->id, -1, 'add']) }}">
                        <input type="button" value="-">
                    </a>
                </td>
                <td>
                    @if ($basket[0]->discount_id)
                        @if ($basket[0]->discount->price)
                            {{ ($basket[0]->price - $basket[0]->discount->price) * $basket[1] }} ريال
                        @else
                            {{ ($basket[0]->price - ($basket[0]->price * $basket[0]->discount->percent/100)) * $basket[1] }} ريال
                        @endif
                    @else
                        {{ $basket[0]->price * $basket[1] }} ريال
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
</tbody>
```
- ### Change Discount Form
```bash
<form action="{{ route('session', ['token', 'token', 'addTokenDiscount']) }}" method="get">
    <input type="text" name="giftCode" placeholder="کد تخفیف خود را وارد کنید">
    <input type="submit" value="ثبت کد تخفیف">
</form>
```
- ### Change tbody tag in factor part
```bash
<tbody>
    <tr>
        <td>جمع کل سبد خرید</td>
        <td>
            @if (\App\Actions\SessionAction::calculateCart())
            {{ \App\Actions\SessionAction::calculateCart() }} ریال
            @else
            سبد خالی است
            @endif
        </td>
    </tr>
    <tr>
        <td>هزینه ارسال</td>
        <td>رایگان</td>
    </tr>
    <tr>
        <td>کد تخفیف</td>
        <td>
            @if (!empty(\App\Actions\SessionAction::getTokenDiscount()))
                @foreach (\App\Actions\SessionAction::getTokenDiscount() as $dis)
                    @if ($dis->price)
                        کسر {{ (int) $dis->price }} ريال
                    @else
                        کسر {{ (int) $dis->percent }} درصد
                    @endif
                @endforeach
            @else
            سبد خالی است
            @endif
        </td>
    </tr>
</tbody>
```
- ### Change tfoot tag in factor part
```bash
<tfoot>
    <tr>
        <th>جمع کل </th>
        <th>
            @if (\App\Actions\SessionAction::calculateCart())
            {{ \App\Actions\SessionAction::calculateCart() - \App\Actions\SessionAction::calculateDiscountSession() }} ریال
            @else
            سبد خالی است
            @endif
        </th>
    </tr>
</tfoot>
```
## Update checkout.blade.php File
- ### Change tbody tag in factor part
```bash
<tbody>
    <tr>
        <td>جمع کل سبد خرید</td>
        <td>
            @if (\App\Actions\SessionAction::calculateCart())
            {{ \App\Actions\SessionAction::calculateCart() }} ریال
            @else
            سبد خالی است
            @endif
        </td>
    </tr>
    <tr>
        <td>هزینه ارسال</td>
        <td>رایگان</td>
    </tr>
    <tr>
        <td>کد تخفیف</td>
        <td>
            @if (!empty(\App\Actions\SessionAction::getTokenDiscount()))
                @foreach (\App\Actions\SessionAction::getTokenDiscount() as $dis)
                    @if ($dis->price)
                        کسر {{ (int) $dis->price }} ريال
                    @else
                        کسر {{ (int) $dis->percent }} درصد
                    @endif
                @endforeach
            @else
            سبد خالی است
            @endif
        </td>
    </tr>
</tbody>
```
- ### Change tfoot tag in factor part
```bash
<tfoot>
    <tr>
        <th>جمع کل </th>
        <th>
            @if (\App\Actions\SessionAction::calculateCart())
            {{ \App\Actions\SessionAction::calculateCart() - \App\Actions\SessionAction::calculateDiscountSession() }} ریال
            @else
            سبد خالی است
            @endif
        </th>
    </tr>
</tfoot>
```
