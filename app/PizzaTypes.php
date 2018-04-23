<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaTypes extends Model
{
  protected $fillable = ['type', 'description', 'price', 'photoName'];
  public function pizzas() {
    return $this->hasMany(Pizza::class);
  }
}
