<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
  public function item() {
    return $this->belongsTo(DrinkItem::class);
  }
  public function order() {
    return $this->belongsTo(Order::class);
  }
}
