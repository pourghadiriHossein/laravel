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
    public static function getUserAddresses($user_id){
        $addresses = Address::where('user_id',$user_id)->where('status',1)->get();
        return $addresses;
    }
    //Tools Part

    //Edit Part
    public static function deleteAddress(Address $Address)
    {
        $Address->delete();
        return back();
    }
    public static function addAddress($request)
    {
        $newAddress = new Address();
        $newAddress->user_id = Auth::id();
        $newAddress->city_id = $request->input('city_id');
        $newAddress->detail = $request->input('detail');
        $newAddress->save();
        return $newAddress->id;
    }
    //necessary function

}
