<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
