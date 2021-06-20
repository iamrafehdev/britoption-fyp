<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\SendDailyProfit::class,
        \App\Console\Commands\WithdrawStatus::class,
        \App\Console\Commands\WithdrawStatusOff::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //      ->everyMinute()
        //      ->appendOutputTo(storage_path('inspire.log'));
        $schedule->command('send-daily-profit')->runInBackground()->timezone('Asia/Karachi')->at('13:00');
        //  $schedule->command('change-status-withdraw')->runInBackground()->timezone('Asia/Karachi')->weekly()->mondays()->at('13:00');
         //$schedule->command('change-status-withdraw-off')->runInBackground()->timezone('Asia/Karachi')->weekly()->tuesdays()->at('13:00');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
