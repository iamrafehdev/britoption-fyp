<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPayments extends Model
{
    protected $table = "admin_payments";


    public function user()
	{
     return $this->belongsTo(User::class);
	}

}
