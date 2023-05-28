<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;

class ProductAction {
    //Query Part
    public static function getAllProducts(){
        $products = Product::all();
        $products->load('productImages');
        return $products;
    }
    public static function getProduct($product_id){
        $product = Product::find($product_id);
        $product->load('productImages');
        return $product;
    }
    public static function getProductImage($image_id){
        $image = ProductImage::find($image_id);
        return $image;
    }
    public static function getAtLeastProducts($count){
        $products = Product::orderBy('id','desc')->take($count)->get();
        $products->load('productImages');
        return $products;
    }
    public static function getProductWithSelectedCategory($category_id, $count){
        $IDs = CategoryAction::getAllCategoriesIDWithNode($category_id);
        $products = Product::whereIn('category_id',$IDs)->take($count)->orderBy('id','desc')->get();
        $products->load('productImages');
        return $products;
    }
    //Tools Part
    public static function imagePath(){
        return 'public/images';
    }
    //Edit Part
    public static function addProduct($request){
        $newProduct = new Product();
        $newProduct->discount_id = $request->input('discount_id');
        $newProduct->category_id = $request->input('category_id');
        $newProduct->label = $request->input('label');
        $newProduct->description = $request->input('description');
        $newProduct->price = $request->input('price');
        $newProduct->count = $request->input('count');
        $newProduct->status = $request->input('status');
        $newProduct->save();
        $newProduct->tags()->sync($request->input('tags'));
        $paths = [];
        foreach ($request->file('images') as $image)
        {
            $paths[] = $image->storePubliclyAs(self::imagePath(),'image'.time().rand(1,10000).'.'.$image->extension());
        }
        foreach ($paths as $path)
        {
            $newProductImage = new ProductImage();
            $newProductImage->product_id = $newProduct->id;
            $newProductImage->path = str_replace('public', 'storage', $path);
            $newProductImage->save();
        }
    }

    public static function updateProduct($request, $product_id){
        $updateProduct = self::getProduct($product_id);
        $updateProduct->discount_id = $request->input('discount_id');
        $updateProduct->category_id = $request->input('category_id');
        $updateProduct->label = $request->input('label');
        $updateProduct->description = $request->input('description');
        $updateProduct->price = $request->input('price');
        $updateProduct->count = $request->input('count');
        $updateProduct->status = $request->input('status');
        $updateProduct->save();
        $updateProduct->tags()->sync($request->input('tags'));
        if ($request->hasFile('images'))
        {
            $paths = [];
            foreach ($request->file('images') as $image)
            {
                $paths[] = $image->storePubliclyAs(self::imagePath(),'image'.time().rand(1,10000).'.'.$image->extension());
            }
            foreach ($paths as $path)
            {
                $newProductImage = new ProductImage();
                $newProductImage->product_id = $updateProduct->id;
                $newProductImage->path = str_replace('public', 'storage', $path);
                $newProductImage->save();
            }
        }
    }

    public static function deleteProductImage($image_id){
        $image = self::getProductImage($image_id);
        File::delete($image->path);
        $image->delete();
    }
    //necessary function

}
