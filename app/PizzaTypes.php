<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaTypes extends Model
{
  protected $fillable = ['type', 'description', 'price'];
  public function appetizers() {
    return $this->hasMany(Pizza::class);
  }
}
