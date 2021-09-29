<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
	protected $table="deploymentorganizations";
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Usermanagement\Database\factories\OrganizationFactory::new();
    }
}
