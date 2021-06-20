<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $table="support_tickets";
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
