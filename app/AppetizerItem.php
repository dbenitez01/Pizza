<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppetizerItem extends Model
{
    protected $fillable = ['name', 'description','price'];
    public function appetizer() {
      return $this->hasMany(Appetizer::class);
    }
}
