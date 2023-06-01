<?php

namespace App\Actions;

use App\Models\City;
use App\Models\Region;

class RCAction {
    //Query Part
    public static function getAllRegions(){
        $regions = Region::all();
        return $regions;
    }
    public static function getRegion($region_id){
        $region = Region::find($region_id);
        return $region;
    }
    public static function getAllCity(){
        $cities = City::all();
        return $cities;
    }
    public static function getCity($city_id){
        $city = City::find($city_id);
        return $city;
    }
    //Tools Part

    //Edit Part
    public static function addRegion($request)
    {
        $newRegion = new Region();
        $newRegion->label = $request->input('label');
        $newRegion->status = $request->input('status');
        $newRegion->save();
        return back();
    }
    public static function updateRegion($request, $region_id)
    {
        $updateRegion = self::getRegion($region_id);
        $updateRegion->label = $request->input('label');
        $updateRegion->status = $request->input('status');
        $updateRegion->save();
        return back();
    }
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
        $updateCity = self::getCity($city_id);
        $updateCity->label = $request->input('label');
        $updateCity->status = $request->input('status');
        $updateCity->save();
        return back();
    }
    //necessary function

}
