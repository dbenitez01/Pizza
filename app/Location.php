<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['address','current_manager'];
    public function user(){
        return $this->belongsTo(User::class, 'current_manager','id');
    }
}

