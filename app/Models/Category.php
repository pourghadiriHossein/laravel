<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }
}
