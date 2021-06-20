<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnilevelTransaction extends Model
{
    protected $table="unilevel_transactions";


    protected $fillable=['user_id',	'ref_id',	'amount',	'date',	'type'];
    
}
