<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppetizerItem extends Model
{
    protected $fillable = ['name', 'description','price', 'user_photo'];
    public function appetizers() {
      return $this->hasMany(Appetizer::class);
    }
}
