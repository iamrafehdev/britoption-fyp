<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PaymentMethods;
use App\UserPackagesPlan;
use App\PackagesPlan;
use App\UserWithdrawFunds;
use App\Otp;
use Auth;
use DB;
use Mail;

class WithdrawFundsController extends Controller
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
    public function index()
    {
        $page = "fund_withdraw_history";
        $user_packages = UserPackagesPlan::join('packages_plan','users_packages.packages_plan_id','=','packages_plan.id')->where('users_packages.user_id',Auth::user()->id)->get();
        $all_payment_methods = PaymentMethods::all();
        return view('users.withdraw_funds.index',compact('user_packages','all_payment_methods','page'));
    }

    public function withdraw_preview(Request $request)
    {
        $page = "fund_withdraw_history";
        $package_plan = PackagesPlan::find($request->package);
        $payment_method = $request->payment_method;
        $withdraw_amount = $request->withdraw_amount;
        $wallet_address =  $request->wallet_address;
        $withdraw_date = $request->withdraw_date;
        $comment = $request->comment;

        // send otp code to user for withdraw request
        $otp_code = rand(1000,9999);
        $otp = new Otp;
        $otp->code =$otp_code;
        $otp->user_id = Auth::user()->id;
        $otp->save();

        $data = array('name'=>Auth::user()->name,'otp_code'=>$otp_code);
        $email = Auth::user()->email;

        // send otp to user email
         Mail::send('emails.withdraw_otp_template', $data, function($message)use($email) {
             $message->to($email)->subject('Brit Option Withdraw OTP');
             $message->from('noreply@profitearn.io','Brit Option');
         });

        return view('users.withdraw_funds.withdraw_preview',compact('package_plan','payment_method','withdraw_amount','withdraw_date','page','wallet_address','comment'));
    }

    public function withdraw_preview_save(Request $request)
    {
        $user_withdraw_funds = new UserWithdrawFunds;
        $user_withdraw_funds->user_id = $request->user;
        $user_withdraw_funds->package_plan_id = $request->package_plan;
        $user_withdraw_funds->payment_method_id = $request->payment_method;
        $user_withdraw_funds->amount = $request->withdraw_amount;
        //$user_withdraw_funds->comment = $request->comment;
        $user_withdraw_funds->withdraw_date = $request->withdraw_date;
        $user_withdraw_funds->save();
        \Toastr::success('Amount withdraw successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('users/fund-withdraw');
    }

    public function withdraw_balance(Request $request)
    {
        $setting = DB::table('settings')->first();
        $charge =  DB::table('commissions')->first();

        // check already otp request

        // $check_otp = Otp::where('user_id',Auth::user()->id)->where('status',0)->get();
        // if($check_otp)
        // {
        //     return redirect('users/verify-otp');
        // }



        // echo "dd"; die;
        if($setting->withdraw_status==1)
        {
            $balance = Auth::user()->balance;
            if($request->withdraw_amount <=  $balance)
            {
                $user_withdraw_funds = new UserWithdrawFunds;
                $user_withdraw_funds->user_id = Auth::user()->id;
                // $user_withdraw_funds->package_plan_id = $request->package_plan;
                $user_withdraw_funds->comment = $request->comment;

               $user_withdraw_funds->payment_method = $request->payment_method;
              $user_withdraw_funds->wallet_address = $request->wallet_address;
               $user_withdraw_funds->charge = $charge->withdraw_commission;
               $amount_ded = ($request->withdraw_amount / 100) * $charge->withdraw_commission;
                $user_withdraw_funds->amount = $request->withdraw_amount;
                // $user_withdraw_funds->amount = $request->withdraw_amount - $amount_ded ;

                $user_withdraw_funds->comm_amount = $amount_ded;
                $user_withdraw_funds->withdraw_date = date('Y-m-d');
                $user_withdraw_funds->save();

                // send withdraw email
                $data = array('amount'=>$request->withdraw_amount,'charges'=>$charge->withdraw_commission,'name'=>Auth::user()->name,'date'=> date('Y-m-d'));
                $this->sendmail($data);
            }

            else{
                \Toastr::error('Unsufficent Amount!', 'Complete', ["positionClass" => "toast-top-right"]);
                 return redirect('users/fund_withdraw_history');
            }


        }

        \Toastr::success('Amount withdraw successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
        return redirect('users/fund_withdraw_history');
    }

    public function verify_otp(Request $request)
    {
        $user_otp = $request->otp;
        $otp = DB::table('otp')->where('user_id',Auth::user()->id)->where('code',$user_otp)->latest('id')->first();
        if($otp)
        {
            echo 1;
        }
    }

    // send new otp
    public function send_new_otp()
    {
        // send otp to user email

        // send otp code to user for withdraw request
        $otp_code = rand(1000,9999);
        $otp = new Otp;
        $otp->code =$otp_code;
        $otp->user_id = Auth::user()->id;
        $otp->save();

         //$otp_code = rand(1000,9999);
         $data = array('name'=>Auth::user()->name,'otp_code'=>$otp_code);
         $email = Auth::user()->email;

         Mail::send('emails.withdraw_otp_template', $data, function($message)use($email) {
             $message->to($email)->subject('Brit Option Withdraw OTP');
             $message->from('noreply@profitearn.io','Brit Option');
         });

         \Toastr::success('New OTP code sent successfully!', 'Complete', ["positionClass" => "toast-top-right"]);
            //   return redirect('users/withdraw-preview');
    }


        public function sendmail($data)
        {
            //$data = array('desc'=>$msg,'name'=>$name);
                $email = Auth::user()->email;
            Mail::send('emails.withdraw_template', $data, function($message)use($email) {
             $message->to(Auth::user()->email)->subject('Brit Option');
             $message->from('noreply@profitearn.io','Brit Option');
          });
        }
}
