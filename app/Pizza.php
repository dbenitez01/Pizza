<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
  public function type() {
    return $this->belongsTo(PizzaTypes::class, 'pizzaTypeId', 'id');
  }
}
