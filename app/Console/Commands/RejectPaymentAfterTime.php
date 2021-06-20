<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserPackagesPlan;
use App\UserPayments;
use App\PackagesPlan;
use App\User;
use Carbon\Carbon;
use Mail;
class RejectPaymentAfterTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reject-package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reject User Package if Payment is not processed in 15 Minutes';

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
        $user_packages=UserPackagesPlan::where('payment_status','2')->where('created_at', '<', Carbon::now()->subMinutes(60)->toDateTimeString())->get();
        foreach($user_packages as $packages)
        {
            $deposits = UserDepositFunds::where('id',$packages->deposit_id)->update(['status' => 3,]);
            $p_plan = PackagesPlan::where('id',$packages->packages_plan_id)->first();
            $user = User::where('id',$packages->user_id)->first();
            $packages->payment_status = '3';
            $packages->save();
            $msg = "Dear User! Your Request for buying the ".$p_plan->package_name." package has been Rejected due to Payment Process.";


                $this->sendmail($user->email,$msg,$user->name);
        }


    }


    public function sendmail($email,$msg,$name)
    {
            $data = array('desc'=>$msg,'name'=>$name);

        Mail::send('emails.email_template', $data, function($message)use($email) {
         $message->to($email)->subject('Brit Option');
         $message->from('noreply@profitearn.io','Brit Option');
      });
    }

}
