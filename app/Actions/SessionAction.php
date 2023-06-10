<?php

namespace App\Actions;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class SessionAction {

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

    public static function clean()
    {
        Session::forget('basket');
    }

    public static function getBasket()
    {
        return Session::get('basket');
    }

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

    public static function calculateDiscount($price,$discountPrice,$discountPercent){
        if ($discountPrice != null)
            return ($price-$discountPrice);
        elseif($discountPercent != null)
            return ($price-($price*($discountPercent/100)));
    }

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

    public static function cleanTokenDiscount()
    {
        Session::forget('discount');
    }

    public static function getTokenDiscount()
    {
        return Session::get('discount');
    }

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

}
