<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DessertItem extends Model
{
    protected $fillable = ['name', 'description','price'];
    public function desserts() {
        return $this->hasMany(Dessert::class);
    }
}
