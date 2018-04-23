<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToppingItem extends Model
{
    protected $fillable = ['type', 'description', 'price', 'user_photo'];
    public function toppings(){
        return $this->hasMany(Topping::class);
    }
}
