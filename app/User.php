<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

 use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use Modules\Usermanagement\Entities\Profile;
use \OwenIt\Auditing\AuditingTrait;
class User extends Authenticatable implements Auditable
{
    use Notifiable,HasRoles,\OwenIt\Auditing\Auditable;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','telephone','username','confirmed_at',"token_2fa","token_2fa_expiry"
    ];


    protected $auditExclude = [
        'remember_token',
    ];



    public static function resolveId()
    {
        return Auth::check() ? Auth::user()->getAuthIdentifier() : null;
    }


    public function profile()
    {
        return $this->hasOne(Profile::class,'user_id');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



     public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

     public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}
