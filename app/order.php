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
  public function desserts() {
    return $this->hasMany(Dessert::class);
  }
  public function entrees() {
    return $this->hasMany(Entree::class);
  }


  public function user() {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }
}
