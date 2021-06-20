<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentMethods;
use App\PackagesPlan;
use App\UnilevelTransaction;
use App\User;
use DB;
use Auth;
class DepositFundsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($package_plan_id)
    {
        $payment_methods = PaymentMethods::where('status','1')->get();
        $package_detail = PackagesPlan::find($package_plan_id);
        $page='packages';
       return view('users.deposit_funds.index',compact('payment_methods','package_detail','page'));
    }
    
    public function my_package()
    {

        $mypackages = DB::table("users_packages")->join('packages_plan', 'users_packages.packages_plan_id', '=', 'packages_plan.id')
        // ->where('users_packages.payment_status',1)
        ->join('users_deposit_funds','users_packages.deposit_id','=','users_deposit_funds.id')
        ->where('users_packages.user_id',Auth::user()->id)
        ->select('users_packages.daily_profit as dailyprofit','users_packages.payment_status as paystatus','packages_plan.package_name','users_packages.trx_id','packages_plan.package_price','packages_plan.daily_profit','packages_plan.activation_charge','users_deposit_funds.amount as deposit_amount')
        ->get();
        $page='packages';
        return view('users.packages_plan.my_packages',compact('mypackages','page'));
    }
    public function referralbounus()
    {

        // $mypackages = DB::table("users_packages")->join('packages_plan', 'users_packages.packages_plan_id', '=', 'packages_plan.id')
        // // ->where('users_packages.payment_status',1)
        // ->where('users_packages.user_id',Auth::user()->id)
        // ->select('users_packages.daily_profit as dailyprofit','users_packages.payment_status as paystatus','packages_plan.package_name','packages_plan.package_price','packages_plan.package_max_price','packages_plan.activation_charge')
        // ->get();
        $page='referral';
        
            $bonuses = UnilevelTransaction::where('ref_id',Auth::user()->id)->where('type','D')->get();
            $users_free = User::where('ref_id',Auth::user()->id)->where('user_type','free')->get();
            $paid_free = User::where('ref_id',Auth::user()->id)->where('user_type','paid')->get();

        return view('users.referrals.referral_bonus',compact('bonuses','page','users_free','paid_free'));
    }
    
    public function buy_package()
    {

        $packages_plan = DB::table("packages_plan")->where('packages_plan.status',1)->select('*')
        ->get();
        $page='packages';
        return view('users.packages_plan.packages_plan',compact('packages_plan','page'));
    }
    
    public function preview_gateway_deposit_amount(Request $request)
    {
        $payment_method =PaymentMethods::find($request->paymentmethod); 
        $amount = $request->amount;
        $w_add = $request->w_address;
        $packages_plan_id = $request->package_id;
        $page='packages';

        return view('users.deposit_funds.preview_gateway_deposit_amount',compact('amount','payment_method','packages_plan_id','w_add','page'));
    }
    
    
    
}
