<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinkItem extends Model
{
    protected $fillable = ['brand', 'description','price','user_photo'];
    public function drinks() {
      return $this->hasMany(Drink::class);
    }
}
