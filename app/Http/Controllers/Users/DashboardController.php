<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
use App\UserPackagesPlan;
use DB;
use Auth;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         //$this->middleware('auth');
         //$this->middleware(['auth','verified']);
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $packagesplan = DB::table("packages_plan")->where('packages_plan.status',1)->select('*')
        ->whereNOTIn('id',function($query){
           $query->select('packages_plan_id')->from('users_packages')->where('user_id',Auth::user()->id);
        })
        ->get();
        $last_deposit_amount = DB::table('users_deposit_funds')->where('user_id',Auth::user()->id)->orderby('created_at', 'desc')->first();
        $last_withdraw_amount = DB::table('users_withdraw_funds')->where('user_id',Auth::user()->id)->orderby('created_at', 'desc')->first();
        $total_profit = DB::table('users_payments')->where('user_id',Auth::user()->id)->sum('amount');
        
        $page = 'dashboard';
        return view('users.dashboard.index',compact('packagesplan','last_deposit_amount','total_profit','last_withdraw_amount','page'));
    }
    
    
    
    public function checkresponse()
    {
        return view('users.test');
    }
}
