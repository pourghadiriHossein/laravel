<?php

namespace App\Actions;

use App\Models\Category;

class CategoryAction {
    //Query Part
    public static function getAllCategories(){
        $categories = Category::all();
        return $categories;
    }
    public static function getCategory($category_id){
        $category = Category::find($category_id);
        return $category;
    }
    public static function getAllCategoriesForMenu()
    {
        $allCategories = Category::where('parent_id',null)->with(['subCategories'])->get();
        return $allCategories;
    }
    //Tools Part

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

    public static function addParentCategory($request, $parent_id)
    {
        $newCategory = new Category();
        $newCategory->label = $request->input('label');
        $newCategory->parent_id = $parent_id;
        $newCategory->discount_id = $request->input('discount_id');
        $newCategory->status = $request->input('status');
        $newCategory->save();
        return back();
    }

    public static function updateCategory($request, $category_id)
    {
        $updateCategory = self::getCategory($category_id);
        $updateCategory->label = $request->input('label');
        $updateCategory->parent_id = $request->input('parent_id');
        $updateCategory->discount_id = $request->input('discount_id');
        $updateCategory->status = $request->input('status');
        $updateCategory->save();
        return back();
    }
    //necessary function

}
