<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    public function item(){
        return $this->belongsTo(EntreeItem::class, 'entree_item_id', 'id');
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
