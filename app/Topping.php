<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    public function item(){
        return $this->belongsTo(ToppingItem::class, 'topping_item_id', 'id');
    }
    public function pizza(){
        return $this->belongsTo(Pizza::class, 'pizza_id' , 'id');
    }
}
