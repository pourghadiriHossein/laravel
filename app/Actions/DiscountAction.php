<?php

namespace App\Actions;

use App\Models\Discount;

class DiscountAction {
    //Query Part
    public static function getAllDiscounts(){
        $discounts = Discount::all();
        return $discounts;
    }
    public static function getDiscount($discount_id){
        $discount = Discount::find($discount_id);
        return $discount;
    }
    //Tools Part

    //Edit Part
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
    //necessary function

}
