<?php

namespace App\Actions;

use App\Models\Tag;

class TagAction {
    //Query Part

    // Edit Part
    
    //Edit Part
    public static function addTag($request)
    {
        Tag::create($request->all());
        return back();
    }

    public static function updateTag($request, $tag_id)
    {
        $updateTag = Tag::find($tag_id);
        $updateTag->label = $request->input('label');
        $updateTag->status = $request->input('status');
        $updateTag->update();
        return back();
    }
}
