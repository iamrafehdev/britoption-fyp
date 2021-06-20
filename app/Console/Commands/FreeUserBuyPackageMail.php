<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserPackagesPlan;
use App\PackagesPlan;
use App\UserPayments;
use App\User;
use App\UserDepositFunds;
use DB;

class FreeUserBuyPackageMail extends Command
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
        $users =User::where('user_type','free')->get();
        foreach($users as $user)
        {   
           
                
          
            
        }
    }
}
