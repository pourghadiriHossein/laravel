<?php

namespace App\Actions;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressAction {
    //Query Part

    // Edit Part
    
    //Edit Part
    public static function deleteAddress(Address $Address)
    {
        $Address->delete();
        return back();
    }

    public static function addAddress($request)
    {
        $newAddress = new Address();
        $newAddress->user_id = Auth::user()->id;
        $newAddress->city_id = $request->input('city_id');
        $newAddress->detail = $request->input('detail');
        $newAddress->save();
        return $newAddress->id;
    }
}
