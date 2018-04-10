<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    public function item() {
        return $this->belongsTo(DessertItem::class, 'dessert_item_id', 'id');
    }
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
