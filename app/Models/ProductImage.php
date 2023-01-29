<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
