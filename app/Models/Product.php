<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =['id'];
    
public function category(){
    return $this->belongsTo('App\Models\Category');
}
public function items(){
    return $this->hasMany('App\Models\Item');
}
public function stocks(){
    return $this->hasMany('App\Models\Stock');
  }
}
