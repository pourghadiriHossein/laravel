<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function orderListItems()
    {
        return $this->hasMany(OrderListItem::class);
    }
}
