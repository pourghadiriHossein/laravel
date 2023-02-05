<?php

namespace App\Actions;

use App\Models\Region;

class RegionAction {
    //Query Part

    // Edit Part
    
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
        $updateRegion = Region::find($region_id);
        $updateRegion->label = $request->input('label');
        $updateRegion->status = $request->input('status');
        $updateRegion->save();
        return back();
    }
}
