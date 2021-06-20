<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserPackagesPlan;
use App\PackagesPlan;
use App\UserPayments;
use App\User;
use App\UserDepositFunds;
use DB;

class SendDailyProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-daily-profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily User Profit will be sent according to package daily profit';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $status =  DB::table('settings')->first();
       if($status->roi_status==1)
       {
            $user_packages=UserPackagesPlan::where('payment_status','1')->get();
            // $user_packages=UserPackagesPlan::where('payment_status','1')->where('package_status','!=',0)->get();

            foreach($user_packages as $packages)
            {   
                $save_payments=new UserPayments;
                $user = User::find($packages->user_id);
                
                if($user->user_type=='paid' && $user->status==1)
                {   
                    $package_profit = PackagesPlan::find($packages->packages_plan_id);
                    
                    $deposit_fund =   UserDepositFunds::where('id',$packages->deposit_id)->first();
                    if(isset($deposit_fund))
                    {
                        $calculate_profit_amount = ($deposit_fund->amount / 100)*$package_profit->daily_profit;
    
                        $save_payments->user_id = $packages->user_id;
                        $save_payments->amount = $package_profit->daily_profit;
                        $save_payments->total_amount = $calculate_profit_amount;
                        $save_payments->package_plan_id = $packages->packages_plan_id;
                        $save_payments->payment_date = date('d-m-Y');
                        $save_payments->save();
                        //update balance
                        $user->balance = $user->balance +  (double)$calculate_profit_amount;
                        $user->save(); 
                    }
                    
                }
                
            }
       }
    }
}
