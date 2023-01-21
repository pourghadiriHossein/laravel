<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
