<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    protected $casts = [
        'pay_date' => 'datetime',
        'verify_date' => 'datetime',
    ];
}
