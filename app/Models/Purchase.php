<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $guarded =['id'];
public function purchaseItems(){
    return $this->hasMany('App\models\PurchaseItem');
}

}
