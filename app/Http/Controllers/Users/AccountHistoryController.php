<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PackagesPlan;
use App\User;
use App\UserDepositFunds;
use App\UserWithdrawFunds;
use App\UserPayments;
use DB;
use Auth;
class AccountHistoryController extends Controller
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
    }

    public function daily_earning_history()
    {   $id = Auth::user()->id;
        $user_daily_earning = UserPayments::Join('packages_plan','users_payments.package_plan_id','=','packages_plan.id')
        ->select('packages_plan.*','users_payments.amount','users_payments.user_id','users_payments.package_plan_id','users_payments.payment_date','users_payments.id as paymentid','users_payments.total_amount')
        ->where('users_payments.user_id',$id)
        ->orderBy('paymentid', 'desc')->get();
        $page='investment';
        return view('users.account_history.daily_earning_history',compact('user_daily_earning','page'));
    }

    public function fund_withdraw_history()
    {   
    
       $user_withdraw_funds = UserWithdrawFunds::where('users_withdraw_funds.user_id',Auth::user()->id)
        ->orderBy('id', 'desc')
        ->paginate(10);
        
        // $user_withdraw_funds = UserWithdrawFunds::where('users_withdraw_funds.user_id',Auth::user()->id)
        // ->paginate(10);
        
        // dd($user_withdraw_funds);
        $page='withdraw';
        return view('users.account_history.fund_withdraw_history',compact('user_withdraw_funds','page'));
    }

    public function fund_deposit_history()
    {    $id = Auth::user()->id;
         $user_deposit_funds = UserDepositFunds::Join('packages_plan','users_deposit_funds.package_plan_id','=','packages_plan.id')
        ->join('users','users_deposit_funds.user_id','=','users.id')
        ->select('packages_plan.*','users_deposit_funds.amount as dollar_amount','users_deposit_funds.btc_amount as btc_amount',
        'users_deposit_funds.btc_rate as btc_rate','users_deposit_funds.sender as sender_address',
        'users_deposit_funds.reciever as reciever_address','users_deposit_funds.status as status','users_deposit_funds.created_at as createddate')
        ->where('users_deposit_funds.user_id',$id)
        ->paginate(10);
        $page='deposit';
        return view('users.account_history.fund_deposit_history',compact('user_deposit_funds','page'));
    }
}
