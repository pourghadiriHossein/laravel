<?php

namespace App\Actions;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressAction {
    //Query Part
    public static function getAllAddresses(){
        $addresses = Address::all();
        return $addresses;
    }
    //Tools Part

    //Edit Part
    public static function deleteAddress(Address $Address)
    {
        $Address->delete();
        return back();
    }
    //necessary function

}
