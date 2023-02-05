<?php

namespace App\Actions;

use App\Models\Discount;

class DiscountAction {
    //Query Part

    // Edit Part
    
    // Edit Part
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
        $updateDiscount = Discount::find($discount_id);
        $updateDiscount->label = $request->input('label');
        $updateDiscount->price = $request->input('price');
        $updateDiscount->percent = $request->input('percent');
        $updateDiscount->gift_code = $request->input('gift_code');
        $updateDiscount->status = $request->input('status');
        $updateDiscount->save();
        return back();
    }
}
