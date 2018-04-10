<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntreeItem extends Model
{
    protected $fillable = ['name', 'description','price'];
    public function entrees(){
        return $this->hasMany(Entree::class);
    }
}
