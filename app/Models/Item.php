<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function products(){
      return $this->belongsTo('App\Models\Product');
  }
 
  public function centres(){
    return $this->belongsToMany('App\Models\Centre');
 
}
public function purchaseItem (){
  return $this->hasOne('App\Models\PurchaseItem');
}
}
