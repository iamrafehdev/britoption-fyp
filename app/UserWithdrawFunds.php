<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWithdrawFunds extends Model
{
    protected $table = "users_withdraw_funds";
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
