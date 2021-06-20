<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserPackagesPlan;
use App\PackagesPlan;
use App\UserPayments;
use App\User;
use App\UserDepositFunds;
use DB;
use Mail;

class MarketingEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-marketing-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Marketing Email to free users';

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
        $users = User::where('user_type','free')->get();
        foreach($users as $user)
        {
            $email = $user->email;
            $data=array('name'=>$user->name);
            Mail::send('emails.merketing_email', $data, function($message)use($email) {
             $message->to($email)->subject('Brit Option');
             $message->from('noreply@profitearn.io','Brit Option');
          });

        }
    }

}
