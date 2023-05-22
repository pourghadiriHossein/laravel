<?php

namespace App\Actions;

use App\Models\Discount;

class DiscountAction {
    //Query Part
    public static function getAllDiscounts(){
        $discounts = Discount::all();
        return $discounts;
    }
    //Tools Part

    //Edit Part

    //necessary function

}
