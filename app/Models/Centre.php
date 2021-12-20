<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
   public function items()
    {
        return $this->belongsToMany('App\Models\Item')->withPivot('status','quantity');
    }

}
