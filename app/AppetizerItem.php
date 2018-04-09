<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppetizerItem extends Model
{
    protected $fillable = ['name', 'description','price'];
    public function appetizers() {
      return $this->hasMany(Appetizer::class);
    }
}
