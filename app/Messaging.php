<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messaging extends Model
{

	public function sender()
	{
		return $this->belongsTo(User::class,'sent_by');
	}
    //
}
