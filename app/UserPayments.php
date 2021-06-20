<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayments extends Model
{
    protected $table = "users_payments";


    public function user()
	{
     return $this->belongsTo(User::class);
	}

}
