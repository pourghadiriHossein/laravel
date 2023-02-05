<?php

namespace App\Actions;

use App\Models\Category;
use PhpParser\Node\Stmt\Static_;

class CategoryAction {
    //Query Part

    // Edit Part
    
    //Edit Part
    public static function addCategory($request)
    {
        $newCategory = new Category();
        $newCategory->label = $request->input('label');
        $newCategory->parent_id = null;
        $newCategory->discount_id = $request->input('discount_id');
        $newCategory->status = $request->input('status');
        $newCategory->save();
        return back();
    }

    public static function addParentCategory($request, $category_id)
    {
        $newCategory = new Category();
        $newCategory->label = $request->input('label');
        $newCategory->parent_id = $category_id;
        $newCategory->discount_id = $request->input('discount_id');
        $newCategory->status = $request->input('status');
        $newCategory->save();
        return back();
    }

    public static function updateCategory($request, $category_id)
    {
        $updateCategory = Category::find($category_id);
        $updateCategory->label = $request->input('label');
        $updateCategory->parent_id = $request->input('parent_id');
        $updateCategory->discount_id = $request->input('discount_id');
        $updateCategory->status = $request->input('status');
        $updateCategory->save();
        return back();
    }
}
