<?php

namespace App\Actions;
use App\Models\Tag;

class TagAction {
    //Query Part
    public static function getAllTags(){
        $tags = Tag::all();
        return $tags;
    }
    public static function getTag($tag_id){
        $tag = Tag::find($tag_id);
        return $tag;
    }
    //Tools Part

    //Edit Part
    public static function addTag($request){
        Tag::create($request->all());
        return back();
    }

    public static function updateTag($request, $tag_id){
        $updateTag = self::getTag($tag_id);
        $updateTag->label = $request->input('label');
        $updateTag->status = $request->input('status');
        $updateTag->update();
        return back();
    }
    //necessary function

}
