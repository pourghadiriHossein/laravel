<?php

namespace App\Actions;

use App\Models\City;

class CityAction {
    //Query Part

    // Edit Part
    
    //Edit Part
    public static function addCity($request, $region_id)
    {
        $newCity = new City();
        $newCity->region_id = $region_id;
        $newCity->label = $request->input('label');
        $newCity->status = $request->input('status');
        $newCity->save();
        return back();
    }

    public static function updateCity($request, $city_id)
    {
        $updateCity = City::find($city_id);
        $updateCity->label = $request->input('label');
        $updateCity->status = $request->input('status');
        $updateCity->save();
        return back();
    }
}
