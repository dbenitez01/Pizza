<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function appetizers() {
    return $this->hasMany(Appetizer::class);
  }
  public function drinks() {
    return $this->hasMany(Drinks::class);
  }
}
