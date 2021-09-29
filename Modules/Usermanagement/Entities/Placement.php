<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Placement extends Model
{
    use HasFactory;
     protected $table="placements";
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Usermanagement\Database\factories\PlacementFactory::new();
    }
}
