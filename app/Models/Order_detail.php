<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id')->select('id','productName');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item','item_id')->select('id','itemName');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','id')->select('id','name');
    }
}
