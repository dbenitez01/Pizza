<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appetizer extends Model
{
  public function item() {
    return $this->belongsTo(AppetizerItem::class);
  }
  public function order() {
    return $this->belongsTo(Order::class);
  }
}
