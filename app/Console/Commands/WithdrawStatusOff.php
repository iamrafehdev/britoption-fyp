<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserPackagesPlan;
use App\UserPayments;
use App\User;
use DB;

class WithdrawStatusOff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change-status-withdraw-off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'On every tuesday change the status of withdrawable button to disable to all users';

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
        DB::table('settings')->where('withdraw_status',1)->update(['withdraw_status' => 0]);
        echo 1;
    }
}
