<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToppingItem extends Model
{
    protected $fillable = ['type', 'description', 'price'];
    public function toppings(){
        return $this->hasMany(Entree::class);
    }
}
