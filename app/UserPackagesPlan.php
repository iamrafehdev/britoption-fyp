<?php

namespace App;

use App\PackagesPlan;

use Illuminate\Database\Eloquent\Model;

class UserPackagesPlan extends Model
{
    protected $table = "users_packages";


    public function user()
	{
     return $this->belongsTo(User::class);
	}
	
	public function upackage()
	{
     return $this->belongsTo(PackagesPlan::class,'packages_plan_id');
	}
	


}
