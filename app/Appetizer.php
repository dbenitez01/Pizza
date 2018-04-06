<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appetizer extends Model
{
  public function post() {
    return $this->belongsTo(AppetizerItem::class);
  }
}
