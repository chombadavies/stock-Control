<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    // protected $guarded =['id'];

    public function centres()
    {
        return $this->belongsToMany('App\Models\Centre','centre_stocks');
    }
    public function items()
    {
        return $this->belongsToMany('App\Models\Item',);
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product',);
    }
}
