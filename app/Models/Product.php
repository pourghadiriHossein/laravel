<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orderListItems()
    {
        return $this->hasMany(OrderListItem::class);
    }
}
