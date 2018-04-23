<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntreeItem extends Model
{
    protected $fillable = ['name', 'description','price','user_photo'];
    public function entrees(){
        return $this->hasMany(Entree::class);
    }
}
