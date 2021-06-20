<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class isUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $setting = DB::table('settings')->first();
        if($setting->maintenance_status==1)
        {
            return redirect('maintenance-mode');
        }
        
        
        
        
        if (Auth::user() &&  Auth::user()->role_id == 0) {
            return $next($request);
        }
        
        return redirect('/');
    }
}
