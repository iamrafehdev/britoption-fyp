<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDepositFunds extends Model
{
    protected $table = "users_deposit_funds";


    public function user()
	{
     return $this->belongsTo(User::class);
	}

}
